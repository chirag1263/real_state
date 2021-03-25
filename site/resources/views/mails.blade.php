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


</body>
</html>