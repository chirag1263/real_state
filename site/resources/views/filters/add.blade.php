@extends('layout')

@section('content')
	@if(Session::has("success"))
		<div class="alert alert-success">
			{{Session::get("success")}}
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h2 class="page-title">{{(isset($filter))?'Update filter':'Add Filter'}}</h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="{{url('/admin/filters')}}" class="btn blue" >Go Back</a>
		</div>
	</div>

	@if(isset($filter))
		{{Form::open(["url"=>"/admin/filters/update/".$filter->id,"method"=>"post"])}}
	@else
		{{Form::open(["url"=>"/admin/filters/store","method"=>"post"])}}
	@endif
	    
        <div class=" form-group">
            <label>Filter <span class="error">*</span></label>
            {{Form::text('filter_name',(isset($filter))?$filter->filter_name:'',["class"=>"form-control","required"=>"true"])}}
            <span class="errors">{{$errors->first('filter_name')}}</span>
        </div>
	    
        <button style="margin-top: 23px" class="btn blue">Submit</button>
    {{Form::close()}}

@endsection