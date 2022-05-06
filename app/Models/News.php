<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class News extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'content',
        'date',
        'numLikes',
        'picture',
    ];

    protected $table = 'news';
    protected $primaryKey = 'idNews';

    public function tag() {

        return $this->belongsToMany('App\Models\Tag','tagnews','idNew', 'idTag');
    }

    public function userSaved() {

        return $this->belongsToMany('App\Models\Users','usernews','idUser', 'idTag');
    }
}
