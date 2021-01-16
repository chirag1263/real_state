@extends('layout')

@section('content')
	<div class="body-content" style="padding: 20px;">
		<div class="row">
	    	<div class="col-md-12"><h3 class="page-title">Welcome {{Auth::user()->name}}</h3></div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('/dashboard')}}">
	                <div class="visual">
	                    <i class="fa fa-users"></i>
	            </div>
	                <div class="details text-right">
	                    <div class="number" style="background:none">
	                        <span data-counter1="counterup" data-value="1899">1899</span>
	                    </div>
	                    <div class="desc">Agents</div>
	                </div>
	            </a>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('/dashboard')}}">
	                <div class="visual">
	                    <i class="fa fa-envelope"></i>
	                </div>
	                <div class="details text-right">
	                    <div class="number" style="background:none">
	                        <span data-counter1="counterup" data-value="9898">9898</span>
	                    </div>
	                    <div class="desc">Users</div>
	                </div>
	            </a>
	        </div>
	    </div>
    </div>

@endsection