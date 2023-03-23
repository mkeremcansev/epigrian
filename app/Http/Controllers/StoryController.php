<?php

namespace App\Http\Controllers;

use App\Http\Resources\StoryResource;
use App\Models\Story;

class StoryController extends Controller
{
    public function __construct(public Story $story)
    {
    }

    /**
     * @return StoryResource
     */
    public function index(): StoryResource
    {
        $paginated = $this->story
            ->with(['people', 'planet', 'vehicle'])
            ->paginate(10);

        $paginated->map(function ($item) {
            $item->makeHidden(['id']);
        });

        return new StoryResource($paginated);
    }
}
