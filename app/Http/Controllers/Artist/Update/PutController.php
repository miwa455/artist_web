<?php

namespace App\Http\Controllers\Artist\Update;

use App\Http\Controllers\Controller;
use App\Services\ArtistService;
use App\Http\Requests\Artist\UpdateRequest;
use App\Models\Artist;
use Symfony\Component\HttpKernel\Exception\AccessDeniedHttpException;

class PutController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function __invoke(UpdateRequest $request, ArtistService $artistService)
    {
        if (!$artistService->checkOwnArtist($request->user()->id, $request->id())) {
            throw new AccessDeniedHttpException();
        }
        
        $artist = Artist::where('artist_id', $request->id())->firstOrFail();
        $artist->artist_name = $request->artistName();
        $artist->sex = $request->sex();
        $artist->self_intro = $request->profile();
        $artist->save();
        return redirect()
            ->route('artist.update.index', ['artistId' => $artist->artist_id])
            ->with('feedback.success', "編集しました");
    }
}
