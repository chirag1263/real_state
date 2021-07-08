<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Input,Redirect,Validator,Hash,Response,Session;
use App\Testimonial,DB;


class TestimonialController extends Controller {

	public function index(){

        $testimonials = Testimonial::get();
        return view('testimonials.index',['sidebar'=>'testimonials','subsidebar'=>'testimonials',"testimonials"=>$testimonials ]);
    }

    public function add(){
        return view('testimonials.add',["sidebar"=>"testimonials","subsidebar"=>"testimonials"]);
    }

    public function edit($id){
        $testimonial = Testimonial::find($id);
        return view('testimonials.add',["sidebar"=>"testimonials","subsidebar"=>"testimonials" ,"testimonial"=>$testimonial]);
    }

    public function store(){

        $cre = [
            "content"=>Input::get("content"),
            "user_name"=>Input::get("user_name"),

        ];
        $rules = [
            "content"=>"required",
            "user_name"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $testimonial = new Testimonial;
            $testimonial->content = Input::get("content");
            $testimonial->user_name = Input::get("user_name");
            $testimonial->save();

            return Redirect::to('admin/testimonials')->with('success','New testimonial is added successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }

    public function update($id){

        $cre = [
            "user_name"=>Input::get("user_name"),
            "content"=>Input::get("content"),

        ];
        
        $rules = [
            "content"=>"required|unique:testimonials,content,".$id,
            "user_name"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $testimonial = Testimonial::find($id);
            $testimonial->content = Input::get("content");
            $testimonial->user_name = Input::get("user_name");
            $testimonial->save();

            return Redirect::to('admin/testimonials')->with('success','testimonial is updated successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }
    
    public function delete($id)
    {
        $testimonial = DB::table('testimonials')->where('id',$id)->first();
        if($testimonial){
            DB::table('testimonials')->where('id',$id)->delete();
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['message'] = "testimonial is removed successfully";
        }
        return json_encode($data);

    }	
}
