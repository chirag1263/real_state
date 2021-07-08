@extends('layout')

@section('content')
	@if(Session::has("success"))
		<div class="alert alert-success">
			{{Session::get("success")}}
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h2 class="page-title">{{(isset($faq))?'Update Faq':'Add Faq'}}</h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="{{url('/admin/faqs')}}" class="btn blue" >Go Back</a>
		</div>
	</div>

	@if(isset($faq))
		{{Form::open(["url"=>"/admin/faqs/update/".$faq->id,"method"=>"post"])}}
	@else
		{{Form::open(["url"=>"/admin/faqs/store","method"=>"post"])}}
	@endif
	    
        <div class=" form-group">
            <label>Question <span class="error">*</span></label>
            {{Form::text('question',(isset($faq))?$faq->question:'',["class"=>"form-control","required"=>"true"])}}
        </div>
        <div class=" form-group">
            <label>Answer <span class="error">*</span></label>
            {{Form::text('answer',(isset($faq))?$faq->answer:'',["class"=>"form-control","required"=>"true"])}}
        </div>
	    
        <button style="margin-top: 23px" class="btn blue">Submit</button>
    {{Form::close()}}

@endsection