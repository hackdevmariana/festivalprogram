<?php

use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ProvinceController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/regions', [RegionController::class, 'index']); // Lista todas las regiones
    Route::get('/province/{province}', [ProvinceController::class, 'municipalitiesByProvince']); // Municipios de una provincia
});
