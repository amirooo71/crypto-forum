<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateThreadsTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    function guests_may_not_create_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = make('App\Thread');
        $this->post('/threads', $thread->toArray());
    }

//    /**
//     * @test
//     */
//    function guests_cannot_see_the_create_thread_page()
//    {
//        $response = $this->withExceptionHandling()->get('/threads/create');
//        $response->assertRedirect('/login');
//    }

    /**
     * @test
     */
    function an_authenticated_user_can_create_new_forum_threads()
    {
        $this->signIn();
        $thread = make('App\Thread');
        $this->post('/threads', $thread->toArray());
        $response = $this->get($thread->path());
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }
}
