<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

use Input,Redirect,Validator,Hash,Response,Session;
use App\Project , App\Faq, App\Testimonial, App\Partner, App\User, App\Lists, App\Wishlist ,App\VisitHistory,App\MailQueue, App\Slider;

class FrontendController extends Controller {

	public function home(){
		$projects = Project::get();
		$listings = Lists::join('list_categories','list_categories.id','=','listings.list_category_id')->get();
		$testimonials = Testimonial::get();
		$partners = Partner::get();
		$slides = Slider::get();

		return view('front-end.index', compact('projects', 'listings', 'testimonials', 'partners', 'slides'));
	}

	public function services(){
		return view('front-end.services');
	}
	public function listings(){
		$sql = Lists::select('listings.*','list_categories.category_name')->join('list_categories','list_categories.id','=','listings.list_category_id')->where('listings.status',1);

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
      if($key != 'page' && $key != 'filters'){
        $input_string .= ($count_string == 0)?'':'&';
        $input_string .= $key.'='.$value;
        $count_string++;
      }
    }

    if(Input::has('filters')){

    	$f_ids = Input::get('filters');
    }else{
    	$f_ids = [];
    }
    if(sizeof($f_ids) > 0){
    	$listing_ids = [];
    	foreach($f_ids as $fi){
    		$array[] = DB::table("listing_filters")->where('filter_id',$fi)->pluck('listing_id')->all();

    	}
    	if(sizeof($array) <= 1){
    		$listing_ids =	DB::table("listing_filters")->whereIn('filter_id',$f_ids)->pluck('listing_id')->all();
    	}else{
    		$listing_ids = call_user_func_array('array_intersect', $array);
    	}

    	if(sizeof($listing_ids) == 0){
    		$listing_ids = [0];
    	}

    	$sql = $sql->whereIn('listings.id',$listing_ids);
    }
    if(sizeof($f_ids) == 0){
    		$f_ids = [0];
    }

  	$listings = $sql->skip(($page_id-1)*$max_per_page)->take($max_per_page)->get();
        

		$filters = DB::table('filters')->get();

