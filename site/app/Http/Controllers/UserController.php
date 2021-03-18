<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Input,Redirect,Validator,Hash,Response,Session;
use App\User,DB,App\Wishlist;


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
                return Redirect::to('/dashboard');
			}else{
				return Redirect::back()->with('failure','Invalid username or password');
			}

		}else{
			$data['success'] = false;
			$data['message'] = $validator->errors()->first();
		}

		return Redirect::back()->with('failure',$data["message"]);
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
            $projects = Wishlist::select('projects.title','wishlist.*')->join('projects','projects.id','=','wishlist.item_id')->where('user_id',Auth::id())->where('type',$type)->get();
            return view('my_wishlist',compact('projects','sidebar'));
        }

        if($type == 2){
            $listings = Wishlist::select('listings.title','wishlist.*')->join('listings','listings.id','=','wishlist.item_id')->where('user_id',Auth::id())->where('type',$type)->get();
            return view('my_wishlist',compact('listings','sidebar'));
        }


    }
	
}
