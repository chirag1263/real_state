<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Input,Redirect,Validator,Hash,Response,Session;
use App\Project , App\User;

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
		$projects = Project::get();

		// foreach ($projects as $project) {
		// 	$project->highlights = DB::table("project_highlights")->where('project_id',$project->id)->get();
		// 	$project->specifications = DB::table("project_specifications")->where('project_id',$project->id)->get();
		// 	$project->photos = DB::table("project_photos")->where('project_id',$project->id)->get();
		// }

		return view('front-end.projects',compact('projects'));
	}
	public function projectDetails($project_id){
		$project = Project::find($project_id);
		if($project){
			$project->highlights = DB::table("project_highlights")->where('project_id',$project->id)->get();
			$project->specifications = DB::table("project_specifications")->where('project_id',$project->id)->get();
			$project->photos = DB::table("project_photos")->where('project_id',$project->id)->get();
		}
		return view('front-end.project-details',compact('project'));
	}
	public function about(){
		return view('front-end.about');
	}
	public function contact(){
		return view('front-end.contact');
	}

	public function userLogin()
	{
		return view('front-end.user-login');
	}

	public function agentLogin()
	{
		return view('front-end.agent-login');
	}

	public function registerUser()
	{
		$cre = ["first_name"=>Input::get("first_name") , "email"=>Input::get("email") , "password"=>Input::get("password")];
		$rules = ["first_name"=>"required" , "email"=>"required|unique:users" , "password"=>"required"];
		$validator = Validator::make($cre ,$rules);
		if($validator->passes()){

			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->username = Input::get('email');
			$user->phone = Input::get('phone');
			$user->address = Input::get('address');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->password = Hash::make(Input::get('password'));
			$user->check_password = Input::get('password');
			$user->priv = 3;
			$user->save();
			return Redirect::back()->with('success','You have successfully registered , Please login with your email and password');
		}else{
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}

	public function registerAgent()
	{
		$cre = ["first_name"=>Input::get("first_name") , "email"=>Input::get("email") , "password"=>Input::get("password")];
		$rules = ["first_name"=>"required" , "email"=>"required|unique:users" , "password"=>"required"];
		$validator = Validator::make($cre ,$rules);
		if($validator->passes()){

			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->username = Input::get('email');
			$user->phone = Input::get('phone');
			$user->address = Input::get('address');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->password = Hash::make(Input::get('password'));
			$user->check_password = Input::get('password');
			$user->priv = 2;
			$user->save();

			return Redirect::back()->with('success','You have successfully registered , Please login with your email and password');

		}else{
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}
}