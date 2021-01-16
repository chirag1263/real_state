<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Input,Redirect,Validator,Hash,Response,Session;

class DashboardController extends Controller {

	public function index(){

		return view('dashboard.index',[
			"sidebar" => "dashboard",
			"subsidebar" => "",
		]);
	}
}