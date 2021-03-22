<li class="nav-item start {{($sidebar=='dashboard')?'active':''}}">
  <a href="{{url('/dashboard')}}" class="nav-link ">
    <i class="icon-home"></i>
    <span class="title">Dashboard</span>
    <span class="selected"></span>
  </a>
</li>

<li class="nav-item start {{($sidebar=='')?'active':''}}">
  <a href="{{url('/')}}" class="nav-link ">
    <i class="fa fa-cogs"></i>
    <span class="title">Go To Website</span>
    <span class="selected"></span>
  </a>
</li>

@if(Auth::user()->priv != 3)
<li class="nav-item {{($sidebar =='listings')?'active open':''}}">
  <a href="javascript:;" class="nav-link nav-toggle">
    <i class="fa fa-list"></i>
    <span class="title">Listings</span>
    <span class="selected"></span>
    <span class="arrow open"></span>
  </a>
  <ul class="sub-menu" style="display: {{($sidebar =='listings')?'block':''}}">

    <li class="{{($sidebar =='listings' && $subsidebar == '1')?'active':''}}">
      <a href="{{url('/admin/listings')}}">
        <i class="fa fa-list-alt"></i>
        <span class="title">All Listings</span>
        <span class="selected"></span>
      </a>
    </li>

    @if(Auth::user()->priv == 1)
    <li class="{{($sidebar =='listings' && $subsidebar == '2')?'active':''}}">
      <a href="{{url('/admin/list-categories')}}">
        <i class="fa fa-list-alt"></i>
        <span class="title">Listing Categories</span>
        <span class="selected"></span>
      </a>
    </li>
    @endif

  </ul>
</li>

<li class="nav-item {{($sidebar =='projects')?'active open':''}}">
  <a href="javascript:;" class="nav-link nav-toggle">
    <i class="fa fa-list"></i>
    <span class="title">Projects</span>
    <span class="selected"></span>
    <span class="arrow open"></span>
  </a>
  <ul class="sub-menu" style="display: {{($sidebar =='projects')?'block':''}}">

    <li class="{{($sidebar =='projects' && $subsidebar == '1')?'active':''}}">
      <a href="{{url('/admin/projects')}}">
        <i class="fa fa-list-alt"></i>
        <span class="title">All Projects</span>
        <span class="selected"></span>
      </a>
    </li>

  </ul>
</li>



@if(Auth::user()->priv == 1)
<li class="{{($sidebar =='users' && $subsidebar == 'users')?'active':''}}">
  <a href="{{url('/admin/users')}}">
    <i class="fa fa-users"></i>
    <span class="title">Users</span>
    <span class="selected"></span>
  </a>
</li>
@endif

@endif

@if(Auth::user()->priv != 1)
<li class="nav-item start {{($sidebar=='wishlist')?'active':''}}">
  <a href="{{url('/wishlist?type=1')}}" class="nav-link ">
    <i class="fa fa-gift"></i>
    <span class="title">My Wishlist</span>
    <span class="selected"></span>
  </a>
</li>
@endif

@if(Auth::user()->priv == 1)
<li class="nav-item start {{($sidebar=='enquiries')?'active':''}}">
  <a href="{{url('admin/enquiries?type=1')}}" class="nav-link ">
    <i class="fa fa-gift"></i>
    <span class="title">Enquiries</span>
    <span class="selected"></span>
  </a>
</li>
@endif

<li class="nav-item start {{($sidebar=='settings')?'active':''}}">
  <a href="{{url('/settings')}}" class="nav-link ">
    <i class="fa fa-cogs"></i>
    <span class="title">Settings</span>
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