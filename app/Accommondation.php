<?php

namespace App;

use Illuminate\Database\Eloquent\Model;


class Accommondation extends Model {

  protected $fillable = [
    'title', 'pic', 'city', 'description', 'action', 'rate'
  ];

}
