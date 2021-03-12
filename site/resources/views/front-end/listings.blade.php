@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Our Listings</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- FEATURED FLAT AREA START -->
  <div class="featured-flat-area pt-115 pb-60">
    <div class="container">
      <div class="featured-flat">
        <div class="row">
          @foreach($listings as $listing)
            <div class="col-lg-4 col-md-6 col-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <span class="for-sale">{{$listing->category_name}}</span>
                  <a href="{{url('listing-details/'.$listing->id)}}"><img src="{{$listing->feature_image}}" alt=""></a>
                  <div class="flat-link">
                    <a href="{{url('listing-details/'.$listing->id)}}">More Details</a>
                  </div>
                </div>
                <div class="flat-item-info">
                  <div class="flat-title-price">
                    <h5><a href="{{url('listing-details/'.$listing->id)}}">{{$listing->title}}</a></h5>
                    <span class="price"><i class="fa fa-rupee"></i> {{$listing->price}}</span>
                  </div>
                  <p><img src="{{url('/frontend/images/icons/location.png')}}" alt="">{{$listing->short_address}}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>  
        <!-- pagination-area -->
        <div class="pagination-area mt-50 mb-60">
          <ul class="pagination-list text-center">
            <li><a href="javascript:;"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
            <li><a href="javascript:;">1</a></li>
            <li><a href="javascript:;">2</a></li>
            <li><a href="javascript:;"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- FEATURED FLAT AREA END -->
</section>
<!-- End page content -->

@endsection