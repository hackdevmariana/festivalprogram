<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Region;

class RegionController extends Controller
{
    public function index()
    {
        return response()->json(Region::select('name', 'slug', 'flag', 'button_flag')->get());
    }


    public function regionsWithProvinces()
    {
        return response()->json(Region::with('provinces')->get());
    }

    public function provincesByRegion(Region $region)
    {
        return response()->json($region->provinces);
    }

    public function municipalitiesByRegion(Region $region)
    {
        return response()->json($region->provinces()->with('municipalities')->get());
    }
}
