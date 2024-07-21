<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Artist;
use App\Models\Image;
use App\Models\Tag;
use App\Models\Genre;


class ArtistsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run()
    {
    Artist::factory()->count(10)->create()->each(function ($artist) {
        Image::factory()->count(6)->create()->each(function ($image) use ($artist) {
            $artist->images()->attach($image->image_id);
            });
        Tag::factory()->count(1)->create()->each(function ($tag) use ($artist) {
            $artist->tags()->attach($tag->tag_id);
            });
        Genre::factory()->count(1)->create()->each(function ($genre) use ($artist) {
            $artist->genres()->attach($genre->genre_id);
            });
        });
    }

}
