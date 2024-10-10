<?php
$sh_query = "SELECT * FROM horizon_section_content";
$sh_result = mysqli_query($con,$sh_query);
$geth = mysqli_fetch_assoc($sh_result);
$imageh = $geth['image_path'];
$sh_heading_texts = $geth['heading'];
?>
<div class="container-fluid" style="padding: 30px;">
    <div class="row align-items-stretch" style="display: flex; height: 100%;">
        <div class="col-md-6 image-container" style="background-image: url('admin/uploads/<?php echo $imageh; ?>'); background-size: cover; background-position: center; min-height: 400px;">
           <!-- image container -->
        </div>
        <div class="col-md-6 content d-flex flex-column" style="padding: 20px; height: 100%;">
          <?php echo $sh_heading_texts; ?>

            <div class="mt-auto">
                <button class="enquire-btn" style="font-size: 14px; padding: 10px 20px; margin-top 30px;">Download Broucher</button>
            </div>
        </div>
    </div>
</div>

