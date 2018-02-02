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

}
