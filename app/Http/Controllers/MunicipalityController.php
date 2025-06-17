<?php
namespace App\Http\Controllers;

use App\Models\Municipality;

class MunicipalityController extends Controller
{
    public function show(Municipality $municipality)
    {
        return view('municipalities.show', compact('municipality'));
    }
}
