<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class GravatarTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_a()
    {
        $user = User::factory()->create([
            'name' => 'John',
            'email' => 'aaron@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            "https://www.gravatar.com/avatar/" . md5($user->email) . "?s200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-1.png",
            $gravatarUrl
        );

        // $response = Http::get($user->getAvatar());
        //
        // $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_z()
    {
        $user = User::factory()->create([
            'name' => 'John',
            'email' => 'zoe@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            "https://www.gravatar.com/avatar/" . md5($user->email) . "?s200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-26.png",
            $gravatarUrl
        );

        // $response = Http::get($user->getAvatar());
        //
        // $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_0()
    {
        $user = User::factory()->create([
            'name' => 'John',
            'email' => '0up@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            "https://www.gravatar.com/avatar/" . md5($user->email) . "?s200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-27.png",
            $gravatarUrl
        );

        // $response = Http::get($user->getAvatar());
        //
        // $this->assertTrue($response->successful());
    }

    /** @test */
    public function user_can_generate_gravatar_default_image_when_no_email_found_first_character_9()
    {
        $user = User::factory()->create([
            'name' => 'John',
            'email' => '9cloud@fakeemail.com',
        ]);

        $gravatarUrl = $user->getAvatar();

        $this->assertEquals(
            "https://www.gravatar.com/avatar/" . md5($user->email) . "?s200&d=https://s3.amazonaws.com/laracasts/images/forum/avatars/default-avatar-36.png",
            $gravatarUrl
        );

        // $response = Http::get($user->getAvatar());
        //
        // $this->assertTrue($response->successful());
    }
}
