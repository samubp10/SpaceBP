<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use GuzzleHttp\Client;
use GuzzleHttp\Exception\RequestException;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use App\Models\Picture;
use Illuminate\Support\Facades\Auth;






class PictureController extends Controller
{



    public function show()
    {
        $response = HTTP::get('https://api.nasa.gov/planetary/apod?api_key=GPNcKV3zG4IC74Q0e2esJjoWSLDDXgIXwVRadTcq&count=50');
    
        $pictures = [];
        $numberPictures = [];
        if (Auth::check()) {
            $picturesSavedForUser =  Auth::user()->savedPictures()->get();
            foreach ($picturesSavedForUser as $p) {
                $p = $p->date;
                array_push($numberPictures, $p);
            }
            // dd($numberNews);
        }

        foreach ($response->object() as $picture) {

            if (property_exists($picture, "url") && substr($picture->url, 13, 4) == "nasa" && property_exists($picture, "title") && property_exists($picture, "explanation")) {
                unset($picture->hdurl);
                unset($picture->media_type);
                unset($picture->service_version);
                if (in_array($picture->date, $numberPictures)) {
                    $picture->heart = 1;
                } else {
                    $picture->heart = 0;
                }
                array_push($pictures, $picture);
            }
        }
        


        return view('gallery.gallery', ['pictures' => $pictures]);
    }

    public function showSavedPictures()
    {

        $pictures = Auth::user()->savedPictures()->get()->toArray();
        // dd($pictures);

        return view('gallery.gallery', ['pictures' => $pictures]);
    }

    public function associateUser($idUser, $picture)
    {

        $photo = DB::table('userpicture')->where('idUser', $idUser)->where('idPicture', $picture->idPicture)->first();
        if (is_null($photo)) {
            $picture->userSaved()->attach($idUser);
        }
    }

    public function disassociateUser($idUser, $picture)
    {

        $picture->userSaved()->detach($idUser);
    }

    public function like(Request $req)
    {
        $picture = new Picture();
        $photo = DB::table('picture')->where('date', $req->date)->first();


        if (is_null($photo)) {
            $picture->date = $req->date;
            $picture->title = $req->title;
            $picture->explanation = $req->explanation;
            $picture->url = $req->picture;
            $picture->heart = true;
            $picture->created_at = now();
            $picture->updated_at = now();
            $picture->save();
            $this->associateUser($req->userId, $picture);
        } else {
            $unFavPicture = Picture::find($photo->idPicture);
            if ($req->heart == "true") {
                $this->associateUser($req->userId, $unFavPicture);
            } elseif ($req->heart == "false") {

                $this->disassociateUser($req->userId, $unFavPicture);
            }
        }


        return response()->json();
    }


    public function watch(Request $req, $date)
    {

        $response = HTTP::get('https://api.nasa.gov/planetary/apod?api_key=GPNcKV3zG4IC74Q0e2esJjoWSLDDXgIXwVRadTcq&date=' . $date);
        // dd($response->object());
        return view('gallery.picture', ['picture' => $response->object()]);
    }
}
