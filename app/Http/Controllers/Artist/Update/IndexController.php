<?php

namespace App\Http\Controllers\Artist\Update;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Services\ArtistService;
use App\Models\Artist;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class IndexController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(Request $request, ArtistService $artistService)
    {
        $artistId = (int) $request->route('artistId');
        if (!$artistService->checkOwnArtist($request->user()->user_id, $artistId)) {
            throw new AccessDeniedHttpException();
        }
        
        $artist = Artist::where('artist_id', $artistId)->firstOrFail();
        return view('artist.update')->with('artist', $artist);
    }
}
