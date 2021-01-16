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

Route::get('/', 'FrontendController@home');
Route::get('/login', 'UserController@login')->name('login');
Route::post('/login', 'UserController@postLogin');
Route::get('/logout',function(){
	Auth::logout();
	return Redirect::to('/');
});

Route::get('services','FrontendController@services');
Route::get('listings','FrontendController@listings');
Route::get('projects','FrontendController@projects');
Route::get('about','FrontendController@about');
Route::get('contact','FrontendController@contact');

// Route::get('/','DashboardController@index');

Route::group(["middleware"=>["auth"]],function(){
	
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/change-password', 'UserController@changePassword');
	Route::post('/update-password', 'UserController@updatePassword');


	Route::group(["prefix"=>"users","middleware"=>["admin"]],function(){

		Route::get('/', 'UserController@index');
		Route::get('/add', 'UserController@add');
		Route::post('/store', 'UserController@store');
		Route::get('/edit/{id}', 'UserController@edit');
		Route::post('/update/{id}', 'UserController@update');
		
	});


	

});
