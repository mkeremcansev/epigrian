<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class StoryCollection extends JsonResource
{
    /**
     * Transform the resource collection into an array.
     *
     * @return array<int|string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'story' => __('stories.story', [
                'people' => $this->people->name,
                'planet' => $this->planet->name,
                'vehicle' => $this->vehicle->name
            ])
        ];
    }
}
