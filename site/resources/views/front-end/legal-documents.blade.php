@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70" style="background: url({{url('frontend/images/bg/5.jpg')}});">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Legal Documents</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- ABOUT START -->
  <div class="ptb-100">
    <div class="container">
      <div class="">
        <h2 class="text-uppercase">Legal Forms: Commercial Property In Rishikesh</h2>
        <h4>List of Documents required to Buy/Sell/Lease a Property:</h4>
        <div class="row mt-3">
          <div class="col-md-4">
            <h4>Buyer</h4>
            <ul>
              <li><i class="fa fa-check-square"></i>&nbsp; Covering Letter</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Indeminity Bond duly Attested</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Affidavit duly attested</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Original Transfer permission Letter</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Original General Power of Attorney</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Certified copy of Sale Deed</li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4>Seller</h4>
            <ul>
              <li><i class="fa fa-check-square"></i>&nbsp; General Power of Attorney</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Agreement</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Affidavit</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Earnest Money Advance Receipt</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Full and Final Payment Receipt</li>
            </ul>
          </div>
          <div class="col-md-4">
            <h4>Broker</h4>
            <ul>
              <li><i class="fa fa-check-square"></i>&nbsp; Agreement to Buy and Sell</li>
              <li><i class="fa fa-check-square"></i>&nbsp; Rent Agreement</li>
            </ul>
          </div>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- ABOUT END -->

</section>
<!-- End page content -->
@endsection