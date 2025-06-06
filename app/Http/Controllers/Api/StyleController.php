<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Style;
use Illuminate\Http\Request;

class StyleController extends Controller
{
    // Listar todos los estilos
public function index()
    {
        // Obtener todos los estilos de la base de datos
        $styles = Style::all();

        // Limpiar los datos y devolver en el formato deseado
        $transformed = $styles->map(function ($style) {
            return [
                'name' => $style->name,
                'slug' => $style->slug,
            ];
        });

        // Devolver la respuesta JSON
        return response()->json($transformed);
    }

    // Mostrar un estilo específico por slug
    public function show(Style $style)
    {
        return response()->json($style);
    }

    // Crear un nuevo estilo
    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:styles,slug',
        ]);

        $style = Style::create($request->only('name', 'slug'));

        return response()->json($style, 201);
    }

    // Actualizar un estilo existente
    public function update(Request $request, Style $style)
    {
        $request->validate([
            'name' => 'required|string|max:255',
            'slug' => 'required|string|max:255|unique:styles,slug,' . $style->id,
        ]);

        $style->update($request->only('name', 'slug'));

        return response()->json($style);
    }

    // Eliminar un estilo
    public function destroy(Style $style)
    {
        $style->delete();

        return response()->json(null, 204);
    }
}
