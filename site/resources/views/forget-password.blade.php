<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
    <meta charset="utf-8"/>
    <title>Realstate </title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta content="width=device-width, initial-scale=1.0" name="viewport"/>
    <meta http-equiv="Content-type" content="text/html; charset=utf-8">
    <meta content="" name="description"/>
    <meta content="" name="author"/>

    <link rel="stylesheet" type="text/css" href="https://fonts.googleapis.com/css?family=Open+Sans:400,300,600,700&subset=all"> 
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/bootstrap/css/bootstrap.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/plugins/font-awesome/css/font-awesome.min.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/css/components.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{url('assets/global/css/plugins.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{url('assets/layouts/layout/css/layout.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{url('assets/layouts/layout/css/themes/light2.css')}}"> 
    <link rel="stylesheet" type="text/css" href="{{url('assets/pages/css/login.css')}}"> 


    <link rel="shortcut icon" href="favicon.ico"/>
</head>
<!-- END HEAD -->

<body class="login">
    <div class="logo">

    </div>

    <div class="text-center">
      <div style="font-size:36px; color: #FFF">
        Realstate
    </div>
    <!-- <img src="{{url('assets/admin/img/db_logo.png')}}" style="height: 50px; width: auto; margin-top: 10px"> -->
</div>


<div class="content">
  <!-- BEGIN LOGIN FORM -->
  {{ Form::open(array('url' => '/forget-password','class' => 'login-form',"method"=>"POST")) }}
  @if(Session::has('failure'))
    <div class="alert alert-danger">
      <i class="fa fa-ban-circle"></i><strong>Failure!</strong> {{Session::get('failure')}}
  </div>
  @endif
  @if(Session::has('success'))
    <div class="alert alert-success">
      <i class="fa fa-ban-circle"></i><strong>Success!</strong> {{Session::get('success')}}
  </div>
  @endif

<h3 class="form-title" style="font-size: 20px">Enter your registered email id</h3>

<div class="user-login">
    <div class="form-group ">
      <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
      <label class="control-label visible-ie8 visible-ie9">Username</label>
      <div class="input-icon">
        <i class="fa fa-user"></i>
        {{Form::text('email','',["class"=>"form-control placeholder-no-fix","autocomplete"=>"off"])}}
        <span class="error">{{$errors->first('email')}}</span>
    </div>
</div>
<div class="">
  <button type="submit" class="btn blue pull-right">
    Reset Password <i class="m-icon-swapright m-icon-white"></i>
</button>
</div>
{{ Form::close() }}

<div><a href="{{url('/login')}}">Click here </a> to login to your account</div>
</div>



</div>
</body>

</html>
