<?php

$sql = "SELECT * FROM properties";
$result = $con->query($sql);
?>



    <style>
            .property-card {
            max-width: 100%;
            margin: auto;
            border-left: 1px solid #A87C00;
            ;
         
            overflow: hidden;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        }

        /* Card header image and new launch badge */
        .card-header {
            position: relative;
        }

        .card-header img {
        
            object-fit: cover;
          
            margin: auto; /* Center the image */
        }

        .new-launch {
            position: absolute;
            top: 10px;
            left: 10px;
            font-size: 12px;
            padding: 5px 12px;
            border-radius: 25px;
            background-color:  #AC8038;
            ;
        }

        /* Property Info Section */
        .property-info {
            margin-top: 15px;
        }

        .icon-container {
            margin-bottom: 5px;
        }

        .text-container {
            font-size: 14px;
            color: #6c757d;
            margin-left: 10px; /* Space between icon and text */
        }

        .info-icon {
            width: 28px; /* Adjust size as needed */
            height: 28px; /* Adjust size as needed */
        }

        .info-title {
            font-weight: 600;
            color: #B27E02;

            margin-bottom: 2px;
        }

        .info-subtext {
            font-size: 12px;
            color:  #6B6B6B;
            
        }

        /* Divider styles */
        .property-info hr {
            border: 1px solid #e0e0e0;
            margin: 10px 0; /* Reduce margin */
        }

        .vertical-divider {
            border-left: 1px solid #e0e0e0;
            height: 50px; /* Height of the vertical divider */
            margin: 0 10px; /* Space around the vertical divider */
        }

        /* Buttons styling */
        .btn-outline-warning {
            border-color: #d4a53a;
            color: #d4a53a;
        }

        .btn-outline-warning:hover {
            background-color: #d4a53a;
            color: white;
        }

        .btn-warning {
            background-color: #d4a53a;
            border-color: #d4a53a;
            color : white;
            font-size: 15px;
            
        }

        .btn-warning:hover {
            background-color: #b68f2b;
            border-color: #b68f2b;
            color : white
        }

        /* Button width adjustment */
        .w-45 {
            width: 45%;
        }

        /* Responsive */
        @media (max-width: 768px) {
    .property-card {
        margin-bottom: 20px;
    }

    /* Stack the property details in a single column */
    .property-info .row > div {
        width: 100%;
        text-align: center;
    }

    /* Remove vertical divider for mobile view */
    .vertical-divider {
        display: none;
    }

    /* Full width buttons on mobile */
    .w-45 {
        width: 100%;
        margin-bottom: 10px;
    }
}
    </style>


<div class="container mt-5">

<?php
  $querys = "SELECT * FROM property_conent";
  $ress = mysqli_query($con, $querys);
  $fs = mysqli_fetch_assoc($ress);
  $headings = $fs["heading"];
?>
   <span style="align-text : center; margin-bottom : 20px;"><?php  echo $headings ;?></span>
    <div class="row justify-content-center">
 
        <?php if ($result->num_rows > 0): ?>
            <?php while($row = $result->fetch_assoc()): ?>
                <div class="col-md-4">
                    <div class="card property-card">
                        <div class="card-header p-0">
                            <img src="admin/uploads/<?php echo $row['image']; ?>" class="card-img-top" alt="Property Image">
                            <span class="badge badge-warning new-launch"><?php echo $row['p_status']; ?></span>
                        </div>
                        <div class="card-body">
                            <h5 class="card-title text-center"><?php echo $row['name']; ?></h5>
                            <p class="text-center text-muted"><?php echo $row['location']; ?></p>
                            
                            <!-- Property Information Section -->
                            <div class="property-info">
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="icons/rupees_icon.png" alt="Price Icon" class="info-icon">
                                            <div class="text-container">
                                                <p class="info-title">Price</p>
                                                <p class="info-subtext"><?php echo $row['price']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="vertical-divider"></div>
                                    </div>
                                    <div class="col-5 text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="icons/type_icon.png" alt="Type Icon" class="info-icon">
                                            <div class="text-container">
                                                <p class="info-title">Type</p>
                                                <p class="info-subtext"><?php echo $row['type']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <hr>
                                <div class="row">
                                    <div class="col-5 text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="icons/plotsize_icon.png" alt="Plot Size Icon" class="info-icon">
                                            <div class="text-container">
                                                <p class="info-title">Plot Size</p>
                                                <p class="info-subtext"><?php echo $row['plot_size']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-2 text-center">
                                        <div class="vertical-divider"></div>
                                    </div>
                                    <div class="col-5 text-center">
                                        <div class="d-flex align-items-center justify-content-center">
                                            <img src="icons/configIcon.png" alt="Configuration Icon" class="info-icon">
                                            <div class="text-container">
                                                <p class="info-title">Configuration</p>
                                                <p class="info-subtext"><?php echo $row['configuration']; ?></p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>

                            <div class="d-flex justify-content-between mt-4">
                                <a href="#" class="btn btn-outline-warning w-45 openModal" id="openModal">Enquire Now</a>
                                <a href="#" class="btn btn-warning w-45 openScheduleModal" data-property-id="<?php echo $row['id']; ?>">Schedule Site Visit</a>
                            </div>
                        </div>
                    </div>
                </div>
            <?php endwhile; ?>
        <?php else: ?>
            <p>No properties found.</p>
        <?php endif; ?>

    </div>
