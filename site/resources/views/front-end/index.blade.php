@extends('front-end.layout')
@section('content')
<!-- Slider Start -->
<div class="slider-1 pos-relative slider-overlay">
  <div class="bend niceties preview-1">
    <div id="ensign-nivoslider-3" class="slides">
      <img src="{{url('/frontend/images/slider/1.jpg')}}" alt="" title="#slider-direction-1">
      <img src="{{url('/frontend/images/slider/2.jpg')}}" alt="" title="#slider-direction-2">
      <img src="{{url('/frontend/images/slider/1.jpg')}}" alt="" title="#slider-direction-3">
    </div>
    <!-- direction 1 -->
    <div id="slider-direction-1" class="slider-direction">
      <div class="slider-content text-center">
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4 class="slider-1-title-1">Welcome to <span>Rishikesh Real Estate</span></h4>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
          <h1 class="slider-1-title-2">FIND YOUR DREAM PROPERTY WITH US</h1>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
          <p class="slider-1-desc">If you are searching to buy or rent a land, apartment, independent house, villa <br>in Rishikesh Uttarakhand then search from our listings and enquire now. 
          </p>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
          <a class="slider-button mt-40" href="listings.php">Explore Now</a>
        </div>
      </div>
    </div>
    <!-- direction 2 -->
    <div id="slider-direction-2" class="slider-direction">
      <div class="slider-content text-left">
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4 class="slider-1-title-1">Welcome to <span>Rishikesh Real Estate</span></h4>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
          <h1 class="slider-1-title-2">SALE OR RENT YOUR PROPERTY</h1>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
          <p class="slider-1-desc">Want to sale or rent your property, we have organised everything for you. <br>Login now and add your property listing with us. 
          </p>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
          <a class="slider-button mt-40" href="login.php">Explore Now</a>
        </div>
      </div>
    </div>
    <!-- direction 2 -->
    <div id="slider-direction-3" class="slider-direction">
      <div class="slider-content text-right">
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="0.5s">
          <h4 class="slider-1-title-1">Welcome to <span>Rishikesh Real Estate</span></h4>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1s">
          <h1 class="slider-1-title-2">Our Upcoming Projects</h1>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="1.5s">
          <p class="slider-1-desc">If you are interested in 1BHK, 2BHK, 3BHK or individual villas,<br> have a look at our upcoming projects and pick yours. 
          </p>
        </div>
        <div class="wow fadeInUp" data-wow-duration="1s" data-wow-delay="2s">
          <a class="slider-button mt-40" href="projects.php">Explore Now</a>
        </div>
      </div>
    </div>
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
                      <p><small><i class="fa fa-map-marker"></i> {{$project->location}}</small></p>
                    </div>
                    <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                    <a class="read-more" href="{{url('/project-details/'.$project->id)}}">Explore Now</a>
                  </div>
                </article>
              </div>
            @endforeach
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
          <?php for($i=1;$i<=9;$i++){?>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <?php if($i%2!=0){?><span class="for-sale">For Sale</span><?php }?>
                  <a href="project-details.php"><img src="{{url('frontend/images/flat/'.$i.'.jpg')}}" alt=""></a>
                  <div class="flat-link">
                    <a href="listing-details.php">More Details</a>
                  </div>
                </div>
                <div class="flat-item-info">
                  <div class="flat-title-price">
                    <h5><a href="project-details.php">Listing Title {{$i}} </a></h5>
                    <span class="price">$52,350</span>
                  </div>
                  <p><img src="{{url('frontend/images/icons/location.png')}}" alt="">568 E 1st Ave, Ney Jersey</p>
                </div>
              </div>
            </div>
          <?php }?>
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
                  <?php for($i=1;$i<=3;$i++){?>
                    <div class="testimonial-item">
                      <div class="testimonial-brief">
                        <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit amet, conse cteturadipiscing elit, ed do eiusmod tempor incididunt ut labore etlorna aliquatd minim veniam, quis nostrud exercitation oris nisiut aliquip ex ea commodo equat. Duis aute irure dolo. liquatdminim veniam, quis nostrud exercitation oris nisi ut aliquip exea commodo equat. Duis aute irure dolo uis nostrud exercitation
                        </p>
                      </div>
                      <h6>Zasica Luci, <span>CEO</span></h6>
                    </div>
                  <?php }?>
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
      <div class="row">
        <div class="col-12">
          <div class="brand-carousel">
            <!-- brand-item -->
            <div class="col">
              <div class="brand-item">
                <img src="{{url('/frontend/images/brand/1.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col">
              <div class="brand-item">
                <img src="{{url('/frontend/images/brand/2.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col">
              <div class="brand-item">
                <img src="{{url('/frontend/images/brand/3.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col">
              <div class="brand-item">
                <img src="{{url('/frontend/images/brand/4.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col">
              <div class="brand-item">
                <img src="{{url('/frontend/images/brand/5.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col">
              <div class="brand-item">
                <img src="{{url('/frontend/images/brand/1.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col">
              <div class="brand-item">
                <img src="{{url('/frontend/images/brand/4.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BRAND AREA END -->
</section>
<!-- End Page Content -->

@endsection