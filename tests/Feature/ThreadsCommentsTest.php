<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class ThreadsCommentsTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    function an_authenticated_user_can_add_threads_comments()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $threadsComment = make('App\ThreadsComment', ['thread_id' => $thread->id]);
        $response = $this->post(route('threads.comments.store', $thread), $threadsComment->toArray());
        $response->assertStatus(201);
        $response->assertJsonCount(2);
    }

    /**
     * @test
     */
    function an_unauthenticated_user_cant_not_add_threads_comments()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = create('App\Thread');
        $threadsComment = make('App\ThreadsComment', ['thread_id' => $thread->id]);
        $this->post(route('threads.comments.store', $thread), $threadsComment->toArray());
    }

    /**
     * @test
     */
    public function a_user_can_view_all_threads_comments()
    {
        $thread = create('App\Thread');
        create('App\ThreadsComment', ['thread_id' => $thread->id]);
        $response = $this->getJson(route('threads.comments.index', $thread))->json();
        $this->assertCount(1, $response);
    }


}
