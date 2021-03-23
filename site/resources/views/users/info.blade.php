@extends('layout')

@section('content')
<div >
  
  <div class="page-title-cont">
    <div class="row">
      <div class="col-md-8">
        <h2 class="page-title text-uppercase">Edit Profile</h2>
      </div>

      <div class="col-md-4">
        <div class="text-right" style="padding-top: 20px;">
          <a href="{{url('/settings')}}" class="btn btn btn-success pull-right"><i class="fa fa-arrow-left"></i> Go Back</a>
        </div>
      </div>
    </div>


  </div>

  @if(Session::has('success'))
  <div class="alert alert-success">{{Session::get('success')}}</div>
  @endif

  @if(Session::has('failure'))
  <div class="alert alert-danger">{{Session::get('failure')}}</div>
  @endif

  {{Form::open(["url"=>"settings","method"=>"post","files"=>true])}}
      <div class="row">
        <div class="col-md-3 form-group">
          @if(Auth::user()->picture)
          <img src="{{Auth::user()->picture}}" style="width: 100%;height: auto;border:1px solid #ccc;padding: 5px;margin-bottom: 5px;">
          @else
          <img src="{{url('assets/admin/img/avatar-big.jpg')}}" style="width: 100%;height: auto;border:1px solid #ccc;padding: 5px;margin-bottom: 5px;">
          @endif
          {{Form::file('picture',["class"=>"form-control"])}}
        </div>
        <div class="col-md-9">
          <div class="row">
            <div class="col-md-4 form-group">
              <label>First Name <span class="error">*</span></label>
              {{Form::text('first_name',Auth::user()->first_name,["class"=>"form-control","required"=>true])}}
            </div>

            <div class="col-md-4 form-group">
              <label>Last Name </label>
              {{Form::text('last_name',Auth::user()->last_name,["class"=>"form-control"])}}
            </div>

            <div class="col-md-4 form-group">
              <label>Email </label>
              <span class="form-control" readonly>{{Auth::user()->email}}</span>
            </div>

            <div class="col-md-4 form-group">
              <label>Phone </label>
              {{Form::text('phone',Auth::user()->phone,["class"=>"form-control"])}}
            </div>

            <div class="col-md-4 form-group">
              <label>City </label>
              {{Form::text('city',Auth::user()->city,["class"=>"form-control"])}}
            </div>

            <div class="col-md-4 form-group">
              <label>State </label>
              {{Form::text('state',Auth::user()->state,["class"=>"form-control"])}}
            </div>

            <div class="col-md-12 form-group">
              <label>Address </label>
              {{Form::text('address',Auth::user()->address,["class"=>"form-control"])}}
            </div>
          </div>
          <div style="margin-top: 10px">
            <button class="btn btn-primary">Update Profile</button>
          </div>
        </div>
      </div>
  {{Form::close()}}
  
  <style type="text/css">
    .error{
      color:red;
    }
  </style>
  @endsection