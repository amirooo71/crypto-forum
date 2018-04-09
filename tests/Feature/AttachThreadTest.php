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

}
