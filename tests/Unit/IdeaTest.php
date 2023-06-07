<?php

namespace Tests\Unit;

use App\Exceptions\DuplicateVoteException;
use App\Exceptions\VoteNotFoundException;
use App\Models\Idea;
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

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
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
        $user = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        $this->assertFalse($idea->isVotedByUser($user));
        $idea->vote($user);
        $this->assertTrue($idea->isVotedByUser($user));
    }

    /** @test */
    public function user_can_unvote_for_idea()
    {
        $user = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        $this->assertTrue($idea->isVotedByUser($user));
        $idea->removeVote($user);
        $this->assertFalse($idea->isVotedByUser($user));
    }

    /** @test */
    public function voting_for_an_idea_thats_already_voted_for_throws_exception()
    {
        $userOne = User::factory()->create();

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
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

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
        ]);

        $this->expectException(VoteNotFoundException::class);

        $idea->removeVote($userOne);
    }
}

