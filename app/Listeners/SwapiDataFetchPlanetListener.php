<?php

namespace App\Listeners;

use App\Events\SwapiDataFetchEvent;
use App\Helpers\SwapiFetchHelper;
use App\Models\Planet;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\DB;

class SwapiDataFetchPlanetListener implements ShouldQueue
{
    /**
     * Create the event listener.
     */
    public function __construct()
    {
        //
    }

    /**
     * Handle the event.
     * @throws RequestException
     */
    public function handle(SwapiDataFetchEvent $event): void
    {

        $planets = resolve(SwapiFetchHelper::class)->fetch('https://swapi.dev/api/planets');
        DB::transaction(function () use ($planets) {
            foreach ($planets as $planet) {
                Planet::updateOrCreate(
                    ['name' => $planet['name']],
                    [
                        'climate' => $planet['climate'],
                        'created' => $planet['created'],
                        'diameter' => $planet['diameter'],
                        'edited' => $planet['edited'],
                        'gravity' => $planet['gravity'],
                        'name' => $planet['name'],
                        'orbital_period' => $planet['orbital_period'],
                        'population' => $planet['population'],
                        'rotation_period' => $planet['rotation_period'],
                        'surface_water' => $planet['surface_water'],
                        'terrain' => $planet['terrain']
                    ]
                );
            }
        });
    }
}
