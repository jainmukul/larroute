<?php

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It's a breeze. Simply tell Laravel the URIs it should respond to
| and give it the controller to call when that URI is requested.
|
*/

Route::get('/', function () {
	//echo "<pre>";print_r(view('welcome'));die;
   return view('template/login/pages/login_view');
});

Route::auth();

Route::get('/home', 'HomeController@index');
// Authentication Routes...
$this->get('login', 'Auth\AuthController@showLoginForm');
$this->post('login', 'Auth\AuthController@login');
$this->get('logout', 'Auth\AuthController@logout');
// Registration Routes...
$this->get('register', 'Auth\AuthController@showRegistrationForm');
$this->post('register', 'Auth\AuthController@register');
// Password Reset Routes...
$this->get('password/reset/{token?}', 'Auth\PasswordController@showResetForm');
$this->post('password/email', 'Auth\PasswordController@sendResetLinkEmail');
$this->post('password/reset', 'Auth\PasswordController@reset');
$this->post('userProfile','HomeController@userProfile');

Route::get('admin_path', function () {
	return view('template/login/pages/login_view');
});

Route::get('profile',function(){
	return view('template/admin/pages/profile');
});
Route::get('sendMail','HomeController@sendMail');