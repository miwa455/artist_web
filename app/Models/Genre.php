<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Genre extends Model
{
    use HasFactory;

    protected $primaryKey = 'genre_id';

    public function artists()
    {
        return $this->belongsToMany(Artist::class, 'artist_genre', 'genre_id', 'artist_id');
    }
}
