<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'author',
        'content',
        'date',
        'numLikes',
        'picture'
    ];

    protected $table = 'post';
    protected $primaryKey = 'idPost';

    public function autor() {

        return $this->belongsTo('App\Models\User','idUser','idUser');
    }

    public function tagPost() {

        return $this->belongsToMany('App\Models\Post','tagpost','idTag', 'idPost');
    }
}
