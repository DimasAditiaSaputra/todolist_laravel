<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class RouteTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testHome(): void
    {
        $this->get("/")->assertSeeText("Kelola Harimu dengan Mudah");
    }
}
