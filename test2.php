<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Master and Floor Plan Slider</title>
    <link rel="stylesheet" href="path/to/bootstrap.css"> <!-- Add your Bootstrap CSS path -->
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
            max-width: 800px; /* Set max width for modal */
            max-height: 600px; /* Set max height for modal */
            overflow: hidden; /* Hide overflow */
        }
        .carousel-inner img {
            width: 100%;
            height: auto;
        }
    </style>
</head>
<body>

    <?php
    include 'connection.php';
    $querym = "SELECT * FROM master_plan_content";
    $resm = mysqli_query($con, $querym);
    $fm = mysqli_fetch_assoc($resm);
    $headingm = $fm["heading"];
    ?>

    <div class="container">
        <p class="description"><?php echo $headingm; ?></p>
        <div class="row">
            <?php 
            $qu_s = "SELECT * FROM master_static_images";
            $q = mysqli_query($con, $qu_s);
            $re = mysqli_fetch_assoc($q);
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
    <div id="masterPlanModal" class="custom-modal">
        <div class="modal-content">
            <span onclick="closeModal('masterPlanModal')" style="cursor:pointer; color:white; float:right; font-size:24px;">&times;</span>
            <h5 class="modal-title">Master Plan</h5>
            <div id="masterPlanCarousel" class="carousel slide" data-interval="5000">
                <div class="carousel-inner">
                    <?php
                    $query = "SELECT `id`, `image_path` FROM `master_gallery`";
                    $result = mysqli_query($con, $query);

                    if (!$result) {
                        die("Query Failed: " . mysqli_error($con)); // For debugging purposes
                    }

                    $activeClass = 'active'; // To add the 'active' class to the first slide
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '
                        <div class="carousel-item ' . $activeClass . '">
                            <img src="admin/uploads/' . $row['image_path'] . '" alt="Master Plan Slide">
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
                    // Reset the result pointer
                    mysqli_data_seek($result, 0);
                    $index = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li data-target="#masterPlanCarousel" data-slide-to="' . $index . '" ' . ($index === 0 ? 'class="active"' : '') . '></li>';
                        $index++;
                    }
                    ?>
                </ol>
            </div>
        </div>
    </div>

    <!-- Custom Modal for Floor Plan -->
    <div id="floorPlanModal" class="custom-modal">
        <div class="modal-content">
            <span onclick="closeModal('floorPlanModal')" style="cursor:pointer; color:white; float:right; font-size:24px;">&times;</span>
            <h5 class="modal-title">Floor Plan</h5>
            <div id="floorPlanCarousel" class="carousel slide" data-interval="5000">
                <div class="carousel-inner">
                    <?php
                    $query = "SELECT `id`, `image_path` FROM `floor_gallery`";
                    $result = mysqli_query($con, $query);

                    if (!$result) {
                        die('Query failed: ' . mysqli_error($con));
                    }

                    $isActive = true; // For marking the first item as active
                    while ($row = mysqli_fetch_assoc($result)) {
                        $imagePath = $row['image_path'];
                        echo '<div class="carousel-item ' . ($isActive ? 'active' : '') . '">';
                        echo '<img src="admin/uploads/' . $imagePath . '" alt="Floor Plan Slide">';
                        echo '</div>';
                        $isActive = false; // Deactivate for all subsequent items
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
                    $index = 0;
                    while ($row = mysqli_fetch_assoc($result)) {
                        echo '<li data-target="#floorPlanCarousel" data-slide-to="' . $index . '" ' . ($index === 0 ? 'class="active"' : '') . '></li>';
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
        }

        function startCarousel(carouselId) {
            const carousel = document.getElementById(carouselId);
            if (carousel) {
                const carouselInstance = new bootstrap.Carousel(carousel);
                carouselInstance.cycle(); // Start the carousel
            }
        }

        function prevSlide(carouselId) {
            const carousel = new bootstrap.Carousel(document.getElementById(carouselId));
            carousel.prev();
        }

        function nextSlide(carouselId) {
            const carousel = new bootstrap.Carousel(document.getElementById(carouselId));
            carousel.next();
        }
    </script>

    <script src="path/to/jquery.js"></script> <!-- Add your jQuery path -->
    <script src="path/to/bootstrap.bundle.js"></script> <!-- Add your Bootstrap JS path -->
</body>
</html>
