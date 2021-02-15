<?php

namespace App\Http\Controllers;
use DB,App\User,Request, Response, Input, Auth, Redirect, Validator, Hash;
use App\LC,App\Lists;

class ListingController extends Controller {

    public function index(){
        $listings = Lists::listing()->get();
        $sidebar = "listings";
        $subsidebar = "listings-list";
        return view('listings.index',compact('sidebar','subsidebar' , 'listings'));
    }

    public function init(){
        $list = Lists::find(Input::get('list_id'));
        if($list){

            $list->highlights = DB::table('list_highlights')->where('list_id',$list->id)->get();
            $list->specifications = DB::table('list_specifications')->where('list_id',$list->id)->get();
            $data['formData'] = $list;
        }
        $data['categories'] = LC::get();
        $data['success'] = true;
        return Response::json($data,200,[]);
    }

    public function add($list_id = 0){

        $sidebar = "listings";
        $subsidebar = "add";

        return view('listings.add',compact('sidebar','subsidebar' , 'list_id'));
    }

    public function store(){
        $cre = [
            'list_category_id'=>Input::get('list_category_id'),
            'title'=>Input::get('title'),
            'price'=>Input::get('price'),
        ];
        $rules = [
            'list_category_id' => 'required',
            'title' => 'required',
            'price' => 'required',
        ];

        $validator = Validator::make($cre,$rules);

        if ($validator->fails()) {
            $data['success'] = false;
            $data['message'] = $validator->errors()->first();

        } else {

            $highlights = Input::get('highlights');
            $specifications = Input::get('specifications');
            $list = Lists::find(Input::get('id'));

            $data['message'] = 'Listing is updated successfully';
            if(!$list){
                $list = new Lists;
                $data['message'] = 'New listing is added successfully';
            }

            $list->title = Input::get('title');
            $list->list_category_id = Input::get('list_category_id');
            $list->location = Input::get('location');
            $list->price = Input::get('price');
            $list->description = Input::get('description');
            $list->attachment = Input::get('attachment');
            $list->feature_image = Input::get('feature_image');
            $list->cover_image = Input::get('cover_image');
            $list->thumb = Input::get('thumb');
            $list->save();

            DB::table('list_highlights')->where('list_id',$list->id)->delete();
            foreach ($highlights as $item) {
                if(isset($item['highlight'])){

                    if($item['highlight']){
                        DB::table('list_highlights')->insert([
                            "list_id" =>$list->id,
                            "highlight" => $item['highlight'],
                        ]);

                    }

                }
            }


            DB::table('list_specifications')->where('list_id',$list->id)->delete();
            foreach ($specifications as $item) {
                if(isset($item['specification'])){

                    if($item['specification']){
                        DB::table('list_specifications')->insert([
                            "list_id" =>$list->id,
                            "specification" => $item['specification'],
                        ]);

                    }

                }
            }


            
            $data['success'] = true;
            

        }

        return Response::json($data,200,[]);
    }

    public function delete($list_id)
    {
        $list = Lists::find($list_id);
        if($list){
            DB::table('list_highlights')->where('list_id',$list->id)->delete();
            DB::table('list_specifications')->where('list_id',$list->id)->delete();
            $list->delete();
            $data['success'] = true;
            $data['message'] = 'Listing is successfully removed';
        }else{
            $data['success'] = false;
            $data['message'] = 'Invalid request';
        }
        return json_encode($data);
    }

}
