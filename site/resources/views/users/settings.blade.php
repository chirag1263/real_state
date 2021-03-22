@extends('layout')
@section('content')
<div class="row">
    <div class="col-md-8">
        <h1 class="page-title" style="margin-top: 0">
            Personal Information
        </h1>
    </div>
    <div class="col-md-4">
    	<a href="{{url('/edit-settings')}}" class="btn btn-sm btn-success pull-right"><i class="fa fa-edit"></i> Edit Profile</a>
    </div>
</div>


<div class="row">
	<div class="col-md-4">
		@if(Auth::user()->picture)
			<img src="{{url(Auth::user()->picture)}}" style="width: 100%;height: auto;">
		@else
			<img src="{{url('assets/admin/img/avatar.png')}}" style="width: 100%;height: auto;">
		@endif
	</div>
	<div class="col-md-8">
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
		</table>
		
	</div>
</div>

@endsection