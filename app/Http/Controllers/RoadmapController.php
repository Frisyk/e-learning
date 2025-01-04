<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Services\YouTubeService;

class RoadmapController extends Controller
{
    protected $youtubeService;

    public function __construct(YouTubeService $youtubeService)
    {
        $this->youtubeService = $youtubeService;
    }

    public function search(Request $request)
    {
        $query = $request->input('occupation');
        $videos = $this->youtubeService->search($query);

        return view('front.roadmap', compact('videos'));
    }
}