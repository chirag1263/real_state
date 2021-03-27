@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">{{$seller->first_name.' '.$seller->last_name}}</h2>
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
        <div class="col-md-7 col-12">
          <!-- get-in-toch -->
          @if($seller->picture)
            <img src="{{url($seller->picture)}}">
          @else
            <img src="avatar.png">
          @endif
          Seller Details

          <table class="table">
            <tr>
              <th>Name</th>
              <td>{{$seller->first_name}} {{$seller->last_name}}</td>
            </tr>

            <tr>
              <th>Email</th>
              <td>{{$seller->email}}</td>
            </tr>

            <tr>
              <th>Phone</th>
              <td>{{$seller->phone}}</td>
            </tr>
          </table>

          <ul class="list-items">
            @foreach($seller->reviews as $review)
            <li>
              {{$review->review}}
              <br>
              @for($i = 1; $i <=5 ; $i++)

                @if($i <= $review->rating)
                  <i class="fa fa-star"></i>
                @else
                  <i class="fa fa-star-o"></i>
                @endif

              @endfor
              <br>
                by {{$review->given_by}}
            </li>
            @endforeach
          </ul>

        </div>


        <div class="col-md-5 col-12">
          <div class="contact-messge grey-bg">
            <!-- blog-details-reply -->
            <div class="leave-review">
              <h5>Give Rating & Reviews</h5>
              {{Form::open(["url"=>"seller_review/".$seller->id , "method"=>"post"])}}
                <div id="rating_div">

                  <i class="fa fa-star-o rating" value="1"></i>
                  <i class="fa fa-star-o rating" value="2"></i>
                  <i class="fa fa-star-o rating" value="3"></i>
                  <i class="fa fa-star-o rating" value="4"></i>
                  <i class="fa fa-star-o rating" value="5"></i>


                </div>
                {{Form::hidden('rating_value')}}
                {{csrf_field()}}
                {{Form::textarea('review','',["placeholder"=>"write here"])}}
                <span>{{$errors->first('review')}}</span>
                @if(Auth::check())
                @endif
                @if(Auth::check())

                  <button type="submit" class="submit-btn-1">SUBMIT</button>
                @else
                  <button type="button" class="submit-btn-1 pop-login" action="{{url('seller_review/'.$seller->id)}}">SUBMIT</button>
                @endif
              {{Form::close()}}
              <p class="form-messege mb-0"></p>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- CONTACT AREA END -->

  <!-- GOOGLE MAP AREA END -->

</section>
<!-- End page content -->
@endsection