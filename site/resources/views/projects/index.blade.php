@extends('layout')

@section('content')
<div >
  
  <div class="page-title-cont">
    <div class="row">
      <div class="col-md-8">
        <h2 class="page-title">Projects</h2>
      </div>
      <div class="col-md-4 text-right">
        <a href="{{url('/admin/projects/add')}}" class="btn blue">Add New</a>
      </div>
    </div>
  </div>
  <div class="">
    @if(isset($total))
      <div class="row" style="margin-bottom:20px;">
        <div class="col-md-3">
          <h3 class="page-title"></h3>
        </div>
        <div class="col-md-9">
          <div class="pull-right hidden" style="font-style:italic; margin-top:5px;  margin-left:10px" >
            <a  href="{{url($input_string.'&page=1&show_all=true')}}"> Show All ({{$total}})</a>
          </div>
          @if(Input::has('show_all'))
            <div class="pull-right" style="font-style:italic; margin-top:5px; margin-right:10px">
              <a  href="{{url($input_string.'&page=1')}}"> Paginate</a>
            </div>
          @endif
          @if(isset($total) && !Input::has('show_all'))
          <?php
            $max_page = $page_id + 9;
            if($max_page > $total_pages) $max_page = $total_pages;

            $first_page = $page_id - 1;
            if($first_page <= 0) $first_page = $page_id;
          ?>
          <ul class="pagination pull-right" style="margin: 0 0 0 10px">
            <li>
              <a  href="{{url($input_string.'&page=1')}}"><i class="fa fa-angle-double-left"></i></a>
            </li>
            @if($page_id >= 3)
            <li>
              <a  href="{{url($input_string.'&page='.($page_id - 2))}}"><i class="fa fa-angle-left"></i></a>
            </li>
            @endif
            @for($x = $first_page ; $x <= $max_page; $x++  )
              <li>
                @if($x != $page_id )
                  <a  href="{{url($input_string.'&page='.$x)}}">{{$x}}</a>
                @else
                  <a  href="javascript:;"><b>{{$x}}</b></a>
                @endif
              </li>
            @endfor
            @if($x < $total_pages)
            <li>
              <a  href="{{url($input_string.'&page='.$x)}}"><i class="fa fa-angle-right"></i></a>
            </li>
            @endif
            <li>
              <a  href="{{url($input_string.'&page='.$total_pages)}}"><i class="fa fa-angle-double-right"></i></a>
            </li>
          </ul>
          <div class="pull-right" style="font-style:italic; margin-top:5px;">
            Showing {{ ($page_id - 1)*$max_per_page + 1  }} - {{ ($page_id*$max_per_page > $total)?$total:$page_id*$max_per_page  }} of <b>{{$total}}</b>
          </div>
          @endif
        </div>
      </div>
    @endif
  </div>
  <div>
    <table class="table table-sorterd table-bordered table-hower">
      <thead>
        <th>SN</th>
        <th>Title</th>
        <th>Location</th>
        <th></th>
      </thead>
      <tbody>
        <?php $count = 0; ?>
        @foreach($projects as $project)
        <tr id="list_{{$project->id}}">
          <td>{{($page_id-1)*$max_per_page + $count}}</td>
          <td>{{$project->title}}</td>
          <td>{{$project->location}}</td>
          <td>
            <a href="{{url('admin/projects/add?id='.$project->id)}}" class="btn yellow">Edit</a>

            <button div-id="list_{{$project->id}}" action="{{('admin/projects/delete/'.$project->id)}}" class="btn delete-div red">Delete</a>
            </td>
          </tr>
          <?php $count++; ?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  

  @endsection