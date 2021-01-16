<?php include "header.php";?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Project Details</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- PROJECT DETAILS AREA START -->
  <div class="properties-details-area pt-115 pb-60">
    <div class="container">
      <div class="row">
        <div class="col-lg-8">
          <!-- pro-details-image -->
          <div class="pro-details-image mb-60">
            <div class="pro-details-big-image">
              <div class="tab-content" id="pills-tabContent">
                <?php for($i=1;$i<=4;$i++){?>
                  <div class="tab-pane fade show <?php if($i==1){echo 'active';}?>" id="pro-<?php echo $i?>" role="tabpanel" aria-labelledby="pro-<?php echo $i?>-tab">
                    <a href="images/single-property/big/<?php echo $i?>.jpg" data-lightbox="image-<?php echo $i?>" data-title="Listings - <?php echo $i?>">
                      <img src="images/single-property/big/<?php echo $i?>.jpg" alt="">
                    </a>
                  </div>
                <?php }?>
              </div>
            </div>
            <ul class="nav nav-pills pro-details-navs" id="pills-tab" role="tablist">
              <?php for($i=1;$i<=4;$i++){?>
                <li class="nav-item">
                  <a class="nav-link <?php if($i==1){echo 'active';}?>" id="pro-<?php echo $i?>-tab" data-toggle="pill" href="#pro-<?php echo $i?>" role="tab" aria-controls="pro-<?php echo $i?>" aria-selected="true"><img src="images/single-property/small/<?php echo $i?>.jpg" alt=""></a>
                </li>
              <?php }?>
            </ul>
          </div>
        </div>
        <div class="col-lg-4">
          <aside>
            <!-- description -->
            <div class="listing-description text-justify mb-50">
              <h3 class="">Property in Rishikesh For Sale</h3>
              <div class="cost green">
                <i class="fa fa-rupee"></i> 15,5000/-
              </div>
              <div class="location mt-10 mb-20">
                <img src="images/icons/location.png"> &nbsp; Dehradun Road, Rishikesh
              </div>
              <p>Lorem is ipsum dolor sit amet, consecteturadipiscing elit, sed do eiusmod tempor incididunt ut labore et dolore magna iqua. Utenim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut quipx eacodo consequat. Duis aute irure dolor in reprehenderit in voluptate velit essecillum dolo</p>
              <p>Lorem is the Best should be the consectetur adipiscing elit, sed do eiusmod temporincididunt ut labore lore magna iqua. Ut enim ad minim veniam, quis nostrudexercitation ullamco laboris nisi ut aliquip ex eacm emod tempor incididunt utlabore lore magna iqua. Ut enim ad minim veniamco laboris nisi ut aliqu</p>
              <div class="pdf-download">
                <i><a class="green" href="javascript:;"> <i class="fa fa-arrow-circle-right"></i> Click here</a> to download PDF presentation.</i>
              </div>
            </div>  
          </aside>
        </div>
      </div>
      <div class="listing-more-details elements-tab">
        <h5 class="text-uppercase">More Details:</h5>
        <hr class="mt-15">
        <div class="tab">
          <ul class="nav nav-pills mb-3" id="pills-tab" role="tablist">
            <li class="nav-item">
              <a class="nav-link active show" id="pills-one" data-toggle="pill" href="#pills-one-tab" role="tab" aria-controls="pills-one" aria-selected="false">Specifications</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-two" data-toggle="pill" href="#pills-two-tab" role="tab" aria-controls="pills-two" aria-selected="false">Site Plan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-three" data-toggle="pill" href="#pills-three-tab" role="tab" aria-controls="pills-three" aria-selected="false">Location Plan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-four" data-toggle="pill" href="#pills-four-tab" role="tab" aria-controls="pills-four" aria-selected="false">Payment Plan</a>
            </li>
            <li class="nav-item">
              <a class="nav-link" id="pills-five" data-toggle="pill" href="#pills-five-tab" role="tab" aria-controls="pills-five" aria-selected="true">Highlights</a>
            </li>
          </ul>
          <div class="tab-content" id="pills-tabContent">
            <div class="tab-pane fade active show" id="pills-one-tab" role="tabpanel" aria-labelledby="pills-one">
              <ul>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Distance from Rishikesh– 22 Kms.
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Distance from Airport– 38 Kms.
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Railway Station- 26 Kms.
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; ISBT- 5 Kms.
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Aerial Distance from Ganges –more than 500 Mtrs.
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Average Temperature of the area:
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Summer – 16 to 34 degree celsius
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Winter – 2 to 18 degree celsius
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Water Borewell and Power Back-up availale
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; 10 Cottages already constructed
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Helicopters landing is also possible
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Swimming/Splash pool under construction
                </li>
              </ul>
            </div>
            <div class="tab-pane fade" id="pills-two-tab" role="tabpanel" aria-labelledby="pills-two">
              <div class="text-center">
                <img class="img-fluid" src="images/site-plan.jpg">
              </div>
            </div>
            <div class="tab-pane fade" id="pills-three-tab" role="tabpanel" aria-labelledby="pills-three">
              <div class="text-center">
                <img class="img-fluid" src="images/location-plan.jpg">
              </div>
            </div>
            <div class="tab-pane fade" id="pills-four-tab" role="tabpanel" aria-labelledby="pills-four">
              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
              <p>It is a long established fact that a reader will be distracted by the readable content of a page when looking at its layout. The point of using Lorem Ipsum is that it has a more-or-less normal distribution of letters, as opposed to using 'Content here, content here', making it look like readable English. Many desktop publishing packages and web page editors now use Lorem Ipsum as their default model text, and a search for 'lorem ipsum' will uncover many web sites still in their infancy. Various versions have evolved over the years, sometimes by accident, sometimes on purpose (injected humour and the like).</p>
            </div>
            <div class="tab-pane fade" id="pills-five-tab" role="tabpanel" aria-labelledby="pills-five">
              <ul>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Type : Developed Land
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Zoning : Partially Agricultural & Partially non-agricultural
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Area : 158 Naali / 31,600 SQ. Mtrs. / 7.9 Acres
                </li>
                <li>
                  <i class="fa fa-check-square-o"></i> &nbsp; Proposed Use : ASHRAM, YOGA & MEDITATION RETREAT,  SCHOOL/ ACADEMY, RESORTS/HOTEL, FARMING, HERBAL  FARMING, VILLAS/COTTAGES, NGOs, FARM HOUSE etc.
                </li>
              </ul>
            </div>
          </div>
        </div>
      </div>
      <div class="blog-area mt-50">
        <h3 class="text-uppercase mb-20">More Projects</h3>
        <div class="blog-carousel row">
          <?php for($i=1;$i<=4;$i++){?>
            <div class="col">
              <article class="blog-item bg-gray">
                <div class="blog-image">
                  <a href="single-blog.html"><img src="images/blog/<?php echo $i?>.jpg" alt=""></a>
                </div>
                <div class="blog-info">
                  <div class="post-title-time">
                    <h5><a href="single-blog.html">Project Title <?php echo $i?></a></h5>
                    <p><small><i class="fa fa-map-marker"></i> Rishikesh, Uttarakhand</small></p>
                  </div>
                  <p>Lorem must explain to you how all this mistaolt denouncing pleasure and praising pain wasnad I will give you a complete pain was praising</p>
                  <a class="read-more" href="project-details.html">Explore Now</a>
                </div>
              </article>
            </div>
          <?php }?>
        </div>
      </div>
    </div>
  </div>
  <!-- PROJECT DETAILS AREA END -->
</section>
<!-- End page content -->

<?php include "footer.php";?>