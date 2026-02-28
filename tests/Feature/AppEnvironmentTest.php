<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AppEnvironmentTest extends TestCase
{
  public function testAppEnv()
    {
        if (app()->environment('testing', 'local')) {
            self::assertTrue(true);
        } 
    }
}
