<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Services\ArtistService;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class DeleteController extends Controller
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
        $artist->delete();
        return redirect()
            ->route('artist.index')
            ->with('feedback.success', "削除しました");
    }
}
