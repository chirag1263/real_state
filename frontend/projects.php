<?php include "header.php";?>

<!-- BREADCRUMBS AREA START -->
<div class="breadcrumbs-area bread-bg-1 bg-opacity-black-70">
  <div class="container">
    <div class="row">
      <div class="col-xs-12">
        <div class="breadcrumbs">
          <h2 class="breadcrumbs-title">Our Projects</h2>
        </div>
      </div>
    </div>
  </div>
</div>
<!-- BREADCRUMBS AREA END -->

<!-- Start page content -->
<section id="page-content" class="page-wrapper">
  <!-- FEATURED FLAT AREA START -->
  <div class="featured-flat-area pt-115 pb-60">
    <div class="container">
      <div class="featured-flat">
        <div class="row">
          <?php for($i=1;$i<=9;$i++){?>
            <div class="col-lg-4 col-md-6 col-12">
              <div class="flat-item">
                <div class="flat-item-image">
                  <?php if($i%2!=0){?><span class="for-sale">For Sale</span><?php }?>
                  <a href="project-details.php"><img src="images/flat/<?php echo $i?>.jpg" alt=""></a>
                  <div class="flat-link">
                    <a href="project-details.php">More Details</a>
                  </div>
                </div>
                <div class="flat-item-info">
                  <div class="flat-title-price">
                    <h5><a href="project-details.php">Project Title <?php echo $i?> </a></h5>
                    <span class="price">$52,350</span>
                  </div>
                  <p><img src="images/icons/location.png" alt="">568 E 1st Ave, Ney Jersey</p>
                </div>
              </div>
            </div>
          <?php }?>
        </div>  
        <!-- pagination-area -->
        <div class="pagination-area mt-50 mb-60">
          <ul class="pagination-list text-center">
            <li><a href="#"><i class="fa fa-angle-left" aria-hidden="true"></i></a></li>
            <li><a href="#">1</a></li>
            <li><a href="#">2</a></li>
            <li><a href="#"><i class="fa fa-angle-right" aria-hidden="true"></i></a></li>
          </ul>
        </div>
      </div>
    </div>
  </div>
  <!-- FEATURED FLAT AREA END -->
</section>
<!-- End page content -->

<?php include "footer.php";?>