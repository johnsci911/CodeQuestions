<?php

namespace Tests\Unit;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class IdeaTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_check_if_idea_is_voted_for_by_user()
    {
        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $category = Category::factory()->create(['name' => 'Category 1']);

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userOne->id,
        ]);

        $this->assertTrue($idea->isVotedByUser($userOne));
        $this->assertFalse($idea->isVotedByUser($userTwo));
        $this->assertFalse($idea->isVotedByUser(null));
    }

    /** @test */
    public function user_can_vote_for_idea()
    {
        $userOne = User::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $category = Category::factory()->create(['name' => 'Category 1']);

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        $this->assertFalse($idea->isVotedByUser($userOne));
        $idea->vote($userOne);
        $this->assertTrue($idea->isVotedByUser($userOne));
    }

    /** @test */
    public function user_can_unvote_for_idea()
    {
        $userOne = User::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $category = Category::factory()->create(['name' => 'Category 1']);

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userOne->id,
        ]);

        $this->assertTrue($idea->isVotedByUser($userOne));
        $idea->removeVote($userOne);
        $this->assertFalse($idea->isVotedByUser($userOne));
    }

    /** @test */
    public function voting_for_an_idea_thats_already_voted_for_throws_exception()
    {
        $userOne = User::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $category = Category::factory()->create(['name' => 'Category 1']);

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userOne->id,
        ]);

        $this->expectException(DuplicateVoteException::class);

        $idea->vote($userOne);
    }

    /** @test */
    public function removing_a_vote_that_doesnt_exist_throws_exception()
    {
        $userOne = User::factory()->create();

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $category = Category::factory()->create(['name' => 'Category 1']);

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
            'category_id' => $category->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        $this->expectException(VoteNotFoundException::class);

        $idea->removeVote($userOne);
    }
}

