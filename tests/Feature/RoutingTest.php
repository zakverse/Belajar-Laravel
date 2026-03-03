<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RoutingTest extends TestCase
{
    public function testRouting()
    {
        $this->get('/halo')
            ->assertStatus(200)
            ->assertSeeText('Hallo Laravel');
    }

    public function testRedirect()
    {
        $this->get('/home')
            ->assertRedirect('/');
    }

    public function testFallback()
    {
        $this->get('/none')
            ->assertSeeText('Page Not Found 404');
    }
}
