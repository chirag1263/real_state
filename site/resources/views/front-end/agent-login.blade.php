@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Agent Login</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">

  <!-- LOGIN SECTION START -->
  <div class="login-section pt-115 pb-70">
    <div class="container">
      <div class="row">
        <div class="col-lg-6 col-12">
          <div class="registered-customers mb-50">
            @if(Session::has('success'))
            <div class="alert alert-success">{{Session::get('success')}}</div>
            @endif

            @if(Session::has('failure'))
            <div class="alert alert-danger">{{Session::get('failure')}}</div>
            @endif
            <h5 class="mb-20">AGENT LOGIN</h5>
            {{Form::open(["url"=>"user-login","method"=>"post"])}}
              <div class="login-account p-30 box-shadow">
                <p>If you have an account with us, Please log in.</p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_type" value="2">
                {{Form::text('username','',["placeholder"=>"Email Address","required"=>true])}}
                <span class="error">{{$errors->first('username')}}</span>
                {{Form::password('password',["placeholder"=>"Password","required"=>true])}}
                <p><small><a href="{{url('forget-password')}}">Forgot Password?</a></small></p>
                <button class="submit-btn-1" type="submit">Login</button>
              </div>
            {{Form::close()}}
          </div>
        </div>
        <!-- new-customers -->
        <div class="col-lg-6 col-12">
          <div class="new-customers mb-50">
            {{Form::open(["url"=>"register-agent","method"=>"post"])}}
              <h5 class="mb-20">AGENT REGISTRATION</h5>
              <div class="login-account p-30 box-shadow">
                <div class="row">
                  <div class="col-md-6">
                    {{Form::text('first_name','',["placeholder"=>"First Name","required"=>true])}}
                    <span class="error">{{$errors->first('first_name')}}</span>
                  </div>
                  <div class="col-md-6">
                    {{Form::text('last_name','',["placeholder"=>"Last Name", "required"=>true])}}
                    <span class="error">{{$errors->first('last_name')}}</span>

                  </div>
                  <div class="col-md-6">
                    {{Form::text('email','',["placeholder"=>"Email Address","required"=>true, "pattern"=>"[a-z0-9._%+-]+@[a-z0-9.-]+\.[a-z]{2,}$"])}}
                    <span class="error">{{$errors->first('email')}}</span>
                  </div>
                  <div class="col-md-6">
                    {{Form::text('phone','',["placeholder"=>"Phone"])}}
                    <span class="error">{{$errors->first('phone')}}</span>
                  </div>
                  <div class="col-md-6">
                    {{Form::text('company_name','',["placeholder"=>"Company"])}}
                    <span class="error">{{$errors->first('company_name')}}</span>
                  </div>
                  <div class="col-md-6">
                    {{Form::select('pro_type',[""=>"Profession","agent"=>"Agent","builder"=>"Builder"],"", ["required"=>"true"])}}
                    <span class="error">{{$errors->first('pro_type')}}</span>
                  </div>

                  <div class="col-md-12">
                    {{Form::text('address','',["placeholder"=>"Address"])}}
                    <span class="error">{{$errors->first('address')}}</span>
                  </div>
                  <div class="col-md-6">
                    {{Form::select('state',[""=>"Select State","uttarakhand"=>"Uttarakhand"],"", ["required"=>true])}}
                    <span class="error">{{$errors->first('state')}}</span>

                  </div>
                  <input type="hidden" name="_token" value="{{ csrf_token() }}">
                  <div class="col-md-6">
                    {{Form::select('city',[""=>"Select City", $cities],'',["class"=>"custom=select-2", "required"=>true])}}
                    <span class="error">{{$errors->first('city')}}</span>
                  </div>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="agree_terms" required="true"> &nbsp; I agree to all the <a href="javascript:;">Terms & Conditions</a>
                  </label>
                </div>
                <div class="">
                  <div>
                    <button class="submit-btn-1 mt-20" type="submit" value="register">Register</button> &nbsp; <button class="submit-btn-1 mt-20" type="reset">Clear</button>
                  </div>
                </div>
              </div>
            {{Form::close()}}
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- LOGIN SECTION END -->
</section>
<!-- End page content -->
@endsection