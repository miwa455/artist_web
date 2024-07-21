<?php

namespace App\Http\Controllers\Artist;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;

class CalendarController extends Controller
{
    /**
     * Handle the incoming request.
     */
    public function index()
    {
        return  [
            [
                'title' => '展覧会',
                'description' => '夏をテーマにしたイラストの展覧会',
                'start' => '2024-04-10',
                'end'   => '2024-05-10',
            ],
            [
                'title' => '美術館',
                'description' => '水彩画の展示',
                'start' => '2024-04-20T10:00:00',
                'end'   => '2024-04-22T18:00:00',
                'url'   => 'https://admin.juno-blog.site',
            ],
            [
                'title' => '予約開始日',
                'start' => '2024-04-30',
                'color' => '#ff44cc',
            ],
        ];
    
    }
    
}
