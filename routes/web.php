<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\RegionController;


Route::get('/', function () {
    return view('welcome');
});
Route::get('/region/{slug}', [RegionController::class, 'show'])->name('regions.show');
