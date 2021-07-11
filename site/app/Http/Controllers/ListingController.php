<?php

namespace App\Http\Controllers;
use DB,App\User,Request, Response, Input, Auth, Redirect, Validator, Hash;
use App\LC,App\Lists;

class ListingController extends Controller {

  public function index(){
    $type = 0;

    if(Input::has('type')){
      $type = Input::get("type");
    }
    $sql = Lists::listing()->where('listings.status',$type);
    if(Auth::user()->priv != 1){
      $sql =$sql->where('added_by',Auth::id());
    }

    $total = $sql->count();
    $max_per_page = 100;
    $total_pages = ceil($total/$max_per_page);
    if(Input::has('page')){
      $page_id = Input::get('page');
    } else {
      $page_id = 1;
    }

    $input_string = 'admin/listings?';
    $count_string = 0;
    foreach (Input::all() as $key => $value) {
      if($key != 'page'){
        $input_string .= ($count_string == 0)?'':'&';
        $input_string .= $key.'='.$value;
        $count_string++;
      }
    }

    if(Input::has('exportExcel') && Input::get('exportExcel') == 1){

      $listings = $sql->get();
    }else{

      $listings = $sql->skip(($page_id-1)*$max_per_page)->take($max_per_page)->get();
    }

    $sidebar = "listings";
    $subsidebar = "listings-list";
    return view('listings.index',['sidebar'=>$sidebar,'subsidebar'=>$subsidebar,"listings"=>$listings,'flag'=>1,"total" => $total, "page_id"=>$page_id, "max_per_page" => $max_per_page, "total_pages" => $total_pages,'input_string'=>$input_string,"type"=>$type ]);
  }

  

  public function init(){
    $list = Lists::find(Input::get('list_id'));
    if($list){

      $list->highlights = DB::table('list_highlights')->where('list_id',$list->id)->get();
      $list->specifications = DB::table('list_specifications')->where('list_id',$list->id)->get();
      $list->photos = DB::table('listing_photos')->where('list_id',$list->id)->get();
      $list->filters = DB::table('listing_filters')->where('listing_id',$list->id)->pluck('filter_id')->all();
      foreach ($list->photos as $photo) {
          $photo->th_photo_link = url($photo->thumb);
      }
      
      $data['formData'] = $list;
    }
    $data['filters'] = DB::table("filters")->get();
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
                $list->added_by = Auth::id();
                $data['message'] = 'New listing is added successfully';
            }

            $list->title = Input::get('title');
            $list->list_category_id = Input::get('list_category_id');
            $list->location = Input::get('location');
            $list->short_address = Input::get('short_address');
            $list->price = Input::get('price');
            $list->description = Input::get('description');
            $list->attachment = Input::get('attachment');
            $list->feature_image = Input::get('feature_image');
            $list->cover_image = Input::get('cover_image');
            $list->thumb = Input::get('thumb');
            $list->save();

            DB::table('listing_filters')->where('listing_id',$list->id)->delete();
            foreach(Input::get('filters') as $key=>$value){
                if($value){

                  DB::table('listing_filters')->insert([
                    "listing_id" =>$list->id,
                    "filter_id" => $value,
                  ]);
                }
            }

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
            $photos = Input::get('photos');
            DB::table('listing_photos')->where('list_id',$list->id)->delete();
            foreach ($photos as $item) {
                if(isset($item['photo'])){

                    if($item['photo']){
                        DB::table('listing_photos')->insert([
                            "list_id" =>$list->id,
                            "photo" => $item['photo'],
                            "thumb" => $item['thumb'],
                        ]);

                    }

                }
            }


            
            $data['success'] = true;
            

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

  public function toggleStatus($list_id,$status)
    {
        $list = Lists::find($list_id);
        if($list){
            $list->status = $status;
            $list->save();
            $data['success'] = true;
            if($list->status==0){

              $data['message'] = 'Listing is marked pending';
            }else{

              $data['message'] = 'Listing is successfully approved';
            }
      }else{
        $data['success'] = false;
        $data['message'] = 'Invalid request';
      }
      return json_encode($data);
    }

}
