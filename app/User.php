<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Cache;
use Illuminate\Foundation\Auth\User as Authenticatable;
use App\Post;
use App\Profile;

class User extends Authenticatable {
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'pic', 'nickname', 'fname', 'lname', 'email', 'password', 'birth', 'terms'
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

	public function profile() {

		return $this->hasOne('App\Profile');

	}

	public function posts() {

		return $this->hasMany('App\Post');

	}

	public function comments() {

		return $this->hasMany('App\Comment');

	}

	public function rates() {

		return $this->hasMany('App\Rate');

	}

	public function savedPosts() {

		return $this->hasMany('App\SavedPost');

	}

	public function isOnline() {

		return Cache::has('user-online-' .$this->id);

	}
}
