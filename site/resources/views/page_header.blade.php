<div class="page-header navbar navbar-fixed-top">
  <!-- BEGIN HEADER INNER -->
  <div class="page-header-inner ">
    <!-- BEGIN LOGO -->
    <div class="page-logo">
      <a href="{{url('dashboard')}}" style="margin-top: 8px; color:#fff">
        <img src="{{url('/assets/admin/img/logo-white.png')}}" style="width:100%;height:auto;">
      </a>
      <div class="menu-toggler sidebar-toggler">
        <span></span>
      </div>
    </div>
    <!-- END LOGO -->
    <!-- BEGIN RESPONSIVE MENU TOGGLER -->
    <a href="javascript:;" class="menu-toggler responsive-toggler" data-toggle="collapse" data-target=".navbar-collapse">
      <span></span>
    </a>
    <!-- END RESPONSIVE MENU TOGGLER -->
    <!-- BEGIN TOP NAVIGATION MENU -->
    <div class="top-menu">
      <ul class="nav navbar-nav pull-right">
        <li class="dropdown dropdown-user">
          <a href="javascript:;" class="dropdown-toggle" data-toggle="dropdown" data-hover="dropdown" data-close-others="true">
            @if(Auth::user()->picture)
              <img alt="" class="img-circle" src="{{url(Auth::user()->picture)}}" />
            @else
              <img src="{{url('assets/admin/img/avatar.png')}}" class="img-circle" style="width:100%;max-width:30px;height: auto;">
            @endif
            <span class="username username-hide-on-mobile">  {{Auth::user()->first_name}}</span>
          </a>
        </li>
        <li><a class="" style="color:#fff;font-size:13px;background:#32c5d2" href="{{url('/')}}">Visit Website</a></li>
      </ul>
    </div>
    <!-- END TOP NAVIGATION MENU -->
  </div>
  <!-- END HEADER INNER -->
</div>