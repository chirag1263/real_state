@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70" style="background: url({{url('frontend/images/bg/5.jpg')}});">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">FAQs</h2>
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
      @foreach($faqs as $faq)
        <div class="single-faq mb-4">
          <h5>Q: {{$faq->question}}</h5>
          <div class="content">
            {{$faq->answer}}
          </div>
        </div>
      @endforeach
    </div>
  </div>
</div>
<!-- ABOUT END -->

</section>
<!-- End page content -->
@endsection