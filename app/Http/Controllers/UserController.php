<?php

namespace App\Http\Controllers;

use App\Profile;
use Illuminate\Http\Request;

use App\User;
use Illuminate\Support\Facades\Input;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class UserController extends Controller
{
	public function getHome() {
		if(Auth::check()) {
			return view( 'home.index');
		} else {
			return redirect()->back()->exception('user.profile');
		}

	}

	public function getSignup() {
		return view('home.index');
	}

  public function postSignup( Request $request ) {

		$file = $request->file('pic');

		if( $file != null ) {

			$filename = $file->getClientOriginalName();
			$fileExtension = $file->getClientOriginalExtension();

			if($fileExtension == 'jpg' || $fileExtension == 'png') {

				$birth = ['day' 	=> $request->get('day'),
									'month' => $request->get('month'),
									'year'  => $request->get('year')];

				$birth['day'] < 10 ? $birth['day'] = '0'.$birth['day'] : $birth['day'] = $birth['day'];
				$birth['month'] < 10 ? $birth['month'] = '0'.$birth['month'] : $birth['month'] = $birth['month'];

				$date = \Carbon\Carbon::create($birth['year'], $birth['month'], $birth['day']);

				$path = 'imgs';
				$file->move( $path, $filename );

				$this->validate($request, [
					'pic' 		 => '',
					'nickname' => 'required',
					'fname'    => 'required',
					'lname'    => 'required',
					'email'    => 'email|required|unique:users',
					'password' => 'required|min:6',
					'year'		 => 'required',
					'month'		 => 'required',
					'day'		 	 => 'required',
					'terms' 	 => 'required'
				]);

				$terms = Input::has('terms') ? True : False;

				$user = new User([
					'pic' 		 => $filename,
					'nickname' => $request->input('nickname'),
					'fname'    => $request->input('fname'),
					'lname'    => $request->input('lname'),
					'email'    => $request->input('email'),
					'password' => bcrypt($request->input('password')),
					'birth'    =>	$date->toDateString(), //format('Y-m-d');
					'terms' 	 => $terms
				]);

				$user->save();
				Profile::create( [ 'user_id' => $user->id ] );
				return redirect()->route('home');
			} else {
				return redirect()->route('home')->with('message', 'Only JPG and PNG files are allowed.');
			}
		}
		return redirect()->route('home')->with('message', 'Null input not allowed.');
  }

  public function getSignin() {
  	return view('home.index');
  }

	public function postSignin(Request $request) {

		$this->validate($request, [
			'email'     => 'email|required',
			'password'  => 'required'
		]);

		if(Auth::attempt( ['email' => $request->input('email'), 'password' => $request->input('password')]) ){
			return redirect()->route('home');
		} else {
			return redirect()->back()->with('message', 'Incorrect email or password');
		}
	}

	public function getLogout() {
  	Auth::logout();
		return redirect()->back();

	}
}
