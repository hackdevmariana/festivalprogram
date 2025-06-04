<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Province;

class ProvinceController extends Controller
{
    public function municipalitiesByProvince($provinceSlug)
    {
        $province = Province::where('slug', $provinceSlug)->firstOrFail();
        $municipalities = $province->municipalities()->select('name', 'slug', 'latitude', 'longitude')->get();
        
        return response()->json($municipalities);
    }
}

