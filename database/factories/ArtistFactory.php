<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Storage;
use App\Models\User;
/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Artist>
 */
class ArtistFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition()
    {
        if (!Storage::exists('public/images')) {
            Storage::makeDirectory('public/images');
        }
            
        return [
            'user_id' => 1, //つぶやきを投稿したユーザーのIDをdefaultで1とする
            'artist_name' => $this->faker->name(),
            'genre' => 1,
            'icon_img_name' => $this->faker->image(storage_path('app/public/images'),
            640, 480, null, false),
            'logic_delete_flag' => Str::random(1),
            'sex' => Str::random(1),
            'self_intro' => $this->faker->realText(100),
            'updated_name' => $this->faker->name(),
            'created_name' => $this->faker->name(),
            'deleted_name' => $this->faker->name()
        ];
    }
}
