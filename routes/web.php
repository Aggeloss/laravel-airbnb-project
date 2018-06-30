<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['middleware' => 'guest'], function() {

	Route::group(['prefix' => '/home/user'], function() {

		Route::post('/uploadPhoto', 'ProfileController@uploadPhoto')->name('pic');

		Route::get('/signup', [
			'uses' => 'UserController@getSignup',
			'as'   => 'user.signup'
		]);

		Route::post('/signup', [
			'uses' => 'UserController@postSignup',
			'as'   => 'user.signup'
		]);

		Route::get('/login', [
			'uses' => 'UserController@getSignin',
			'as'   => 'login'
		]);

		Route::post('/login', [
			'uses' => 'UserController@postSignin',
			'as'   => 'login'
		]);
	 });
});

Route::group(['middleware' => 'prevent-back-history'], function() {

	Route::get('/home', [
		'uses' => 'HomeController@getHome',
		'as'   => 'home'
	]);

	Route::get('/home', [
		'uses' => 'AccommondationController@getAllAccommondations',
		'as'   => 'home'
	]);

	Route::get('/home/assign', [
		'uses' => 'HomeController@getAssign',
		'as'   => 'assign'
	]);

	Route::get('/home/booking/{id}', [
		'uses' => 'HomeController@getBooking',
		'as'	 => 'booking'
	]);

	Route::post('/home/booking/{id}', [
		'uses' => 'AccommondationController@getNewAccomondation',
		'as'   => 'accommondation'
	]);

	Route::group(['middleware' => 'auth'], function() {

		Route::get('/home/users', 'UserController@getUsers')->name('users');

		Route::get('/changePhoto', 'ProfileController@changePhoto')->name('pic');

		Route::post('/uploadPhoto', 'ProfileController@uploadPhoto')->name('pic');

		Route::get('/editProfile', 'ProfileController@getEditProfile')->name('edit');

		Route::post('/editProfile', 'ProfileController@postEditProfile')->name('edit');

		Route::get( '/profile', [
			'uses' => 'ProfileController@getProfile',
			'as'   => 'user.profile'
		]);

		Route::get( '/logout', [
			'uses' => 'UserController@getLogout',
			'as'   => 'user.logout'
		]);
	});
});
