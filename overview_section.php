<?php
$sql = "SELECT id, image_path, heading_text, paragraph_text, card_heading, card_text FROM villa_content WHERE id = 1"; // Fetch by ID or other filters
$result = $con->query($sql);

if ($result->num_rows > 0) {
    // Fetch the data into an associative array
    $row = $result->fetch_assoc();
    
    $imagePath = $row['image_path'];
    $headingText = $row['heading_text'];
    $paragraphText = $row['paragraph_text'];
    $cardHeading = $row['card_heading'];
    $cardText = $row['card_text'];
} else {
    echo "No villa content found.";
}
?>


<div class="container my-5 carasoul_container">
  <div class="row align-items-stretch">
    <!-- First Div with Image -->
    <div class="col-md-6 d-flex">
      <img src="admin/<?php echo $imagePath; ?>" alt="Villa Image" class="img-fluid rounded align-self-stretch">
    </div>

    <!-- Second Div with Content -->
    <div class="col-md-6 d-flex">
      <div class="content-wrapper d-flex flex-column justify-content-between">
        <div>
          <h2 class="text-white"><?php echo $headingText; ?></h2>
          <p class="text-white"><?php echo $paragraphText; ?></p>
        </div>

        <div class="wrapper" style="border-radius: 20px; overflow: hidden; padding: 20px; position: relative;">
    <div class="gradient-border">
        <h6 class="gradient-text"><?php echo $cardHeading; ?></h6>
        <p class="text-white"><?php echo $cardText ?></p>
       
    </div>
</div>


        <!-- Enquire Now Button -->
        <div class="mt-4">
          <a href="#" class="enquire-btn openModal" id="openModal">Enquire Now</a>
        </div>
      </div>
    </div>
  </div>
</div>

<style>
.wrapper {
    position: relative;
    padding: 20px;
    
    border-radius: 20px;
    overflow: hidden;
}

.gradient-border {
 
    padding: 20px;
    border-radius: 10px;
    position: relative;
    z-index: 1;
}

.wrapper::before {
    content: '';
    position: absolute;
    top: 0;
    left: 0;
    right: 0;
    bottom: 0;
    border-radius: 20px;
    padding: 2px; /* Adjust for the border thickness */
    background: linear-gradient(90deg, #DFBD69 0%, #926F34 100%);
    -webkit-mask: 
      linear-gradient(#fff 0 0) content-box, 
      linear-gradient(#fff 0 0);
    mask: 
      linear-gradient(#fff 0 0) content-box, 
      linear-gradient(#fff 0 0);
    mask-composite: destination-out;
    -webkit-mask-composite: destination-out;
    z-index: 0;
}

.gradient-text {
  background: linear-gradient(90deg, #AE8625 0%, #F7EF84 36%, #D2AC47 72.5%, #EDC967 100%);
  -webkit-background-clip: text; /* For Webkit browsers (Chrome, Safari) */
  -webkit-text-fill-color: transparent; /* Make the text transparent to show the background */
  background-clip: text; /* For other browsers */
  text-fill-color: transparent; /* Make text transparent for other browsers */
}
/* Main Container */
.container {
  max-width: 1200px;
  margin: auto;
}

/* Flexbox ensures both columns are the same height */
.row {
  display: flex;
  align-items: stretch;
}

/* Styling for the Image */
img {
  
  object-fit: cover;
  height: auto;
  width: 100%;
}

/* Ensure image stretches full height */
.align-self-stretch {
  align-self: stretch;
}



/* Enquire Now Button Styling */
.enquire-btn {
  display: inline-block;
  padding: 10px 30px;
  background: #FFF2D0;
  color: #B27E02;
  font-family: 'Cursive', sans-serif;
  border: 2px solid #DFBD69;
  border-radius: 25px;
  text-decoration: none !important;
  font-weight: bold;
  transition: background-color 0.3s ease;
}

.enquire-btn:hover {
  
  color: #B27E02;
}

/* Responsive Adjustments */
@media (max-width: 768px) {
  .content-wrapper {
    margin-top: 20px;
  }
  .row {
    flex-direction: column;
  }
}
</style>
