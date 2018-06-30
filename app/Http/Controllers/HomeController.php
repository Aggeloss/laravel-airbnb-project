<?php

namespace App\Http\Controllers;

use App\Accommondation;
use Illuminate\Http\Request;

class HomeController extends Controller
{
  public function getHome() {
      return view('home.index');
  }

  public function getBooking($id) {

    $accommondation = Accommondation::find($id);

    return view('home.booking', ['accommondation' => $accommondation, 'id' => $id]);
  }

  public function getAssign() {
    return view('home.assign');
  }
}
