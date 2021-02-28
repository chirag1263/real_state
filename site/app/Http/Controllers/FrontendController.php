<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Input,Redirect,Validator,Hash,Response,Session;
use App\Project;

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
}