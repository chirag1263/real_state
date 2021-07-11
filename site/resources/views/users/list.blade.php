@extends('layout')

@section('content')
<div >
  
  <div class="page-title-cont">
    <div class="row">
      <div class="col-md-8">
        <h2 class="page-title">Users</h2>
      </div>
    </div>
  </div>


  <ul class="nav nav-tabs">
  	<li class="{{$type == 2?'active':''}}"><a href="{{url('admin/users?type=2')}}">Agents</a></li>
  	<li class="{{$type == 3?'active':''}}"><a href="{{url('admin/users?type=3')}}">Users</a></li>
  </ul>

  <div class="col-md-12">
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
        <th>Name</th>
        <th>Email</th>
        <th>Phone</th>
        <th>Address</th>
        <th>City</th>
      </thead>
      <tbody>
        <?php $count = 1; ?>
        @foreach($users as $user)
        <tr id="list_{{$user->id}}">
          <td>{{($page_id-1)*$max_per_page + $count}}</td>
          <td>{{$user->first_name .' '. $user->last_name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->city}}</td>
          </tr>
          <?php $count++;?>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  

  @endsection