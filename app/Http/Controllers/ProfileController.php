<?php

namespace App\Http\Controllers;

use App\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
//use Illuminate\Support\Facades\Redirect;

class ProfileController extends Controller
{
	public function getProfile() {

		if(Auth::check()) {
			$get = DB::table('profiles')->get();
			$user_id = Auth::user()->id;
		}
		return view('user.profile');
			/**Saved Post Function get included in getProfile*/
	}

	public function changePhoto() {
		return view('user.pic');
	}

	public function uploadPhoto(Request $request) {

		$file = $request->file('pic');
		dd($file);

		if( $file != null ) {

			$filename = $file->getClientOriginalName();
			$fileExtension = $file->getClientOriginalExtension();

			if($fileExtension == 'jpg' || $fileExtension == 'png') {

				$path = 'imgs';
				$file->move( $path, $filename );
				$user_id = Auth::user()->id;

				$imageSize = getimagesize($path.'/'.$filename);

				list($width, $height) = $imageSize;

				$resolutionOfPicture = $height/$width;

				if($resolutionOfPicture >= 0.65 ) {

					DB::table( 'users' )
					  ->where( 'id', $user_id )
					  ->update( [ 'pic' => $filename ] );

				} else {
                    $deletePicture = unlink($path.'/'.$filename);

                    if($deletePicture) {
	                    return redirect()->route('user.profile')->with('message', 'The dimensions of picture should be approaching the square as much as possible.');
                    } else {
	                    return redirect()->route('user.profile')->with('message', 'Image could not be deleted by delete method.');
                    }

				}

			} else {
				return redirect()->route('user.profile')->with('message', 'Only JPG and PNG files are allowed.');
			}
		}

		return redirect()->route('user.profile');

	}

	public function getEditProfile() {

		$get = DB::table('profiles')->get();

		$current_user_id = Auth::user()->id;

		return view( 'user.edit', ['data' => $get[$current_user_id-1]]); /**less 1 because it catches the second row of our list,
			                                                                   since it starts at 0 and between list and user id there is 1 digit distance*/

	}

	public function postEditProfile(Request $request) {

		$current_user_id = Auth::user()->id;

		$city = $request->input('city');
		$about = $request->input('about');

		DB::table('profiles')
		  ->where('user_id', $current_user_id)
		  ->update(['city'    => $city,
		            'about'   => $about]);

		return redirect()->route('user.profile');

	}
}
