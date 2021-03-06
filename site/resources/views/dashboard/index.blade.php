@extends('layout')

@section('content')
	<div class="body-content" style="padding: 20px;">
		<div class="row">
	    	<div class="col-md-12"><h3 class="page-title">Welcome {{Auth::user()->first_name}}</h3></div>
	    	@if(Auth::user()->priv == 1)
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('/dashboard')}}">
	                <div class="visual">
	                    <i class="fa fa-users"></i>
	            </div>
	                <div class="details text-right">
	                    <div class="number" style="background:none">
	                        <span data-counter1="counterup" data-value="326">326</span>
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
	                        <span data-counter1="counterup" data-value="1256">1256</span>
	                    </div>
	                    <div class="desc">Users</div>
	                </div>
	            </a>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('/dashboard')}}">
	                <div class="visual">
	                    <i class="fa fa-building"></i>
	                </div>
	                <div class="details text-right">
	                    <div class="number" style="background:none">
	                        <span data-counter1="counterup" data-value="521">521</span>
	                    </div>
	                    <div class="desc">Projects</div>
	                </div>
	            </a>
	        </div>
	        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
	            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('/dashboard')}}">
	                <div class="visual">
	                    <i class="fa fa-list"></i>
	                </div>
	                <div class="details text-right">
	                    <div class="number" style="background:none">
	                        <span data-counter1="counterup" data-value="1589">1589</span>
	                    </div>
	                    <div class="desc">Listings</div>
	                </div>
	            </a>
	        </div>
	        @endif
	    </div>
    </div>

@endsection