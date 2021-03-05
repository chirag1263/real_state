<?php

namespace App\Http\Controllers;
use DB,App\User,Request, Response, Input, Auth, Redirect, Validator, Hash;
use App\LC,App\Project;

class ProjectController extends Controller {

  public function index(){
    $projects = Project::select('projects.*');
    if(Auth::user()->priv != 1){
      $projects =$projects->where('added_by',Auth::id());
    }
    $projects =$projects->get();
    $sidebar = "projects";
    $subsidebar = "projects-project";
    return view('projects.index',compact('sidebar','subsidebar' , 'projects'));
  }

  public function init(){
    $project = Project::find(Input::get('project_id'));
    if($project){

      $project->highlights = DB::table('project_highlights')->where('project_id',$project->id)->get();
      $project->specifications = DB::table('project_specifications')->where('project_id',$project->id)->get();
      $project->photos = DB::table('project_photos')->where('project_id',$project->id)->get();
      foreach ($project->photos as $row) {
        if($row->thumb){
          $row->th_photo_link = url($row->thumb);
        }
      }
      $data['formData'] = $project;
    }
    $data['categories'] = LC::get();
    $data['success'] = true;
    return Response::json($data,200,[]);
  }

  public function add(){
    if(Input::has('id')){

      $project_id = Input::get('id');
    }else{
      $project_id = 0;
    }


    $data['sidebar'] = "projects";
    $data['subsidebar'] = "add";
    $data['project_id'] = $project_id;
    $project = Project::find($project_id);
    if($project){
      $data['latitude'] = $project->latitude;
      $data['longitude'] = $project->longitude;
    }

    return view('projects.add',$data);
  }

    public function uploadGalleryPhotos() // multiple file upload
    {
      $files = Input::file('media');
      $destination = 'uploads/';

      include(app_path().'/libraries/resize_img.inc.php');

      foreach ($files as $file) {

        if($file){
          $extension = $file->getClientOriginalExtension();
          if(in_array($extension,['jpg','jpeg','png','JPEG','JPG','PNG'])){

            $name_file = pathinfo($file->getClientOriginalName(), PATHINFO_FILENAME);
            $name_file = preg_replace('/[^a-zA-Z0-9]/', '', $name_file);

            $name = 'Image'.substr($name_file, 0,20).'_'.strtotime("now").'.'.strtolower($extension);
            $file = $file->move($destination, $name);

            $temp["photo"] = $destination.$name;
            $resizer=new SimpleImage();
            $resizer->load(base_path().'/../'.$destination.$name);
            $resizer->resizeToWidth(400);
            $resizer->save(base_path().'/../'.$destination.'th_'.$name);
            $temp['thumb'] = $destination.'th_'.$name;
            $temp['th_photo_link'] = url($destination.'th_'.$name);
            $data['media'][] = $temp;
          }
        }

      }
      $data['success'] = true;
      return Response::json($data, 200, array());
    }

    public function store(){
      $cre = [
        'title'=>Input::get('title'),
      ];
      $rules = [
        'title' => 'required',
      ];

      $validator = Validator::make($cre,$rules);

      if ($validator->fails()) {
        $data['success'] = false;
        $data['message'] = $validator->errors()->first();

      } else {

        $highlights = Input::get('highlights');
        $specifications = Input::get('specifications');
        $photos = Input::get('photos');
        $project = Project::find(Input::get('id'));

        $data['message'] = 'Project is updated successfully';
        if(!$project){
          $project = new Project;
          $project->added_by = Auth::id();
          $data['message'] = 'New Project is added successfully';
        }

        $project->title = Input::get('title');
        $project->description = Input::get('description');
        $project->payment_plan = Input::get('payment_plan');
        $project->site_plan = Input::get('site_plan');
        $project->location_map = Input::get('location_map');
        $project->brochure = Input::get('brochure');
        $project->cost = Input::get('cost');
        $project->feature_image = Input::get('feature_image');
        $project->cover_image = Input::get('cover_image');

        $project->location = Input::get('location');
        $project->longitude = Input::get('longitude');
        $project->latitude = Input::get('latitude');
        $project->save();

        DB::table('project_highlights')->where('project_id',$project->id)->delete();
        foreach ($highlights as $item) {
          if(isset($item['highlight'])){

            if($item['highlight']){
              DB::table('project_highlights')->insert([
                "project_id" =>$project->id,
                "highlight" => $item['highlight'],
              ]);

            }

          }
        }


        DB::table('project_specifications')->where('project_id',$project->id)->delete();
        foreach ($specifications as $item) {
          if(isset($item['specification'])){

            if($item['specification']){
              DB::table('project_specifications')->insert([
                "project_id" =>$project->id,
                "specification" => $item['specification'],
              ]);

            }

          }
        }

        DB::table('project_photos')->where('project_id',$project->id)->delete();
        foreach ($photos as $item) {
          if(isset($item['photo'])){

            if($item['photo']){
              DB::table('project_photos')->insert([
                "project_id" =>$project->id,
                "photo" => $item['photo'],
                "thumb" => $item['thumb'],
              ]);

            }

          }
        }

        $data['success'] = true;


      }

      return Response::json($data,200,[]);
    }

    public function delete($project_id)
    {
      $project = Project::find($project_id);
      if($project){
        DB::table('project_highlights')->where('project_id',$project->id)->delete();
        DB::table('project_specifications')->where('project_id',$project->id)->delete();
        $project->delete();
        $data['success'] = true;
        $data['message'] = 'projecting is successfully removed';
      }else{
        $data['success'] = false;
        $data['message'] = 'Invalid request';
      }
      return json_encode($data);
    }

  }
