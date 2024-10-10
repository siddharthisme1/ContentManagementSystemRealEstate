 <style>
     
       
        .description {
            text-align: center;
            
            margin-bottom: 40px;
        }
        .plan-image {
            width: 100%;
            height: 400px; /* Fixed height for demonstration */
            object-fit: cover; /* Maintain aspect ratio while fitting */
            background-color: #f2f2f2; /* Light background for image */
            transition: transform 0.3s; /* Smooth scaling effect */
            cursor: pointer; /* Change cursor to pointer */
        }
        .plan-image:hover {
            transform: scale(1.05); /* Slightly enlarge image on hover */
        }
        .btn-download {
            background-color: #d4af37; /* Gold button background */
            color: white; /* Dark text color on button */
            padding: 12px 25px;
            border: none;
            border-radius: 5px;
            font-weight: bold;
            transition: background-color 0.3s, transform 0.3s; /* Transition for hover effects */
        }
        .btn-download:hover {
            background-color: #d4af37; /* Gold button background */
            color: white; /* Dark text color on button */
            transform: scale(1.05); /* Slightly enlarge button on hover */
        }

        /* Custom modal styles */
        .custom-modal {
            display: none; /* Hidden by default */
            position: fixed; /* Stay in place */
            z-index: 1000; /* Sit on top */
            left: 0;
            top: 0;
           
            width: 100%; /* Full width */
            height: 100%; /* Full height */
            overflow: auto; /* Enable scroll if needed */
            background-color: rgba(0, 0, 0, 0.8); /* Black with opacity */
            justify-content: center;
            align-items: center;
        }
        .modal-content {
            background-color: #181818;
            padding: 20px;
            border-radius: 10px;
            max-width: 100%; /* Set max width for modal */
            max-height: 100%; /* Set max height for modal */
            overflow: hidden; /* Hide overflow */
        }
        .carousel-inner #img_masterplan {
            width: 100%;
            height: 500px;
            padding  : 100px;
        }

        @media (max-width: 768px) { 

            .carousel-inner #img_masterplan {
            width: 100%;
            height: 100%;
            align-items : center;
            
        }

        }
    </style>
</head>
<body>
    <?php

$querym = "SELECT * FROM master_plan_content";
$resm = mysqli_query($con, $querym);
$fm = mysqli_fetch_assoc($resm);
$headingm = $fm["heading"];
?>

    <div class="container">
       
        <p class="description" style="text-align : center;"><?php echo $headingm ;?></p>

        <div class="row">

        <?php $qu_s ="SELECT * FROM master_static_images";
            $q = mysqli_query($con, $qu_s);
            $re= mysqli_fetch_assoc($q);
            $image_master = $re["image_path_master"];
            $image_floor = $re["image_path_floor"];
        
         ?>
            <div class="col-md-6 mb-4">
                <img src="admin/uploads/<?php echo $image_master; ?>" alt="Master Plan" class="img-fluid plan-image" onclick="openModal('masterPlanModal')">
                <div class="text-center mt-3">
                    <button class="btn btn-download" onclick="openModal('masterPlanModal')">Download Master Plan</button>
                </div>
            </div>
            <div class="col-md-6 mb-4">
                <img src="admin/uploads/<?php echo $image_floor; ?>" alt="Floor Plan" class="img-fluid plan-image" onclick="openModal('floorPlanModal')">
                <div class="text-center mt-3">
                    <button class="btn btn-download" onclick="openModal('floorPlanModal')">Download Floor Plan</button>
                </div>
            </div>
        </div>
    </div>

    <!-- Custom Modal for Master Plan -->

     <?php
// Assuming $con is your connection variable
$query = "SELECT `id`, `image_path` FROM `master_gallery`";
$result = mysqli_query($con, $query);

if (!$result) {
    die("Query Failed: " . mysqli_error($con)); // For debugging purposes
}

// Prepare an array to store the images
$images = [];