		return view('front-end.listings',["listings"=>$listings,"total" => $total, "page_id"=>$page_id, "max_per_page" => $max_per_page, "total_pages" => $total_pages,'input_string'=>$input_string ,"filters"=>$filters ,"f_ids"=>$f_ids]);

	}
	public function listingDetails($listing_id){
		$listings = Lists::listing()->where('listings.id','!=',$listing_id)->where('listings.status',1)->get();
		if(Auth::check()){

			VisitHistory::create(2 , $listing_id);
		}
		$listing = Lists::select('listings.*','list_categories.category_name')->join('list_categories','list_categories.id','=','listings.list_category_id')->where('listings.id',$listing_id)->first();
		if($listing){
			$listing->highlights = DB::table("list_highlights")->where('list_id',$listing->id)->get();
			$listing->specifications = DB::table("list_specifications")->where('list_id',$listing->id)->get();
			$listing->photos = DB::table("listing_photos")->where('list_id',$listing->id)->get();
		}
		return view('front-end.listing-details', compact('listing','listings'));
	}
	public function projects(){
		$sql = Project::select('projects.*')->where('projects.status',1);
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
          if($key != 'page' && $key != 'filters'){
            $input_string .= ($count_string == 0)?'':'&';
            $input_string .= $key.'='.$value;
            $count_string++;
          }
        }

        if(Input::has('filters')){

		    	$f_ids = Input::get('filters');
		    }else{
		    	$f_ids = [];
		    }
		    if(sizeof($f_ids) > 0){
		    	$project_ids = [];
		    	foreach($f_ids as $fi){
		    		$array[] = DB::table("project_filters")->where('filter_id',$fi)->pluck('project_id')->all();

		    	}
		    	if(sizeof($array) <= 1){
		    		$project_ids =	DB::table("project_filters")->whereIn('filter_id',$f_ids)->pluck('project_id')->all();
		    	}else{
		    		$project_ids = call_user_func_array('array_intersect', $array);
		    	}

		    	if(sizeof($project_ids) == 0){
		    		$project_ids = [0];
		    	}

		    	$sql = $sql->whereIn('projects.id',$project_ids);
		    }
		    if(sizeof($f_ids) == 0){
		    		$f_ids = [0];
		    }

      	$projects = $sql->skip(($page_id-1)*$max_per_page)->take($max_per_page)->get();
      	$filters = DB::table('filters')->get();

      	return view('front-end.projects',["projects"=>$projects,"total" => $total, "page_id"=>$page_id, "max_per_page" => $max_per_page, "total_pages" => $total_pages,'input_string'=>$input_string ,"filters"=>$filters ,"f_ids"=>$f_ids]);
	}
	public function projectDetails($project_id){
		$projects = Project::where('id','!=',$project_id)->where('projects.status',1)->get();
		$project = Project::find($project_id);
		if(Auth::check()){
			VisitHistory::create(1 , $project_id);
		}

		if($project){
			$project->highlights = DB::table("project_highlights")->where('project_id',$project->id)->get();
			$project->specifications = DB::table("project_specifications")->where('project_id',$project->id)->get();
			$project->photos = DB::table("project_photos")->where('project_id',$project->id)->get();
		}
		return view('front-end.project-details',compact('project'), compact('projects'));
	}
	public function about(){
		$testimonials = Testimonial::get();
		return view('front-end.about', compact('testimonials'));
	}
	public function partners(){
		$partners = Partner::get();
		return view('front-end.partners', compact('partners'));
	}
	public function faqs(){
		$faqs = Faq::get();
		return view('front-end.faqs', compact('faqs'));
	}
	public function contact(){
		return view('front-end.contact');
	}
	public function enquiry(){
		return view('front-end.enquiry');
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
		$cities = ["","Almora","Almora Cantonment","Badrinathpuri","Bageshwar","Bahadarabad","Bajpur (Bazpur)","Banbasa","Bandiya (Bandia)","Bangherimahabatpur (Must)","Barkot","Bhagwanpur","BHEL Ranipur","Bhimtal","Bhowali","Central Hope Town","Chakrata","Chamba","Chamoli Gopeshwar","Champawat","Clement Town","Dehradun","Dehradun Cantonment","Devaprayag","Dhaluwala","Dhandera","Dharchula","Didihat","Dineshpur","Dogadda","Doiwala","Dwarahat","Fatehpur Range, Dhamua Dunga Area","Gadarpur","Gangotri","Gochar (Gauchar)","Gumaniwala","Haldwani-cum-Kathgodam","Haldwani Talli","Hardwar (Haridwar)","Haripur Kalan","Herbertpur","Jagjeetpur","Jaspur","Jhabrera","Jiwangarh","Jonk","Joshimath (Jyotirmath)","Kaladhungi","Kanchal Gosain","Karnaprayag","Kashipur","Kashirampur","Kedarnath","Kela Khera","Khanjarpur","Kharak mafi","Khatima","Khatyari","Kichha","Kirtinagar","Kotdwara (Kotdwar)","Laksar","Lalkuan","Landaur (Landour)","Landhaura","Lansdowne","Lohaghat","Maholiya","Mahua Dabra Haripura","Mahua Kheraganj","Manglaur","Maohanpur Mohammadpur","Mehu Wala Mafi","Mukhani (Roopnagar, Basant Vihar Colony and Judges Farm)","Muni Ki Reti","Mussoorie","Nagala Imarti","Nagla","Nainital","Nainital Cantonment","Nandprayag (Nandaprayag)","Narendranagar","Natthan Pur","Natthuwa Wala","Padali Gujar","Padampur Sukhran","Pauri","Piran Kaliyar","Pithoragarh","Pratitnagar","Raipur","Ramnagar","Ranikhet","Rawali Mahdood","Rishikesh","Rishikesh","Roorkee","Roorkee Cantonment","Rudraprayag","Rudrapur","Saidpura","Salempur Rajputan","Shafipur","Shahpur","Shaktigarh","Sitarganj","Srinagar","Sultanpur","Sunhaira","Tanakpur","Tehri","Umru Khurd","Uttarkashi","Vikasnagar","Virbhadra"];
		return view('front-end.agent-login',compact('cities'));
	}

	public function registerUser()
	{
		$cre = ["first_name"=>Input::get("first_name") , "email"=>Input::get("email")];
		$rules = ["first_name"=>"required" , "email"=>"required|unique:users"];
		$validator = Validator::make($cre ,$rules);
		if($validator->passes()){
			$rand_pwd = User::getRandPassword();
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->username = Input::get('email');
			$user->phone = Input::get('phone');
			$user->address = Input::get('address');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->password = Hash::make($rand_pwd);
			$user->check_password = $rand_pwd;
			$user->priv = 3;
			$user->save();
			$content = view('mails',["type"=>"registration","user"=>$user]);
			MailQueue::createNew($user->email,'','','User Registration',$content);
			

			return Redirect::back()->with('success','You have successfully registered , Your login details has been sent to you registered mail id');
		}else{
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}

	public function registerAgent()
	{
		$cre = ["first_name"=>Input::get("first_name") , "email"=>Input::get("email") , "password"=>Input::get("password")];
		$rules = ["first_name"=>"required" , "email"=>"required|unique:users" ];
		$validator = Validator::make($cre ,$rules);
		if($validator->passes()){
			$rand_pwd = User::getRandPassword();
			$user = new User;
			$user->first_name = Input::get('first_name');
			$user->last_name = Input::get('last_name');
			$user->email = Input::get('email');
			$user->username = Input::get('email');
			$user->phone = Input::get('phone');
			$user->address = Input::get('address');
			$user->company_name = Input::get('company_name');
			$user->pro_type = Input::get('pro_type');
			$user->city = Input::get('city');
			$user->state = Input::get('state');
			$user->password = Hash::make($rand_pwd);
			$user->check_password = $rand_pwd;
			$user->priv = 2;
			$user->save();

			$content = view('mails',["type"=>"registration","user"=>$user]);
			MailQueue::createNew($user->email,'','','Agent Registration',$content);

			return Redirect::back()->with('success','You have successfully registered , Your login details has been sent to you registered mail id');

		}else{
			return Redirect::back()->withInput()->withErrors($validator)->with('failure',$validator->errors()->first());
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

	public function seller($seller_id)
	{
		$seller = User::find($seller_id);
		if($seller){
			$seller->reviews = DB::table('seller_reviews')->select('seller_reviews.*','users.first_name','users.last_name')
				->join('users','users.id','=','seller_reviews.added_by')
				->where('seller_id',$seller_id)->where('seller_reviews.status',1)->orderBy('seller_reviews.id','desc')->take(5)->get();
			$seller->reviews_count = DB::table('seller_reviews')->select('seller_reviews.id')
                ->where('seller_id',$seller_id)->where('seller_reviews.status',1)->count();
                
			foreach ($seller->reviews as $row) {
				$row->given_by = $row->first_name.' '.$row->last_name;
			}
			$seller->rating = DB::table('seller_reviews')->where('seller_id',$seller_id)->where('status',1)->avg("rating");
		}

		return view('front-end.seller',compact('seller'));
	}

	public function sellerReview($seller_id)
	{
		$cre = ["review"=>Input::get("review"),"rating_value"=>Input::get("rating_value")];
		$rules = ["review"=>"required","rating_value"=>"required"];
		$validator = Validator::make($cre , $rules);
		if($validator->passes()){
			$check = DB::table('seller_reviews')->where('seller_id',$seller_id)->where('added_by',Auth::id())->first();
			if(!$check){

				DB::table("seller_reviews")->insert(["seller_id"=>$seller_id,"review"=>Input::get('review'),"rating"=>Input::get('rating_value'),"added_by"=>Auth::id()]);
				return Redirect::back()->with('success','Your rating and review has been submitted successfully. It will live be post approval.');
			}else{

				return Redirect::back()->with('failure','OOPs! You have already given ratings to this seller.')->withInput();
			}

		}else{
			return Redirect::back()->with('failure',$validator->errors()->first())->withInput()->withErrors($validator);
		}
	}

	public function sendContactUs()
	{
		$cre = ["name"=>Input::get("name") , "email"=>Input::get("email"),"message"=>Input::get('message')];
		$rules = ["name"=>"required" , "email"=>"required","message"=>"required"];
		$validator = Validator::make($cre ,$rules);
		if($validator->passes()){
			$content = view('mails',["type"=>"contact-us","data"=>$cre]);
			MailQueue::createNew("contact@realstate.in",'','','Contact us form enquiry',$content);
			

			return Redirect::back()->with('success','You details has submitted successfully , one of our representative will get in touch with you shortly');
		}else{
			return Redirect::back()->withInput()->withErrors($validator);
		}
	}
}