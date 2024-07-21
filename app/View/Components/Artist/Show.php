<?php

namespace App\View\Components\Artist;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Show extends Component
{
    private int $artistId;
    private int $userId;
    /**
     * Create a new component instance.
     */
    public function __construct(int $artistId, int $userId)
    {
        $this->artistId = $artistId;
        $this->userId = $userId;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.artist.show')
            ->with('artistId', $this->artistId);
    }
}
