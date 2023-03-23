<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\Http;
use Tests\TestCase;

class SwapiFetchTest extends TestCase
{
    public function test_request_people()
    {
        $response = Http::get('https://swapi.dev/api/people');
        $this->assertTrue($response->successful());
    }

    public function test_request_planets()
    {
        $response = Http::get('https://swapi.dev/api/planets');
        $this->assertTrue($response->successful());
    }

    public function test_request_vehicles()
    {
        $response = Http::get('https://swapi.dev/api/vehicles');
        $this->assertTrue($response->successful());
    }
}
