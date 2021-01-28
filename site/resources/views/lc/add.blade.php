@extends('layout')

@section('content')
	@if(Session::has("success"))
		<div class="alert alert-success">
			{{Session::get("success")}}
		</div>
	@endif
	<div class="row">
		<div class="col-md-6">
			<h2 class="page-title">{{($lc_id > 0)?'Update List Category':'Add List Category'}}</h2>
		</div>
		<div class="col-md-6 text-right">
			<a href="{{url('/admin/list-categories')}}" class="btn blue" >Go Back</a>
		</div>
	</div>
	
    <div ng-controller="LCCtrl" ng-init="lc_id={{(isset($lc_id))?$lc_id:''}};init()">
        
        <form name="codeForm" ng-submit="onSubmit(codeForm.$valid)" novalidate>
            <div class="row">
                <div class="col-md-4 form-group">
                    <label>Category Name <span class="error">*</span></label>
                    <input type="text" ng-model="formData.category_name" class="form-control" required>
                </div>
                
                <div  class="col-md-4">
                    <button style="margin-top: 23px" class="btn blue">Submit</button>
                </div>
            </div>
            

        </form>
    </div>

@endsection