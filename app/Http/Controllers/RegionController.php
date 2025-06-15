<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Region;

class RegionController extends Controller
{
    public function show($slug)
    {
        $region = Region::where('slug', $slug)->with('provinces.municipalities')->firstOrFail();
        return view('regions.show', compact('region'));
    }
}
