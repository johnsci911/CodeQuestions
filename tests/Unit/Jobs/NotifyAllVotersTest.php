<?php

namespace Tests\Unit\Jobs;

use App\Jobs\NotifyAllVoters;
use App\Mail\IdeaStatusUpdatedMailable;
use App\Models\Category;
use App\Models\Idea;
use App\Models\Status;
use App\Models\User;
use App\Models\Vote;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Mail;
use Tests\TestCase;

class NotifyAllVotersTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function it_sends_an_email_to_all_voters()
    {
        $user = User::factory()->create([
            'email' => 'johnguitarizta@gmail.com',
        ]);

        $userB = User::factory()->create([
            'email' => 'admin@admin.com',
        ]);

        $idea = Idea::factory()->create([
            'user_id' => $user->id,
            'title' => 'My First Idea',
            'description' => 'Description for my first idea',
        ]);

        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $user->id,
        ]);

        Vote::create([
            'idea_id' => $idea->id,
            'user_id' => $userB->id,
        ]);

        Mail::fake();

        NotifyAllVoters::dispatch($idea);

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function ($mail) {
            return $mail->hasTo('johnguitarizta@gmail.com')
                && $mail->hasSubject('An idea you voted for has a new status');
        });

        Mail::assertQueued(IdeaStatusUpdatedMailable::class, function ($mail) {
            return $mail->hasTo('admin@admin.com')
                && $mail->hasSubject('An idea you voted for has a new status');
        });
    }
}
