<!DOCTYPE html>
<!--[if IE 8]> <html lang="en" class="ie8 no-js"> <![endif]-->
<!--[if IE 9]> <html lang="en" class="ie9 no-js"> <![endif]-->
<!--[if !IE]><!-->
<html lang="en">
<!--<![endif]-->
<!-- BEGIN HEAD -->
<head>
<meta charset="utf-8"/>
<title>Login - Rishikesh Real Estate</title>
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
  <div class="content">
    <!-- BEGIN LOGIN FORM -->
    {{ Form::open(array('url' => '/login','class' => 'login-form',"method"=>"POST")) }}
    @if(Session::has('failure'))
      <div class="alert alert-danger">
          <i class="fa fa-ban-circle"></i><strong>Failure!</strong> {{Session::get('failure')}}
        </div>
    @endif
      <div class="img text-center">
        <img src="{{url('assets/admin/img/logo.png')}}" style="width:100px;height:auto;padding-top: 20px;">
      </div>
      <h3 class="form-title">LOGIN</h3>
      <div class="alert alert-danger display-hide">
        <button class="close" data-close="alert"></button>
        <span>
        Enter any username and password. </span>
      </div>
      <div class="form-group">
        <!--ie8, ie9 does not support html5 placeholder, so we just show field title for that-->
        <label class="control-label visible-ie8 visible-ie9">Username</label>
        <div class="input-icon">
          <i class="fa fa-user"></i>
          {{Form::text('username','',["class"=>"form-control placeholder-no-fix","autocomplete"=>"off", "placeholder"=>"Username or Email", "required"])}}
          <span class="error">{{$errors->first('username')}}</span>
        </div>
      </div>
      <div class="form-group">
        <label class="control-label visible-ie8 visible-ie9">Password</label>
        <div class="input-icon">
          <i class="fa fa-lock"></i>
          {{Form::password('password',["class"=>"form-control", "placeholder"=>"Password", "required"])}}
        </div>
      </div>
      <p><a href="javascript:;">Forgot Password?</a></p>
      <div class="form-actions">
        <button type="submit" class="btn blue pull-right">
        Login &nbsp; <i class="m-icon-swapright m-icon-white"></i>
        </button>
      </div>

      <Br>


    {{ Form::close() }}
  </div>
</body>
<!-- END BODY -->
</html>