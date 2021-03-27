<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Input,Redirect,Validator,Hash,Response,Session;
use App\Project , App\User, App\Lists, App\Wishlist ,App\VisitHistory;

class FrontendController extends Controller {

	public function home(){
		$projects = Project::get();
		$listings = Lists::join('list_categories','list_categories.id','=','listings.list_category_id')->get();;
		return view('front-end.index', compact('projects'), compact('listings'));
	}

	public function services(){
		return view('front-end.services');
	}
	public function listings(){
		$sql = Lists::select('listings.*','list_categories.category_name')->join('list_categories','list_categories.id','=','listings.list_category_id');

		$total = $sql->count();
        $max_per_page = 8;
        $total_pages = ceil($total/$max_per_page);
        if(Input::has('page')){
          $page_id = Input::get('page');
        } else {
          $page_id = 1;
        }

        $input_string = 'listings?';
        $count_string = 0;
        foreach (Input::all() as $key => $value) {
          if($key != 'page'){
            $input_string .= ($count_string == 0)?'':'&';
            $input_string .= $key.'='.$value;
            $count_string++;
          }
        }

      	$listings = $sql->skip(($page_id-1)*$max_per_page)->take($max_per_page)->get();
        

		

		return view('front-end.listings',["listings"=>$listings,"total" => $total, "page_id"=>$page_id, "max_per_page" => $max_per_page, "total_pages" => $total_pages,'input_string'=>$input_string ]);

	}
	public function listingDetails($listing_id){
		$listings = Lists::listing()->get();
		// dd($listings);
		VisitHistory::create(2 , $listing_id);
		$listing = Lists::select('listings.*','list_categories.category_name')->join('list_categories','list_categories.id','=','listings.list_category_id')->where('listings.id',$listing_id)->first();
		if($listing){
			$listing->highlights = DB::table("list_highlights")->where('list_id',$listing->id)->get();
			$listing->specifications = DB::table("list_specifications")->where('list_id',$listing->id)->get();
			$listing->photos = DB::table("listing_photos")->where('list_id',$listing->id)->get();
		}
		return view('front-end.listing-details', compact('listing','listings'));
	}
	public function projects(){
		$sql = Project::select();
		$total = $sql->count();
        $max_per_page = 8;
        $total_pages = ceil($total/$max_per_page);
        if(Input::has('page')){
          $page_id = Input::get('page');
        } else {
          $page_id = 1;
        }

        $input_string = 'projects?';
        $count_string = 0;
        foreach (Input::all() as $key => $value) {
          if($key != 'page'){
            $input_string .= ($count_string == 0)?'':'&';
            $input_string .= $key.'='.$value;
            $count_string++;
          }
        }

      	$projects = $sql->skip(($page_id-1)*$max_per_page)->take($max_per_page)->get();

      	return view('front-end.projects',["projects"=>$projects,"total" => $total, "page_id"=>$page_id, "max_per_page" => $max_per_page, "total_pages" => $total_pages,'input_string'=>$input_string ]);
	}
	public function projectDetails($project_id){
		$projects = Project::get();
		$project = Project::find($project_id);
		VisitHistory::create(1 , $project_id);

		if($project){
			$project->highlights = DB::table("project_highlights")->where('project_id',$project->id)->get();
			$project->specifications = DB::table("project_specifications")->where('project_id',$project->id)->get();
			$project->photos = DB::table("project_photos")->where('project_id',$project->id)->get();
		}
		return view('front-end.project-details',compact('project'), compact('projects'));
	}
	public function about(){
		return view('front-end.about');
	}
	public function contact(){
		return view('front-end.contact');
	}
	public function buyingTips(){
		return view('front-end.buying-tips');
	}
	public function calculator(){
		return view('front-end.calculator');
	}
	public function uttarakhandEducation(){
		return view('front-end.uttarakhand-education');
	}
	public function yogaMeditation(){
		return view('front-end.yoga-meditation');
	}
	public function subscribe(){
		return view('front-end.subscribe');
	}
	public function legalDocuments(){
		return view('front-end.legal-documents');
	}
	public function adventureActivities(){
		return view('front-end.adventure-activities');
	}
	public function rishikeshHotels(){
		return view('front-end.rishikesh-hotels');
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

	public function addWishlist($type , $item_id)
	{
		$check = Wishlist::where('type',$type)->where('item_id',$item_id)->where('user_id',Auth::id())->first();
		if(!$check){
			Wishlist::insert(['type'=>$type,'item_id'=>$item_id,'user_id'=>Auth::id()]);
		}

		return Redirect::back();
	}

	public function viewWishlist($type)
	{
		
		if($type == 1){
			$projects = Wishlist::select('projects.title','projects.cost','projects.short_address','wishlist.*')->join('projects','projects.id','=','wishlist.item_id')->where('user_id',Auth::id())->where('type',$type)->get();
			$data['message'] = html_entity_decode(view('front-end.wishlist',compact('projects')));
		}

		if($type == 2){
			$listings = Wishlist::select('listings.title','listings.short_address','listings.price','wishlist.*')->join('listings','listings.id','=','wishlist.item_id')->where('user_id',Auth::id())->where('type',$type)->get();
			$data['message'] = html_entity_decode(view('front-end.wishlist',compact('listings')));
		}
		$data['success'] = true;
		return ($data);
	}

	public function enquiryForm($type , $item_id)
	{
		DB::table('enquiries')->insert([
			"type"=>$type,
			"item_id"=>$item_id,
			"user_id"=>(Auth::check())?Auth::id():NULL,
			"name"=>Input::get("name"),
			"email"=>Input::get("email"),
			"phone"=>Input::get("phone"),
			"message"=>Input::get("message"),
			"created_at"=>date("Y-m-d H:i:s")
		]);

		return Redirect::back()->with('success','Your enquiry has been submitted successfully');
	}
}