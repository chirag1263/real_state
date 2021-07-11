@extends('front-end.layout')
@section('content')
<!-- Slider Start -->
<div class="slider-1 pos-relative slider-overlay">
  <div class="bend niceties preview-1">
    <div id="ensign-nivoslider-3" class="slides">
      <?php $count=1;?>
      @foreach($slides as $slide)
        <img src="{{$slide->slider_image}}" alt="" title="#slider-direction-<?php echo $count;?>">
        <?php $count++;?>
      @endforeach
    </div>

    <?php $count=1;?>
    @foreach($slides as $slide)
    <!-- direction 1 -->
      <div id="slider-direction-<?php echo $count;?>" class="slider-direction">
        <div class="slider-content text-center">
          <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
            <h4 class="slider-1-title-1">{{$slide->small_heading}}</span></h4>
          </div>
          <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
            <h1 class="slider-1-title-2">{{$slide->main_heading}}</h1>
          </div>
          <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
            <p class="slider-1-desc">{{$slide->description}}
            </p>
          </div>
          <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
            <a class="slider-button mt-40" href="{{url('/listings')}}">Explore Now</a>
          </div>
        </div>
      </div>
      <?php $count++;?>
    @endforeach
  </div>
</div>
<!-- Slider End -->

<!-- Start Page Content -->
<section id="page-content" class="page-wrapper">
  <!-- About Start -->
  <div class="about-sheltek-area ptb-115">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-12">
          <div class="section-title mb-30">
            <h3>ABOUT</h3>
            <h2 class="text-uppercase">Rishikesh Real Estate</h2>
          </div>
          <div class="about-sheltek-info">
            <p>Rishikesh Real Estate is the best theme for elit, sed doeiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod temporincididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation orisnisi ut aliquip ex ea commodo consequat. Duis aute irure dolo.
            </p>
            <p>
              <b>We Deal In:</b>
            </p>
            <ul>
              <li><i class="fa fa-arrow-circle-right"></i>&nbsp; Sale Property</li>
              <li><i class="fa fa-arrow-circle-right"></i>&nbsp; Buy Property</li>
              <li><i class="fa fa-arrow-circle-right"></i>&nbsp; Rent Property</li>
              <li><i class="fa fa-arrow-circle-right"></i>&nbsp; Property Management</li>
            </ul>
          </div>
        </div>
        <div class="col-md-6 col-12">
          <div class="about-image">
            <a href="about.php"><img src="{{url('/frontend/images/about/3.jpg')}}" alt=""></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- About End -->
  <!-- OUR PROJECTS START -->
  <div class="blog-area pb-60">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-2 text-center">
            <h2>Our Projects</h2>
            <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit amet, consctetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatd
            minim veniam, quis nostrud</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="blog-carousel">
            @foreach($projects as $project)
              <div class="col">
                <article class="blog-item bg-gray">
                  <div class="blog-image">
                    <a href="{{url('/project-details/'.$project->id)}}"><img src="{{url($project->feature_image)}}" alt=""></a>
                  </div>
                  <div class="blog-info">
                    <div class="post-title-time">
                      <h5><a href="single-blog.html">{{$project->title}}</a></h5>
                      <p><small><i class="fa fa-map-marker"></i> {{$project->short_address}}</small></p>
                    </div>
                    <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                    <a class="read-more" href="{{url('/project-details/'.$project->id)}}">Explore Now</a>
                  </div>
                </article>
              </div>
            @endforeach
          </div>
          <div class="text-center">
            <a href="{{url('/projects')}}" class="green-btn">View All Projects &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- OUR PROJECTS END -->

  <!-- BOOKING AREA START -->
  <div class="booking-area bg-1 call-to-bg plr-140 pt-75">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-12">
          <div class="section-title text-white">
            <h3>BOOK YOUR</h3>
            <h2 class="h1">HOME HERE</h2>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12">
          <div class="booking-conternt clearfix">
            <div class="book-house text-white pl-30">
              <h2>BOOK YOUR APPARTMENT OR HOUSE </h2>
              <h2 class="h5">CALL US ON: +91 7895 456 123</h2>
            </div>
            <div class="booking-imgae">
              <img src="{{url('frontend/images/others/booking.png')}}" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BOOKING AREA END -->
  <!-- LISTINGS AREA START -->
  <div class="featured-flat-area pt-115 pb-80">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-2 text-center">
            <h2>Recent Listings</h2>
            <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatdminim veniam, quis nostrud
            </p>
          </div>
        </div>
      </div>
      <div class="featured-flat">
        <div class="row">
          @foreach($listings as $listing)
            <div class="col-lg-4 col-md-6 col-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <span class="for-sale">
                    {{$listing->category_name}}
                  </span>
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
        <div class="text-center mt-30">
          <a href="{{url('/listings')}}" class="green-btn">View All Listings &nbsp; <i class="fa fa-arrow-circle-right"></i></a>
        </div>
      </div>
    </div>
  </div>
  <!-- LISTINGS AREA END -->
  <!-- Testimonials Start -->
  <div class="features-area fix">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-7 offset-lg-5">
          <div class="features-info bg-gray">
            <div class="testimonial-area pb-70 pt-50">
              <div class="testimonial">
                <div class="section-title mb-30">
                  <h3>OUR</h3>
                  <h2 class="h1">HAPPY CLIENTS</h2>
                </div>
                <div class="testimonial-carousel dots-right-btm">
                  @foreach($testimonials as $testimonial)
                    <div class="testimonial-item">
                      <div class="testimonial-brief mb-3">
                        {{$testimonial->content}}
                      </div>
                      <h6>{{$testimonial->user_name}}</h6>
                    </div>
                  @endforeach
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- Testimonials End -->
  <!-- BRAND AREA START -->
  <div class="brand-area pt-115 pb-115">
    <div class="container">
      <div class="section-title-2 text-center">
        <h2>Our Partners</h2>
        <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatdminim veniam, quis nostrud</p>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="brand-carousel">
            @foreach($partners as $partner)
              <!-- brand-item -->
              <div class="col text-center">
                <div class="brand-item mb-2">
                  <img src="{{$partner->logo}}" alt="">
                </div>
                <h5>{{$partner->name}}</h5>
              </div>
            @endforeach
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BRAND AREA END -->
</section>
<!-- End Page Content -->

@endsection