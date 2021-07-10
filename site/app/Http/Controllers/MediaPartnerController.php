<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Input,Redirect,Validator,Hash,Response,Session;
use App\Partner,DB,App\User;


class MediaPartnerController extends Controller {

	public function index(){

        $partners = Partner::get();
        return view('media_partners.index',['sidebar'=>'partners','subsidebar'=>'partners',"partners"=>$partners ]);
    }

    public function add(){
        return view('media_partners.add',["sidebar"=>"partners","subsidebar"=>"partners"]);
    }

    public function edit($id){
        $partner = Partner::find($id);
        return view('media_partners.add',["sidebar"=>"partners","subsidebar"=>"partners" ,"partner"=>$partner]);
    }

    public function store(){

        $cre = [
            "name"=>Input::get("name"),
        ];
        $rules = [
            "name"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $partner = new Partner;
            $partner->name = Input::get("name");
            $destination = 'uploads/';
            if(Input::hasFile('logo')){
                $file = Input::file('logo');
                $extension = Input::file('logo')->getClientOriginalExtension();
                if(in_array($extension,User::fileExtensions())){

                    $name_file = pathinfo(Input::file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
                    $name_file = preg_replace('/[^a-zA-Z0-9]/', '', $name_file);

                    $name = 'plogo_'.$name_file.'_'.strtotime("now").'.'.strtolower($extension);
                    $file = $file->move($destination, $name);

                    $partner->logo = $destination.$name;
                }
            }

            $partner->save();

            return Redirect::to('admin/partners')->with('success','New partner is added successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }

    public function update($id){

        $cre = [
            "name"=>Input::get("name"),
        ];
        
        $rules = [
            "name"=>"required"
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $partner = Partner::find($id);
            $partner->name = Input::get("name");
            $destination = 'uploads/';
            if(Input::hasFile('logo')){
                $file = Input::file('logo');
                $extension = Input::file('logo')->getClientOriginalExtension();
                if(in_array($extension,User::fileExtensions())){

                    $name_file = pathinfo(Input::file('logo')->getClientOriginalName(), PATHINFO_FILENAME);
                    $name_file = preg_replace('/[^a-zA-Z0-9]/', '', $name_file);

                    $name = 'plogo_'.$name_file.'_'.strtotime("now").'.'.strtolower($extension);
                    $file = $file->move($destination, $name);

                    $partner->logo = $destination.$name;
                }
            }
            $partner->save();

            return Redirect::to('admin/partners')->with('success','partner is updated successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }
    
    public function delete($id)
    {
        $partner = DB::table('partners')->where('id',$id)->first();
        if($partner){
            DB::table('partners')->where('id',$id)->delete();
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['message'] = "partner is removed successfully";
        }
        return json_encode($data);

    }	
}
