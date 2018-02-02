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

    /**
     * @test
     */
    function guests_cannot_see_the_create_thread_page()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $response = $this->get('/threads/create');
        $response->assertRedirect('/login');
    }

    /**
     * @test
     */
    function an_authenticated_user_can_create_new_forum_threads()
    {
        $this->signIn();
        $thread = make('App\Thread');
        $postResponse = $this->post('/threads', $thread->toArray());
        $response = $this->get($postResponse->headers->get('Location'));
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }

    /**
     * @test
     */
    function a_thread_requires_a_title()
    {
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->publishThread(['title' => null]);
    }

    /**
     * @test
     */
    function a_thread_requires_a_body()
    {
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->publishThread(['body' => null]);
    }

    /**
     * @test
     */
    function a_thread_requires_a_valid_channel()
    {
        factory('App\Channel', 2)->create();
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->publishThread(['channel_id' => null]);
        $this->publishThread(['channel_id' => 999]);
    }

    /**
     * @param array $overrides
     */
    private function publishThread($overrides = [])
    {
        $this->signIn();
        $thread = make('App\Thread', $overrides);
        $this->post('/threads', $thread->toArray());
    }
}
