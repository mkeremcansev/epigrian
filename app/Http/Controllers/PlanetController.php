<?php

namespace App\Http\Controllers;

use App\Http\Resources\PlanetResource;
use App\Http\Resources\PlanetShowResource;
use App\Models\Planet;
use Illuminate\Http\JsonResponse;

class PlanetController extends Controller
{
    /**
     * @param Planet $planet
     */
    public function __construct(public Planet $planet)
    {
    }

    /**
     * @return PlanetResource
     */
    public function index(): PlanetResource
    {
        $paginated = $this->planet
            ->paginate(10);

        $paginated->map(function ($item) {
            $item->url = route('planet.show', $item->id);
            $item->makeHidden(['id']);
        });

        return new PlanetResource($paginated);
    }


    /**
     * @param int $id
     * @return PlanetShowResource|JsonResponse
     */
    public function show(int $id): PlanetShowResource|JsonResponse
    {
        $planet = $this->planet
            ->whereId($id)
            ->first();

        return $planet
            ? new PlanetShowResource($planet)
            : response()->json(['detail' => 'Not found'], 404);
    }
}
