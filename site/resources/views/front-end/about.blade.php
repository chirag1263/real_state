@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">About</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

  <!-- ABOUT START -->
  <div class="about-sheltek-area ptb-115">
    <div class="container">
      <div class="row">
        <div class="col-md-6 col-12 order-md-2">
          <div class="section-title mb-30">
            <h3>SOME WORD </h3>
            <h2>ABOUT REAL ESTATE</h2>
          </div>
          <div class="about-sheltek-info">
            <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Rishikesh Real Estate</span> is the best theme for elit, sed do
              eiusmod tempor dolor sit amet, conse ctetur adipiscing elit, sed do eiusmod tempor
              incididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitation oris
            nisi ut aliquip ex ea commodo consequat. Duis aute irure dolo.</p>
            <p>Lorem is a dummy text do eiusmod tempor dolor sit amet, onsectetur adip iscing elit,
            sed do eiusmod tempor incididunt ut labore et lorna aliqua Ut enim onsectetur </p>
            <p>Lorem is a dummy text do eiusmod tempor dolor sit amet, onsectetur adip iscing elit,
            sed do eiusmod tempor incididunt ut labore et lorna aliqua Ut enim onsectetur </p>
          </div>
        </div>
        <div class="col-md-6 col-12 order-md-1">
          <div class="about-image">
            <img src="{{url('frontend/images/about/3.jpg')}}" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ABOUT END -->

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

</section>
<!-- End page content -->
@endsection