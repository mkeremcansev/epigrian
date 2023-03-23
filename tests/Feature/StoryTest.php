<?php

namespace Tests\Feature;

use App\Models\People;
use App\Models\Planet;
use App\Models\Story;
use App\Models\Vehicle;
use Tests\TestCase;

class StoryTest extends TestCase
{
    public function test_story(): void
    {
        $planet = Planet::inRandomOrder()->first();
        $vehicle = Vehicle::inRandomOrder()->first();
        $people = People::inRandomOrder()->first();

        $this->assertFalse(
            is_null($planet) || is_null($vehicle) || is_null($people),
            "Random data not found"
        );
        Story::create([
            'planet_id' => $planet->id,
            'vehicle_id' => $vehicle->id,
            'people_id' => $people->id,
        ]);

        $this->assertDatabaseHas('stories', [
            'planet_id' => $planet->id,
            'vehicle_id' => $vehicle->id,
            'people_id' => $people->id
        ]);
    }
}
