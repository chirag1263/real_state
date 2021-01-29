<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Input,Redirect,Validator,Hash,Response,Session;

class FrontendController extends Controller {


	public function home(){
		return view('front-end.index');
	}

	public function services(){
		return view('front-end.services');
	}
	public function listings(){
		return view('front-end.listings');
	}
	public function listingDetails(){
		return view('front-end.listing-details');
	}
	public function projects(){
		return view('front-end.projects');
	}
	public function about(){
		return view('front-end.about');
	}
	public function contact(){
		return view('front-end.contact');
	}
}