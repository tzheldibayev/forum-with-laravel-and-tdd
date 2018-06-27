<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfileTest extends TestCase
{
    use DatabaseMigrations;

    /** @test */
    public function a_user_has_a_profile()
    {
        $user = create('App\User');

        $this->get('/profile/'.$user->name)
            ->assertSee($user->name);
    }

    /** @test */
    public function profiles_display_all_threads_creeated_by_associated_user()
    {
        $user = create('App\User');

        $thread = create('App\Thread', ['user_id' => $user->id]);

        $this->get('/profile/'.$user->name)
            ->assertSee($thread->title)
            ->assertSee($thread->body);
    }
}
