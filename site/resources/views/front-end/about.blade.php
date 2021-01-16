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
            <h2>ABOUT SHELTEK</h2>
          </div>
          <div class="about-sheltek-info">
            <p><span data-placement="top" data-toggle="tooltip" data-original-title="The name you can trust" class="tooltip-content">Sheltek</span> is the best theme for elit, sed do
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
            <img src="images\about\3.jpg" alt="">
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- ABOUT END -->

  <!-- BOOKING AREA START -->
  <div class="booking-area bg-1 call-to-bg plr-140 pt-75">
    <div class="container-fluid">
      <div class="row">
        <div class="col-lg-3 col-md-4 col-12">
          <div class="section-title text-white">
            <h3>SOME</h3>
            <h2 class="h1">FUN FACTOR</h2>
          </div>
        </div>
        <div class="col-lg-9 col-md-8 col-12">
          <div class="booking-conternt  clearfix">
            <div class="counter-content">
              <!-- counter-item -->
              <div class="counter-item">
                <h2>
                  <i class="fa fa-home" aria-hidden="true"></i>
                  <span class="counter">999</span>
                </h2>
                <p>Projects Done</p>
              </div>
              <!-- counter-item -->
              <div class="counter-item">
                <h2>
                  <i class="fa fa-key" aria-hidden="true"></i>
                  <span class="counter">555</span>
                </h2>
                <p>Property Sold</p>
              </div>
              <!-- counter-item -->
              <div class="counter-item">
                <h2>
                  <i class="fa fa-smile-o" aria-hidden="true"></i>
                  <span class="counter">350</span>
                </h2>
                <p>Happy Clients</p>
              </div>
              <!-- counter-item -->
              <div class="counter-item">
                <h2>
                  <i class="fa fa-server" aria-hidden="true"></i>
                  <span class="counter">1500</span>
                </h2>
                <p>Property Listings</p>
              </div>
            </div>
            <div class="booking-imgae">
              <img src="images\others\booking.png" alt="">
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BOOKING AREA END -->
  <!-- BRAND AREA START -->
  <div class="brand-area pt-70 pb-75">
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
                <img src="images\brand\1.png" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="images\brand\2.png" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="images\brand\3.png" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="images\brand\4.png" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="images\brand\5.png" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="images\brand\1.png" alt="">
              </div>
            </div>
            <!-- brand-item -->
            <div class="col-md-12">
              <div class="brand-item">
                <img src="images\brand\4.png" alt="">
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- BRAND AREA END -->

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

</section>
<!-- End page content -->
@endsection