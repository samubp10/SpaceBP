<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;


class PictureController extends Controller
{
    public function show()
    {
        // $response = HTTP::get('https://api.spaceflightnewsapi.net/v3/articles');
        $response = HTTP::get('https://images-api.nasa.gov/search?year_start=2022');
        // dd( $response->object()->collection->items);
        // dd($response->object()->collection->items[0]->links[0]->href);
        return view('gallery.gallery', ['pictures' => $response->object()->collection->items]);
    }
}
