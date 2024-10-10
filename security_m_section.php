<?php
$sm_query = "SELECT * FROM security_content";
$sm_result = mysqli_query($con,$sm_query);
$get = mysqli_fetch_assoc($sm_result);
$image = $get['scm_image'];
$scm_heading_texts = $get['heading'];
?>
<div class="container-fluid" style="padding: 30px;">
    <div class="row align-items-stretch" style="display: flex; height: 100%;">
        <div class="col-md-6 image-container" style="background-image: url('admin/uploads/<?php echo $image; ?>'); background-size: cover; background-position: center; min-height: 400px;">
           <!-- image container -->
        </div>
        <div class="col-md-6 content d-flex flex-column" style="padding: 20px; height: 100%;">
          <?php echo $scm_heading_texts; ?>

            <div class="mt-auto">
                <button  class="enquire-btn openModal" style="font-size: 14px; padding: 10px 20px; margin-top 30px;">Enquire Now</button>
            </div>
        </div>
    </div>
</div>

