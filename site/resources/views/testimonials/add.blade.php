@extends('layout')

@section('content')
	@if(Session::has("success"))
		<div class="alert alert-success">
			{{Session::get("success")}}
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h2 class="page-title">{{(isset($testimonial))?'Update testimonial':'Add testimonial'}}</h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="{{url('/admin/testimonials')}}" class="btn blue" >Go Back</a>
		</div>
	</div>

	@if(isset($testimonial))
		{{Form::open(["url"=>"/admin/testimonials/update/".$testimonial->id,"method"=>"post"])}}
	@else
		{{Form::open(["url"=>"/admin/testimonials/store","method"=>"post"])}}
	@endif
	    
        <div class=" form-group">
            <label>Content <span class="error">*</span></label>
            {{Form::text('content',(isset($testimonial))?$testimonial->content:'',["class"=>"form-control","required"=>"true"])}}
        </div>
        <div class=" form-group">
            <label>By <span class="error">*</span></label>
            {{Form::text('user_name',(isset($testimonial))?$testimonial->user_name:'',["class"=>"form-control","required"=>"true"])}}
        </div>
	    
        <button style="margin-top: 23px" class="btn blue">Submit</button>
    {{Form::close()}}

@endsection