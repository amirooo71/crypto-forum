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
     * @test
     */
    public function unauthorized_users_may_not_delete_threads()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = create('App\Thread');
        $this->delete($thread->path());
        $this->signIn();
        $response = $this->delete($thread->path());
        $response->assertStatus(403);

    }

    /**
     * @test
     */
    public function authorized_users_can_delete_thread()
    {
        $this->signIn();
        $thread = create('App\Thread', ['user_id' => auth()->id()]);
        $reply = create('App\Reply', ['thread_id' => $thread->id]);
        $response = $this->json('DELETE', $thread->path());
        $response->assertStatus(204);
//        $this->assertDatabaseMissing('threads', ['id' => $thread->id]);
//        $this->assertDatabaseMissing('threads', ['id' => $reply->id]);
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
