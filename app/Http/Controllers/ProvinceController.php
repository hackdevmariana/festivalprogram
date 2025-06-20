<?php
namespace App\Http\Controllers;

use App\Models\Province;

class ProvinceController extends Controller
{
    public function show($slug)
    {
        $province = Province::with('municipalities')
                    ->where('slug', $slug)
                    ->firstOrFail();

        return view('provinces.show', compact('province'));
    }
}
