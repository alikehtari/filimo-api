<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use App\Http\Requests\StoreMovieRequest;
use App\Http\Requests\UpdateMovieRequest;
use App\Http\Resources\MovieResource;
use App\Services\MovieService;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index()
    {
        $movies = Movie::with('genres')->get();
        return MovieResource::collection($movies);  
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreMovieRequest $request)
    {

        MovieService::create($request->all());

        return response()->json([
            'message' => 'Movie created successfully!',

        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Movie $movie)
    {
        $movie->load('genres');
        return new MovieResource($movie);    
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Movie $movie)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateMovieRequest $request, Movie $movie)
    {
        $movie->update($request->all());
        return new MovieResource($movie);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Movie $movie)
    {
        $movie->delete();
        
        return response()->json([
            'message' => 'movie deleted successfully!',
        ], 200);
    }
}
