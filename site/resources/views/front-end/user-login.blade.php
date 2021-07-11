@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">User Login</h2>
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
            <h5 class="mb-20">USER LOGIN</h5>
            <form action="{{url('user-login')}}" method="post">
              <div class="login-account p-30 box-shadow">
                <p>If you have an account with us, Please log in.</p>
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <input type="hidden" name="user_type" value="3">
                <input type="text" name="username" placeholder="Email Address" required>
                <input type="password" name="password" placeholder="Password" required>
                <p><small><a href="{{url('forget-password')}}">Forgot Password?</a></small></p>
                <button class="submit-btn-1" type="submit">Login</button>
              </div>
            </form>
          </div>
        </div>
        <!-- new-customers -->
        <div class="col-lg-6 col-12">
          <div class="new-customers mb-50">
            <form action="{{url('/register-user')}}" method="post" autocomplete="off">
              <h5 class="mb-20">USER REGISTRATION</h5>
              <div class="login-account p-30 box-shadow">
                <input type="hidden" name="_token" value="{{ csrf_token() }}">
                <div class="row">
                  <div class="col-md-6">
                    <input type="text" placeholder="First Name" name="first_name" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" placeholder="Last Name" name="last_name" required="true">
                  </div>
                  <div class="col-md-6">
                    <input type="email" placeholder="Email Address" name="email" required>
                  </div>
                  <div class="col-md-6">
                    <input type="text" placeholder="Phone" name="phone">
                  </div>
                  <div class="col-md-12">
                    <input type="text" placeholder="Address" name="addresss">
                  </div>
                  <div class="col-md-6">
                    <select class="custom-select-2" name="state" required="true">
                      <option value="default">Select State</option>
                      <option value="uttarakhand">Uttarakhand</option>
                    </select>
                  </div>

                  <div class="col-md-6">
                    <select class="custom-select-2" name="city" required="true">
                      <option>Select City/Town</option>
                      <option value="Almora">Almora</option>
                      <option value="Almora Cantonment">Almora Cantonment</option>
                      <option value="Badrinathpuri">Badrinathpuri</option>
                      <option value="Bageshwar">Bageshwar</option>
                      <option value="Bahadarabad">Bahadarabad</option>
                      <option value="Bajpur (Bazpur)">Bajpur (Bazpur)</option>
                      <option value="Banbasa">Banbasa</option>
                      <option value="Bandiya (Bandia)">Bandiya (Bandia)</option>
                      <option value="Bangherimahabatpur (Must)">Bangherimahabatpur (Must)</option>
                      <option value="Barkot">Barkot</option>
                      <option value="Bhagwanpur">Bhagwanpur</option>
                      <option value="BHEL Ranipur">BHEL Ranipur</option>
                      <option value="Bhimtal">Bhimtal</option>
                      <option value="Bhowali">Bhowali</option>
                      <option value="Central Hope Town">Central Hope Town</option>
                      <option value="Chakrata">Chakrata</option>
                      <option value="Chamba">Chamba</option>
                      <option value="Chamoli Gopeshwar">Chamoli Gopeshwar</option>
                      <option value="Champawat">Champawat</option>
                      <option value="Clement Town">Clement Town</option>
                      <option value="Dehradun">Dehradun</option>
                      <option value="Dehradun Cantonment">Dehradun Cantonment</option>
                      <option value="Devaprayag">Devaprayag</option>
                      <option value="Dhaluwala">Dhaluwala</option>
                      <option value="Dhandera">Dhandera</option>
                      <option value="Dharchula">Dharchula</option>
                      <option value="Didihat">Didihat</option>
                      <option value="Dineshpur">Dineshpur</option>
                      <option value="Dogadda">Dogadda</option>
                      <option value="Doiwala">Doiwala</option>
                      <option value="Dwarahat">Dwarahat</option>
                      <option value="Fatehpur Range, Dhamua Dunga Area">Fatehpur Range, Dhamua Dunga Area</option>
                      <option value="Gadarpur">Gadarpur</option>
                      <option value="Gangotri">Gangotri</option>
                      <option value="Gochar (Gauchar)">Gochar (Gauchar)</option>
                      <option value="Gumaniwala">Gumaniwala</option>
                      <option value="Haldwani-cum-Kathgodam">Haldwani-cum-Kathgodam</option>
                      <option value="Haldwani Talli">Haldwani Talli</option>
                      <option value="Hardwar (Haridwar)">Hardwar (Haridwar)</option>
                      <option value="Haripur Kalan">Haripur Kalan</option>
                      <option value="Herbertpur">Herbertpur</option>
                      <option value="Jagjeetpur">Jagjeetpur</option>
                      <option value="Jaspur">Jaspur</option>
                      <option value="Jhabrera">Jhabrera</option>
                      <option value="Jiwangarh">Jiwangarh</option>
                      <option value="Jonk">Jonk</option>
                      <option value="Joshimath (Jyotirmath)">Joshimath (Jyotirmath)</option>
                      <option value="Kaladhungi">Kaladhungi</option>
                      <option value="Kanchal Gosain">Kanchal Gosain</option>
                      <option value="Karnaprayag">Karnaprayag</option>
                      <option value="Kashipur">Kashipur</option>
                      <option value="Kashirampur">Kashirampur</option>
                      <option value="Kedarnath">Kedarnath</option>
                      <option value="Kela Khera">Kela Khera</option>
                      <option value="Khanjarpur">Khanjarpur</option>
                      <option value="Kharak mafi">Kharak mafi</option>
                      <option value="Khatima">Khatima</option>
                      <option value="Khatyari">Khatyari</option>
                      <option value="Kichha">Kichha</option>
                      <option value="Kirtinagar">Kirtinagar</option>
                      <option value="Kotdwara (Kotdwar)">Kotdwara (Kotdwar)</option>
                      <option value="Laksar">Laksar</option>
                      <option value="Lalkuan">Lalkuan</option>
                      <option value="Landaur (Landour)">Landaur (Landour)</option>
                      <option value="Landhaura">Landhaura</option>
                      <option value="Lansdowne">Lansdowne</option>
                      <option value="Lohaghat">Lohaghat</option>
                      <option value="Maholiya">Maholiya</option>
                      <option value="Mahua Dabra Haripura">Mahua Dabra Haripura</option>
                      <option value="Mahua Kheraganj">Mahua Kheraganj</option>
                      <option value="Manglaur">Manglaur</option>
                      <option value="Maohanpur Mohammadpur">Maohanpur Mohammadpur</option>
                      <option value="Mehu Wala Mafi">Mehu Wala Mafi</option>
                      <option value="Mukhani (Roopnagar, Basant Vihar Colony and Judges Farm)">Mukhani (Roopnagar, Basant Vihar Colony and Judges Farm)</option>
                      <option value="Muni Ki Ret">Muni Ki Reti</opton>
                      <option value="Mussoorie">Mussoorie</option>
                      <option value="Nagala Imarti">Nagala Imarti</option>
                      <option value="Nagla">Nagla</option>
                      <option value="Nainital">Nainital</option>
                      <option value="Nainital Cantonment">Nainital Cantonment</option>
                      <option value="Nandprayag (Nandaprayag)">Nandprayag (Nandaprayag)</option>
                      <option value="Narendranagar">Narendranagar</option>
                      <option value="Natthan Pur">Natthan Pur</option>
                      <option value="Natthuwa Wala">Natthuwa Wala</option>
                      <option value="Padali Gujar">Padali Gujar</option>
                      <option value="Padampur Sukhran">Padampur Sukhran</option>
                      <option value="Pauri">Pauri</option>
                      <option value="Piran Kaliyar">Piran Kaliyar</option>
                      <option value="Pithoragarh">Pithoragarh</option>
                      <option value="Pratitnagar">Pratitnagar</option>
                      <option value="Raipur">Raipur</option>
                      <option value="Ramnagar">Ramnagar</option>
                      <option value="Ranikhet">Ranikhet</option>
                      <option value="Rawali Mahdood">Rawali Mahdood</option>
                      <option value="Rishikesh">Rishikesh</option>
                      <option value="Rishikesh">Rishikesh</option>
                      <option value="Roorkee">Roorkee</option>
                      <option value="Roorkee Cantonment">Roorkee Cantonment</option>
                      <option value="Rudraprayag">Rudraprayag</option>
                      <option value="Rudrapur">Rudrapur</option>
                      <option value="Saidpura">Saidpura</option>
                      <option value="Salempur Rajputan">Salempur Rajputan</option>
                      <option value="Shafipur">Shafipur</option>
                      <option value="Shahpur">Shahpur</option>
                      <option value="Shaktigarh">Shaktigarh</option>
                      <option value="Sitarganj">Sitarganj</option>
                      <option value="Srinagar">Srinagar</option>
                      <option value="Sultanpur">Sultanpur</option>
                      <option value="Sunhaira">Sunhaira</option>
                      <option value="Tanakpur">Tanakpur</option>
                      <option value="Tehri">Tehri</option>
                      <option value="Umru Khurd">Umru Khurd</option>
                      <option value="Uttarkashi">Uttarkashi</option>
                      <option value="Vikasnagar">Vikasnagar</option>
                      <option value="Virbhadra">Virbhadra</option>
                    </select>
                  </div>
                </div>
                <div class="checkbox">
                  <label>
                    <input type="checkbox" name="agree_terms" required> &nbsp; I agree to all the <a href="javascript:;">Terms & Conditions</a>
                  </label>
                </div>
                <div class="">
                  <div>
                    <button class="submit-btn-1 mt-20" type="submit" value="register">Register</button> &nbsp; <button class="submit-btn-1 mt-20" type="reset">Clear</button>
                  </div>
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
  <!-- LOGIN SECTION END -->
</section>
<!-- End page content -->
@endsection