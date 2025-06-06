<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Style extends Model
{
    protected $fillable = ['name', 'slug'];  // Campos que pueden ser asignados masivamente

    // Usamos el slug en lugar de la ID para las rutas
    public function getRouteKeyName()
    {
        return 'slug';  // Usamos el slug para las rutas de la API
    }
}
