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
        $response = HTTP::get('https://api.nasa.gov/planetary/apod?api_key=GPNcKV3zG4IC74Q0e2esJjoWSLDDXgIXwVRadTcq&count=10');
        $cont = 0;
        $pictures = [];
        // dd($response->object());
        foreach ( $response->object() as $picture){
            // dump(substr($picture->url, 13, 4));
            // dump(property_exists($picture, "ur"));
            if(property_exists($picture, "url") && substr($picture->url, 13, 4) == "nasa"){
                array_push($pictures, $picture);
            }
        }
        
        return view('gallery.gallery', ['pictures' => $pictures, 'cont' => $cont]);
    }

    public function watch(Request $req, $date)
    {
        
        $response = HTTP::get('https://api.nasa.gov/planetary/apod?api_key=GPNcKV3zG4IC74Q0e2esJjoWSLDDXgIXwVRadTcq&date='.$date);
        // dd($response->object());
        return view('gallery.picture', ['picture' => $response->object()]);
    }
}
