@extends('layout')

@section('content')
	@if(Session::has("success"))
		<div class="alert alert-success">
			{{Session::get("success")}}
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h2 class="page-title">{{(isset($slider))?'Update Slider':'Add Slider'}}</h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="{{url('/admin/sliders')}}" class="btn blue" >Go Back</a>
		</div>
	</div>

	@if(isset($slider))
		{{Form::open(["url"=>"/admin/sliders/update/".$slider->id,"method"=>"post","files"=>true])}}
	@else
		{{Form::open(["url"=>"/admin/sliders/store","method"=>"post","files"=>true])}}
	@endif
	    <div class="row">
	    	
	        <div class="col-md-12 form-group">
	            <label>Small Heading</label>
	            {{Form::text('small_heading',(isset($slider))?$slider->small_heading:'',["class"=>"form-control"])}}
	        </div>
	        <div class="col-md-12 form-group">
	            <label>Main Heading</label>
	            {{Form::text('main_heading',(isset($slider))?$slider->main_heading:'',["class"=>"form-control"])}}
	        </div>
	        <div class="col-md-12 form-group">
	            <label>Link</label>
	            {{Form::text('link',(isset($slider))?$slider->link:'',["class"=>"form-control"])}}
	        </div>
	        <div class="col-md-12 form-group">
	            <label>Description</label>
	            {{Form::text('description',(isset($slider))?$slider->description:'',["class"=>"form-control"])}}
	        </div>
	        <div class="col-md-6 form-group">
	            <label>Select Background </label>
	            {{Form::file('slider_image',["class"=>"form-control"])}}
	            @if(isset($slider))
	            	@if($slider->slider_image)
	            		<small><a href="{{url($slider->slider_image)}}" target="_blank">View</a></small>
	            	@endif
	            @endif
	        </div>
	    </div>
	    
        <button class="btn blue">Submit</button>
    {{Form::close()}}

@endsection