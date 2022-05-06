<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'description',
    ];

    protected $table = 'tag';
    protected $primaryKey = 'idTag';
    public $timestamps = false;

    public function tagPicture() {

        return $this->belongsToMany('App\Models\Picture','tagpicture','idTag', 'idPicture');
    }

    public function tagNews() {

        return $this->belongsToMany('App\Models\News','tagnews','idTag', 'idNews');
    }

    public function tagPost() {

        return $this->belongsToMany('App\Models\Post','tagpost','idTag', 'idPost');
    }
}
