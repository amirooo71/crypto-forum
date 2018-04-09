<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AttachThreadTest extends TestCase
{
    use RefreshDatabase;

    /**
     * @test
     */
    function an_authenticated_user_can_get_attached_thread_info()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $token = md5($thread->slug);
        $response = $this->getJson(route('attach.thread.show', $token))->json();
        $this->assertCount(17, $response);
    }

    /**
     * @test
     */
    function an_unauthenticated_user_can_not_get_attached_thread_info()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = create('App\Thread');
        $token = md5($thread->slug);
        $this->getJson(route('attach.thread.show', $token))->json();
    }


    /**
     * @test
     */
    function an_authenticated_user_can_attach_thread()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $threadsComment = make('App\ThreadsComment', ['thread_id' => $thread->id]);
        $response = $this->post(route('attach.thread.store', $thread), $threadsComment->toArray());
        $response->assertStatus(201);
        $response->assertJsonCount(2);
    }

    /**
     * @test
     */
    function an_unauthenticated_user_can_not_attach_thread()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = create('App\Thread');
        $threadsComment = make('App\ThreadsComment', ['thread_id' => $thread->id]);
        $this->post(route('attach.thread.store', $thread), $threadsComment->toArray());
    }

    /**
     * @test
     */
    function an_attach_threads_comment_requires_a_body()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $threadsComment = make('App\ThreadsComment', ['thread_id' => $thread->id, 'body' => null]);
        $response =$this->post(route('attach.thread.store', $thread), $threadsComment->toArray());
        $response->assertStatus(422);
    }
}