while ($row = mysqli_fetch_assoc($result)) {
    $images[] = $row['image_path'];
}
?>

    <div id="masterPlanModal" class="custom-modal">
    <div class="modal-content">
        <span onclick="closeModal('masterPlanModal')" style="cursor:pointer; color:white; float:right !important; font-size:24px;">&times;</span>
        <h5 class="modal-title">Master Plan</h5>
        <div id="masterPlanCarousel" class="carousel slide" data-interval="5000">
            <div class="carousel-inner">
                <?php
                $activeClass = 'active'; // To add the 'active' class to the first slide
                foreach ($images as $index => $imagePath) {
                    echo '
                    <div class="carousel-item ' . $activeClass . '">
                        <img  id="img_masterplan" src="admin/uploads/' . $imagePath . '" alt="Master Plan Slide ' . ($index + 1) . '">
                    </div>';
                    $activeClass = ''; // Remove 'active' for all other slides
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#masterPlanCarousel" role="button" data-slide="prev" onclick="prevSlide('masterPlanCarousel')">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#masterPlanCarousel" role="button" data-slide="next" onclick="nextSlide('masterPlanCarousel')">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <?php
                foreach ($images as $index => $imagePath) {
                    echo '<li data-target="#masterPlanCarousel" data-slide-to="' . $index . '" ' . ($index === 0 ? 'class="active"' : '') . '></li>';
                }
                ?>
            </ol>
        </div>
    </div>
</div>

<?php


// Query to fetch images from floor_gallery table
$query = "SELECT `id`, `image_path` FROM `floor_gallery`";
$result = mysqli_query($con, $query);

if (!$result) {
    die('Query failed: ' . mysqli_error($con));
}
?>

<div id="floorPlanModal" class="custom-modal">
    <div class="modal-content">
    <span onclick="closeModal('floorPlanModal')" style="cursor:pointer; color:white; float:left; font-size:24px;">&times;</span>

        <h5 class="modal-title">Floor Plan</h5>        

        <div id="floorPlanCarousel" class="carousel slide" data-interval="5000">
            <div class="carousel-inner">
                <?php
                // Counter for the first item to be marked as active
                $isActive = true;

                // Loop through each image result from the database
                while ($row = mysqli_fetch_assoc($result)) {
                    $imagePath = $row['image_path'];
                    $activeClass = $isActive ? 'active' : '';
                    
                    // Output the carousel item
                    echo '<div class="carousel-item ' . $activeClass . '">';
                    echo '<img id="img_masterplan" src="admin/uploads/' . $imagePath . '" alt="Floor Plan Slide">';
                    echo '</div>';
                    
                    $isActive = false; // After the first slide, deactivate the active class
                }
                ?>
            </div>
            <a class="carousel-control-prev" href="#floorPlanCarousel" role="button" data-slide="prev" onclick="prevSlide('floorPlanCarousel')">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
            </a>
            <a class="carousel-control-next" href="#floorPlanCarousel" role="button" data-slide="next" onclick="nextSlide('floorPlanCarousel')">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
            </a>
            <!-- Carousel Indicators -->
            <ol class="carousel-indicators">
                <?php
                // Reset the result pointer
                mysqli_data_seek($result, 0);

                // Counter for slide indicators
                $index = 0;
                while ($row = mysqli_fetch_assoc($result)) {
                    $activeClass = ($index === 0) ? 'active' : '';
                    echo '<li data-target="#floorPlanCarousel" data-slide-to="' . $index . '" class="' . $activeClass . '"></li>';
                    $index++;
                }
                ?>
            </ol>
        </div>
    </div>
</div>




    <script>
        function openModal(modalId) {
            document.getElementById(modalId).style.display = "flex";
            startCarousel(modalId);
        }

        function closeModal(modalId) {
            document.getElementById(modalId).style.display = "none";
            stopCarousel(modalId);
        }

        function startCarousel(modalId) {
            const carousel = document.getElementById(modalId + 'Carousel');
            let index = 0;
            const items = carousel.querySelectorAll('.carousel-item');

            function showNext() {
                items[index].classList.remove('active');
                index = (index + 1) % items.length;
                items[index].classList.add('active');
            }
            carousel.carouselInterval = setInterval(showNext, 5000);
        }

        function stopCarousel(modalId) {
            const carousel = document.getElementById(modalId + 'Carousel');
            clearInterval(carousel.carouselInterval);
        }

        function prevSlide(carouselId) {
            const carousel = document.getElementById(carouselId);
            const activeItem = carousel.querySelector('.carousel-item.active');
            const prevItem = activeItem.previousElementSibling || carousel.querySelector('.carousel-item:last-child');
            activeItem.classList.remove('active');
            prevItem.classList.add('active');
        }

        function nextSlide(carouselId) {
            const carousel = document.getElementById(carouselId);
            const activeItem = carousel.querySelector('.carousel-item.active');
            const nextItem = activeItem.nextElementSibling || carousel.querySelector('.carousel-item:first-child');
            activeItem.classList.remove('active');
            nextItem.classList.add('active');
        }
    </script>

