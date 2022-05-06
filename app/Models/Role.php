<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    protected $table = 'role';
    protected $primaryKey = 'idRole';
    public $timestamps = false;

    public function usuarios() {

        return $this->hasMany('App\Models\User','idRole','idRole');
    }
}
