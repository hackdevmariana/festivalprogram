<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Url extends Model
{
    use HasFactory;

    // Definir los campos que son asignables masivamente
    protected $fillable = [
        'name', 'slug', 'url',
    ];

    // Método para que Filament use 'slug' como clave de ruta
    public function getRouteKeyName()
    {
        return 'slug';
    }
}
