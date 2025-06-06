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
        $regions = Region::with('provinces')->get();

        $transformed = $regions->map(function ($region) {
            return [
                'name' => $region->name,
                'slug' => $region->slug,
                'flag' => 'storage/' . $region->flag,
                'button_flag' => 'storage/' . $region->button_flag,
                'provinces' => $region->provinces->map(function ($province) {
                    return [
                        'name' => $province->name,
                        'slug' => $province->slug,
                    ];
                }),
            ];
        });

        return response()->json($transformed);
    }


    public function provincesByRegionSlug($slug)
    {
        $region = Region::where('slug', $slug)->with('provinces')->firstOrFail();

        $provinces = $region->provinces->map(function ($province) {
            return [
                'name' => $province->name,
                'slug' => $province->slug,
            ];
        });

        return response()->json($provinces);
    }


    public function municipalitiesByRegion($slug)
    {
        $region = Region::where('slug', $slug)->firstOrFail();

        $provinces = $region->provinces()->with('municipalities')->get()->map(function ($province) {
            return [
                'name' => $province->name,
                'slug' => $province->slug,
                'municipalities' => $province->municipalities->map(function ($municipality) {
                    return [
                        'name' => $municipality->name,
                        'slug' => $municipality->slug,
                        'latitude' => $municipality->latitude,
                        'longitude' => $municipality->longitude,
                    ];
                }),
            ];
        });

        $response = [
            'name' => $region->name,
            'slug' => $region->slug,
            'municipalities' => $provinces->pluck('municipalities')->flatten(),
        ];

        return response()->json($response);
    }
}
