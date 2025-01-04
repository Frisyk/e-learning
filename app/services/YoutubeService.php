<?php

namespace App\Services;

use Google\Client ;
use Google\Service\YouTube ;

class YouTubeService
{
    protected $client;

    public function __construct()
    {
        $this->client = new Client();
        $this->client->setDeveloperKey(env('YOUTUBE_API_KEY'));
    }

    public function search($query, $maxResults = 1, $identifier = 'youtube#video')
    {
        $youtube = new YouTube($this->client);
        $searchResponse = $youtube->search->listSearch('id,snippet', [
            'q' => $query,
            'maxResults' => $maxResults,
        ]);

        $videos = [];
        foreach ($searchResponse['items'] as $item) {
            if ($item['id']['kind'] === $identifier) {
                $videos[] = [
                    'url' => 'https://www.youtube.com/watch?v=' . $item['id']['videoId'],
                    'title' => $item['snippet']['title'],
                    'channel_title' => $item['snippet']['channelTitle'],
                    'description' => $item['snippet']['description'],
                    'thumbnail' => $item['snippet']['thumbnails']['high']['url'],
                ];
            }
        }

        return $videos;
    }
}