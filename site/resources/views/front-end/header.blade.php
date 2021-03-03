<!doctype html>
<html class="no-js" lang="zxx">
<head>
  <meta charset="utf-8">
  <meta http-equiv="x-ua-compatible" content="ie=edge">
  <title>Rishikesh Real Estate Listing</title>
  <meta name="description" content="">
  <meta name="viewport" content="width=device-width, initial-scale=1, user-scalable=0">
  <!-- Favicon -->
  <link rel="shortcut icon" type="image/x-icon" href="{{url('frontend/images/icons/favicon.png')}}">
  <!-- All css files are included here. -->
  <!-- Bootstrap fremwork main css -->
  <link rel="stylesheet" href="{{url('frontend/css/bootstrap.min.css')}}">
  <!-- nivo slider CSS -->
  <link rel="stylesheet" href="{{url('frontend/lib/css/nivo-slider.css')}}">
  <!-- This core.css file contents all plugings css file. -->
  <link rel="stylesheet" href="{{url('frontend/css/core.css')}}">
  <!-- Theme shortcodes/elements style -->
  <link rel="stylesheet" href="{{url('frontend/css/shortcode/shortcodes.css')}}">
  <!-- Theme main style -->
  <link rel="stylesheet" href="{{url('frontend/css/style.css')}}">
  <!-- Responsive css -->
  <link rel="stylesheet" href="{{url('frontend/css/responsive.css')}}">
  <!-- User style -->
  <link rel="stylesheet" href="{{url('frontend/css/custom.css')}}">
  <!-- Modernizr JS -->
  <script src="{{url('frontend/js/modernizr-2.8.3.min.js')}}"></script>
</head>
<body>
  <div class="wrapper">
    <!-- HEADER AREA START -->
    <header class="header-area header-wrapper">
      <div class="header-top-bar bg-white">
        <div class="container">
          <div class="row">
            <div class="col-lg-3 col-md-6 col-12">
              <div class="logo">
                <a href="{{url('/')}}">
                <img src="{{url('frontend/images/logo/logo.png')}}" alt="">
                </a>
              </div>
            </div>
            <div class="col-lg-6 d-none d-lg-block">
              <div class="company-info clearfix">
                <div class="company-info-item">
                  <div class="header-icon">
                    <img src="{{url('frontend/images/icons/phone.png')}}" alt="">
                  </div>
                  <div class="header-info">
                    <h6>+91 7895 456 123</h6>
                    <p>Timings: 9 am - 7 pm</p>
                  </div>
                </div>
                <div class="company-info-item">
                  <div class="header-icon">
                    <img src="{{url('frontend/images/icons/mail-open.png')}}" alt="">
                  </div>
                  <div class="header-info">
                    <h6><a href="javascript:;">info@domain.com</a></h6>
                    <p>You can mail us</p>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-lg-3 col-md-6 col-12">
              <div class="header-search clearfix text-right">
                <a class="green-btn" href="{{url('user-login')}}">User Login</a> &nbsp; <a class="green-btn blue-btn" href="{{url('/agent-login')}}">Agent Login</a>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div id="sticky-header" class="header-middle-area transparent-header d-none d-md-block">
        <div class="container">
          <div class="full-width-mega-drop-menu">
            <div class="table-div">
              <div class="sticky-logo">
                <a href="{{url('/')}}">
                <img src="{{url('frontend/images/logo/logo.png')}}" alt="">
                </a>
              </div>
              <div class="text-center">
                <nav id="primary-menu">
                  <ul class="main-menu text-center">
                    <li>
                      <a href="{{url('/')}}">Home</a>
                    </li>
                    <li>
                      <a href="{{url('/services')}}">Our Services</a>
                    </li>
                    <li>
                      <a href="{{url('/listings')}}">Our Listings</a>
                    </li>
                    <li>
                      <a href="{{url('/projects')}}">Our Projects</a>
                    </li>
                    <li><a href="{{url('/about')}}">About</a></li>
                    <li><a href="{{url('/contact')}}">Contact</a></li>
                  </ul>
                </nav>
              </div>
              <div>
                <div class="sticky-buttons text-right">
                  <a class="green-btn" href="{{url('/user-login')}}">User Login</a> <a class="green-btn blue-btn" href="{{url('/agent-login')}}">Agent Login</a>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </header>
    <!-- HEADER AREA END -->
    <!-- MOBILE MENU AREA START -->
    <div class="mobile-menu-area d-block d-md-none">
      <div class="container">
        <div class="row">
          <div class="col-12">
            <div class="mobile-menu">
              <nav id="dropdown">
                <ul>
                  <li>
                    <a href="{{url('/index')}}">Home</a>
                  </li>
                  <li>
                    <a href="{{url('/services')}}">Our Services</a>
                  </li>
                  <li>
                    <a href="{{url('/listings')}}">Our Listings</a>
                  </li>
                  <li>
                    <a href="{{url('/projects')}}">Our Projects</a>
                  </li>
                  <li><a href="{{url('/about')}}">About</a></li>
                  <li><a href="{{url('/user-login')}}">Login</a></li>
                  <li><a href="{{url('/contact')}}">Contact</a></li>
                </ul>
              </nav>
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- MOBILE MENU AREA END -->