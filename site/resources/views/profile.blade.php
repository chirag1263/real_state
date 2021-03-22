@extends('layout')

@section('content')
<div style="padding: 10px">
    
	@if(Session::has('success'))
        <div class="alert alert-success">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ban-circle"></i><strong>Success!</strong> {{Session::get('success')}}
        </div>
    @endif
    @if(Session::has('failure'))
        <div class="alert alert-danger">
            <button type="button" class="close" data-dismiss="alert">×</button>
            <i class="fa fa-ban-circle"></i><strong>Failure!</strong> {{Session::get('failure')}}
        </div>
    @endif
	
    <div class="row">
        <div class="col-md-6">
            <h2 class="page-title">Personal Information</h2>
            <ul class="list-group">
                <li class="list-group-item"><strong>Name :</strong> {{Auth::user()->first_name}} {{Auth::user()->last_name}}</li>
                <li class="list-group-item"><strong>Email :</strong> {{Auth::user()->username}}</li>
            </ul>
            <!-- change password -->
            <div>
                <div class="portlet box blue">
                    <div class="portlet-title">
                        <div class="caption">
                            Change Password </div>
                        <div class="tools">
                            <a href="javascript:;" class="collapse" data-original-title="" title=""> </a>
                        </div>
                    </div>
                    <div class="portlet-body">
                        {{Form::open(["url"=>"update-password","method"=>"post"])}}
                            <div class="form-group">
                                <label>Old Password</label>
                                {{Form::password('old_password',["class"=>"form-control" , "required"=>true])}}
                                <span class="errors">{{$errors->first('old_password')}}</span>
                            </div>

                            <div class="form-group">
                                <label>New Password</label>
                                {{Form::password('new_password',["class"=>"form-control" , "required"=>true])}}
                                <span class="errors">{{$errors->first('new_password')}}</span>
                            </div>

                            <div class="form-group">
                                <label>Confirm Password</label>
                                {{Form::password('confirm_password',["class"=>"form-control" , "required"=>true])}}
                                <span class="errors">{{$errors->first('confirm_password')}}</span>
                            </div>
                            <div>
                                <button class="btn blue">Update</button>
                            </div>
                        {{Form::close()}}
                    </div>
                </div>
            </div>
            <!-- change password end -->

        </div>
  
        
        
        
    </div>
    

</div>

@endsection