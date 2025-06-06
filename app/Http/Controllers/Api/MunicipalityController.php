<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Municipality;

class MunicipalityController extends Controller
{
public function indexAll()
{
    $municipalities = Municipality::with([
        'province.region'
    ])->select('name', 'slug', 'latitude', 'longitude', 'province_id')->get();

    $transformed = $municipalities->map(function ($municipality) {
        return [
            'name' => $municipality->name,
            'slug' => $municipality->slug,
            'latitude' => $municipality->latitude,
            'longitude' => $municipality->longitude,
            'province' => [
                'name' => $municipality->province->name,
                'slug' => $municipality->province->slug,
                'region' => [
                    'name' => $municipality->province->region->name,
                    'slug' => $municipality->province->region->slug,
                    'flag' => 'storage/' . $municipality->province->region->flag,
                    'button_flag' => 'storage/' . $municipality->province->region->button_flag,
                ],
            ],
        ];
    });

    return response()->json($transformed);
}



    public function show(Municipality $municipality)
    {
        return response()->json($municipality->load('province.region'));
    }
}
