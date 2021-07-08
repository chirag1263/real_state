@extends('layout')
@section('content')
<div class="row">
  <div class="col-md-8">
      <h1 class="page-title text-uppercase" style="margin-top: 0">
          User Profile
      </h1>
  </div>
  <div class="col-md-4">
  	<div class="text-right" style="padding-top: 20px;">
  	 	<a href="{{url('/edit-settings')}}" class="btn btn btn-success"><i class="fa fa-edit"></i> Edit Profile</a> &nbsp; <a href="{{url('/change-password')}}" class="btn btn btn-danger"><i class="fa fa-edit"></i> Change Password</a>
  	</div>
  </div>
</div>		
<div class="row">
	<div class="col-md-3">
		<div style="border: 1px solid #ccc;padding: 5px;">
			@if(Auth::user()->picture)
				<img src="{{url(Auth::user()->picture)}}" style="width: 100%;height: auto;">
			@else
				<img src="{{url('assets/admin/img/avatar-big.jpg')}}" style="width: 100%;height: auto;">
			@endif
		</div>
	</div>
	<div class="col-md-9">
		<table class="table table-bordered table-stripped table-hover">
			<tr>
				<th>First Name</th>
				<td>{{Auth::user()->first_name}}</td>
			</tr>
			<tr>
				<th>Last Name</th>
				<td>{{Auth::user()->last_name}}</td>
			</tr>
			<tr>
				<th>Email</th>
				<td>{{Auth::user()->email}}</td>
			</tr>
			<tr>
				<th>Phone</th>
				<td>{{Auth::user()->phone}}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{{Auth::user()->address}}</td>
			</tr>
			<tr>
				<th>City</th>
				<td>{{Auth::user()->city}}</td>
			</tr>
			<tr>
				<th>State</th>
				<td>{{Auth::user()->state}}</td>
			</tr>
			<tr>
				<th>Address</th>
				<td>{{Auth::user()->address}}</td>
			</tr>
			@if(Auth::user()->priv == 2)
			<tr>
				<th>Company Name</th>
				<td>{{Auth::user()->company_name}}</td>
			</tr>
			<tr>
				<th>Profession</th>
				<td>{{Auth::user()->pro_type}}</td>
			</tr>
			@endif
		</table>
		
	</div>
</div>

@endsection