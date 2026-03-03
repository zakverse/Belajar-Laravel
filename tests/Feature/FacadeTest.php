<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Illuminate\Support\Facades\Config;
use Tests\TestCase;

class FacadeTest extends TestCase
{
    public function testConfig()
    {
        $appName = config('contoh.author.first');
        $appName2 = Config::get('contoh.author.first');
        self::assertSame($appName, $appName2);

        var_dump(Config::all());
    }


    public function testFacadeMock(){
        Config::shouldReceive('get')
            ->with('contoh.author.first')
            ->andReturn('Mocked Name');

       $firstName = Config::get('contoh.author.first');
       self::assertEquals('Mocked Name', $firstName);
    }
}
