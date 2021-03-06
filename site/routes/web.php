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


Route::get('/forget-password', 'UserController@forgetPassword');
Route::post('/forget-password', 'UserController@postForgetPassword');

Route::get('services','FrontendController@services');
Route::get('listings','FrontendController@listings');
Route::get('listing-details/{list_id}','FrontendController@listingDetails');
Route::get('projects','FrontendController@projects');
Route::get('project-details/{project_id}','FrontendController@projectDetails');
Route::get('about','FrontendController@about');
Route::get('enquiry','FrontendController@enquiry');
Route::get('faqs','FrontendController@faqs');
Route::get('partners','FrontendController@partners');
Route::get('contact','FrontendController@contact');
Route::get('user-login','FrontendController@userLogin');
Route::get('agent-login','FrontendController@agentLogin');
Route::post('register-user','FrontendController@registerUser');
Route::post('register-agent','FrontendController@registerAgent');

Route::post('user-login','UserController@postLogin');
Route::get('buying-tips','FrontendController@buyingTips');
Route::get('calculator','FrontendController@calculator');
Route::get('uttarakhand-education','FrontendController@uttarakhandEducation');
Route::get('yoga-meditation-in-rishikesh','FrontendController@yogaMeditation');
Route::get('subscribe','FrontendController@subscribe');
Route::get('adventure-activities-in-rishikesh','FrontendController@adventureActivities');
Route::get('rishikesh-hotels','FrontendController@rishikeshHotels');
Route::get('legal-documents','FrontendController@legalDocuments');
Route::post('contact-us','FrontendController@sendContactUs');

Route::get('seller-details/{seller_id}','FrontendController@seller');
Route::any('seller_review/{seller_id}','FrontendController@sellerReview');


// Route::get('/','DashboardController@index');

Route::post('/enquire/{type}/{item_id}','FrontendController@enquiryForm');

Route::group(["middleware"=>["auth"]],function(){

	Route::get('add-wishlist/{type}/{item_id}','FrontendController@addWishlist');
	Route::get('view-wishlist/{type}','FrontendController@viewWishlist');
	
	Route::get('/dashboard', 'DashboardController@index');
	Route::get('/settings', 'UserController@settings');
	Route::get('/edit-settings', 'UserController@editSettings');
	
	Route::post('/settings', 'UserController@updateSettings');

	Route::get('/change-password', 'UserController@changePassword');
	Route::post('/update-password', 'UserController@updatePassword');


	Route::group(["prefix"=>"users","middleware"=>["admin"]],function(){

		Route::get('/', 'UserController@index');
		Route::get('/add', 'UserController@add');
		Route::post('/store', 'UserController@store');
		Route::get('/edit/{id}', 'UserController@edit');
		Route::post('/update/{id}', 'UserController@update');
		
	});



	Route::group(["prefix"=>"wishlist"],function(){

		Route::get('/', 'UserController@wishlist');
		
	});


	Route::group(["prefix"=>"admin"],function(){

		Route::group(["prefix"=>"list-categories"],function(){
			Route::get('/','ListCategory@index');
			Route::get('/add/{code_id?}','ListCategory@add');
			Route::post('/add/{code_id?}','ListCategory@store');
			Route::get('/delete/{code_id}','ListCategory@delete');
		});

		Route::group(["prefix"=>"listings"],function(){
			Route::get('/','ListingController@index');
			Route::get('/add/{list_id?}','ListingController@add');
			Route::delete('/delete/{list_id}','ListingController@delete');
			Route::post('/add/{list_id?}','ListingController@store');
			Route::delete('/toggleStatus/{list_id}/{status}','ListingController@toggleStatus');
		});

		Route::group(["prefix"=>"projects"],function(){
			Route::get('/','ProjectController@index');
			Route::get('/add','ProjectController@add');
			Route::delete('/delete/{project_id}','ProjectController@delete');
			Route::delete('/toggleStatus/{project_id}/{status}','ProjectController@toggleStatus');
		});

		Route::group(["prefix"=>"users"],function(){
			Route::get('/','UserController@users');
		});

		Route::group(["prefix"=>"rating_reviews"],function(){
			Route::get('/','UserController@ratings');
			Route::delete('/approve/{id}','UserController@approveRating');
		});

		Route::group(["prefix"=>"enquiries"],function(){
			Route::get('/','UserController@enquiries');
		});

		Route::group(["prefix"=>"faqs","middleware"=>["admin"]],function(){

			Route::get('/', 'FaqController@index');
			Route::get('/add', 'FaqController@add');
			Route::post('/store', 'FaqController@store');
			Route::get('/edit/{id}', 'FaqController@edit');
			Route::post('/update/{id}', 'FaqController@update');
			Route::delete('/delete/{id}', 'FaqController@delete');
			
		});

		Route::group(["prefix"=>"partners","middleware"=>["admin"]],function(){

			Route::get('/', 'MediaPartnerController@index');
			Route::get('/add', 'MediaPartnerController@add');
			Route::post('/store', 'MediaPartnerController@store');
			Route::get('/edit/{id}', 'MediaPartnerController@edit');
			Route::post('/update/{id}', 'MediaPartnerController@update');
			Route::delete('/delete/{id}', 'MediaPartnerController@delete');
			
		});

		Route::group(["prefix"=>"sliders","middleware"=>["admin"]],function(){

			Route::get('/', 'SliderController@index');
			Route::get('/add', 'SliderController@add');
			Route::post('/store', 'SliderController@store');
			Route::get('/edit/{id}', 'SliderController@edit');
			Route::post('/update/{id}', 'SliderController@update');
			Route::delete('/delete/{id}', 'SliderController@delete');
			
		});

		Route::group(["prefix"=>"filters","middleware"=>["admin"]],function(){

			Route::get('/', 'FilterController@index');
			Route::get('/add', 'FilterController@add');
			Route::post('/store', 'FilterController@store');
			Route::get('/edit/{id}', 'FilterController@edit');
			Route::post('/update/{id}', 'FilterController@update');
			Route::delete('/delete/{id}', 'FilterController@delete');
			
		});

		Route::group(["prefix"=>"testimonials","middleware"=>["admin"]],function(){

			Route::get('/', 'TestimonialController@index');
			Route::get('/add', 'TestimonialController@add');
			Route::post('/store', 'TestimonialController@store');
			Route::get('/edit/{id}', 'TestimonialController@edit');
			Route::post('/update/{id}', 'TestimonialController@update');
			Route::delete('/delete/{id}', 'TestimonialController@delete');
			
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
