<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Movie extends Model
{
    use HasFactory , SoftDeletes;
    protected $fillable = [
        'title',
        'summary',
        'director',
        'rating',
        'image',
        'poster',
        'info',
        'type'
    ];

    public function genres()
    {
        return $this->belongsToMany(Genre::class);
    }
}
