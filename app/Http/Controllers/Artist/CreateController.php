<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use App\Http\Requests\Artist\CreateRequest;
use Illuminate\Http\Request;
use App\Models\Artist;
use App\Models\Tag;
use App\Models\Genre;
use App\Services\ArtistService;

class CreateController extends Controller
{
    /**
     * 
     * 
     * Handle the incoming request.
     */
    public function __invoke(CreateRequest $request, ArtistService $artistService)
    { 
        $artistService->saveArtist(
            $request->userId(),
            $request->artistName(),
            $request->getSex(),
            $request->genres(),
            $request->getImg(),
            $request->tags(),
            $request->profile(),
            $request->delete_flag(),
            $request->createName(),
            $request->deleteName(),
            $request->updateName(),
            $request->images()
        );
        return redirect()->route('artist.create');
    }

}
