<?php

namespace Tests\Unit;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class UserTest extends TestCase
{
    use RefreshDatabase;

    /** @test */
    public function can_check_if_user_is_an_admin()
    {
        $user = User::factory()->make([
            'name' => 'John Karlo',
            'email' => 'johnguitarizta@gmail.com',
        ]);

        $userB = User::factory()->make([
            'name' => 'June',
            'email' => 'june@user.com',
        ]);

        $this->assertTrue($user->isAdmin());
        $this->assertFalse($userB->isAdmin());
    }
}
