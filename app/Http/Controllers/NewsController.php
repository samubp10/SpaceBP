<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
// use GuzzleHttp\Client;
// use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
// use GuzzleHttp\Psr7\Request;


class NewsController extends Controller
{

    public function show()
    {
        $response = HTTP::get('https://api.spaceflightnewsapi.net/v3/articles/?_limit=9');
        // dd($response->object());
        $cont = 0;
        $news = [];

        foreach ($response->object() as $key => $date) {
            $date->publishedAt = substr($date->publishedAt, 0, 10);
            // dump($date->publishedAt);
            array_push($news, $date);
        }
        //  dump($response->object()[0]);
        // dd($news);

        return view('news.news', ['news' => $news, 'cont' => $cont]);
    }
}
