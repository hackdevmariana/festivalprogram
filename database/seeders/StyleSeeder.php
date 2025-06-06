<?php

namespace Database\Seeders;

use App\Models\Style;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str; 

class StyleSeeder extends Seeder
{
    public function run()
    {
        // Lista de estilos musicales
        $styles = [
            'Rock',
            'Pop',
            'Jazz',
            'Blues',
            'Hip-Hop',
            'Classical',
            'Electronic',
            'Reggae',
            'R&B',
            'Country',
            'Punk',
            'Folk',
            'Metal',
            'Latin',
            'Soul',
            'Disco',
            'Techno',
            'House',
            'Trance',
            'Indie',
            'Alternative',
            'Salsa',
            'Bossa Nova',
            'Flamenco',
            'Tango',
            'Funk',
            'Gospel',
            'Ska',
            'K-Pop',
            'Trap',
        ];

        // Insertar los estilos musicales en la base de datos
        foreach ($styles as $style) {
            Style::create([
                'name' => $style,
                'slug' => Str::slug($style),  // Crear el slug automáticamente
            ]);
        }

        // Mensaje de éxito
        $this->command->info('Estilos musicales insertados con éxito.');
    }
}
