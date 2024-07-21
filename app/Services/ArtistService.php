<?php

namespace App\Services;

use App\Http\Requests\Artist\CreateRequest;
use App\Models\Artist;
use Carbon\Carbon;
use App\Models\Image;
use App\Models\Tag;
use App\Models\Genre;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Storage;

class ArtistService
{
    public function getArtists()
    {
        return Artist::with('images')->orderBy('created_at', 'DESC')->get();
    }

    public function getTags()
    {
        return Artist::with('tags')->orderBy('created_at', 'DESC')->get();
    }

    public function getGenres()
    {
        return Genre::orderBy('created_at', 'DESC')->get();
    }

    public function checkOwnArtist(int $userId, int $artistId): bool
    {
        $artist = Artist::where('artist_id', $artistId)->first();
        if (!$artist) {
            return false;
        }

        return $artist->user_id === $userId;
    }

    public function saveArtist(int $userId, string $artist_name, string $sex, array $genre_name, array $icon_img_name, array $tag_name, string $self_intro, string $logic_delete_flag,  string $created_name, string $deleted_name, string $updated_name, array $images)
    {
        DB::transaction(function () use ($userId, $artist_name, $sex, $genre_name, $icon_img_name, $self_intro, $tag_name, $logic_delete_flag, $created_name, $deleted_name, $updated_name, $images) {
            $artist = new Artist;
            $artist->user_id = $userId;
            $artist->artist_name = $artist_name;
            $artist->sex = $sex;
            $artist->self_intro = $self_intro;
            $artist->logic_delete_flag = $logic_delete_flag ?? '';
            $artist->created_name = $created_name ?? '';
            $artist->deleted_name = $deleted_name ?? '';
            $artist->updated_name = $updated_name ?? '';
            $artist->save();
            foreach ($icon_img_name as $artist) {
                // 画像をストレージに保存し、保存先のパスを取得
                Storage::putFile('public/images', $artist);
                // 変更を保存する場合
                $artist->icon_img_name = $icon_img_name;
            };
            
            foreach ($images as $image) {
                Storage::putFile('public/images', $image);
                $imageModel = new Image();
                $imageModel->name = $image->hashName();
                $imageModel->save();
                $artist->images()->attach($imageModel->image_id);
            };

            foreach ($tag_name as $tag) {
                // タグ名に#を付ける
                $tagWithHash = '#' . $tag;
    
                // タグ名が既にデータベースに存在するかを確認
                $existingTag = Tag::where('tag_name', $tagWithHash)->first();
    
                if (!$existingTag) {
                    // タグが存在しない場合、新規に保存してアーティストにアタッチ
                    $newTag = new Tag();
                    $newTag->tag_name = $tagWithHash;
                    $newTag->save();
                    $artist->tags()->attach($newTag->tag_id);
                } else {
                    // タグが既に存在する場合、そのままアーティストにアタッチ
                    $artist->tags()->attach($existingTag->tag_id);
                }
            };


            foreach ($genre_name as $genre) {
                // ジャンル名がすでに存在するかどうかを確認
                $existingGenre = Genre::where('genre_name', $genre)->first();
            
                if (!$existingGenre) {
                    // ジャンル名が存在しない場合、新規に保存
                    $GenreModel = new Genre();
                    $GenreModel->genre_name = $genre;
                    $GenreModel->save();
                    // 新規に保存されたジャンルIDをアーティストにアタッチ
                    $artist->genres()->attach($GenreModel->genre_id);
                } else {
                    // 既に存在するジャンルIDをアーティストにアタッチ
                    $artist->genres()->attach($existingGenre->genre_id);
                }
            };
        });
    }
}