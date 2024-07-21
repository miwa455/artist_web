<?php

namespace App\Http\Controllers\artist;

use App\Http\Controllers\Controller;
use App\Models\Artist;
use App\Models\Genre;
use Illuminate\Http\Request;
use App\Services\ArtistService;
use App\Http\Requests\Artist\SearchRequest;

class IndexController extends Controller
{

    public function __invoke(Request $request, ArtistService $artistService)
    {
        $artists = $artistService->getArtists();
        $genres = $artistService->getGenres();

        return view('artist.create')
            ->with('artists', $artists)
            ->with('genres', $genres);
    }

    public function search(SearchRequest $request)
    {
            $query = Artist::query();
        
            if ($request->filled('keyword')) {
                $keyword = $request->getKeyword();
                $query->where('artist_name', 'like', '%' . $keyword . '%');
            }
        
            if ($request->filled('genre')) {
                $genreName = $request->getTagKeyword();
                $genre = Genre::where('genre_name', $genreName)->first();
                if ($genre) {
                    $query->whereHas('genres', function($q) use ($genre) {
                        $q->where('genres.genre_id', $genre->genre_id);
                    });
                }
            }
        
            $artists = $query->with('genres')->latest('created_at')->get();
            $genres = Genre::all();
        
            return view('artist.create', compact('artists', 'genres'));
        }

}
