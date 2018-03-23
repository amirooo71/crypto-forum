<?php

namespace Tests\Feature;

use Tests\TestCase;
use Illuminate\Foundation\Testing\RefreshDatabase;

class AnalysisChartTest extends TestCase
{

    use RefreshDatabase;

    /**
     * @test
     */
    function guests_may_not_create_analysis()
    {
        $this->expectException('Illuminate\Auth\AuthenticationException');
        $thread = make('App\Analysis');
        $this->post(route('analysis.store'), $thread->toArray());
    }

    /**
     * @test
     */
    public function an_authenticated_can_add_new_analysis_chart_data()
    {
        $this->signIn();
        $analysis = make('App\Analysis');
        $response = $this->post(route('analysis.store'), $analysis->toArray());
        $response->assertStatus(201);
    }
}
