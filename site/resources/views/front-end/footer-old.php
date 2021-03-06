
<footer id="footer" class="footer-area">
  <div class="footer-top pt-110 pb-80">
    <div class="container">
      <div class="row">
        <!-- footer-address -->
        <div class="col-xl-3 col-lg-3 col-md-6 col-12 order-1">
          <div class="footer-widget">
            <div class="img mb-5">
              <img src="{{url('/frontend/images/logo/logo-white.png')}}">
            </div>
            <ul class="footer-address">
              <li>
                <div class="address-icon">
                  <img src="{{url('frontend/images/icons/location-2')}}.png" alt="">
                </div>
                <div class="address-info">
                  <span>Dehradun Road, Rishikesh</span>
                  <span>Uttarakhand - 249201</span>
                </div>
              </li>
              <li>
                <div class="address-icon">
                  <img src="{{url('frontend/images/icons/phone-3')}}.png" alt="">
                </div>
                <div class="address-info">
                  <span>+91 123-456-7890</span>
                  <span>+91 123-456-7890</span>
                </div>
              </li>
              <li>
                <div class="address-icon">
                  <img src="{{url('frontend/images/icons/world.png')}}" alt="">
                </div>
                <div class="address-info">
                  <span>Email : info@realestate.com</span>
                  <span>Web :<a href="javascript:;" target="_blank"> www.realestate.com</a></span>
                </div>
              </li>
            </ul>
          </div>
        </div>
        <!-- footer-latest-news -->
        <div class="col-xl-4 col-lg-4 col-12 order-3 order-lg-2">
          <div class="footer-widget middle">
            <h6 class="footer-titel">RECENT PROJECTS</h6>
            <ul class="footer-latest-news">
              <?php $projects = App\Project::take(3)->get();?>
              @foreach($projects as $project)
              <li>
                <div class="latest-news-image">
                  <a href="{{url('project-details/'.$project->id)}}"><img src="{{url($project->feature_image)}}" alt=""></a>
                </div>
                <div class="latest-news-info">
                  <h6><a href="{{url('project-details/'.$project->id)}}">{{$project->title}}</a></h6>
                  <p><img src="images/icons/location.png" alt="">{{$project->location}}</p>
                </div>
              </li>
              @endforeach
            </ul>
          </div>
        </div>
        <!-- footer-contact -->
        <div class="col-xl-5 col-lg-5 col-md-6 col-12 order-2 order-lg-3 mt-sm-30">
          <div class="footer-widget pl-4">
            <h6 class="footer-titel">Important Links</h6>
            <div class="footer-menu">
              <div class="row">
                <div class="col-md-6 ">
                  <ul>
                    <li><a href="{{url('/buying-tips')}}"><i class="fa fa-angle-right"></i> Buying Tips</a></li>
                    <li><a href="{{url('/calculator')}}"><i class="fa fa-angle-right"></i> Calculator</a></li>
                    <li><a href="{{url('/uttarakhand-education')}}"><i class="fa fa-angle-right"></i> Uttarakhand Education</a></li>
                    <li><a href="{{url('/yoga-meditation-in-rishikesh')}}"><i class="fa fa-angle-right"></i> Yoga & Meditation</a></li>
                    <li><a href="{{url('/subscribe')}}"><i class="fa fa-angle-right"></i> Subscribe</a></li>
                  </ul>
                </div>
                <div class="col-md-6">
                  <ul>
                    <li><a href="{{url('/projects')}}"><i class="fa fa-angle-right"></i> Our Projects</a></li>
                    <li><a href="{{url('/legal-documents')}}"><i class="fa fa-angle-right"></i> Legal Documents</a></li>
                    <li><a href="{{url('/contact')}}"><i class="fa fa-angle-right"></i> Contact Us</a></li>
                    <li><a href="{{url('/adventure-activities-in-rishikesh')}}"><i class="fa fa-angle-right"></i> Adventure Activities</a></li>
                    <li><a href="{{url('/rishikesh-hotels')}}"><i class="fa fa-angle-right"></i> Rishikesh Hotels</a></li>
                  </ul>
                </div>  
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
  <div class="footer-bottom">
    <div class="container">
      <div class="row">
        <div class="col-6">
          <div class="copyright">
            <p>
              Copyright &copy; <script>
                document.write(new Date().getFullYear());
              </script> <a href="{{url('/')}}"><b>Rishikesh Real Estate</b></a>. All Rights Reserved.
            </p>
          </div>
        </div>
        <div class="col-6">
          <div class="copyright text-right">
            <p>RERA Registration: XXXXXXXXXXXX</p>
          </div>
        </div>
      </div>
    </div>
  </div>
</footer>

</div>

<div id="detailsModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-uppercase">Enquire Now</h4>
      </div>
      <div class="modal-body">
        
      </div>
    </div>
  </div>
</div>


<div id="loginModal" class="modal fade" role="dialog">
  <div class="modal-dialog">
    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title text-uppercase">Login</h4>
      </div>
      <div class="modal-body">
          <form id="contact-form" class="ajax_update" method="post" action="{{url('user-login')}}">
            <div class="row">
              <input type="hidden" name="_token" value="{{csrf_token()}}">
              <div class="col-md-6 pr-0">
                <input type="email" name="username" placeholder="Username" required="true">
              </div>
              <div class="col-md-6">
                <input type="password" name="password" placeholder="Password" required="true">
              </div>
            </div>
            <input type="hidden" name="call_url" value="">
            <button type="submit" class="submit-btn-1">Login</button>
          </form>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript">
  var base_url = "{{url('/')}}";
  var auth = "{{(Auth::check())?1:0}}";
</script>
<!-- Body main wrapper end -->
<!-- Placed js at the end of the document so the pages load faster -->
<!-- jquery latest version -->
<script src="{{url('frontend/js/vendor/jquery-3.1.1.min.js')}}"></script>
<!-- Bootstrap framework js -->
<script src="{{url('frontend/js/bootstrap.min.js')}}"></script>
<!-- Nivo slider js -->
<script src="{{url('frontend/lib/js/jquery.nivo.slider.js')}}"></script>
<!-- All js plugins included in this file. -->
<script src="{{url('frontend/js/plugins.js')}}"></script>
<!-- Main js file that contents all jQuery plugins activation. -->
<script src="{{url('frontend/js/main.js')}}"></script>
<script src="{{url('frontend/js/custom.js')}}"></script>

</body>
</html>