<?php

use App\Models\EventTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class EventTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [

            // Música y Espectáculos
            'Festival de música',
            'Concierto',
            'Recital',
            'DJ Set',
            'Jam Session',
            'Monólogo',
            'Magia',
            'Teatro',
            'Musical',
            'Karaoke',

            // Cine y Medios
            'Festival de cine',
            'Estreno de película',
            'Proyección al aire libre',
            'Maratón de películas',

            // Arte y Cultura
            'Exposición',
            'Taller de arte',
            'Performance',
            'Subasta de arte',
            'Feria del libro',
        

            // Educación y Conferencias
            'Conferencia',
            'Seminario',
            'Taller',
            'Curso',
            'Charla TED',
            'Mesa redonda',
            'Debate',

            // Bienestar y Lifestyle
            'Clase de yoga',
            'Meditación guiada',
            'Taller de cocina',
            'Cata de vinos',
            'Festival gastronómico',
            'Degustación',
            'Retiro espiritual',

            // Familiar e Infantil
            'Cuentacuentos',
            'Títeres',
            'Show infantil',
            'Taller para niños',
            'Parque de atracciones temporal',

            // Comunidad y Sociales
            'Feria local',
            'Evento solidario',
            'Reunión vecinal',
            'Encuentro juvenil',
            'Verbena',
            'Romería',
            'Procesión',
            'Misa',

            // Deportes y Aventura
            'Partido de fútbol',
            'Torneo',
            'Exhibición deportiva',
            'Carrera popular',
            'Maratón',
            'Ruta de senderismo',
            'Corrida de toros',
            'Novillada',
            'Encierro',

            // Ferias y Mercados
            'Mercado artesanal',
            'Mercadillo navideño',
            'Feria medieval',
            'Feria vintage',
            'Desfile de moda',
        ];

        foreach ($tags as $tag) {
            EventTag::updateOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag, 'slug' => Str::slug($tag)]
            );
        }
    }
}
