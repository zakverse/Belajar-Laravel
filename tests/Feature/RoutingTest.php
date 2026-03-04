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

    public function testRouteParameter()
    {
        $this->get('/product/123')
            ->assertSeeText('Product ID: 123');

        $this->get('/product/123/item/456')
            ->assertSeeText('Product ID: 123, Item ID: 456');

    }

    public function testRouteConstraint()
    {
        $this->get('/categories/abc')
            ->assertSeeText('Page Not Found 404');

        $this->get('/categories/123')
            ->assertSeeText('Category ID: 123');
    }


    public function testOptionalParameter()
    {
        $this->get('/users')
            ->assertSeeText('User ID: 404');

        $this->get('/users/789')
            ->assertSeeText('User ID: 789');
    }

    public function testRouteName()
    {
        $this->get('/product/123')
            ->assertSeeText('Link: http://localhost/product/123');

        $this->get('/produk-redirect/123')
            ->assertRedirect('/product/123');

    }
}
