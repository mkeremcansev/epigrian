<?php

namespace App\Listeners;

use App\Events\SwapiDataFetchEvent;
use App\Helpers\SwapiFetchHelper;
use App\Models\Vehicle;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SwapiDataFetchVehicleListener implements ShouldQueue
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
        $vehicles = resolve(SwapiFetchHelper::class)->fetch('https://swapi.dev/api/vehicles');
        DB::transaction(function () use ($vehicles) {
            foreach ($vehicles as $vehicle) {
                Vehicle::updateOrCreate(
                    ['name' => $vehicle['name']],
                    [
                        'cargo_capacity' => $vehicle['cargo_capacity'],
                        'consumables' => $vehicle['consumables'],
                        'cost_in_credits' => $vehicle['cost_in_credits'],
                        'created' => $vehicle['created'],
                        'crew' => $vehicle['crew'],
                        'edited' => $vehicle['edited'],
                        'length' => $vehicle['length'],
                        'manufacturer' => $vehicle['manufacturer'],
                        'max_atmosphering_speed' => $vehicle['max_atmosphering_speed'],
                        'model' => $vehicle['model'],
                        'name' => $vehicle['name'],
                        'passengers' => $vehicle['passengers'],
                        'vehicle_class' => $vehicle['vehicle_class']
                    ]
                );
            }
        });
    }
}