</div>
<style>
    /* Modal Styles */
    .schedule-modal {
        display: none; /* Hidden by default */
        position: fixed; /* Stay in place */
        z-index: 1000; /* Sit on top */
        left: 0;
        top: 0;
        width: 100%; /* Full width */
        height: 100%; /* Full height */
        overflow: auto; /* Enable scroll if needed */
        background-color: rgba(0, 0, 0, 0.7); /* Black with opacity */
        justify-content: center;
        align-items: center;
    }

    .schedule-modal-content {
        background-color: rgba(16, 40, 72, 0.95); /* Dark background */
        color: white; /* Text color */
        padding: 30px;
        border-radius: 10px;
        width: 90%;
        max-width: 500px;
        border: 1px solid #f5d683;
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
    }

    .schedule-modal-header {
        border-bottom: 1px solid #f5d683; /* Light yellow border */
        margin-bottom: 20px;
        font-size: 1.5em;
        text-align: center;
    }

    .schedule-modal-body {
        margin-bottom: 20px;
    }

    

    .schedule-form-row {
        display: flex;
        justify-content: space-between;
        margin-bottom: 10px;
    }

    .schedule-form-control {
        width: 48%; /* Set width to allow side-by-side layout */
        padding: 10px;
        border: 1px solid transparent; /* Default border */
        border-radius: 5px;
        background-color: #0b213e; /* Darker blue for input fields */
        color: white; /* Input text color */
        transition: border-color 0.3s; /* Smooth transition for border color */
    }

    .schedule-form-control:focus {
        outline: none;
        border-color: #f5d683; /* Light yellow border on focus */
    }

    

    .schedule-btn-submit {
        padding: 10px 20px;
        background-color: #d8b15b; /* Light yellow button */
        color: white;
        border-radius: 30px;
        width: 200px;
        margin-top: 20px;
        cursor: pointer;
        font-size: 1em;
        transition: background-color 0.3s;
    }

    .schedule-btn-submit:hover {
        background-color: #d8b15b; /* Slightly darker yellow on hover */
        color: white;
        border-radius: 30px;
        width: 200px;
        margin-top: 20px;
    }

    /* Close button style */
    .close {
        color: white;
        float: right;
        font-size: 1.5em;
        cursor: pointer;
    }
</style>
<?php
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST["schedule_visit"])) {
    $first_name = mysqli_real_escape_string($con, $_POST['first_name']);
    $last_name = mysqli_real_escape_string($con, $_POST['last_name']);
    $phone = mysqli_real_escape_string($con, $_POST['phone']);
    $email = mysqli_real_escape_string($con, $_POST['email']);
    $preferred_date = mysqli_real_escape_string($con, $_POST['preferred_date']);
   
    $property_id = mysqli_real_escape_string($con, $_POST['property_id']);

    // Insert data into the database
    $sql = "INSERT INTO site_visits (first_name, last_name, phone, email, preferred_date, property_id) 
            VALUES ('$first_name', '$last_name', '$phone', '$email', '$preferred_date', '$property_id')";

    if ($con->query($sql) === TRUE) {
     echo  "<script>alert('Visit Scheduled Successfully');
     
     </script>";
    } else {
        echo  "<script>alert('Error to schedule meeting');
     
     </script>";
    }
}

?>
<div class="schedule-modal" id="customScheduleModal">
    <div class="schedule-modal-content">
        <span class="close" id="closeScheduleModal">&times;</span>
        <div class="schedule-modal-header" style="margin-bottom : 10px;">Schedule Site Visit</div>
        <div class="schedule-modal-body">
            <h6 style="text-align: center;">Please fill out the form below to schedule a site visit:</h6>
            <form id="scheduleForm" method="post" action="">
                <div class="schedule-form-row">
                    
                    <input type="text" class="schedule-form-control" id="firstName" name="first_name" placeholder="First Name" required>
                    <div style="width: 4%;"></div> <!-- Spacer between inputs -->
                    
                    <input type="text" class="schedule-form-control" id="lastName" name="last_name" placeholder="Last Name" required>
                </div>
                <div class="schedule-form-row">
           
                    <input type="tel" class="schedule-form-control" id="phoneNumber" maxlength="10" name="phone" placeholder="Phone number" required>
                    <div style="width: 4%;"></div> <!-- Spacer between inputs -->
                 
                    <input type="email" class="schedule-form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <div class="schedule-form-row">
              
                    <input type="date" class="schedule-form-control" id="visitDate" name="preferred_date" placeholder="Preferred Date" required>
                </div>
                <input type="hidden" id="propertyId" name="property_id" value=""> <!-- Hidden input for property ID -->
                <button type="submit" name="schedule_visit" class="schedule-btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
    // Get all buttons with the class 'openScheduleModal'
    // const openModalBtns = document.querySelectorAll('.openScheduleModal');
    // // Get modal element
    // const modal = document.getElementById('customScheduleModal');
    // // Get close button
    // const closeModalBtn = document.getElementById('closeScheduleModal');
    // // Loop through each button with the 'openScheduleModal' class and add a click event listener
    // openModalBtns.forEach(button => {
    //     button.addEventListener('click', function() {
    //         const propertyId = this.getAttribute('data-property-id'); // Get property ID from button
    //         document.getElementById('propertyId').value = propertyId; // Set property ID in hidden input
    //         modal.style.display = 'flex'; // Show the modal when any button is clicked
    //     });
    // });

    // // Close the modal when the close button is clicked
    // closeModalBtn.addEventListener('click', function() {
    //     modal.style.display = 'none'; // Hide the modal
    // });

    // // Close the modal when clicking outside of it
    // window.addEventListener('click', function(event) {
    //     if (event.target === modal) {
    //         modal.style.display = 'none'; // Hide the modal
    //     }
    // });
</script>
