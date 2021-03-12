@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Listing Details</h2>
          <!-- <ul class="breadcrumbs-list">
            <li><a href="index.php">Home</a></li>
            <li><a href="listings.php">Listing</a></li>
            <li>Listing Details</li>
          </ul> -->
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- LISTING DETAILS AREA START -->
  <div class="properties-details-area pt-115 pb-60">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- pro-details-image -->
          <div class="pro-details-image mb-60">
            <!-- <div class="pro-details-big-image">
              <img class="w-100" src="{{url($listing->feature_image)}}">
            </div> -->
            <div class="pro-details-big-image">
              <div class="tab-content" id="pills-tabContent">
                @foreach($listing->photos as $index => $photo)
                  <div class="tab-pane fade show {{$index+1 == 1 ?'active':''}}" id="pro-{{$index+1}}" role="tabpanel" aria-labelledby="pro-{{$index+1}}-tab">
                    <a href="{{url($photo->photo)}}" data-lightbox="image-{{$index+1}}" data-title="Listings - {{$index+1}}">
                      <img class="w-100" src="{{url($photo->photo)}}" alt="">
                    </a>
                  </div>
                @endforeach
              </div>
            </div>
            <ul class="nav nav-pills pro-details-navs" id="pills-tab" role="tablist">
            @foreach($listing->photos as $index => $photo)
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
            <div class="listing-description text-justify mb-50">
              <h3>{{$listing->title}}</h3>
              <div class="cost green">
                <i class="fa fa-rupee"></i> {{$listing->price}}
              </div>
              <div class="location mt-10 mb-10">
                <img src="{{url('/frontend/images/icons/location.png')}}"> &nbsp; {{$listing->short_address}}
              </div>
              <div class="mt-20 mb-30 wishlist-area">
                <a class="green-btn" href="javascript:;" data-toggle="modal" data-target="#myModal"><i class="fa fa-envelope"></i> Enquire Now</a> &nbsp; <?php $wishlist = true; if($wishlist){?><a class="green-btn blue-btn wishlist-btn" href="javascript:;" title="View Wishlist"><i class="fa fa-heart"></i> View Wishlist</a><?php }else{?> <a class="green-btn blue-btn wishlist-btn" href="javascript:;"><i class="fa fa-heart-o"></i> Add to Wishlist</a><?php }?>
              </div>
              <div class="content">
                {{$listing->description}}
              </div>
              <div class="pdf-download mt-15">
                <i><a class="green" href="javascript:;"> <i class="fa fa-arrow-circle-right"></i> Click here</a> to download PDF presentation.</i>
              </div>
            </div>  
          </aside>
        </div>
      </div>
      <div class="listing-more-details elements-tab">
        <h5 class="text-uppercase">More Details:</h5>
        <hr class="mt-15">
        <div class="tab">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="pills-home-tab" data-toggle="pill" href="#pills-home" role="tab" aria-controls="pills-home" aria-selected="true">Highlights</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-profile-tab" data-toggle="pill" href="#pills-profile" role="tab" aria-controls="pills-profile" aria-selected="false">Specifications</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-home" role="tabpanel" aria-labelledby="pills-home-tab">
              <ul>
                @foreach($listing->highlights as $row)
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; {{$row->highlight}}
                </li>
                @endforeach
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-profile" role="tabpanel" aria-labelledby="pills-profile-tab">
              <ul>
                @foreach($listing->specifications as $row)
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; {{$row->specification}}
                </li>
                @endforeach
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- LISTING DETAILS AREA END -->
  <!-- MORE DETAILS -->
  <div class="featured-flat-area grey-bg pt-70 pb-50 mt-50">
    <div class="container">
      <h3 class="text-uppercase mb-20">Related Listings</h3>
      <div class="featured-flat">
        <div class="row">
          @foreach($listings as $listing)
            <div class="col-lg-4 col-md-6 col-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <span class="for-sale">{{$listing->category_name}}</span>
                  <a href="{{url('listing-details/'.$listing->id)}}"><img src="{{url($listing->feature_image)}}" alt=""></a>
                  <div class="flat-link">
                    <a href="{{url('listing-details/'.$listing->id)}}">More Details</a>
                  </div>
                </div>
                <div class="flat-item-info">
                  <div class="flat-title-price">
                    <h5><a href="{{url('listing-details/'.$listing->id)}}">{{$listing->title}}</a></h5>
                    <span class="price"><i class="fa fa-rupee"></i> {{$listing->price}}</span>
                  </div>
                  <p><img src="{{url('/frontend/images/icons/location.png')}}" alt="">{{$listing->location}}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>
      </div>
    </div>
  </div>
  <!-- END MORE DETAILS -->
</section>
<!-- End page content -->

<!-- Modal -->
<div id="myModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-uppercase">Enquire Now</h4>
      </div>
      <div class="modal-body">
        <form id="contact-form" method="post">
          <input type="text" name="name" placeholder="Your Name" required="true">
          <div class="row">
            <div class="col-md-6 pr-0">
              <input type="email" name="email" placeholder="Email" required="true">
            </div>
            <div class="col-md-6">
              <input type="text" name="email" placeholder="Phone" required="true">
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