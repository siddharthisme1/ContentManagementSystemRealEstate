<style>
  
        .form-container {
            padding: 30px;
            border-radius: 10px;
            background-color: #102848; /* Darker blue for form background */
            border: 2px solid #f5d683; /* Added border */
            height: 100%; /* Make it match the image height */
            display: flex;
            flex-direction: column;
            justify-content: center;
        }
        .form-control {
            background-color: #0b213e;
            border: 1px solid #102848;
            color: white !important;
        }
        .form-control:focus {
            background-color: #0b213e;
            border-color: #f5d683; /* Light yellow */
            box-shadow: none;
            color : white !important;
        }
        .btn-submit {
           color: #B27E02;
            
            background-color: #FFF2D0;
            border-radius : 25px;
            width : 200px;
        }
        .btn-submit:hover {
            background-color: #d8b15b; /* Slightly darker yellow */
        }
    
        .row.full-height {
            height: 100vh; /* Make sure the row takes full viewport height */
        }

        @media (max-width: 767.98px) {
        .form-container {
            padding: 20px;
            height: auto;
        }
        .row.full-height {
            height: auto; /* Allow natural height on smaller screens */
        }
        .image-container-contactus {
            min-height: 200px; /* Smaller height for mobile */
            padding : 25px;
            margin-top : 20px;
        }
    }
    </style>
<?php
$message = "";
if ($_SERVER["REQUEST_METHOD"] == "POST" && isset($_POST['contact_us'])) {
    $first_name = $_POST['first_name'];
    $last_name = $_POST['last_name'];
    $phone = $_POST['phone'];
    $email = $_POST['email'];
    $message = $_POST['message'];

    $stmt = $con->prepare("INSERT INTO submissions (first_name, last_name, phone, email, message) VALUES (?, ?, ?, ?, ?)");
    $stmt->bind_param("sssss", $first_name, $last_name, $phone, $email, $message);

    // Execute the query
    if ($stmt->execute()) {
        $message ="Enquiry Submitted Successfully our team will get back to you";
    } else {
        $message ="Error To submitting Enquiry";
    }

}
?>
        <?php if ($message): ?>
                <script>
                    Swal.fire({
                        icon: '<?php echo strpos($message, 'Error') !== false ? 'error' : 'success'; ?>',
                        title: '<?php echo $message; ?>',
                        showConfirmButton: true,
                        timer: 2000
                    });
                </script>
            <?php endif; ?>
    <div class="container">
        <div class="row align-items-center full-height">
            <div class="col-md-6">
                <div class="form-container">
                    <form action="" method="POST">
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="firstName">Name</label>
                                <input type="text" class="form-control" id="firstName" name="first_name" placeholder="Name" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="lastName">Last Name</label>
                                <input type="text" class="form-control" id="lastName"  style="color : white;" name="last_name" placeholder="Last Name" required>
                            </div>
                        </div>
                        <div class="form-row">
                            <div class="form-group col-md-6">
                                <label for="phoneNumber">Phone number</label>
                                <input type="tel" class="form-control" id="phoneNumber" maxlength="10" style="color : white;" name="phone" placeholder="Phone number" required>
                            </div>
                            <div class="form-group col-md-6">
                                <label for="email">Email</label>
                                <input type="email" class="form-control" style="color : white;" id="email" name="email" placeholder="Email" required>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="message">Let's discuss your idea</label>
                            <textarea class="form-control" id="message" rows="4" name="message" style="color : white;" placeholder="Let's discuss your idea" required></textarea>
                        </div>
                        <button type="submit" name="contact_us" class="btn btn-submit">Submit</button>
                    </form>
                </div>
            </div>
            <div class="col-md-6">

            <?php

$query = "SELECT * FROM header WHERE id =1";
$res = mysqli_query($con, $query);
$f = mysqli_fetch_assoc($res);
$im = $f["c_image"];
?>
                <div class="image-container-contactus" style="background-image: url('admin/uploads/<?php echo $im; ?>'); background-size: cover; background-position: center; min-height: 400px;">
                    <!-- Image is now directly placed inside HTML -->
                   
                </div>
            </div>
        </div>
    </div>

