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
Route::get('listing-details/{list_id}','FrontendController@listingDetails');
Route::get('projects','FrontendController@projects');
Route::get('project-details/{project_id}','FrontendController@projectDetails');
Route::get('about','FrontendController@about');
Route::get('contact','FrontendController@contact');
Route::get('user-login','FrontendController@userLogin');
Route::get('agent-login','FrontendController@agentLogin');
Route::post('register-user','FrontendController@registerUser');
Route::post('register-agent','FrontendController@registerAgent');

Route::post('user-login','UserController@postLogin');
Route::get('buying-tips','FrontendController@buyingTips');
Route::get('calculator','FrontendController@calculator');
Route::get('uttarakhand-education','FrontendController@uttarakhandEducation');
Route::get('yoga-mediation-in-rishikesh','FrontendController@yogaMediation');
Route::get('subscribe','FrontendController@subscribe');
Route::get('adventure-activities','FrontendController@adventureActivities');
Route::get('rishikesh-hotels','FrontendController@rishikeshHotels');


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


	Route::group(["prefix"=>"admin"],function(){

		Route::group(["prefix"=>"list-categories"],function(){
			Route::get('/','ListCategory@index');
			Route::get('/add/{code_id?}','ListCategory@add');
			Route::post('/add/{code_id?}','ListCategory@store');
			Route::get('/delete/{code_id?}','ListCategory@delete');
		});

		Route::group(["prefix"=>"listings"],function(){
			Route::get('/','ListingController@index');
			Route::get('/add/{list_id?}','ListingController@add');
			Route::delete('/delete/{list_id?}','ListingController@delete');
			Route::post('/add/{list_id?}','ListingController@store');
		});

		Route::group(["prefix"=>"projects"],function(){
			Route::get('/','ProjectController@index');
			Route::get('/add','ProjectController@add');
			Route::delete('/delete/{project_id?}','ProjectController@delete');
		});

		Route::group(["prefix"=>"users"],function(){
			Route::get('/','UserController@users');
		});

	});

	Route::group(["prefix"=>"api"],function(){

		Route::post('/upload/file','UserController@uploadFile');
		Route::group(["prefix"=>"list-categories"],function(){
			Route::post('/init','ListCategory@init');
			Route::post('/store','ListCategory@store');
		});

		Route::group(["prefix"=>"listings"],function(){
			Route::post('/init','ListingController@init');
			Route::post('/store','ListingController@store');
		});

		Route::group(["prefix"=>"projects"],function(){
			Route::post('/init','ProjectController@init');
			Route::post('/store','ProjectController@store');
			Route::post('upload-photos','ProjectController@uploadGalleryPhotos');
		});

	});

	

});
