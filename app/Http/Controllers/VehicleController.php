<?php

namespace App\Http\Controllers;

use App\Http\Resources\VehicleResource;
use App\Http\Resources\VehicleShowResource;
use App\Models\Vehicle;
use Illuminate\Http\JsonResponse;

class VehicleController extends Controller
{
    /**
     * @param Vehicle $vehicle
     */
    public function __construct(public Vehicle $vehicle)
    {
    }

    /**
     * @return VehicleResource
     */
    public function index(): VehicleResource
    {
        $paginated = $this->vehicle
            ->paginate(10);

        $paginated->map(function ($item) {
            $item->url = route('vehicle.show', $item->id);
        });

        return new VehicleResource($paginated);
    }


    /**
     * @param int $id
     * @return VehicleShowResource|JsonResponse
     */
    public function show(int $id): VehicleShowResource|JsonResponse
    {
        $vehicle = $this->vehicle
            ->whereId($id)
            ->first();

        return $vehicle
            ? new VehicleShowResource($vehicle)
            : response()->json(['detail' => 'Not found'], 404);
    }
}
