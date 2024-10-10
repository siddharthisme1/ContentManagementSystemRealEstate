<style>
    body {
        background-color: #181818;
        color: white;
        font-family: Arial, sans-serif;
    }

    .lifestyle-container {
        padding: 50px 20px; /* Adds padding to the top and sides of the container */
    }

    .lifestyle-card {
        background: rgba(17, 23, 58, 1);
        border: none;
        border-radius: 10px;
        border: 1px solid #fff;
        overflow: hidden;
        box-shadow: 0 4px 8px rgba(0, 0, 0, 0.2);
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 100%;
    }

    .lifestyle-card-img-wrapper {
    padding: 15px; /* Padding around the image */
    border-radius: 15px; /* Same border radius as the image */
    overflow: hidden; /* Ensures the image stays within the rounded corners */
}

.lifestyle-card-img {
    height: 200px;
    object-fit: cover;
    border-radius: 15px; /* Add border-radius directly to the image */
}


    .lifestyle-card-body {
        padding: 20px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
       
    }

    .lifestyle-card-title {
        font-size: 20px;
        font-weight: bold;
        text-align: center; /* Centers the card title */
    }

    .lifestyle-card-subtitle {
        font-size: 14px;
        text-align: center; /* Centers the card subtitle */
    }

    .lifestyle-card-description {
        font-size: 13px;
        border: 1px solid #DFBD69;
        border-radius: 15px;
        padding: 15px;
        margin: 0 auto; /* Centers the description inside the card */
        max-width: 95%; /* Adjusts width to prevent touching the border */
       
    }

    .lifestyle-btn {
    color: #fff;
    background-color: transparent; /* Ensure the background is transparent by default */
    border: none;
    max-width: 95%;
    padding: 10px 20px;
    border: 1px solid #DFBD69;
    border-radius: 15px;
    transition: background-color 0.3s ease, color 0.3s ease;
    margin: 10px auto; /* Centers the button inside the card */
}

.lifestyle-btn:hover {
    background-color: #DFBD69; /* Optional: Change background on hover if needed */
    color: #fff; /* Keeps the text white */
}


    .lifestyle-header {
        text-align: center;
        margin-bottom: 40px;
    }

    .lifestyle-row {
        display: flex;
        flex-wrap: wrap;
        gap: 20px; /* Adds spacing between cards */
    }

    .lifestyle-col {
        flex: 1;
        min-width: 300px;
        max-width: 32%; /* Keeps the columns uniform in size */
    }

    /* Ensure equal height for all lifestyle cards */
    .lifestyle-card {
        display: flex;
        flex-direction: column;
        height: 100%;
    }

    .lifestyle-card-body {
        flex-grow: 1;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
    }

    @media (max-width: 768px) {
        .lifestyle-col {
            max-width: 100%; /* On smaller screens, the columns will stack */
        }
    }
</style>

<?php
// Include database connection file


// Query to fetch lifestyle residences data from the database
$query = "SELECT * FROM lifestyle_residences";
$result = mysqli_query($con, $query);

$query_content = "SELECT * FROM life_style_content";
$result_content = mysqli_query($con, $query_content);
$f = mysqli_fetch_assoc($result_content);
?>

<div class="lifestyle-container">
 <span style="text-align : center;"> <?php echo $f["heading"]; ?></span>
   

    <div class="lifestyle-row mt-5">
        <?php
        while ($row = mysqli_fetch_assoc($result)) {
            $title = $row['title'];
            $subtitle = $row['subtitle'];
            $imagePath = $row['image_path'];
            $btnText = $row['btn_text'];
            $btnDetails = $row['btn_details'];
            $description = $row['description'];

            // Use a function to clean up unwanted tags if needed
            // $description = strip_tags($description, '<p><strong><em><a>'); // Allow specific tags
        ?>
            <div class="lifestyle-col">
                <div class="lifestyle-card">
                    <div class="lifestyle-card-img-wrapper">
                        <img src="<?php echo 'admin/'.$imagePath; ?>" class="lifestyle-card-img" alt="<?php echo htmlspecialchars($title); ?>">
                    </div>
                    <div class="lifestyle-card-body">
                        <h5 class="lifestyle-card-title"><?php echo $title; ?></h5>
                        <span style="text-align : center;"><?php echo $subtitle; ?></span>
                 
                        <button class="lifestyle-btn"><?php echo $btnDetails; ?></button>
                        <div class="lifestyle-card-description mt-3"><?php echo $description; ?></div>
                    </div>
                </div>
            </div>
        <?php
        }
        ?>
    </div>
</div>


