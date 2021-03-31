<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Input,Redirect,Validator,Hash,Response,Session;
use App\User,DB,App\Wishlist,App\MailQueue;


class UserController extends Controller {

	public function login(){
		return view('login');
	}

    public function enquiries()
    {
        $type = 1;

        if(Input::get('type') != ''){
            $type = Input::get('type');
        }

        $enquiries = DB::table('enquiries')->select('enquiries.*','projects.title as project_name','listings.title as list_name')
            ->leftJoin('projects','projects.id','=','enquiries.item_id')
            ->leftJoin('listings','listings.id','=','enquiries.item_id')
            ->where('enquiries.type',$type)
            ->get();
        $sidebar = 'enquiries';
        return view('enquiries',compact('enquiries','sidebar'));
    }

	public function postLogin(){

		$cre = ["username"=>Input::get("username"),"password"=>Input::get("password")];
		$rules = ["username"=>"required","password"=>"required"];
		$validator = Validator::make($cre,$rules);
		if($validator->passes()){

			if(Auth::attempt($cre)){
                if(Input::has('call_url')){
                    $data['call_url'] = Input::get('call_url');
                    $data['success'] = true;
                }else{
                    return Redirect::to('/dashboard');
                }
			}else{
                if(Input::has('call_url')){
                    $data['success'] = false;
                    $data['message'] = 'Invalid username or password';
                    return json_encode($data);
                }else{

				    return Redirect::back()->with('failure','Invalid username or password');
                }
			}

		}else{
			$data['success'] = false;
			$data['message'] = $validator->errors()->first();
		}

        if(Input::has('call_url')){
            return json_encode($data);
        }else{
		  return Redirect::back()->with('failure',$data["message"]);

        }
	}

	public function index(){

        $users = User::where('priv',2)->orderBy('name')->get();
        return view('admin.users.index',['sidebar'=>'users','subsidebar'=>'users',"users"=>$users ]);
    }

    public function add(){
        return view('admin.users.add',["sidebar"=>"users","subsidebar"=>"users"]);
    }

    public function edit($user_id){
        $user = User::find($user_id);
        return view('admin.users.add',["sidebar"=>"users","subsidebar"=>"users" ,"user"=>$user]);
    }

