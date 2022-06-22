<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;
use Illuminate\Support\Facades\DB;
use Illuminate\Pagination\Paginator;
use Illuminate\Pagination\LengthAwarePaginator;
use App\Models\News;
use Illuminate\Support\Facades\Auth;




class NewsController extends Controller
{

    public function show()
    {
        $response = HTTP::get('https://api.spaceflightnewsapi.net/v3/articles/?_limit=100');
        $numberNews = [];
        if (Auth::check()) {
            $newsSavedForUser =  Auth::user()->savedNews()->get();
            foreach ($newsSavedForUser as $n) {
                $n = $n->idNotice;
                array_push($numberNews, $n);
            }
            // dd($numberNews);
        }

        $news = [];

        foreach ($response->object() as  $date) {
            $date->publishedAt = substr($date->publishedAt, 0, 10);
            unset($date->featured);
            unset($date->launches);
            unset($date->events);
            unset($date->updatedAt);
            unset($date->newsSite);
            if (in_array($date->id, $numberNews)) {
                $date->heart = 1;
            } else {
                $date->heart = 0;
            }
            array_push($news, $date);
        }



        return view('news.news', ['news' => $news]);
    }

    public function showSavedNews()
    {

        $news = Auth::user()->savedNews()->get()->toArray();


        return view('news.news', ['news' => $news]);
    }

    public function associateUser($idUser, $news)
    {

        $notice = DB::table('usernews')->where('idUser', $idUser)->where('idNews', $news->idNews)->first();
        if (is_null($notice)) {
            $news->userSaved()->attach($idUser);
        }
    }

    public function disassociateUser($idUser, $news)
    {

        $news->userSaved()->detach($idUser);
    }


    public function like(Request $req)
    {
        $news = new News();
        $notice = DB::table('news')->where('idNotice', $req->idNews)->first();


        if (is_null($notice)) {
            $news->idNotice = $req->idNews;
            $news->title = $req->dataNews;
            $news->summary = $req->summary;
            $news->publishedAt = $req->publishedAt;
            $news->url = $req->url;
            $news->heart = true;
            $news->imageUrl = $req->imageUrl;
            $news->created_at = now();
            $news->updated_at = now();
            $news->save();
            $this->associateUser($req->userId, $news);
        } else {
            $unFavNotice = News::find($notice->idNews);
            if ($req->heart == "true") {
                $this->associateUser($req->userId, $unFavNotice);
            } elseif ($req->heart == "false") {

                $this->disassociateUser($req->userId, $unFavNotice);
            }
        }


        return response()->json();
    }

    // public function paginate($items, $perPage = 4, $page = null)
    // {
    //     $page = $page ?: (Paginator::resolveCurrentPage() ?: 1);
    //     $total = count($items);
    //     $currentpage = $page;
    //     $offset = ($currentpage * $perPage) - $perPage;
    //     $itemstoshow = array_slice($items, $offset, $perPage);
    //     return new LengthAwarePaginator($itemstoshow, $total, $perPage);
    // }
}
