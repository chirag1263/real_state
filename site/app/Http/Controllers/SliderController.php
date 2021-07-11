<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Input,Redirect,Validator,Hash,Response,Session;
use App\slider,DB,App\User;


class SliderController extends Controller {

	public function index(){

        $sliders = Slider::get();
        return view('sliders.index',['sidebar'=>'sliders','subsidebar'=>'sliders',"sliders"=>$sliders ]);
    }

    public function add(){
        return view('sliders.add',["sidebar"=>"sliders","subsidebar"=>"sliders"]);
    }

    public function edit($id){
        $slider = Slider::find($id);
        return view('sliders.add',["sidebar"=>"sliders","subsidebar"=>"sliders" ,"slider"=>$slider]);
    }

    public function store(){

        $slider = new Slider;
        $slider->small_heading = Input::get("small_heading");
        $slider->main_heading = Input::get("main_heading");
        $slider->link = Input::get("link");
        $slider->description = Input::get("description");
        $destination = 'uploads/';
        if(Input::hasFile('slider_image')){
            $file = Input::file('slider_image');
            $extension = Input::file('slider_image')->getClientOriginalExtension();
            if(in_array($extension,User::fileExtensions())){

                $name_file = pathinfo(Input::file('slider_image')->getClientOriginalName(), PATHINFO_FILENAME);
                $name_file = preg_replace('/[^a-zA-Z0-9]/', '', $name_file);

                $name = 'pslider_image_'.$name_file.'_'.strtotime("now").'.'.strtolower($extension);
                $file = $file->move($destination, $name);

                $slider->slider_image = $destination.$name;
            }
        }

        $slider->save();

        return Redirect::to('admin/sliders')->with('success','New slider is added successfully');
    }

    public function update($id){

        $slider = Slider::find($id);
        $slider->small_heading = Input::get("small_heading");
        $slider->main_heading = Input::get("main_heading");
        $slider->description = Input::get("description");
        $slider->link = Input::get("link");
        $destination = 'uploads/';
        if(Input::hasFile('slider_image')){
            $file = Input::file('slider_image');
            $extension = Input::file('slider_image')->getClientOriginalExtension();
            if(in_array($extension,User::fileExtensions())){

                $name_file = pathinfo(Input::file('slider_image')->getClientOriginalName(), PATHINFO_FILENAME);
                $name_file = preg_replace('/[^a-zA-Z0-9]/', '', $name_file);

                $name = 'pslider_image_'.$name_file.'_'.strtotime("now").'.'.strtolower($extension);
                $file = $file->move($destination, $name);

                $slider->slider_image = $destination.$name;
            }
        }
        $slider->save();

        return Redirect::to('admin/sliders')->with('success','slider is updated successfully');
    }
    
    public function delete($id)
    {
        $slider = DB::table('sliders')->where('id',$id)->first();
        if($slider){
            DB::table('sliders')->where('id',$id)->delete();
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['message'] = "slider is removed successfully";
        }
        return json_encode($data);

    }	
}