    public function store(){

        $cre = [
            "name"=>Input::get("name"),
            "username"=>Input::get("username"),
            "check_password"=>Input::get("check_password"),

        ];
        $rules = [
            "name"=>"required",
            "username"=>"required|email|unique:users,username",
            "check_password"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $admin = new User;
            $admin->username = Input::get("username");
            $admin->name = Input::get("name");
            $admin->password = Hash::make(Input::get('check_password'));
            $admin->check_password = Input::get("check_password");
            $admin->priv = 2;
            $admin->save();

            return Redirect::to('users')->with('success','New user is added successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }

    public function update($user_id){

        $cre = [
            "name"=>Input::get("name"),
            "username"=>Input::get("username"),

        ];
        
        $rules = [
            "username"=>"required|unique:users,username,".$user_id,
            "name"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $admin = User::find($user_id);
            $admin->username = Input::get("username");
            $admin->name = Input::get("name");
            $admin->priv = 2;
            $admin->save();

            return Redirect::to('/users')->with('success','User is updated successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }
    
    public function delete($id)
    {
        $admin = DB::table('users')->where('id',$id)->first();
        if($admin){
            DB::table('users')->where('id',$id)->delete();
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['message'] = "admin does't exist";
        }
        return json_encode($data);

    }

    public function changePassword()
    {
    	return view('profile',["sidebar"=>"chagne-password","subsidebar"=>"chagne-password"]);
    }

    public function updatePassword(){
        $cre = ["old_password"=>Input::get('old_password'),"new_password"=>Input::get('new_password'),"confirm_password"=>Input::get('confirm_password')];
        $rules = ["old_password"=>'required',"new_password"=>'required|min:5',"confirm_password"=>'required|same:new_password'];
        $old_password = Hash::make(Input::get('old_password'));
        $validator = Validator::make($cre,$rules);
        if ($validator->passes()) { 
            if (Hash::check(Input::get('old_password'), Auth::user()->password )) {
                $password = Hash::make(Input::get('new_password'));
                $user = User::find(Auth::id());
                $user->password = $password;
                $user->check_password = Input::get('new_password');
                $user->save();
                return Redirect::back()->with('success', 'Password changed successfully ');
                
            } else {
                return Redirect::back()->withInput()->with('failure', 'Old password does not match.');
            }
        } else {
            return Redirect::back()->withErrors($validator)->withInput();
        }

        return Redirect::back()->withErrors($validator)->withInput()->with('failure','Unauthorised Access or Invalid Password');
    }

    public function uploadFile(){
        $destination = 'uploads/';
        if(Input::hasFile('media')){
            $file = Input::file('media');
            $extension = Input::file('media')->getClientOriginalExtension();
            if(in_array($extension,User::fileExtensions())){

                $name_file = pathinfo(Input::file('media')->getClientOriginalName(), PATHINFO_FILENAME);
                $name_file = preg_replace('/[^a-zA-Z0-9]/', '', $name_file);

                $name = 'Doc_'.$name_file.'_'.strtotime("now").'.'.strtolower($extension);
                $file = $file->move($destination, $name);

                $data['media'] = $destination.$name;

                $data["success"] = true;
            }else{
                $data['success'] = false;
                $data['message'] = 'Invalid file extension';
            }
        }

        
        return Response::json($data, 200, array());
    }

    public function wishlist()
    {
        $type = 1;

        if(Input::get('type') != ''){
            $type = Input::get('type');
        }
        $sidebar = 'wishlist';

        if($type == 1){
            $projects = Wishlist::select('projects.title','projects.feature_image','projects.location','projects.short_address','projects.cost','wishlist.*')->join('projects','projects.id','=','wishlist.item_id')->where('user_id',Auth::id())->where('type',$type)->get();
            return view('my_wishlist',compact('projects','sidebar'));
        }

        if($type == 2){
            $listings = Wishlist::select('listings.title','listings.feature_image','listings.location','listings.short_address','listings.price','wishlist.*')->join('listings','listings.id','=','wishlist.item_id')->where('user_id',Auth::id())->where('type',$type)->get();
            return view('my_wishlist',compact('listings','sidebar'));
        }

    }

    public function users()
    {
        if(Input::has('type')){
            $type = Input::get('type');
        }else{
            $type = 2;
        }
        $sidebar = 'users';
        $subsidebar = 'users';
        $users = User::where('priv',$type)->get();

        return view('users.list',compact('sidebar','subsidebar','users','type'));
    }

    public function settings()
    {
        
        $sidebar = 'settings';
        $subsidebar = 'settings';

        return view('users.settings',compact('sidebar','subsidebar'));
    }
    public function editSettings()
    {
        
        $sidebar = 'settings';
        $subsidebar = 'settings';

        return view('users.info',compact('sidebar','subsidebar'));
    }

    public function updateSettings()
    {
        
        $cre = [
            "first_name"=>Input::get("first_name"),
        ];
        
        $rules = [
            "first_name"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $user = User::find(Auth::id());
            $user->first_name = Input::get("first_name");
            $user->last_name = Input::get("last_name");
            $user->phone = Input::get("phone");
            $user->city = Input::get("city");
            $user->state = Input::get("state");
            $user->address = Input::get("address");

            $user->state = Input::get("state");
            

            $destination = 'uploads/';
            if(Input::hasFile('picture')){
                $file = Input::file('picture');
                $extension = Input::file('picture')->getClientOriginalExtension();
                if(in_array(strtolower($extension),['jpg','jpeg','png','gif','bmp'])){

                    $name_file = pathinfo(Input::file('picture')->getClientOriginalName(), PATHINFO_FILENAME);
                    $name_file = preg_replace('/[^a-zA-Z0-9]/', '', $name_file);

                    $name = 'pic_'.$name_file.'_'.strtotime("now").'.'.strtolower($extension);
                    $file = $file->move($destination, $name);

                    $user->picture = $destination.$name;

                }else{
                    return Redirect::back()->with('failure','Invalid file format ,please upload only jpeg or png file');
                }
            }

            $user->save();

            return Redirect::back()->with('success','Details is updated successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }

    public function forgetPassword(){
        return view('forget-password');
    }

    public function postForgetPassword(Request $request){
        $validator = Validator::make(["email"=>$request->email],["email"=>"required|email"]);
        if($validator->fails()){
            return Redirect::back()->withErrors($validator)->withInput();
        }
        
        $user = User::where('email',$request->email)->first();
        
        if(!$user){
            return Redirect::back()->withErrors($validator)->withInput()->with('failure','No user found with this email id');
        }

        $rand_pwd = User::getRandPassword();
        
        $user->password = Hash::make($rand_pwd);
        $user->check_password = $rand_pwd;
        $user->save();

        $mail = new MailQueue;
        $mail->mailto = $user->email;
        $mail->subject = "Realstate - Reset Password";
        $mail->content = view('mails',["user"=>$user , "type"=>"password_reset"]);
        $mail->save();

        return Redirect::to('/forget-password')->with('success','New password has been sent to your registered email id');

    }

    public function ratings(){
        $reviews = DB::table('seller_reviews')->select('seller_reviews.*','users.first_name','users.last_name' ,'u1.first_name as sf','u1.last_name as sl')
                ->join('users','users.id','=','seller_reviews.added_by')
                ->join('users as u1','u1.id','=','seller_reviews.seller_id')
                ->where('seller_reviews.status',0)
                ->get();
        $sidebar = 'rating_reviews';
        $subsidebar = 'rating_reviews';
        return view('users.ratings',compact('reviews','sidebar','subsidebar'));
    }

    public function approveRating($id)
    {
        $review = DB::table('seller_reviews')->where('id',$id)->first();
        $status = 1;
        if(Input::get('status') != ''){
            $status = Input::get('status');
        }
        if($review){
            DB::table('seller_reviews')->where('id',$id)->update(["status"=>$status]);
            $data['success'] = true;
        }else{
            $data['message'] = 'Invalid rating';
            $data['success'] = false;
        }
        return json_encode($data);
    }
    
	
}
