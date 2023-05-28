<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeaShow;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class VoteShowPageTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function show_page_contains_idea_show_livewire_component()
    {
        $user = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Categrory 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        $this->get(route('idea.show', $idea))
            ->assertSeeLivewire('idea-show');
    }

    /** @test */
    public function show_page_correctly_receives_votes_count()
    {
        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Categrory 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userOne->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $idea->id,
            'user_id' => $userTwo->id,
        ]);

        $this->get(route('idea.show', $idea))
            ->assertViewHas('votesCount', 2);
    }

    /** @test */
    public function votes_count_shows_correctly_on_show_page_livewire_component()
    {
        $userOne = User::factory()->create();
        $userTwo = User::factory()->create();

        $categoryOne = Category::factory()->create(['name' => 'Categrory 1']);

        $statusOpen = Status::factory()->create(['name' => 'Open', 'classes' => 'bg-gray-200']);

        $idea = Idea::factory()->create([
            'user_id' => $userOne->id,
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
            'title' => 'My first Idea',
            'description' => 'Description of my first idea',
        ]);

        Livewire::test(IdeaShow::class, [
            'idea' => $idea,
            'votesCount' => 5,
        ])
        ->assertSet('votesCount', 5)
        ->assertSeeHtml('<div class="text-xl leading-snug">5</div>')
        ->assertSeeHtml('<div class="text-sm font-bold leading-none">5</div>');
    }
}
