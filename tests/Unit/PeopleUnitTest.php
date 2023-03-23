<?php

namespace Tests\Unit;

use App\Models\People;
use Tests\TestCase;

class PeopleUnitTest extends TestCase
{
    public function test_index(): void
    {
        $response = $this->get(route('people.index'));
        $this->assertIsObject($response);
    }

    public function test_show()
    {
        $people = People::inRandomOrder()->first();
        $response = $this->get(route('people.show', $people->id));
        $this->assertIsObject($response);
    }
}
