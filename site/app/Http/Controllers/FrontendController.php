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
		$projects = Project::get();
		return view('front-end.index',compact('projects'));
	}
	public function services(){
		$projects = Project::get();
		return view('front-end.services',compact('projects'));
	}
	public function listings(){
		$projects = Project::get();
		return view('front-end.listings',compact('projects'));
	}
	public function listingDetails(){
		$projects = Project::get();
		return view('front-end.listing-details',compact('projects'));
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
		$projects = Project::get();
		$project = Project::find($project_id);
		if($project){
			$project->highlights = DB::table("project_highlights")->where('project_id',$project->id)->get();
			$project->specifications = DB::table("project_specifications")->where('project_id',$project->id)->get();
			$project->photos = DB::table("project_photos")->where('project_id',$project->id)->get();
		}
		return view('front-end.project-details',compact('project'), compact('projects'));
	}
	public function about(){
		$projects = Project::get();
		return view('front-end.about', compact('projects'));
	}
	public function contact(){
		$projects = Project::get();
		return view('front-end.contact', compact('projects'));
	}
	public function buyingTips(){
		$projects = Project::get();
		return view('front-end.buying-tips', compact('projects'));
	}
	public function calculator(){
		$projects = Project::get();
		return view('front-end.calculator', compact('projects'));
	}
	public function uttarakhandEducation(){
		$projects = Project::get();
		return view('front-end.uttarakhand-education', compact('projects'));
	}
	public function yogaMeditation(){
		$projects = Project::get();
		return view('front-end.yoga-meditation', compact('projects'));
	}
	public function subscribe(){
		$projects = Project::get();
		return view('front-end.subscribe', compact('projects'));
	}
	public function legalDocuments(){
		$projects = Project::get();
		return view('front-end.legal-documents', compact('projects'));
	}
	public function adventureActivities(){
		$projects = Project::get();
		return view('front-end.adventure-activities', compact('projects'));
	}
	public function rishkeshHotels(){
		$projects = Project::get();
		return view('front-end.rishkesh-hotels', compact('projects'));
	}
}