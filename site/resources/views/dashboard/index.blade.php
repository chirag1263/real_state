@extends('layout')

@section('content')
	<div class="body-content" style="padding: 20px;">
		<div class="row">
	    	<div class="col-md-12"><h3 class="page-title">Welcome {{Auth::user()->first_name}}</h3></div>
	    	@if(Auth::user()->priv == 1)
		        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('admin/users?type=2')}}">
		                <div class="visual">
		                    <i class="fa fa-users"></i>
		            </div>
		                <div class="details text-right">
		                    <div class="number" style="background:none">
		                        <span data-counter1="counterup" data-value="{{App\User::dashboard('admagents')}}">{{App\User::dashboard('agents')}}</span>
		                    </div>
		                    <div class="desc">Agents</div>
		                </div>
		            </a>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('admin/users?type=3')}}">
		                <div class="visual">
		                    <i class="fa fa-envelope"></i>
		                </div>
		                <div class="details text-right">
		                    <div class="number" style="background:none">
		                        <span data-counter1="counterup" data-value="{{App\User::dashboard('users')}}">{{App\User::dashboard('users')}}</span>
		                    </div>
		                    <div class="desc">Users</div>
		                </div>
		            </a>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 blue" href="{{url('admin/projects')}}">
		                <div class="visual">
		                    <i class="fa fa-building"></i>
		                </div>
		                <div class="details text-right">
		                    <div class="number" style="background:none">
		                        <span data-counter1="counterup" data-value="{{App\User::dashboard('projects')}}">{{App\User::dashboard('projects')}}</span>
		                    </div>
		                    <div class="desc">Projects</div>
		                </div>
		            </a>
		        </div>
		        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('admin/listings')}}">
		                <div class="visual">
		                    <i class="fa fa-list"></i>
		                </div>
		                <div class="details text-right">
		                    <div class="number" style="background:none">
		                        <span data-counter1="counterup" data-value="{{App\User::dashboard('listings')}}">{{App\User::dashboard('listings')}}</span>
		                    </div>
		                    <div class="desc">Listings</div>
		                </div>
		            </a>
		        </div>
		    @else

		    	<div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('wishlist?type=1')}}">
		                <div class="visual">
		                    <i class="fa fa-list"></i>
		                </div>
		                <div class="details text-right">
		                    <div class="number" style="background:none">
		                        <span data-counter1="counterup" data-value="{{App\User::dashboard('wishlist-projects')}}">{{App\User::dashboard('wishlist-projects')}}</span>
		                    </div>
		                    <div class="desc">Project in Wishlist</div>
		                </div>
		            </a>
		        </div>

		        <div class="col-lg-3 col-md-3 col-sm-6 col-xs-12">
		            <a class="dashboard-stat dashboard-stat-v2 green" href="{{url('wishlist?type=2')}}">
		                <div class="visual">
		                    <i class="fa fa-list"></i>
		                </div>
		                <div class="details text-right">
		                    <div class="number" style="background:none">
		                        <span data-counter1="counterup" data-value="{{App\User::dashboard('wishlist-listing')}}">{{App\User::dashboard('wishlist-listing')}}</span>
		                    </div>
		                    <div class="desc">Listing in Wishlist</div>
		                </div>
		            </a>
		        </div>

		        

	        @endif
	    </div>

	    <div class="featured-flat-area grey-bg pt-70 pb-50 mt-50">
		    <div class="container">
		      <h3 class="text-uppercase mb-20">Recently Visited Listings</h3>
		      <div class="featured-flat">
		        <div class="row">
		        	<?php $listings = App\User::dashboard('history-listing');?>

		          @foreach($listings as $row)
		            <div class="col-lg-4 col-md-6 col-12">
		              <div class="flat-item">
		                <div class="flat-item-image">
		                  <span class="for-sale">{{$row->category_name}}</span>
		                  <a href="{{url('listing-details/'.$row->list_id)}}">@if($row->feature_image)<img src="{{url($row->feature_image)}}" alt="">@endif</a>
		                  <div class="flat-link">
		                    <a href="{{url('listing-details/'.$row->list_id)}}">More Details</a>
		                  </div>
		                <div class="flat-item-info">
		                  <div class="flat-title-price">
		                    <h5><a href="{{url('listing-details/'.$row->list_id)}}">{{$row->title}}</a></h5>
		                    <span class="price"><i class="fa fa-rupee"></i> {{$row->price}}</span>
		                  </div>
		                  <p><img src="{{url('/frontend/images/icons/location.png')}}" alt="">{{$row->location}}</p>
		                </div>
		              </div>
		            </div>
		          @endforeach
		                
		        </div>
		      </div>
		    </div>
	  	</div>

	  	<div class="blog-area mt-50 pt-70 pb-50 grey-bg">
		    <div class="container">
		      <h3 class="text-uppercase mb-20">Recently Visited Projects</h3>
		      <div class="blog-carousel row">
		      	<?php $projects = App\User::dashboard('history-project');?>

		        @foreach($projects as $project)
		          <div class="col-md-3">
		            <article class="blog-item bg-gray">
		              <div class="blog-image">
		                <a href="{{url('/project-details/'.$project->id)}}"><img src="{{url($project->feature_image)}}" alt=""></a>
		              </div>
		              <div class="blog-info">
		                <div class="post-title-time">
		                  <h5><a href="{{url('/project-details/'.$project->id)}}">{{$project->title}}</a></h5>
		                  <p><small><i class="fa fa-map-marker"></i> {{$project->short_address}}</small></p>
		                </div>
		                <p>{{substr($project->description,0,100).'...'}}</p>
		                <a class="read-more" href="{{url('/project-details/'.$project->id)}}">Explore Now</a>
		              </div>
		            </article>
		          </div>
		        @endforeach
		      </div>
		    </div>
		  </div>
    </div>

@endsection