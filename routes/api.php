<?php

use App\Http\Controllers\Api\RegionController;
use App\Http\Controllers\Api\ProvinceController;
use App\Http\Controllers\Api\MunicipalityController;
use App\Http\Controllers\Api\StyleController;
use App\Http\Controllers\Api\ArtistController;

use Illuminate\Support\Facades\Route;

Route::prefix('v1')->group(function () {

    // Locations

    Route::get('/regions', [RegionController::class, 'index']); // Lista todas las regiones
    Route::get('/regions/provinces', [RegionController::class, 'regionsWithProvinces']); // Todas las regiones con sus provincias
    Route::get('/region/{slug}/provinces', [RegionController::class, 'provincesByRegionSlug']); // Provincias de una región
    Route::get('/province/{province}', [ProvinceController::class, 'municipalitiesByProvince']); // Municipios de una provincia
    Route::get('/municipalities', [MunicipalityController::class, 'indexAll']); // Todas las regiones con provincias y municipios
    Route::get('/region/{slug}/municipalities', [RegionController::class, 'municipalitiesByRegion']); // Municipios de una región
    Route::get('/municipality/{municipality}', [MunicipalityController::class, 'show']); // Detalle de un municipio

    // Styles

    Route::get('/styles', [StyleController::class, 'index']); // Obtener todos los estilos
    Route::get('/style/{style}', [StyleController::class, 'show']); // Obtener un estilo por slug
    Route::post('/styles', [StyleController::class, 'store']); // Crear un nuevo estilo
    Route::put('/style/{style}', [StyleController::class, 'update']); // Actualizar un estilo
    Route::delete('/style/{style}', [StyleController::class, 'destroy']); // Eliminar un estilo


    // Artist
    
    Route::get('/artists', [ArtistController::class, 'index']);  // Obtener todos los artistas
    Route::get('/artist/{slug}', [ArtistController::class, 'show']);  // Obtener un artista por slug
});
