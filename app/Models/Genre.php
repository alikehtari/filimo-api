<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Laravel\Sanctum\HasApiTokens;

class Genre extends Model
{
    use HasFactory , HasApiTokens;

    protected $fillable = [
        'name',
        'slug'
    ];



    public function movies()
    {
        return $this->belongsToMany(Movie::class);
    }

}
