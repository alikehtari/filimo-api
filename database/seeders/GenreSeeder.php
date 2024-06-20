<?php

namespace Database\Seeders;

use App\Models\Genre;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class GenreSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
         // Define a list of major movie genres with Persian names and English slugs
         $genres = [
            ['name' => 'اکشن', 'slug' => 'action'],
            ['name' => 'ماجراجویی', 'slug' => 'adventure'],
            ['name' => 'انیمیشن', 'slug' => 'animation'],
            ['name' => 'کمدی', 'slug' => 'comedy'],
            ['name' => 'درام', 'slug' => 'drama'],
            ['name' => 'ترسناک', 'slug' => 'horror'],
            ['name' => 'علمی تخیلی', 'slug' => 'sci-fi'],
            ['name' => 'عاشقانه', 'slug' => 'romance'],
            ['name' => 'هیجان انگیز', 'slug' => 'thriller'],
        ];

        // Insert the genres into the database
        foreach ($genres as $genre) {
            Genre::create($genre);
        }
    }
}
