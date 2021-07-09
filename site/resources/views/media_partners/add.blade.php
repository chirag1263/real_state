@extends('layout')

@section('content')
	@if(Session::has("success"))
		<div class="alert alert-success">
			{{Session::get("success")}}
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h2 class="page-title">{{(isset($partner))?'Update partner':'Add partner'}}</h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="{{url('/admin/partners')}}" class="btn blue" >Go Back</a>
		</div>
	</div>

	@if(isset($partner))
		{{Form::open(["url"=>"/admin/partners/update/".$partner->id,"method"=>"post","files"=>true])}}
	@else
		{{Form::open(["url"=>"/admin/partners/store","method"=>"post","files"=>true])}}
	@endif
	    <div class="row">
	    	
	        <div class="col-md-6 form-group">
	            <label>Name <span class="error">*</span></label>
	            {{Form::text('name',(isset($partner))?$partner->name:'',["class"=>"form-control","required"=>"true"])}}
	        </div>
	        <div class="col-md-6 form-group">
	            <label>Logo <span class="error">*</span></label>
	            {{Form::file('logo',["class"=>"form-control"])}}
	            @if(isset($partner))
	            	@if($partner->logo)
	            		<small><a href="{{url($partner->logo)}}" target="_blank">View</a></small>
	            	@endif
	            @endif
	        </div>
	    </div>
	    
        <button class="btn blue">Submit</button>
    {{Form::close()}}

@endsection