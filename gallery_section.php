<?php
require_once("connection.php");
// Fetch images from the database
$sql = "SELECT * FROM gallery"; // Change 'gallery' to your actual table name
$result = $con->query($sql);
$galleryImages = [];

if ($result->num_rows > 0) {
    while ($row = $result->fetch_assoc()) {
        $galleryImages[] = $row['image']; // Adjust the column name as necessary
    }
}

$query = "SELECT * FROM gallery_headings"; // Corrected query

$query_result = $con->query($query);

if ($query_result) {
    $fetch = mysqli_fetch_assoc($query_result);
    $gallery_heading = $fetch["heading"];
} else {
    // Handle query error
    echo "Error: " . $con->error;
}

?>

<h2 class="gallery-heading" style="font-family:'Cursive', sans-serif;
font-size: 48px;
font-style: italic;
font-weight: 400;
line-height: 57.56px;
text-align: center;
"><?php echo $gallery_heading ?></h2>
<div class="image-slider container">
    <div class="image-slides">
        <?php foreach ($galleryImages as $image): ?>
            <div class="image-slide">
                <img src="admin/uploads/<?php echo $image; ?>" alt="Gallery Image">
            </div>
        <?php endforeach; ?>
    </div>
    <div class="image-arrow image-prev" onclick="changeImageSlide(-1)">&#10094;</div>
    <div class="image-arrow image-next" onclick="changeImageSlide(1)">&#10095;</div>
</div>

<style>
    .gallery-heading {
        text-align: center; /* Center the heading */
        padding: 20px 0; /* Add top and bottom padding */
        font-size: 24px; /* Adjust font size as needed */
        color: #fff; /* Adjust color if needed */
        margin-top : 20px;
    }

    .image-slider {
        position: relative;
        max-width: 100%; /* Adjust as necessary */
        margin: auto;
        padding :20px;
        overflow: hidden;
        height: 540.42px; /* Set a fixed height */
    }

    .image-slides {
        display: flex;
        transition: transform 0.5s ease-in-out;
    }

    .image-slide {
        min-width: 100%;
        box-sizing: border-box;
    }

    .image-slide img {
        width: 100%;
        height: 100%; /* Ensure the image covers the entire height */
        object-fit: cover; /* Maintain aspect ratio */
        border-radius: 4px;
    }

    .image-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: white;
        border: none;
        font-size: 24px;
        color: black;
        cursor: pointer;
        padding: 10px;
        border-radius: 50%;
    }

    .image-prev {
        left: 10px;
    }

    .image-next {
        right: 10px;
    }

    .image-arrow:hover {
        background-color: #ddd;
    }

    @media screen and (max-width: 768px) {
    .gallery-heading {
        font-size: 20px; /* Reduce font size for smaller screens */
    }


    .image-slider {
        position: relative;
        max-width: 100%; /* Adjust as necessary */
        margin: auto;
        padding :20px;
        overflow: hidden;
        height: auto; /* Set a fixed height */
    }
    .image-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: white;
        border: none;
        font-size: 24px;
        color: black;
        cursor: pointer;
        padding: 10px;
        border-radius: 50%;
        font-size: 16px;
        padding: 6px;
    }

    .image-slider {
        padding: 10px; /* Adjust padding for smaller screens */
    }

    .image-slide img {
        height: auto; /* Ensure height adapts to screen size */
    }
}

@media screen and (max-width: 480px) {
    .gallery-heading {
        font-size: 18px; /* Further reduce font size for mobile screens */
    }

    .image-arrow {
        position: absolute;
        top: 50%;
        transform: translateY(-50%);
        background-color: white;
        border: none;
        font-size: 24px;
        color: black;
        cursor: pointer;
        padding: 10px;
        border-radius: 50%;
        font-size: 16px;
        padding: 6px;
    }

    .image-slider {
        padding: 5px; /* Less padding for mobile */
    }
}
</style>

<script>
let imageSlideIndex = 0;

function showImageSlides() {
    const imageSlides = document.querySelectorAll('.image-slide');
    imageSlides.forEach((slide, index) => {
        slide.style.display = index === imageSlideIndex ? 'block' : 'none';
    });
}

function changeImageSlide(n) {
    imageSlideIndex += n;
    const imageSlides = document.querySelectorAll('.image-slide');
    if (imageSlideIndex >= imageSlides.length) {
        imageSlideIndex = 0;
    } else if (imageSlideIndex < 0) {
        imageSlideIndex = imageSlides.length - 1;
    }
    showImageSlides();
}

// Automatic slide every 5 seconds
setInterval(() => {
    changeImageSlide(1);
}, 5000);

// Initialize the slider
showImageSlides();
</script>
