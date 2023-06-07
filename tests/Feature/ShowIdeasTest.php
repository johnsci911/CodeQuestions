<?php

namespace Tests\Feature;

use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class ShowIdeasTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function list_of_ideas_shows_on_main_page()
    {
        $categoryOne = Category::factory()->create();
        $categoryTwo = Category::factory()->create();

        $statusOpen = Status::factory()->create();
        $statusConsidering = Status::factory()->create();

        $ideaOne = Idea::factory()->create([
            'category_id' => $categoryOne->id,
            'status_id' => $statusOpen->id,
        ]);

        $ideaTwo = Idea::factory()->create([
            'category_id' => $categoryTwo->id,
            'status_id' => $statusConsidering->id,
        ]);

        $response = $this->get(route('idea.index'));

        $response->assertSuccessful();
        $response->assertSee($ideaOne->title);
        $response->assertSee($ideaOne->description);
        $response->assertSee($categoryOne->name);

        $response->assertSee($ideaTwo->title);
        $response->assertSee($ideaTwo->description);
        $response->assertSee($categoryTwo->name);
    }

    /** @test */
    public function single_idea_shows_correctly_on_show_page()
    {
        $categoryOne = Category::factory()->create();

        $idea = Idea::factory()->create([
            'category_id' => $categoryOne->id,
        ]);

        $response = $this->get(route('idea.show', $idea));
        $response->assertSuccessful();
        $response->assertSee($idea->title);
        $response->assertSee($idea->description);
        $response->assertSee($categoryOne->name);
    }

    /** @test */
    public function ideas_pagination_works()
    {
        Idea::factory(Idea::PAGINATION_COUNT + 1)->create();

        $ideaOne = Idea::find(1);
        $ideaOne->title = 'My first Idea';
        $ideaOne->save();

        $ideaEleven = Idea::find(11);
        $ideaEleven->title = 'My eleventh Idea';
        $ideaEleven->save();

        $response = $this->get('/');

        $response->assertSee($ideaEleven->title);
        $response->assertDontSee($ideaOne->title);

        $response = $this->get('/?page=2');

        $response->assertSee($ideaOne->title);
        $response->assertDontSee($ideaEleven->title);
    }

    /** @test */
    public function same_idea_title_different_slugs()
    {
        $ideaOne = Idea::factory()->create([
            'title' => 'My first Idea',
        ]);

        $ideaTwo = Idea::factory()->create([
            'title' => 'My first Idea',
        ]);

        $response = $this->get(route('idea.show', $ideaOne));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea');

        $response = $this->get(route('idea.show', $ideaTwo));

        $response->assertSuccessful();
        $this->assertTrue(request()->path() === 'ideas/my-first-idea-2');
    }

    /** @test */
    public function in_app_back_button_works_when_index_page_visited_first()
    {
        $statusConsidering = Status::factory()->create([
            'name' => 'Considering',
            'classes' => 'bg-purple text-white'
        ]);

        $ideaOne = Idea::factory()->create();

        Idea::factory()->create([
            'status_id' => $statusConsidering->id,
        ]);

        $response = $this->get('/?category=Category%202&status=Considering');
        $response = $this->get(route('idea.show', $ideaOne));

        $this->assertStringContainsString('/?category=Category%202&status=Considering', $response['backUrl']);
    }

    /** @test */
    public function in_app_back_button_works_when_show_page_only_page_visited_first()
    {
        $ideaOne = Idea::factory()->create();

        Idea::factory()->create();

        $response = $this->get(route('idea.show', $ideaOne));

        $this->assertEquals(route('idea.index'), $response['backUrl']);
    }
}
