<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class HelloControllerTest extends TestCase
{
    public function testHello()
    {
        $this->get('/controller/hello')
            ->assertSeeText('Hallo World');
    }

    public function testRequest()
    {
        $this->get('/controller/request',[
            'Accept' => 'application/json'
        ])->assertSeeText('controller/request')
        ->assertSeeText('http://localhost/controller/request')
        ->assertSeeText('Method: GET')
        ->assertSeeText('Header: application/json');
            
    }


}
