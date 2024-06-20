<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class MovieResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'title' => $this->title ,
            'summary' => $this->summary ,
            'director' => $this->director ,
            'rating' => $this->rating ,
            'image' => $this->image ,
            'poster' => $this->poster ,
            'info' => $this->info,
            'genres' => GenreResource::collection($this->whenLoaded('genres')), // Include genres using GenreResource

            
        ];
    }
}
