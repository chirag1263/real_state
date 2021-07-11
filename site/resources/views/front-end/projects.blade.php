@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Our Projects</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- FEATURED FLAT AREA START -->
  <div class="featured-flat-area pt-115 pb-60">
    <div class="container">
      <div class="filters-area">
        <h3>Search by:</h3>
        {{Form::open(["url"=>"projects","method"=>"GET"])}}
          <ul>
            @foreach($filters as $filter)
            <li>
              <label>
                <input type="checkbox" @if(in_array($filter->id,$f_ids)) checked @endif name="filters[]" value="{{$filter->id}}" > &nbsp;&nbsp;{{$filter->filter_name}}
              </label>
            </li>
            @endforeach
            <li>
              <button class="green-btn blue-btn">Search</button>
            </li>
          </ul>
        {{Form::close()}}
        <hr>
      </div>
      <div class="featured-flat">
        <div class="row">
          @foreach($projects as $project)
            <div class="col-lg-4 col-md-6 col-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <a href="{{url('project-details/'.$project->id)}}"><img src="{{url($project->feature_image)}}" alt=""></a>
                  <div class="flat-link">
                    <a href="{{url('project-details/'.$project->id)}}">More Details</a>
                  </div>
                </div>
                <div class="flat-item-info">
                  <div class="flat-title-price">
                    <h5><a href="{{url('project-details/'.$project->id)}}">{{$project->title}} </a></h5>
                    <span class="price"> <i class="fa fa-rupee"></i>{{$project->cost}}</span>
                  </div>
                  <p><img src="{{url('frontend/images/icons/location.png')}}" alt="">{{$project->short_address}}</p>
                </div>
              </div>
            </div>
          @endforeach
        </div>  
        <!-- pagination-area -->

        @if(isset($total))
        <!-- pagination-area -->
        <?php
          $max_page = $page_id + 9;
          if($max_page > $total_pages) $max_page = $total_pages;

          $first_page = $page_id - 1;
          if($first_page <= 0) $first_page = $page_id;
        ?>
        <div class="pagination-area mt-50 mb-60">
          <ul class="pagination-list text-center">
              <li>
                <a  href="{{url($input_string.'&page=1')}}"><i class="fa fa-angle-left"></i></a>
              </li>
              @if($page_id >= 3)
              <li>
                <a href="{{url($input_string.'&page='.($page_id - 2))}}"><i class="fa fa-angle-left"></i></a>
              </li>
              @endif
              @for($x = $first_page ; $x <= $max_page; $x++  )
                <li>
                  @if($x != $page_id )
                    <a  class="@if($page_id == $x) active @endif" href="{{url($input_string.'&page='.$x)}}">{{$x}}</a>
                  @else
                    <a  class="@if($page_id == $x) active @endif" href="javascript:;"><b>{{$x}}</b></a>
                  @endif
                </li>
              @endfor

              @if($x < $total_pages)
                <li>
                  <a  href="{{url($input_string.'&page='.$x)}}"><i class="fa fa-angle-right"></i></a>
                </li>
              @endif
              <li>
                <a  href="{{url($input_string.'&page='.$total_pages)}}"><i class="fa fa-angle-right"></i></a>
              </li>

          </ul>
        </div>
        @endif
      </div>
    </div>
  </div>
  <!-- FEATURED FLAT AREA END -->
</section>
<!-- End page content -->

@endsection