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
        $this->post(route('threads'), $thread->toArray());
    }

    /**
     * @test
     */
    function new_users_must_first_confirm_their_email_address_befor_creating_threads()
    {
        $user = factory('App\User')->states('unconfirmed')->create();
        $this->signIn($user);
        $thread = make('App\Thread');
        $this->post(route('threads'), $thread->toArray())
            ->assertRedirect(route('threads'))
            ->assertSessionHas('flash');
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
    function a_user_can_create_new_forum_threads()
    {
        $this->signIn();
        $thread = make('App\Thread');
        $postResponse = $this->post(route('threads'), $thread->toArray());
        $response = $this->get($postResponse->headers->get('Location'));
        $response->assertSee($thread->title);
        $response->assertSee($thread->body);
    }

    /**
     * @test
     */
    function a_thread_requires_a_title()
    {
        $response = $this->publishThread(['title' => null]);
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    function a_thread_requires_a_body()
    {
        $response = $this->publishThread(['body' => null]);
        $response->assertStatus(422);
    }

    /**
     * @test
     */
    function a_thread_requires_a_valid_channel()
    {
        factory('App\Channel', 2)->create();
        $response = $this->publishThread(['channel_id' => null]);
        $response->assertStatus(422);
        $response = $this->publishThread(['channel_id' => 999]);
        $response->assertStatus(422);
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
//        $this->assertDatabaseMissing('replies', ['id' => $reply->id]);
    }

    /**
     * @param array $overrides
     * @return \Illuminate\Foundation\Testing\TestResponse
     */
    private function publishThread($overrides = [])
    {
        $this->signIn();
        $thread = make('App\Thread', $overrides);
        return $this->post(route('threads'), $thread->toArray());
    }


}
