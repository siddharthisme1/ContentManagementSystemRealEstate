<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Full-Screen Image Slider with Progress Bar</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.3/css/all.min.css">
    <style>
        /* Full-screen modal styles */

        <?php
        include 'connection.php'

        ?>
        .modal {
            display: block; /* Show the modal */
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.8); /* Transparent background */
            z-index: 9999; /* Make sure it covers everything */
        }

        /* Centering the slider */
        .slider-container {
            position: relative;
            max-width: 100%; /* Set max width for the images */
            height : 100%;
            margin: auto;
            top: 50%; /* Center vertically */
            transform: translateY(-50%); /* Adjust for height */
            border-radius: 10px;
            overflow: hidden;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.3);
        }

        /* Slider image */
        .carousel-item img {
            width: 100%;  /* Fixed width */
            height: 700px; /* Fixed height */
            object-fit: cover; /* Maintain aspect ratio */

            padding : 140px;
        }

        /* Progress bar styles */
        .progress {
            position: absolute;
            bottom: 10px;
            left: 50%;
            transform: translateX(-50%);
            width: 80%; /* Width of the progress bar */
        }

        /* Media Controls */
        .media-controls {
            position: absolute;
            top: 15px;
            right: 15px;
            display: flex;
            gap: 15px;
            z-index: 100;
        }

        .media-controls button {
            background: rgba(255, 255, 255, 0.8);
            border: none;
            padding: 10px;
            cursor: pointer;
            border-radius: 50%;
        }

        .media-controls button i {
            font-size: 18px;
            color: #333;
        }

        /* Current slide count */
        .carousel-indicators {
            position: absolute;
            top: 10px;
            left: 20px;
        }

        .carousel-indicators li {
            background-color: rgba(0, 0, 0, 0.7);
            border: none;
        }
    </style>
</head>
<body>
            <?php
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
    <div class="modal" id="imageModal">
        <div class="slider-container">
            <div id="imageCarousel" class="carousel slide" data-ride="carousel">

                <!-- Image Slider -->
                <div class="carousel-inner">
                <?php
                $activeClass = 'active'; // To add the 'active' class to the first slide
                foreach ($images as $index => $imagePath) {
                    echo '
                    <div class="carousel-item ' . $activeClass . '">
                        <img src="admin/uploads/' . $imagePath . '" alt="Master Plan Slide ' . ($index + 1) . '">
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

                <!-- Media Controls -->
                <div class="media-controls">
                    <button onclick="downloadImage()"><i class="fas fa-download"></i></button>
                    <button onclick="shareImage()"><i class="fas fa-share-alt"></i></button>
                    <button onclick="mediaPlayer()"><i class="fas fa-play"></i></button>
                    <button onclick="closeSlider()"><i class="fas fa-times"></i></button>
                </div>

                <!-- Progress Bar -->
                <div class="progress">
                    <div id="progressBar" class="progress-bar progress-bar-striped progress-bar-animated" role="progressbar" style="width: 0%;" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </div>
        </div>
    </div>

    <!-- Include Bootstrap JS and FontAwesome -->
    <script src="https://code.jquery.com/jquery-3.5.1.slim.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/@popperjs/core@2.9.2/dist/umd/popper.min.js"></script>
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>

    <script>
        // Function to manage the carousel and progress bar
        $(document).ready(function () {
            let slideInterval = 5000; // 5 seconds
            let progressBar = $("#progressBar");
            let currentIndex = 0;

            // Function to start the progress bar and slide interval
            function startSlider() {
                let totalSlides = $('.carousel-item').length;
                let slideDuration = slideInterval / 100; // Duration for each percent
                progressBar.css('width', '0%');

                let slideIntervalId = setInterval(function () {
                    currentIndex = (currentIndex + 1) % totalSlides; // Loop through slides
                    $('#imageCarousel').carousel(currentIndex);
                    progressBar.css('width', '0%'); // Reset progress bar

                    // Update progress bar
                    let progressIntervalId = setInterval(function () {
                        let width = parseInt(progressBar.css('width')) + 1; // Increment progress bar
                        progressBar.css('width', width + '%');

                        if (width >= 100) {
                            clearInterval(progressIntervalId);
                        }
                    }, slideDuration);

                }, slideInterval);
            }

            startSlider();

            // Download the current image
            window.downloadImage = function () {
                const activeImage = document.querySelector('.carousel-item.active img').src;
                const link = document.createElement('a');
                link.href = activeImage;
                link.download = activeImage.split('/').pop(); // Get the image file name
                document.body.appendChild(link);
                link.click();
                document.body.removeChild(link);
            }

            // Share functionality placeholder
            window.shareImage = function () {
                alert('Share functionality goes here!');
            }

            // Media player functionality placeholder
            window.mediaPlayer = function () {
                alert('Media player functionality goes here!');
            }

            // Close the image slider
            window.closeSlider = function () {
                $('#imageModal').fadeOut(); // Hide modal
            }
        });
    </script>
</body>
</html>
