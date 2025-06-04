<?php

use App\Http\Controllers\Api\RegionController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/regions', [RegionController::class, 'index']); // Lista todas las regiones
});
