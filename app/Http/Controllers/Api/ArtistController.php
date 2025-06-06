<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use Illuminate\Http\Request;

class ArtistController extends Controller
{
    // Obtener todos los artistas
    public function index()
    {
        $artists = Artist::all();
        return response()->json($artists);
    }

    // Obtener un artista por ID o slug
    public function show($slug)
    {
        $artist = Artist::where('slug', $slug)->firstOrFail();
        return response()->json($artist);
    }
}
