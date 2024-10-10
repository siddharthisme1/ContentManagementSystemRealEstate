<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Content Management System</title>
    <link href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://code.jquery.com/jquery-3.5.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.1/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.10.2/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js"></script>
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/js/bootstrap.bundle.min.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha1/dist/css/bootstrap.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css" rel="stylesheet">
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <link rel="stylesheet" href="style.css">
    <style>
        body {
            background: linear-gradient(180deg, #1B3450 18.68%, #061C36 100%);
           
            overflow-x: hidden;
            margin: 0;
            padding: 0;
            
        } 
    </style>
</head>

<body>
    
<?php  
    require_once("connection.php");
    include_once("header.php");
    
?>

<div class="slide-section">
    <?php include_once("slide_section.php"); ?>
</div>

<div class="overview-section"  id="overview-section">
    
    <?php include_once("overview_section.php"); ?>

</div>
<div class="gallery-section" id="gallery-section">
    
    <?php include_once("gallery_section.php"); ?>

</div>

<div class="security_m_section" id="security_m_section">
    
    <?php include_once("security_m_section.php"); ?>

</div>

<div class="lifestyle_sectio" id="lifestyle_sectio">
    
    <?php include_once("lifestyle_section.php"); ?>

</div>

<div class="amini-section" id="amini-section">
    
    <?php include_once("aminities_section.php"); ?>

</div>

<div class="specification-section" id="specification-section">
    <?php include_once("specification_section.php"); ?>
</div>

<div class="landmark-section" id="landmark-section">
    <?php include_once("landmark_section.php"); ?>
</div>
<div class="master-plan-section" id="master-plan-section">

 <?php include_once("master_plan_section.php"); ?>
</div>

<div class="horizon-section">

<!-- horizon_section.php -->
<?php include_once("horizon_section.php"); ?>

</div>
<div class="properties_section">
  
<?php include_once("property_section.php"); ?>
</div>

<div class="contact-us-section">

<?php include_once("contact_us_section.php"); ?>
</div>
<div class="footer-section">
    <?php  include_once("footer.php"); ?>
</div>

<?php
 include_once("enquire_now_popup.php"); ?>

</body>
</html>