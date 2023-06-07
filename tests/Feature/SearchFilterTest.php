<?php

namespace Tests\Feature;

use App\Http\Livewire\IdeasIndex;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Livewire\Livewire;
use Tests\TestCase;

class SearchFilterTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function searching_works_when_more_than_3_characters()
    {
        $user = User::factory()->create();

        $ideaOne = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My Second Idea',
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $ideaOne->id,
            'user_id' => $user->id,
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('search', 'Second')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 1
                    && $ideas->first()->title === 'My Second Idea';
            });
    }

    /** @test */
    public function does_not_perform_search_if_less_than_3_characters()
    {
        $user = User::factory()->create();

        $ideaOne = Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Idea::factory()->create([
            'user_id' => $user->id,
        ]);

        Vote::factory()->create([
            'idea_id' => $ideaOne->id,
            'user_id' => $user->id,
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('search', 'ab')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 3;
            });
    }

    /** @test */
    public function search_works_correctly_with_category_filters()
    {
        $categoryOne = Category::factory()->create(['name' => 'Category 1']);
        $categoryTwo = Category::factory()->create(['name' => 'Category 2']);

        Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My First Idea',
            'description' => 'Description for my first idea',
        ]);

        Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'title' => 'My Second Idea',
            'description' => 'Description for my first idea',
        ]);

        Idea::factory()->create([
            'category_id' => $categoryTwo->id,
            'title' => 'My Third Idea',
            'description' => 'Description for my first idea',
        ]);

        Livewire::test(IdeasIndex::class)
            ->set('category', 'Category 1')
            ->set('search', 'Idea')
            ->assertViewHas('ideas', function ($ideas) {
                return $ideas->count() === 2;
            });
    }
}
