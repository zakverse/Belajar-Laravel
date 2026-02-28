<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class ConfigurationTest extends TestCase
{
    public function testConfig()
    {
        $authorFirst = config('contoh.author.first');
        $authorLast = config('contoh.author.last');
        $authorEmail = config('contoh.email');
        $authorWebsite = config('contoh.website');

        self::assertEquals('Dzaki', $authorFirst);
        self::assertEquals('Khothir', $authorLast);
        self::assertEquals('dzaki@example.com', $authorEmail);
        self::assertEquals('www.dzakikhothir.com', $authorWebsite);
    }
}
