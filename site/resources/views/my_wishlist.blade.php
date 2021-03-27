
@extends('layout')

@section('content')


<h2 class="page-title">My Wishlist</h2>

<ul class="nav nav-tabs">
	<li class="{{(Input::get('type') == 1)?'active':''}}"><a href="{{url('/wishlist?type=1')}}">Projects</a></li>
	<li class="{{(Input::get('type') == 2)?'active':''}}"><a href="{{url('/wishlist?type=2')}}">Listings</a></li>
</ul>


@if(isset($projects))
	@if(sizeof($projects) > 0)
		<div class="row">
			@foreach($projects as $index => $project)
				<div class="col-lg-3 col-md-6 col-12">
		            <div class="flat-item">
		              <div class="flat-item-image">
		                <a href="{{url('project-details/'.$project->id)}}"><img src="{{url($project->feature_image)}}" alt=""></a>
		                <div class="flat-link">
		                  <a href="{{url('project-details/'.$project->id)}}">More Details</a>
		                </div>
		              </div>
		              <div class="flat-item-info">
		                <div class="flat-title-price">
		                  <h5><a href="{{url('project-details/'.$project->id)}}">{{$project->title}} </a></h5>
		                </div>
		                <p><img src="{{url('frontend/images/icons/location.png')}}" alt="">{{$project->location}}</p>
		              </div>
		            </div>
		        </div>

			@endforeach
			
		</div>
	@else
		No wishlist item found
	@endif
	
@endif

@if(isset($listings))
	@if(sizeof($listings) > 0)
		<div class="row">
			
			@foreach($listings as $index => $list)
				<div class="col-lg-3 col-md-6 col-12">
					<div class="flat-item">
						<div class="flat-item-image">
							<span class="for-sale">{{$list->category_name}}</span>
							<a href="{{url('listing-details/'.$list->list_id)}}">@if($list->feature_image)<img src="{{url($list->feature_image)}}" alt="">@endif</a>
							<div class="flat-link">
								<a href="{{url('listing-details/'.$list->list_id)}}">More Details</a>
							</div>
						</div>
						<div class="flat-item-info">
							<div class="flat-title-price">
								<h5><a href="{{url('listing-details/'.$list->list_id)}}">{{$list->title}}</a></h5>
								<span class="price"><i class="fa fa-rupee"></i> {{$list->price}}</span>
							</div>
							<p><img src="{{url('/frontend/images/icons/location.png')}}" alt="">{{$list->location}}</p>
						</div>
					</div>
				</div>
			@endforeach
		</div>
	@else
		No wishlist item found
	@endif
	
@endif


@endsection