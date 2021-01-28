<li class="nav-item start {{($sidebar=='dashboard')?'active':''}}">
    <a href="{{url('/dashboard')}}" class="nav-link ">
        <i class="icon-home"></i>
        <span class="title">Dashboard</span>
        <span class="selected"></span>
    </a>
</li>


<li class="nav-item {{($sidebar =='listings')?'active open':''}}">
    <a href="javascript:;" class="nav-link nav-toggle">
        <i class="fa fa-list"></i>
        <span class="title">listings</span>
        <span class="selected"></span>
        <span class="arrow open"></span>
    </a>
    <ul class="sub-menu" style="display: {{($sidebar =='listings')?'block':''}}">
      
        <li class="{{($sidebar =='listings' && $subsidebar == '1')?'active':''}}">
            <a href="{{url('/admin/listings')}}">
                <i class="fa fa-list-alt"></i>
                <span class="title">Listings</span>
                <span class="selected"></span>
            </a>
        </li>

        <li class="{{($sidebar =='listings' && $subsidebar == '2')?'active':''}}">
            <a href="{{url('/admin/list-categories')}}">
                <i class="fa fa-list-alt"></i>
                <span class="title">Categories</span>
                <span class="selected"></span>
            </a>
        </li>

    </ul>
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