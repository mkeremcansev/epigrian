<?php

namespace App\Helpers;

use Illuminate\Http\Client\RequestException;
use Illuminate\Support\Facades\Http;

class SwapiFetchHelper
{
    /**
     * @throws RequestException
     */
    public function fetch($url): array
    {
        $results = [];
        $response = Http::get($url)->throw()->json();
        $newResults = $response['results'];
        $results = array_merge($results, $newResults);
        if (!is_null($response['next'])) {
            $nextResults = $this->fetch($response['next']);
            $results = array_merge($results, $nextResults);
        }

        return $results;
    }
}
