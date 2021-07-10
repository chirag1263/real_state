<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Input,Redirect,Validator,Hash,Response,Session;
use DB;


class FilterController extends Controller {

	public function index(){

        $filters = DB::table('filters')->get();
        return view('filters.index',['sidebar'=>'filters','subsidebar'=>'filters',"filters"=>$filters ]);
    }

    public function add(){
        return view('filters.add',["sidebar"=>"filters","subsidebar"=>"filters"]);
    }

    public function edit($id){
        $filter = DB::table("filters")->where('id',$id)->first();
        return view('filters.add',["sidebar"=>"filters","subsidebar"=>"filters" ,"filter"=>$filter]);
    }

    public function store(){

        $cre = [
            "filter_name"=>Input::get("filter_name"),

        ];
        $rules = [
            "filter_name"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            DB::table("filters")->insert(["filter_name"=>Input::get('filter_name')]);

            return Redirect::to('admin/filters')->with('success','New filter is added successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }

    public function update($id){

        $cre = [
            "filter_name"=>Input::get("filter_name"),
        ];
        
        $rules = [
            "filter_name"=>"required|unique:filters,filter_name,".$id,
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){
            DB::table("filters")->where('id',$id)->update(["filter_name"=>Input::get('filter_name')]);
            return Redirect::to('admin/filters')->with('success','filter is updated successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }
    
    public function delete($id)
    {
        $filter = DB::table('filters')->where('id',$id)->first();
        if($filter){
            DB::table('filters')->where('id',$id)->delete();
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['message'] = "filter is removed successfully";
        }
        return json_encode($data);

    }	
}
