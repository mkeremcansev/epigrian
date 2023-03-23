<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\PeopleController;
use App\Http\Controllers\PlanetController;
use App\Http\Controllers\StoryController;
use App\Http\Controllers\VehicleController;
use Illuminate\Support\Facades\Route;

Route::middleware('auth:sanctum')->group(function ($router) {
    $router->apiResource('people', PeopleController::class)->only('index', 'show');
    $router->apiResource('vehicle', VehicleController::class)->only('index', 'show');
    $router->apiResource('planet', PlanetController::class)->only('index', 'show');
    $router->apiResource('story', StoryController::class)->only('index');
});
Route::controller(LoginController::class)->group(function ($router) {
    $router->post('/login', 'login')->name('login');
});

