<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\DatabaseMigrations;
use Tests\TestCase;

class ParticipateInForumTest extends TestCase
{
    use DatabaseMigrations;

    /**
     * @test
     */
    public function unauthenticated_users_may_not_add_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = create('App\Thread');
        $this->post($thread->path() . '/replies', []);
    }

    /**
     * @test
     */
    public function an_authenticated_user_may_participate_in_forum_threats()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $reply = make('App\Reply');
        $this->post($thread->path() . '/replies', $reply->toArray());
        $response = $this->get($thread->path());
        $response->assertSee($reply->body);
    }


    /**
     * @test
     */
    function a_reply_requires_a_body()
    {
        $this->expectException('Illuminate\Validation\ValidationException');
        $this->signIn();
        $thread = create('App\Thread');
        $reply = make('App\Reply', ['body' => null]);
        $this->post($thread->path() . '/replies', $reply->toArray());
    }

    /**
     * @test
     */
    function unauthorized_users_cannot_delete_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $reply = create('App\Reply');
        $this->delete("/replies/{$reply->id}");

    }

    /**
     * @test
     */
    function authorized_user_can_delete_replies()
    {
        $this->signIn();
        $reply = create('App\Reply', ['user_id' => auth()->id()]);
        $response = $this->delete("/replies/{$reply->id}");
        $response->assertStatus(302);
    }

    /**
     * @test
     */
    function authorized_users_can_update_replies()
    {
        $this->signIn();
        $reply = create('App\Reply', ['user_id' => auth()->id()]);
        $response = $this->patch("/replies/{$reply->id}", ['body' => 'You been changed, fool']);
        $response->assertStatus(200);
    }

    /**
     * @test
     */
    function unauthorized_users_cannot_update_replies()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $reply = create('App\Reply');
        $this->patch("/replies/{$reply->id}", ['body' => 'You been changed, fool']);

    }


}
