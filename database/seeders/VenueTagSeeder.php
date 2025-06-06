<?php

use App\Models\VenueTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class VenueTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [

            // Música y entretenimiento
            'Sala de conciertos',
            'Teatro',
            'Auditorio',
            'Festival al aire libre',
            'Discoteca',
            'Bar',
            'Pub',
            'Sala de billar',
            

            // Arte y cultura
            'Galería de arte',
            'Museo',
            'Centro cultural',
            'Biblioteca',
            'Casa de cultura',

            // Educación y eventos
            'Universidad',
            'Instituto',
            'Escuela',
            'Sala de conferencias',
            'Centro de convenciones',

            // Religioso y tradicional
            'Iglesia',
            'Parroquia',
            'Templo',
            'Ermita',
            'Plaza de toros',

            // Espacios públicos
            'Plaza',
            'Parque',
            'Calle peatonal',
            'Recinto ferial',

            // Gastronómicos y sociales
            'Restaurante',
            'Taberna',
            'Bodega',
            'Carpa de feria',

            // Deportivo
            'Estadio',
            'Polideportivo',
            'Pista de atletismo',
        ];

        foreach ($tags as $tag) {
            VenueTag::updateOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag, 'slug' => Str::slug($tag)]
            );
        }
    }
}
