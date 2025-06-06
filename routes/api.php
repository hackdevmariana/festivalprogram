<?php

use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\MunicipalityController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/regions', [RegionController::class, 'index']); // Lista todas las regiones
    Route::get('/province/{province}', [ProvinceController::class, 'municipalitiesByProvince']); // Municipios de una provincia
    Route::get('/municipalities', [MunicipalityController::class, 'indexAll']); // Todas las regiones con provincias y municipios
});
