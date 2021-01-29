@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Our Services</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

  <!-- SERVICES AREA START -->
  <div class="services-area pt-60 pb-60">
    <div class="container">
      <div class="row">
        <div class="col-12">
          <div class="section-title-2 text-center">
            <h2>OUR SERVICES</h2>
            <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatdminim veniam, quis nostrud</p>
          </div>
        </div>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="service-carousel">
            <!-- service-item -->
            <div class="col">
              <div class="service-item">
                <div class="service-item-image">
                  <a href="service-details.html"><img src="{{url('/frontend/images\service\1.jpg')}}"></a>
                </div>
                <div class="service-item-info">
                  <h5><a href="service-details.html">Sale Property</a></h5>
                  <p>Property sale best theme for litdo eiusmod tempor dolor sit amet, conse
                  tetur adiping eiusmo</p>
                </div>
              </div>
            </div>
            <!-- service-item -->
            <div class="col">
              <div class="service-item">
                <div class="service-item-image">
                  <a href="service-details.html"><img src="{{url('/frontend/images\service\2.jpg')}}"></a>
                </div>
                <div class="service-item-info">
                  <h5><a href="service-details.html">Buy Property</a></h5>
                  <p>Property sale best theme for litdo eiusmod tempor dolor sit amet, conse
                  tetur adiping eiusmo</p>
                </div>
              </div>
            </div>
            <!-- service-item -->
            <div class="col">
              <div class="service-item">
                <div class="service-item-image">
                  <a href="service-details.html"><img src="{{url('/frontend/images\service\3.jpg')}}"></a>
                </div>
                <div class="service-item-info">
                  <h5><a href="service-details.html">Rent Property</a></h5>
                  <p>Property sale best theme for litdo eiusmod tempor dolor sit amet, conse
                  tetur adiping eiusmo</p>
                </div>
              </div>
            </div>
            <!-- service-item -->
            <div class="col">
              <div class="service-item">
                <div class="service-item-image">
                  <a href="service-details.html"><img src="{{url('/frontend/images\service\4.jpg')}}"></a>
                </div>
                <div class="service-item-info">
                  <h5><a href="service-details.html">Property Management</a></h5>
                  <p>Property sale best theme for litdo eiusmod tempor dolor sit amet, conse
                  tetur adiping eiusmo</p>
                </div>
              </div>
            </div>
            <!-- service-item -->
            <div class="col">
              <div class="service-item">
                <div class="service-item-image">
                  <a href="service-details.html"><img src="{{url('/frontend/images\service\4.jpg')}}"></a>
                </div>
                <div class="service-item-info">
                  <h5><a href="service-details.html">Sale Property</a></h5>
                  <p>Property sale best theme for litdo eiusmod tempor dolor sit amet, conse
                  tetur adiping eiusmo</p>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- SERVICES AREA END -->

  <!-- BRAND AREA START -->
  <div class="brand-area grey-bg pt-70 pb-75">
    <div class="container">
      <div class="section-title-2 text-center">
        <h2>Our Partners</h2>
        <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatdminim veniam, quis nostrud</p>
      </div>
      <div class="row">
        <div class="col-12">
          <div class="brand-carousel">
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="{{url('/frontend/images\brand\1.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="{{url('/frontend/images\brand\2.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="{{url('/frontend/images\brand\3.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="{{url('/frontend/images\brand\4.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="{{url('/frontend/images\brand\5.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="{{url('/frontend/images\brand\1.png')}}" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="{{url('/frontend/images\brand\4.png')}}" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BRAND AREA END -->
</section>
<!-- End page content -->

@endsection