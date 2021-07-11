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
  <!-- CONTACT AREA START -->
  <div class="contact-area pt-75 pb-75">
    <div class="container">
      @if(Session::has('success'))
      <div class="alert alert-success mb-30">{{Session::get('success')}}</div>
      @endif

      @if(Session::has('failure'))
      <div class="alert alert-danger mb-30">{{Session::get('failure')}}</div>
      @endif
      <div class="row">
        <div class="col-md-7 col-12">
          <div class="row">
            <div class="col-md-3">
              <!-- get-in-toch -->
              @if($seller->picture)
              <div>
                <img src="{{url($seller->picture)}}">
              </div>
              @else
              <div>
                <img class="img-fuild border p-1" src="{{url('frontend/images/avatar/avatar-big.jpg')}}" style="max-width:150px">
              </div>
              @endif
            </div>
            <div class="col-md-9">
              <div>
                <h3 class="text-uppercase">{{$seller->first_name}} {{$seller->last_name}}</h3>
              </div>
              <div>
                <b>Email</b>: {{$seller->email}}
              </div>
              <!-- <div>
                <b>Phone</b>: {{$seller->phone}}
              </div> -->
              <div>
                <b>Rating</b>: {{$seller->rating ? round($seller->rating,1):0}}
              </div>
              <div>
                <b>Reviews</b>: {{$seller->reviews_count}}
              </div>
            </div>
          </div>
          <hr>
          <h4 class="text-uppercase mt-3">Read Customer Reviews:</h4>
          <ul class="list-items review-list-item">
            @if(sizeof($seller->reviews) > 0)
              @foreach($seller->reviews as $review)
              <li>
                </small>
                {{$review->review}}
                <br>
                <small>
                  @for($i = 1; $i <=5 ; $i++)

                    @if($i <= $review->rating)
                      <i class="fa fa-star"></i>
                    @else
                      <i class="fa fa-star-o"></i>
                    @endif
                  @endfor
                   - by {{$review->given_by}}
                </small>
              </li>
              @endforeach
            @else
              <div class="alert alert-danger mt-3">No Reviews Found.</div>
            @endif
          </ul>
        </div>
        <div class="col-md-5 col-12">
          <div class="contact-messge grey-bg">
            <!-- blog-details-reply -->
            <div class="leave-review">
              <h5 class="text-uppercase">Rate & Review Seller:</h5>
              {{Form::open(["url"=>"seller_review/".$seller->id , "method"=>"post"])}}
                <div id="rating_div" class="mb-3">
                  <i class="fa fa-star-o rating" value="1"></i>
                  <i class="fa fa-star-o rating" value="2"></i>
                  <i class="fa fa-star-o rating" value="3"></i>
                  <i class="fa fa-star-o rating" value="4"></i>
                  <i class="fa fa-star-o rating" value="5"></i>
                </div>
                {{Form::hidden('rating_value')}}
                {{csrf_field()}}
                {{Form::textarea('review','',["placeholder"=>"Write you review here..."])}}
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