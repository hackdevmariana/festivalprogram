<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

use App\Models\Municipality;

class MunicipalityController extends Controller
{
    public function indexAll()
    {
        return response()->json(Municipality::with(['province.region'])->get());
    }

    public function show(Municipality $municipality)
    {
        return response()->json($municipality->load('province.region'));
    }
}
