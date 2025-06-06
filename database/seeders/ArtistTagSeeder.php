<?php

use App\Models\ArtistTag;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArtistTagSeeder extends Seeder
{
    public function run(): void
    {
        $tags = [

            // Música
            'Cantante',
            'Banda',
            'DJ',
            'Instrumentista',
            'Compositor',

            // Artes escénicas
            'Actor',
            'Actriz',
            'Monologuista',
            'Mago',
            'Bailarín',
            'Coreógrafo',
            'Narrador oral',

            // Artes visuales
            'Pintor',
            'Escultor',
            'Ilustrador',
            'Fotógrafo',
            'Artista digital',

            // Literatura
            'Escritor',
            'Poeta',
            'Cuentacuentos',
            'Dramaturgo',

            // Cine y medios
            'Director de cine',
            'Guionista',
            'Cineasta independiente',
            'Productor audiovisual',
            'Periodista',
            'Editor de vídeo',

            // Tauromaquia
            'Torero',
            'Novillero',
            'Recortador',
            'Rejoneador',
            'Banderillero',

            // Moda y belleza
            'Modelo',
            'Maquillador',
            'Artista body paint',
            'Diseñador de moda',

            // Redes sociales
            'Tuitero',
            'Youtuber',
            'Tiktoker',
            'Instagrammer',
            'Creador de contenidos',
            'Influencer',

            // Académicos
            'Economista',
            'Historiador',
            'Politólogo',
            'Cervantista',
            'Crítico literario',
            'Jurista',
            'Matemático',
            'Informático',
            

            // Otros
            'Chef invitado',
            'Tatuador',
            'Performista',
            'Artista callejero',
        ];

        foreach ($tags as $tag) {
            ArtistTag::updateOrCreate(
                ['slug' => Str::slug($tag)],
                ['name' => $tag, 'slug' => Str::slug($tag)]
            );
        }
    }
}
