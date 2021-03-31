@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Contact</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  @if(Session::has('success'))
  <div class="alert alert-success mb-30">{{Session::get('success')}}</div>
  @endif

  @if(Session::has('failure'))
  <div class="alert alert-danger mb-30">{{Session::get('failure')}}</div>
  @endif
  <!-- CONTACT AREA START -->
  <div class="contact-area pt-75 pb-75">
    <div class="container">
      <div class="row">
        <div class="col-md-5 col-12">
          <!-- get-in-toch -->
          <div class="get-in-toch">
            <div class="section-title mb-30">
              <h3>GET IN <b>TOUCH</b></h3>
            </div>
            <div class="contact-desc mb-50">
              <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit ame tse ctetur adipiscing elit, sed do eiusmod temporincididunt ut labore et lorna aliquatd minim veniam, quis nostrud exercitationoris nisi ut aliquip</p>
            </div>
            <ul class="contact-address">
              <li>
                <div class="contact-address-icon">
                  <img src="{{url('frontend/images/icons/location-2.png')}}" alt="">
                </div>
                <div class="contact-address-info">
                  <span>Dehradun Road, Rishikesh, </span>
                  <span>Uttarakhand, India - 249201</span>
                </div>
              </li>
              <li>
                <div class="contact-address-icon">
                  <img src="{{url('frontend/images/icons/phone-3.png')}}" alt="">
                </div>
                <div class="contact-address-info">
                  <span>+91 123-456-7890</span>
                  <span>+91 123-456-7890</span>
                </div>
              </li>
              <li>
                <div class="contact-address-icon">
                  <img src="{{url('frontend/images/icons/world.png')}}" alt="">
                </div>
                <div class="contact-address-info">
                  <span>Email: info@domain.com</span>
                  <span>Web:<a href="#" target="_blank"> www.domain.com</a></span>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <div class="col-md-7 col-12">
          <div class="contact-messge grey-bg">
            <!-- blog-details-reply -->
            <div class="leave-review">
              <h5>Leave a Message</h5>
              {{Form::open(["url"=>"contact-us","method"=>"post","id"=>"contact-form"])}}
                {{Form::text('name','',["placeholder"=>"Your Name"])}}
                <span>{{$errors->first('name')}}</span>
                {{Form::email('email','',["placeholder"=>"Email"])}}
                <span>{{$errors->first('email')}}</span>
                {{Form::textarea('message','',["placeholder"=>"Write here"])}}
                <span>{{$errors->first('message')}}</span>
                <button type="submit" class="submit-btn-1">SUBMIT</button>
              {{Form::close()}}
              <p class="form-messege mb-0"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CONTACT AREA END -->

  <!-- GOOGLE MAP AREA START -->
  <div class="google-map-area">
    <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d110471.29121008763!2d78.20056852030824!3d30.087660180173067!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x39093e67cf93f111%3A0xcc78804a6f941bfe!2sRishikesh%2C%20Uttarakhand!5e0!3m2!1sen!2sin!4v1610639225507!5m2!1sen!2sin" width="100%" height="350" frameborder="0" style="border:0;" allowfullscreen="" aria-hidden="false" tabindex="0"></iframe>
  </div>
  <!-- GOOGLE MAP AREA END -->

</section>
<!-- End page content -->
@endsection