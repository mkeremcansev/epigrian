<?php

namespace App\Listeners;

use App\Events\SwapiDataFetchEvent;
use App\Helpers\SwapiFetchHelper;
use App\Models\People;
use Illuminate\Contracts\Queue\ShouldQueue;
use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Http;

class SwapiDataFetchPeopleListener implements ShouldQueue
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
        $peoples = resolve(SwapiFetchHelper::class)->fetch('https://swapi.dev/api/people');
        DB::transaction(function () use ($peoples) {
            foreach ($peoples as $people) {
                People::updateOrCreate(
                    ['name' => $people['name']],
                    [
                        'birth_year' => $people['birth_year'],
                        'created' => $people['created'],
                        'edited' => $people['edited'],
                        'eye_color' => $people['eye_color'],
                        'gender' => $people['gender'],
                        'hair_color' => $people['hair_color'],
                        'height' => $people['height'],
                        'mass' => $people['mass'],
                        'name' => $people['name'],
                        'skin_color' => $people['skin_color']
                    ]
                );
            }
        });
    }
}
