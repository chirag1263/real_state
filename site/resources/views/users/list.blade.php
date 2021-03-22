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
        <?php $sn = 0; ?>
        @foreach($users as $user)
        <tr id="list_{{$user->id}}">
          <td>{{++$sn}}</td>
          <td>{{$user->first_name .' '. $user->last_name}}</td>
          <td>{{$user->email}}</td>
          <td>{{$user->phone}}</td>
          <td>{{$user->address}}</td>
          <td>{{$user->city}}</td>
          </tr>
          @endforeach
        </tbody>
      </table>
    </div>
  </div>
  

  @endsection