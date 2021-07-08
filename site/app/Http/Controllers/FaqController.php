<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;
use Illuminate\Foundation\Auth\AuthenticatesUsers;
use Illuminate\Support\Facades\Auth;
use Input,Redirect,Validator,Hash,Response,Session;
use App\Faq,DB;


class FaqController extends Controller {

	public function index(){

        $faqs = Faq::get();
        return view('faqs.index',['sidebar'=>'faqs','subsidebar'=>'faqs',"faqs"=>$faqs ]);
    }

    public function add(){
        return view('faqs.add',["sidebar"=>"faqs","subsidebar"=>"faqs"]);
    }

    public function edit($id){
        $faq = Faq::find($id);
        return view('faqs.add',["sidebar"=>"faqs","subsidebar"=>"faqs" ,"faq"=>$faq]);
    }

    public function store(){

        $cre = [
            "question"=>Input::get("question"),
            "answer"=>Input::get("answer"),

        ];
        $rules = [
            "question"=>"required",
            "answer"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $faq = new Faq;
            $faq->question = Input::get("question");
            $faq->answer = Input::get("answer");
            $faq->save();

            return Redirect::to('admin/faqs')->with('success','New faq is added successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }

    public function update($id){

        $cre = [
            "answer"=>Input::get("answer"),
            "question"=>Input::get("question"),

        ];
        
        $rules = [
            "question"=>"required|unique:faqs,question,".$id,
            "answer"=>"required",
        ];

        $validator = Validator::make($cre, $rules);
        if($validator->passes()){

            $faq = Faq::find($id);
            $faq->question = Input::get("question");
            $faq->answer = Input::get("answer");
            $faq->save();

            return Redirect::to('admin/faqs')->with('success','faq is updated successfully');
        }else{
            return Redirect::back()->withInput()->withErrors($validator)->with('failure','Please fill all required fields');
        }
    }
    
    public function delete($id)
    {
        $faq = DB::table('faqs')->where('id',$id)->first();
        if($faq){
            DB::table('faqs')->where('id',$id)->delete();
            $data['success'] = true;
        }else{
            $data['success'] = false;
            $data['message'] = "Faq is removed successfully";
        }
        return json_encode($data);

    }	
}
