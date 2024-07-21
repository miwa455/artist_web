<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Artist extends Model
{
    use HasFactory;

    protected $primaryKey = "artist_id";

    protected $fillable = ['artist_name', 'furigana', 'genre_id'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
    
    public function images()
    {
        return $this->belongsToMany(Image::class, 'artist_images', 'artist_id', 'image_id')
                    ->using(ArtistImage::class)
                    ->withTimestamps();
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class, 'artist_tags', 'artist_id', 'tag_id')
                    ->using(ArtistTag::class)
                    ->withTimestamps();
    }

    public function genres()
    {
        return $this->belongsToMany(Genre::class, 'artist_genres', 'artist_id', 'genre_id')
                    ->using(ArtistGenre::class)
                    ->withTimestamps();
    }
}
