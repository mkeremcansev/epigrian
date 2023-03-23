<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class VehicleResource extends JsonResource
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
            'count' => $this->total(),
            'next' => $this->nextPageUrl(),
            'previous' => $this->previousPageUrl(),
            'results' => VehicleCollection::collection($this->items())
        ];
    }
}
