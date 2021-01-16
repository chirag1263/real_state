<li class="nav-item start {{($sidebar=='dashboard')?'active':''}}">
    <a href="{{url('/dashboard')}}" class="nav-link ">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>

<li class="nav-item start {{($sidebar=='change-password')?'active':''}}">
    <a href="{{url('/change-password')}}" class="nav-link ">
        <i class="fa fa-cogs"></i>
        <span class="title">Change Password</span>
        <span class="selected"></span>
    </a>
</li>


<li class="nav-item start {{($sidebar=='logout')?'active':''}}">
    <a href="{{url('/logout')}}" class="nav-link ">
        <i class="icon-key"></i>
        <span class="title">Logout</span>
        <span class="selected"></span>
    </a>
</li>