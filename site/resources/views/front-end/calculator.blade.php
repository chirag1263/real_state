@extends('front-end.layout')
@section('content')
<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70" style="background: url({{url('frontend/images/bg/5.jpg')}});">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Calculator</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- ABOUT START -->
  <div class="ptb-100">
    <div class="container">
      <div class="">
        <h3 class="text-uppercase">Calculator:</h3>
        <p>
          Convert your property measurements to/from a variety of units used in different parts of India using our handy Area Conversion Calculator.
        </p>
        <p>
          Use our EMI Calculator to calculate your Equated Monthly Installment for your custom loan amount, interest rate, tenure.
        </p>
        <p>
          You can also specify if the payments are going to be calculated on a monthly or annual reducing balance.  
        </p>
      </div>
      <div class="row mt-5">
      	<div class="col-md-6">
      		<div class="contact-messge grey-bg">
            <!-- blog-details-reply -->
            <div class="leave-review">
              <h5>Area Conversion Calculator</h5>
              <form id="contact-form">
              	<label><b>Convert:</b></label>
              	<div class="row">
              		<div class="col-md-6">
                		<input type="text" name="name" placeholder="Input Value" required="true">
              		</div>
              		<div class="col-md-6">
              			<select name="area_unit"  required="true">
											<option selected="">Select Unit</option> 
											<option value="acre">acre</option> 
											<option value="sq. cm">square centimetres</option> 
											<option value="sq. ft">square feet</option> 
											<option value="ha">hectare</option> 
											<option value="sq. in">square inches</option> 
											<option value="sq. km">square kilometres</option> 
											<option value="sq. m">square metres</option> 
											<option value="sq. miles">square miles</option> 
											<option value="sq. mm">square millimetres</option> 
											<option value="sq. yds">square yard</option>
								  	</select>
              		</div>
              	</div>
              	<div class="row">
              		<div class="col-md-6"  required="true">
              			<select> 
					            <option selected="">Select Target Unit</option> 
					            <option value="acre">acre</option> 
											<option value="sq.cm">square centimetres</option> 
											<option value="sq. ft">square feet</option> 
											<option value="ha">hectare</option> 
											<option value="sq. in">square inches</option> 
											<option value="sq. km">square kilometres</option> 
					            <option value="sq. m">square metres</option> 
					            <option value="sq. miles">square miles</option> 
					            <option value="sq. mm">square millimetres</option> 
					            <option value="sq. yds">square yard</option>
						    		</select>
              		</div>
              		<div class="col-md-6">
                		<input type="text" name="name" placeholder="Result" disabled >
              		</div>
              	</div>
                <button type="submit" class="submit-btn-1">Calculate</button>
              </form>
              <div class="mt-4">
              	<p class="mb-0">1 square centimeter = 0.1550 square inches</p>
              	<p class="mb-0">1 square meter = 1.1960 square yards</p>
              	<p class="mb-0">1 hectare = 2.4711 acres</p>
              	<p class="">1 square kilometer = 0.3861 square miles</p>
              	<b>Metric Conversion:</b>
								<p class="mb-0">1 square inch = 6.4516 square centimeters</p>
								<p class="mb-0">1 square foot = 0.0929 square meters</p>
								<p class="mb-0">1 square yard = 0.8361 square meters</p>
								<p class="mb-0">1 acre = 4046.9 square meters</p>
								<p class="mb-0">1 square mile = 2.59 square kilometers</p>
              </div>
            </div>
          </div>
      	</div>
      	<div class="col-md-6">
      		<div class="contact-messge grey-bg">
            <!-- blog-details-reply -->
            <div class="leave-review">
              <h5>EMI Calculator</h5>
              <form id="contact-form">
              	<label><b>Loan Amount:</b></label>
            		<input type="text" name="" placeholder="100000" required="true">
            		<label><b>Tenure (In Yrs):</b></label>
            		<input type="text" name="" placeholder="20" required="true">
            		<label><b>Interest Rate (%):</b></label>
            		<input type="text" name="" placeholder="8.5" required="true">
            		<label><b>Reducing Balance Based On:</b></label>
          			<select name=""  required="true">
									<option value="annual_rests">Annual Rests</option> 
									<option value="monthly_rests">Monthly Rests</option> 
									<option value="daily_rests">Daily Rests</option> 
						  	</select>
            		<label><b>EMI (INR):</b></label>
            		<input type="text" name="" disabled >
                <button type="submit" class="submit-btn-1">Calculate</button>
              </form>
            </div>
          </div>
      	</div>
      </div>
    </div>
  </div>
	<!-- ABOUT END -->
</section>

</section>
<!-- End page content -->
@endsection