<?php
namespace App\Services;

use App\Models\Movie;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Eloquent\ModelNotFoundException;

class MovieService
{
    /**
     * Create a new movie with genres.
     *
     * @param array $data
     * @return \App\Models\Movie
     */
    public static function create(array $data)
    {
        // Wrap the operation in a transaction
        return DB::transaction(function () use ($data) {
            // Create the movie
            $movie = Movie::create([
                'title' => $data['title'],
                'summary' => $data['summary'],
                'director' => $data['director'],
                'rating' => $data['rating'],
                'image' => $data['image'] ?? null,
                'poster' => $data['poster'] ?? null,
                'info' => $data['info'],
                'type' => $data['type'],
            ]);

            // Attach genres to the movie
            if (!empty($data['genres'])) {
                $genres = Genre::whereIn('id', $data['genres'])->get();

                if ($genres->isEmpty()) {
                    throw new ModelNotFoundException('Genres not found');
                }

                $movie->genres()->attach($genres);
            }

            return $movie;
        });
    }
}
