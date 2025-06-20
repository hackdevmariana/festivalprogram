<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;
use App\Http\Controllers\MunicipalityController;
use App\Http\Controllers\ProvinceController;



Route::get('/', function () {
    return view('welcome');
});
Route::get('/region/{slug}', [RegionController::class, 'show'])->name('regions.show');
Route::get('/municipio/{municipality}', [MunicipalityController::class, 'show'])->name('municipalities.show');
Route::get('/provincia/{slug}', [ProvinceController::class, 'show'])->name('provinces.show');
