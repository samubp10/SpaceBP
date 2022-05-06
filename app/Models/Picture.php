<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Picture extends Model
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

    protected $table = 'picture';
    protected $primaryKey = 'idPicture';

    public function tagPicture() {

        return $this->belongsToMany('App\Models\Tag','tagpicture','idPicture', 'idTag');
    }

    public function userSaved() {

        return $this->belongsToMany('App\Models\Users','userpicture','idPicture', 'idUser');
    }
}
