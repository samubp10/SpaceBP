<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Fortify\TwoFactorAuthenticatable;
use Laravel\Jetstream\HasProfilePhoto;
use Laravel\Sanctum\HasApiTokens;
use App\Notifications\ResetPasswordNotification;

class User extends Authenticatable
{
    use HasApiTokens;
    use HasFactory;
    use HasProfilePhoto;
    use Notifiable;
    use TwoFactorAuthenticatable;

    protected $table = 'user';
    protected $primaryKey = 'idUser';

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
        'two_factor_recovery_codes',
        'two_factor_secret',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    /**
     * The accessors to append to the model's array form.
     *
     * @var array
     */


    protected $appends = [
        'profile_photo_url',
    ];


    public function posts()
    {

        return $this->hasMany('App\Models\Post', 'idPost', 'idPost');
    }

    public function role()
    {

        return $this->belongsTo('App\Models\Role', 'idRole', 'idRole');
    }

    public function savedPictures()
    {

        return $this->belongsToMany('App\Models\Picture', 'userpicture', 'idUser', 'idPicture');
    }

    public function savedNews()
    {

        return $this->belongsToMany('App\Models\News', 'usernews', 'idUser', 'idNews');
    }

    /**
     * Send a password reset email to the user
     */
    // public function sendPasswordResetNotification($token)
    // {
    //     $this->notify(new MailResetPasswordToken($token));
    // }

    public function sendPasswordResetNotification($token)
    {
        $url =  "/". $token . '?email='.$this->email;

        $this->notify(new ResetPasswordNotification($url));
    }
}
