<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;
use Illuminate\Http\Resources\Json\ResourceCollection;

class VehicleCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'name' => $this->name,
            'model' => $this->model,
            'manufacturer' => $this->manufacturer,
            'cost_in_credits' => $this->cost_in_credits,
            'length' => $this->length,
            'max_atmosphering_speed' => $this->max_atmosphering_speed,
            'crew' => $this->crew,
            'passengers' => $this->passengers,
            'cargo_capacity' => $this->cargo_capacity,
            'consumables' => $this->consumables,
            'vehicle_class' => $this->vehicle_class,
            'created' => $this->created,
            'edited' => $this->edited,
            'url' => $this->url,
        ];
    }
}
