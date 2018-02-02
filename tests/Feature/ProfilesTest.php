<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ProfilesTest extends TestCase
{

    use DatabaseMigrations;

    /**
     * @test
     */
    public function a_user_has_a_profile()
    {
        $user = create('App\User');
        $response = $this->get("/profiles/" . $user->name);
        $response->assertSee($user->name);
    }

    /**
     * @test
     */
    public function profiles_display_all_threads_created_bly_the_associated_user()
    {
        $user = create('App\User');
        $thread = create('App\Thread', ['user_id' => $user->id]);
        $response = $this->get('/profiles/' . $user->name);
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }

}
