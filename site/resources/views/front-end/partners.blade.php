@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Partners</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

  <!-- BRAND AREA START -->
  <div class="brand-area pt-100 pb-100">
    <div class="container">
      <div class="section-title-2 text-center">
        <p>Rishikesh Real Estate is the best theme for elit, sed do eiusmod tempor dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et lorna aliquatdminim veniam, quis nostrud</p>
      </div>
      <div class="row">
        @foreach($partners as $partner)
          <!-- brand-item -->
          <div class="col-3">
            <div class="text-center mb-5">
              <div class="brand-item mb-2">
                <img src="{{$partner->logo}}" alt="">
              </div>
              <h5>{{$partner->name}}</h5>
            </div>
          </div>
        @endforeach
      </div>
    </div>
  </div>
  <!-- BRAND AREA END -->

</section>
<!-- End page content -->
@endsection