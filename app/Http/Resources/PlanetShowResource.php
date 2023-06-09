<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class PlanetShowResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        self::withoutWrapping();

        return [
            'name' => $this->name,
            'rotation_period' => $this->rotation_period,
            'orbital_period' => $this->orbital_period,
            'diameter' => $this->diameter,
            'climate' => $this->climate,
            'gravity' => $this->gravity,
            'terrain' => $this->terrain,
            'surface_water' => $this->surface_water,
            'population' => $this->population,
            'created' => $this->created,
            'edited' => $this->edited,
        ];
    }
}
