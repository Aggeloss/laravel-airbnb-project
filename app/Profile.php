<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Profile extends Model {
	protected $fillable = [
		'user_id'
	];

	public function user() {

		return $this->belongsTo('App\User');

	}

	public function savedPosts() {

		return $this->hasMany('App\SavedPost');

	}
}
