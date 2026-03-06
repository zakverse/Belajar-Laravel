<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class InputControllerTest extends TestCase
{
    public function testHelloGet()
    {
        $this->get('/input/hello?name=Zaki')
            ->assertSeeText('Hello, Zaki!');
    }

    public function testHelloPost()
    {
        $this->post('/input/hello', [
            'name' => 'Zaki'
        ])->assertSeeText('Hello, Zaki!');
    }

    public function testInputNested()
    {
        $this->post('/input/hello/first', [
            'name' => [
                'first' => 'Zaki',
                'last' => 'ackerman'

           ]
        ])->assertSeeText('Hello, Zaki!');
    }

    public function testInputAll()
    {
        $this->post('/input/hello/input', [
            'name' => [
                'first' => 'Zaki',
                'last' => 'ackerman'

            ]
        ])->assertSeeText('name')->assertSeeText('first'
        )->assertSeeText('last')
        ->assertSeeText('Zaki')
        ->assertSeeText('ackerman');
    }

    public function testArrayInput()
    {
        $this->post('/input/hello/array', [
            'product' => [
                ['name' => 'Apple', 'price' => 1000],
                ['name' => 'Orange', 'price' => 2000],
                ['name' => 'Banana', 'price' => 3000],
                ['name' => 'Grapes', 'price' => 4000],
                ['name' => 'Mango', 'price' => 5000],
            ]
        ])->assertSeeText('Apple')
        ->assertSeeText('Orange')
        ->assertSeeText('Banana')
        ->assertSeeText('Grapes')
        ->assertSeeText('Mango');
    }

    public function testInputType()
    {
        $this->post('/input/type', [
            'name' => 'Zaki',
            'married' => 'true',
            'birth_date' => '1990-01-01'
        ])->assertSeeText('Zaki')
        ->assertSeeText('true')
        ->assertSeeText('1990-01-01');
    }


    public function testFilterOnly()
    {
        $this->post('/input/filter/only', [
            'name' => [
                'first' => 'Zaki',
                'middle' => 'D',
                'last' => 'ackerman'

            ]
        ])->assertSeeText('Zaki')
        ->assertSeeText('ackerman')->assertDontSeeText('D');
    }

    public function testFilterExcept()
    {
        $this->post('/input/filter/except', [
            'name' => 'Zaki',
            'admin' => 'true'
        ])->assertSeeText('Zaki')
        ->assertDontSeeText('admin');
    }

    public function testFilterMerge()
    {
        $this->post('/input/filter/merge', [
            'name' => 'Zaki',
            'admin' => 'true'
        ])->assertSeeText('Zaki')->assertSeeText('admin')
        ->assertSeeText('false');
    }














}
