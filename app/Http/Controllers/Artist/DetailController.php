<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Services\ArtistService;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\User;
use App\Models\Genre;

class DetailController extends Controller
{
    public function __invoke(Request $request, ArtistService $artistService)
    {
        $artistId = (int) $request->route('artistId');
        
        $artist = Artist::where('artist_id', $artistId)->firstOrFail();

        return view('artist.detail', compact('artist'))
        ->with('artist', $artist);
    }

    public function favorite(Request $request)
    {
        $favorite = $request->favorite();
    }

    public function store(Request $request)
    {
        // リクエストからデータを取得
        $favoriteData = $request->all();

        // 取得したデータをデータベースに保存
        User::create($favoriteData);

        return response()->json(['message' => 'Data saved successfully']);
    }
}
