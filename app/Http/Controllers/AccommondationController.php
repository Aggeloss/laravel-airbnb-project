<?php

namespace App\Http\Controllers;

use Session;

use App\Book;
use App\Booking;
use App\Accommondation;
use Illuminate\Support\Facades\Auth;
use Illuminate\Http\Request;

class AccommondationController extends Controller
{
    public function getAllAccommondations() {
      $accommondations = Accommondation::all();
      foreach ($accommondations as $accommondation) {
        $pictures[] = $accommondation->pic;
      }
      $counter = 0;
      for ($i = 0; $i < count($accommondations); $i++) {
        $accommondation->pic = $pictures[$counter];
      }
    /*  foreach ($accommondations as $accommondation) {
        $accommondation->pic = $pictures[$counter];
        $counter += 1;
      }*/
      return view('home.index', ['accommondations' => $accommondations]);
    }

    public function getNewAccomondation(Request $request, $id) {
      if(Auth::check()) {
        $user_id = Auth::user()->id;
        $accommondation = Accommondation::find($id);
        $newBook = Session::has('accommondation') ? Session::get('accommondation') : null;
        $book = new Book($newBook, $id);
        $book->add($accommondation, $accommondation->id)->checkIn($accommondation->id);
        $request->session()->put('accommondation', $accommondation);
        $newBook != null ? $booking = new Booking([
                              					'user_id'           => $user_id,
                                        'no_adult'          => $request->input('visitor_adult'),
                                        'no_child'          => $request->input('visitor_child'),
                                        'no_baby'           => $request->input('visitor_baby'),
                              					'accommondation_id' => $id,
                              					'from'              => $request->input('checkin'),
                              					'to'                => $request->input('checkout'),
                    					          'checkin'           => false
                              				]) : $booking = null;
        if($booking != null) {
          $booking->save();
        }
        //dd($booking);
        return redirect()->route('home');
      }
    }
}
