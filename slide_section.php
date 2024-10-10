<?php

$query = "SELECT * FROM carousel_slides";
$result = $con->query($query);
?>

<div id="carouselExampleIndicators" class="carousel slide" data-ride="carousel" data-interval="5000">
    <ol class="carousel-indicators">
        <?php
        $totalSlides = $result->num_rows;
        $active = true;
        for ($i = 0; $i < $totalSlides; $i++) {
            ?>
            <li data-target="#carouselExampleIndicators" data-slide-to="<?php echo $i; ?>" class="<?php echo $active ? 'active' : ''; ?>"></li>
            <?php
            $active = false;
        }
        ?>
    </ol>

    <div class="carousel-inner">
        <?php
        $active = true;
        while ($row = $result->fetch_assoc()) {
            ?>
            <div class="carousel-item <?php if ($active) { echo 'active'; $active = false; } ?>">

            <div class="overlay"></div>
                <img src="admin/uploads/<?php echo $row['image']; ?>" class="d-block w-100" style="height: 600px; object-fit: cover;" alt="...">

                <div class="container" >
                    <div class="row justify-content-start align-items-start" >
                        <!-- First caption div -->
                        <div class="col-md-6">
    <div class="carousel-caption d-md-block text-left" >
      
    <h5 class="heading"><?php echo $row['heading_text']; ?></h5>
<p style="color: #fff;"><?php echo $row['paragraph_text']; ?></p>

        <a id="openModal" class="btn enquire-btn openModal" style="background-color: <?php echo $row['button_color']; ?>; color: <?php echo $row['button_text_color']; ?>;">
            <?php echo $row['button_text']; ?>
        </a>
    </div>
</div>


                        <!-- Second caption div (Image) -->
                        <div class="col-md-6">
                            <div class="carousel-caption d-md-block text-left">
                                <img src="admin/uploads/<?php echo $row['image']; ?>" class="custom-image" alt="..." style="height: 300px; width: 300px; border-radius : 10px;">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <?php
        }
        ?>
    </div>
</div>

<style>
.overlay {
  position: absolute;
  top: 0;
  left: 0;
  width: 100%;
  height: 100%;
  background: rgba(13, 21, 36, 0.7); /* Semi-transparent dark blue */
  opacity:0.8;
  z-index: 1; /* Ensure it appears below the text but above the image */
  overflow-x: hidden;
}



.custom-image {
  height: 300px;
  width: 300px;
 
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Shadow for depth */
  margin-top: 20px; /* Spacing from the top */
}

.carousel-item .row {
  margin-left: 0; /* Prevent left offset */
  margin-right: 0; /* Prevent right offset */
}


.carousel-item {
  position: relative; /* Positioning context for absolute elements */
}

.carousel-caption {
  position: absolute; /* Absolute positioning */
  bottom: 20%; /* Position from the bottom */
  left: 10%; /* Adjust left positioning */
  right: 10%; /* Adjust right positioning */
  padding-bottom: 151px;
  z-index: 10; /* Ensure it appears above images */
}

/* Responsive adjustments */
@media (max-width: 768px) {
  .custom-image {
    width: 100%; /* Make image responsive */
    height: auto; /* Maintain aspect ratio */
  }
}

/* Customize the carousel indicators to appear as dots */
.carousel-indicators li {
  width: 12px;
  height: 12px;
  border-radius: 50%; /* Makes the indicators round */
  background-color: rgba(255, 255, 255, 0.5); /* Initial color */
  transition: background-color 0.3s ease;
}

.carousel-indicators .active {
  background-color: rgba(255, 255, 255, 1); /* Color when active */
}

/* Base styles for desktop screens and larger */
.carousel-caption {
  padding: 20px;
}

.custom-image {
  height: 300px;
  width: 300px;
  box-shadow: 0 4px 8px rgba(0, 0, 0, 0.3); /* Shadow for depth */
  margin-top: 20px; /* Spacing from the top */
}

.carousel-item .row {
  margin-left: 0;
  margin-right: 0;
}

.carousel-item {
  position: relative; /* Positioning context for absolute elements */
}

.carousel-caption {
  position: absolute; /* Absolute positioning */
  bottom: 20%; /* Adjust bottom */
  left: 10%; /* Adjust left */
  right: 10%; /* Adjust right */
  z-index: 10;
  padding-bottom: 151px;
}

.carousel-item img {
  height: 600px; /* Default image height for large screens */
  object-fit: cover; /* Maintain aspect ratio */
}

/* Carousel indicators as dots */
.carousel-indicators li {
  width: 12px;
  height: 12px;
  border-radius: 50%; /* Makes the indicators round */
  background-color: rgba(255, 255, 255, 0.5); /* Initial color */
  transition: background-color 0.3s ease;
}

.carousel-indicators .active {
  background-color: rgba(255, 255, 255, 1); /* Color when active */
}

@media (max-width: 768px) and (min-width: 320px) {
  .carousel-caption {
    bottom: 20%;
    left: 5%;
    right: 5%;

    padding-bottom: 151px;
  }
  .carasoul_container{

  }

  .carousel-item img {
    height: 250px; /* Further reduce image height for small screens */
  }

  .custom-image {
    display: none; /* Hide custom image for screens in this range */
  }

/* .carousel-inner{

  height : 400px;
} */

}



</style>
