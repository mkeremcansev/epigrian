<?php

namespace App\Http\Controllers;

use App\Http\Resources\PeopleResource;
use App\Http\Resources\PeopleShowResource;
use App\Models\People;
use Illuminate\Http\JsonResponse;

class PeopleController extends Controller
{
    /**
     * @param People $people
     */
    public function __construct(public People $people)
    {
    }

    /**
     * @return PeopleResource
     */
    public function index(): PeopleResource
    {
        $paginated = $this->people
            ->paginate(10);

        $paginated->map(function ($item) {
            $item->url = route('people.show', $item->id);
            $item->makeHidden(['id']);
        });

        return new PeopleResource($paginated);
    }

    /**
     * @param int $id
     * @return PeopleShowResource|JsonResponse
     */
    public function show(int $id): PeopleShowResource|JsonResponse
    {
        $people = $this->people
            ->whereId($id)
            ->first();

        return $people
            ? new PeopleShowResource($people)
            : response()->json(['detail' => 'Not found'], 404);

    }
}
