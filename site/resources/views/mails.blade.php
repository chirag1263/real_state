<!DOCTYPE html>
<html>
<body>
@if($type == "password_reset")
    <p>
        Dear {{$user->name}},
    </p>

    <p>
        Your password has been reset successfully, <b>{{$user->check_password}}</b> is your new password , <a target="_blank" href="{{url('/login')}}">Click here </a> to login to your account
    </p>
    
    <p>
        Thanks.
    </p>
@endif



@if($type == "registration")
    <p>
        Dear {{$user->name}},
    </p>

    <p>
        Your profile is successfully created on Realstate  ,below is your login details, <br>
        	<b>Username - {{$user->username}}</b> <br>
        	<b>Password - {{$user->check_password}}</b> <br>
         	<a target="_blank" href="{{url('/login')}}">Click here </a> to login to your account
    </p>
    
    <p>
        Thanks.
    </p>
@endif


@if($type == "contact-us")
    <p>
        Contact us form Enquiry
    </p>

    <p>
        
        <b>Name - </b>{{$data['name']}} <br>
        <b>Email - </b>{{$data['email']}} <br>
        <b>Message -</b>  {{$data['message']}}<br>
    </p>
    
@endif


</body>
</html>