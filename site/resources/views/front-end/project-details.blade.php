@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Project Details</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->
<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- PROJECT DETAILS AREA START -->
  <div class="properties-details-area pt-115 pb-60">
    <div class="container">
      @if(Session::has('success'))
      <div class="alert alert-success mb-30">{{Session::get('success')}}</div>
      @endif
      <div class="row">
        <div class="col-lg-8">
          <!-- pro-details-image -->
          <div class="pro-details-image mb-60">
            <div class="pro-details-big-image">
              <div class="tab-content" id="pills-tabContent">
                @foreach($project->photos as $index => $photo)
                  <div class="tab-pane fade show {{$index+1 == 1 ?'active':''}}" id="pro-{{$index+1}}" role="tabpanel" aria-labelledby="pro-{{$index+1}}-tab">
                    <a href="{{url($photo->photo)}}" data-lightbox="image-{{$index+1}}" data-title="Listings - {{$index+1}}">
                      <img class="w-100" src="{{url($photo->photo)}}" alt="">
                    </a>
                  </div>
                @endforeach
              </div>
            </div>
            <ul class="nav nav-pills pro-details-navs" id="pills-tab" role="tablist">
            @foreach($project->photos as $index => $photo)
              <li class="nav-item">
                <a class="nav-link {{$index+1 == 1 ?'active':''}}" id="pro-{{$index+1}}-tab" data-toggle="pill" href="#pro-{{$index+1}}" role="tab" aria-controls="pro-{{$index+1}}" aria-selected="true"><img src="{{url($photo->thumb)}}" alt=""></a>
              </li>
            @endforeach
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <aside>
            <!-- description -->
            <div class="listing-description mb-50">
              <h3 class="">{{$project->title}}</h3>
              <div class="cost green">
                <i class="fa fa-rupee"></i> {{$project->cost}}/-
              </div>
              <div class="location mt-10 mb-20">
                <img src="{{url('frontend/images/icons/location.')}}png"> &nbsp; {{$project->location}}
              </div>
              <div class="mt-20 mb-30 wishlist-area">
                <a class="green-btn" href="javascript:;" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i> Enquire Now</a> &nbsp; 
                  <?php $wishlist = App\Wishlist::projects();?>
                  @if(in_array($project->id , $wishlist))
                  <a class="green-btn blue-btn wishlist-btn pop_details" action="{{('/view-wishlist/1')}}"  href="javascript:;" data-title="View Wishlist"><i class="fa fa-heart"></i> View Wishlist</a>
                  @else
                    @if(Auth::check())
                      <a class="green-btn blue-btn wishlist-btn" href="{{url('/add-wishlist/1/'.$project->id)}}"><i class="fa fa-heart-o"></i> Add to Wishlist</a>
                    @else
                      <a class="green-btn blue-btn wishlist-btn pop-login" action="{{url('/add-wishlist/1/'.$project->id)}}"><i class="fa fa-heart-o"></i> Add to Wishlist</a>
                    @endif
                  @endif
              </div>
              <div class="content mb-3 text-justify">{{$project->description}}</div>
              <div class="pdf-download">
                <i><a class="green" href="{{url($project->brochure)}}" target="_blank"> <i class="fa fa-arrow-circle-right"></i> Click here</a> to download PDF presentation.</i>
              </div>
            </div>  
          </aside>
        </div>
      </div>
      <div class="row">
        <div class="col-md-9">
          <div class="listing-more-details elements-tab">
            <h5 class="text-uppercase">More Details:</h5>
            <hr class="mt-15">
            <div class="tab">
              <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
                <li class="nav-item">
                  <a class="nav-link active show" id="pills-one" data-toggle="pill" href="#pills-one-tab" role="tab" aria-controls="pills-one" aria-selected="false">Specifications</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-two" data-toggle="pill" href="#pills-two-tab" role="tab" aria-controls="pills-two" aria-selected="false">Site Plan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-three" data-toggle="pill" href="#pills-three-tab" role="tab" aria-controls="pills-three" aria-selected="false">Location Plan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-four" data-toggle="pill" href="#pills-four-tab" role="tab" aria-controls="pills-four" aria-selected="false">Payment Plan</a>
                </li>
                <li class="nav-item">
                  <a class="nav-link" id="pills-five" data-toggle="pill" href="#pills-five-tab" role="tab" aria-controls="pills-five" aria-selected="true">Highlights</a>
                </li>
              </ul>
              <div class="tab-content" id="pills-tabContent">
                <div class="tab-pane fade active show" id="pills-one-tab" role="tabpanel" aria-labelledby="pills-one">
                  <ul>
                    @foreach($project->specifications as $row)
                    <li>
                      <i class="fa fa-check-square-o"></i> &nbsp; {{$row->specification}}
                    </li>
                    @endforeach
                  </ul>
                </div>
                <div class="tab-pane fade" id="pills-two-tab" role="tabpanel" aria-labelledby="pills-two">
                  <div class="text-center">
                    <img class="img-fluid" src="{{url($project->site_plan)}}">
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-three-tab" role="tabpanel" aria-labelledby="pills-three">
                  <div class="text-center">
                    <img class="img-fluid" src="{{url($project->location_map)}}">
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-four-tab" role="tabpanel" aria-labelledby="pills-four">
                  <div class="content">
                    {!! $project->payment_plan !!}
                  </div>
                </div>
                <div class="tab-pane fade" id="pills-five-tab" role="tabpanel" aria-labelledby="pills-five">
                  <ul>
                    @foreach($project->highlights as $row)
                    <li>
                      <i class="fa fa-check-square-o"></i> &nbsp; {{$row->highlight}}
                    </li>
                    @endforeach
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
        <?php $seller = App\User::getSeller($project->added_by);?>
        @if($seller)
        <div class="col-md-3">
          <div class="border pt-4 pb-4 p-3">
            <h4>Seller Description:</h4>
            <div class="table-div">
              <div class="img">
                @if($seller->picture)
                  <img src="{{url($seller->picture)}}" class="img-fluid img-circle">
                @else
                  <img src="{{url('frontend/images/avatar/avatar-big.jpg')}}" class="img-fluid img-circle">

                @endif
              </div>
              <div class="txt">
                <h5 class="mb-0"><a href="{{url('/seller-details/'.$seller->id)}}">{{$seller->first_name}} {{$seller->last_name}}</a></h5>
                <div class="rating">
                  <small>
                    @for($i=1;$i<=$seller->rating;$i++)
                      <i class="fa fa-star"></i>
                    @endfor
                    @for($i=1;$i<=5-$seller->rating;$i++)
                      <i class="fa fa-star-o"></i>
                    @endfor
                  </small> &nbsp;({{$seller->rating ? round($seller->rating,1):0}})
                  <div style="margin-top:-10px;">
                    <small>{{sizeof($seller->reviews)}} Reviews</small>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        @endif
      </div>
    </div>
  </div>
  <!-- PROJECT DETAILS AREA END -->
  <div class="blog-area mt-50 pt-70 pb-50 grey-bg">
    <div class="container">
      <h3 class="text-uppercase mb-20">Related Projects</h3>
      <div class="blog-carousel row">
        @foreach($projects as $project)
          <div class="col">
            <article class="blog-item bg-gray">
              <div class="blog-image">
                <a href="{{url('/project-details/'.$project->id)}}"><img src="{{url($project->feature_image)}}" alt=""></a>
              </div>
              <div class="blog-info">
                <div class="post-title-time">
                  <h5><a href="{{url('/project-details/'.$project->id)}}">{{$project->title}}</a></h5>
                  <p><small><i class="fa fa-map-marker"></i> {{$project->short_address}}</small></p>
                </div>
                <p>{{substr($project->description,0,100).'...'}}</p>
                <a class="read-more" href="{{url('/project-details/'.$project->id)}}">Explore Now</a>
              </div>
            </article>
          </div>
        @endforeach
      </div>
    </div>
  </div>
</section>
<!-- End page content -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-uppercase"> Enquire Now</h4>
      </div>
      <div class="modal-body">
        <form id="contact-form" method="post" action="{{url('enquire/1/'.$project->id)}}">
          <input type="text" name="name" placeholder="Your Name" required="true">
          <input type="hidden" name="_token" value="{{ csrf_token() }}">
          <div class="row">
            <div class="col-md-6 pr-0">
              <input type="email" name="email" placeholder="Email" required="true">
            </div>
            <div class="col-md-6">
              <input type="text" name="phone" placeholder="Phone" required="true">
            </div>
          </div>
          <textarea name="message" placeholder="Message" required="true"></textarea>
          <button type="submit" class="submit-btn-1">SUBMIT</button>
        </form>
      </div>
    </div>
  </div>
</div>
<!-- End Modal -->

@endsection