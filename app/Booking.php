<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class booking extends Model
{
  protected $fillable = [
    'user_id', 'accommondation_id', 'no_adult', 'no_child', 'no_baby', 'from', 'to', 'checkin'
  ];

  public function user() {

		return $this->belongsTo('App\User');

	}

  public function accommondation() {

		return $this->hasOne('App\Accommondation');

	}
}
