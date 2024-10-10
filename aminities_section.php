<style>
  .amenities-section {
    padding: 60px 20px;
    text-align: center;
}

.amenities-section h2 {
    font-size: 2.5rem;
    font-style: italic;
    margin-bottom: 20px;
}

.amenities-img {
    width: 100%;
    border-radius: 15px;
    margin-bottom: 30px;
    object-fit: cover;
    height: 100%; /* Ensure the image stretches vertically */
}

.amenities-list {
    list-style-type: none;
    padding: 0;
}

.amenities-list li {
    display: flex;
    align-items: center;
    font-size: 1.1rem;
    margin-bottom: 15px;
}

.amenities-list li img {
    width: 40px;
    margin-right: 15px;
}

.amenities-container {
    display: flex;
    flex-wrap: wrap;
    justify-content: space-between;
    align-items: stretch; /* This ensures items stretch along the container */
}

.amenities-image {
    flex: 1;
    min-width: 300px;
    margin-right: 20px;
    align-self: stretch; /* Ensures the image stretches vertically as content grows */
}

.amenities-details {
    flex: 1;
    min-width: 300px;
    display: flex;
    flex-direction: column;
}

.small-icon-list {
    display: flex;
    justify-content: space-between;
    margin-top: 20px;
}

.small-icon-item {
    display: flex;
    align-items: center;
    padding: 10px 15px;
    border-radius: 10px;
    font-size: 1rem;
    flex: 1;
    margin: 0 10px;
}

.small-icon-item img {
    width: 35px;
    margin-right: 10px;
    border: 1px solid #DFBD69;
}

</style>
</head>
<section class="amenities-section">
    <?php
    $query = "SELECT * FROM aminity_content";
    $res = mysqli_query($con, $query);
    $f = mysqli_fetch_assoc($res);
    $heading_aminities = $f["heading"];
    $amin_image = $f["ami_image"];
    $amin_para = $f["para_text"];


    // $s_query = "SELECT * FROM `aminities`";
    // $squery_result = mysqli_query($con,$s_query);
    // $sf= mysqli_fetch_assoc($squery_result);
    

    ?>

  <p class="amenities-description text-center">
 <?php echo $heading_aminities ?>
  </p>

  <div class="amenities-container">
  
      <div class="amenities-image">
          <img src="admin/uploads/<?php echo $amin_image ?>" class="amenities-img" alt="Sky Deck Image">
      </div>
      <?php


// Fetch amenities from the database
$sql = "SELECT ami_icon, ami_name FROM aminities";
$result = $con->query($sql);
?>

<div class="amenities-details">
    <span style="text-align: start;"><?php echo $amin_para; ?></span>

    <?php if ($result->num_rows > 0): ?>
        <?php 
        // Initialize a counter to track how many amenities have been displayed
        $count = 0; 
        while ($sf = $result->fetch_assoc()): 
            // Check if a new row should be started
            if ($count % 2 == 0): 
                echo '<div class="small-icon-list mt-2">'; 
            endif;
        ?>
            <div class="small-icon-item">
                <img src="admin/<?php echo $sf['ami_icon']; ?>" alt="Icon" style="width: 25px; height: 25px;"> 
                <?php echo $sf['ami_name']; ?>
            </div>
        <?php 
            $count++; 
            // Close the row after two items
            if ($count % 2 == 0): 
                echo '</div>'; 
            endif; 
        endwhile; 
        
        // Close the last row if it wasn't closed
        if ($count % 2 != 0): 
            echo '</div>'; 
        endif; 
        ?>
    <?php else: ?>
        <p>No amenities available.</p>
    <?php endif; ?>
</div>



  </div>
</section>
