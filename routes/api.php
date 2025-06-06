<?php

use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\MunicipalityController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {
    Route::get('/regions', [RegionController::class, 'index']); // Lista todas las regiones
    Route::get('/regions/provinces', [RegionController::class, 'regionsWithProvinces']); // Todas las regiones con sus provincias
    Route::get('/region/{slug}/provinces', [RegionController::class, 'provincesByRegionSlug']); // Provincias de una región
    Route::get('/province/{province}', [ProvinceController::class, 'municipalitiesByProvince']); // Municipios de una provincia
    Route::get('/municipalities', [MunicipalityController::class, 'indexAll']); // Todas las regiones con provincias y municipios
    Route::get('/region/{slug}/municipalities', [RegionController::class, 'municipalitiesByRegion']); // Municipios de una región
    Route::get('/municipality/{municipality}', [MunicipalityController::class, 'show']); // Detalle de un municipio
});
