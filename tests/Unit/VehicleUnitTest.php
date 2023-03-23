<?php

namespace Tests\Unit;

use App\Models\Vehicle;
use Tests\TestCase;

class VehicleUnitTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get(route('vehicle.index'));
        $this->assertIsObject($response);
    }

    public function test_show()
    {
        $vehicle = Vehicle::inRandomOrder()->first();
        $response = $this->get(route('vehicle.show', $vehicle->id));
        $this->assertIsObject($response);
    }
}
