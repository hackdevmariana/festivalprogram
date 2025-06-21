<?php

namespace Database\Seeders;

/*
    For new municipalities:
    
    Made by:
    php artisan make:seeder ZaragozaVenueSeeder
    
    Run:
    php artisan db:seed --class=ZaragozaVenuesSeeder
*/

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Venue;

class ZaragozaVenuesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $json = file_get_contents(database_path('data/zaragoza_venues.json'));
        $venues = json_decode($json, true);

        foreach ($venues as $venue) {
            $slug = \Illuminate\Support\Str::slug($venue['name']);

            Venue::firstOrCreate(
                ['slug' => $slug],
                array_merge([
                    'slug' => $slug
                ], $venue)
            );
        }
    }
}
