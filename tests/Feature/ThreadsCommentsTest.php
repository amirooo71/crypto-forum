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
    function an_authenticated_user_can_an_threads_comments()
    {
        $this->signIn();
        $thread = create('App\Thread');
        $threadsComment = make('App\ThreadsComment', ['thread_id' => $thread->id]);
        $response = $this->post(route('threads.comments.store', $thread), $threadsComment->toArray());
        $response->assertStatus(201);
        $response->assertExactJson(['message' => 'کامنت با موفقیت ثبت شد.']);
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

}
