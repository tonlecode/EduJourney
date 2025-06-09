<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;

class YoutubeAPIController extends Controller
{
    public function index()
    {
        $keywords = ['Noem Chhunny','ជីវិត ជោគជ័យ', 'ចំណេះដឹង', 'រៀនពូកែ', 'ព្រះធម៌'];
        $apiKey = config('services.youtube.api_key');
        $allVideos = [];

        foreach ($keywords as $keyword) {
            $response = Http::get('https://www.googleapis.com/youtube/v3/search', [
                'part' => 'snippet',
                'q' => $keyword,
                'type' => 'video',
                'maxResults' => 10,
                'key' => $apiKey,
            ]);

            $videos = $response->json()['items'] ?? [];

            foreach ($videos as $video) {
                $allVideos[] = [
                    'title' => $video['snippet']['title'],
                    'description' => $video['snippet']['description'],
                    'youtube_id' => $video['id']['videoId'],
                    'thumbnail' => $video['snippet']['thumbnails']['medium']['url'],
                    'keyword' => $keyword
                ];
            }
        }

        return response()->json($allVideos);
    }
}
