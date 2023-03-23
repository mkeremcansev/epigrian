<?php

namespace Tests\Unit;

use App\Models\Planet;
use Tests\TestCase;

class PlanetUnitTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get(route('planet.index'));
        $this->assertIsObject($response);
    }

    public function test_show()
    {
        $planet = Planet::inRandomOrder()->first();
        $response = $this->get(route('planet.show', $planet->id));
        $this->assertIsObject($response);
    }
}
