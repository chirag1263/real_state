<?php

namespace App\Http\Controllers;
use DB, App\LC,Request, Response, Input, Auth, Redirect, Validator, Hash;

class ListCategory extends Controller {

    public function index(){
        $lists = LC::get();
        $sidebar = "listings";
        $subsidebar = "2";

        return view('lc.index',compact('sidebar','subsidebar' , 'lists'));
    }

    public function add($lc_id = 0){

        $sidebar = "listings";
        $subsidebar = "2";

        return view('lc.add',compact('sidebar','subsidebar' , 'lc_id'));
    }

    public function store(){
        $cre = [
            'category_name'=>Input::get('category_name'),
            ];
        $rules = [
            'category_name' => 'required',
        ];

        $validator = Validator::make($cre,$rules);

        if ($validator->fails()) {
            $data['success'] = false;
            $data['message'] = $validator->errors()->first();

        } else {
            $list = LC::find(Input::get('id'));

            $data['message'] = ' List Category is updated successfully';
            if(!$list){
                $list = new LC;
                $data['message'] = 'New Category is added successfully';
            }
            
            $list->category_name = Input::get('category_name');

            $list->save();

            $data['success'] = true;
        }

        return Response::json($data,200,[]);
    }

    public function delete($lc_id){
        $list = LC::find($lc_id);
        
        $list->delete();

        return Redirect::back();
    }

    public function init(){
        $list = LC::where('id',Input::get('lc_id'))->first();
        
        $data['list'] = $list;
        $data['success'] = true;
        return Response::json($data,200,[]);
    }
}
