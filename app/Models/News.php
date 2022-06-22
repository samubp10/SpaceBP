<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'idNotice',
        'title',
        'summary',
        'publishedAt',
        'url',
        'imageUrl',
        'created_at',
        'updated_at',
    ];

    protected $table = 'news';
    protected $primaryKey = 'idNews';

    // public function tag() {

    //     return $this->belongsToMany('App\Models\Tag','tagnews','idNew', 'idTag');
    // }

    public function userSaved() {

        return $this->belongsToMany('App\Models\News','usernews','idNews', 'idUser');
    }
}
