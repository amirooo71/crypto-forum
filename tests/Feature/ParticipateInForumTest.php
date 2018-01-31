<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\DatabaseMigrations;

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

}
