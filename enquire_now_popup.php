<style>
        

        /* Modal Styles */
        .enquiry-modal {
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

        .enquiry-modal-content {
            background-color: rgba(16, 40, 72, 0.95); /* Dark background */
            color: white; /* Text color */
            padding: 30px;
            border-radius: 10px;
            width: 90%;
            max-width: 500px;
            border: 1px solid #f5d683;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        }

        .enquiry-modal-header {
            border-bottom: 1px solid #f5d683; /* Light yellow border */
            margin-bottom: 20px;
            font-size: 1.5em;
            text-align: center;
        }

        .enquiry-modal-body {
            margin-bottom: 20px;
        }

        .enquiry-form-row {
            display: flex;
            justify-content: space-between;
            margin-bottom: 10px;
        }

        .enquiry-form-control {
            width: 48%; /* Set width to allow side-by-side layout */
            padding: 10px;
            border: 1px solid transparent; /* Default border */
            border-radius: 5px;
            background-color: #0b213e; /* Darker blue for input fields */
            color: white; /* Input text color */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }

        .enquiry-form-control:focus {
            outline: none;
            border-color: #f5d683; /* Light yellow border on focus */
        }

        .textarea-enquiry-form-control {
            width: 96%; /* Ensure textarea takes full width */
            padding: 10px;
            border: 1px solid transparent; /* Default border */
            border-radius: 5px;
            background-color: #0b213e; /* Darker blue for textarea */
            color: white; /* Text color */
            resize: vertical; /* Allow vertical resizing only */
            transition: border-color 0.3s; /* Smooth transition for border color */
        }

        .textarea-enquiry-form-control:focus {
            outline: none;
            border-color: #f5d683; /* Light yellow border on focus */
        }

        .enquiry-btn-submit {
            padding: 10px 20px;
            background-color: #d8b15b; /* Light yellow button */
            color : white;
            border-radius : 30px;
            width : 200px;
            margin-top : 20px;
            cursor: pointer;
            font-size: 1em;
            transition: background-color 0.3s;
        }

        .enquiry-btn-submit:hover {
            background-color: #d8b15b; /* Slightly darker yellow on hover */
            color : white;
            border-radius : 30px;
            width : 200px;
            margin-top : 20px;
        }

        /* Close button style */
        .close {
            color: white;
            float: right;
            font-size: 1.5em;
            cursor: pointer;
        }
    </style>

<div class="enquiry-modal" id="customEnquiryModal">
    <div class="enquiry-modal-content">
        <span class="close" id="closeModal">&times;</span>
        <div class="enquiry-modal-header" style="margin-bottom : 10px;">Enquiry Form</div>
        <div class="enquiry-modal-body">
            <h6 style="text-align: center;">Please fill out the enquiry form below:</h6>
            <form id="enquiryForm" method="post" action="">
                <div class="enquiry-form-row">
                    <input type="text" class="enquiry-form-control" id="firstName" name="first_name" placeholder="First Name" required>
                    <div style="width: 4%;"></div> <!-- Spacer between inputs -->
                    <input type="text" class="enquiry-form-control" id="lastName" name="last_name" placeholder="Last Name" required>
                </div>
                <div class="enquiry-form-row">
                    <input type="tel" class="enquiry-form-control" id="phoneNumber" maxlength="10" name="phone" placeholder="Phone number" required>
                    <div style="width: 4%;"></div> <!-- Spacer between inputs -->
                    <input type="email" class="enquiry-form-control" id="email" name="email" placeholder="Email" required>
                </div>
                <textarea class="textarea-enquiry-form-control" id="message" rows="4" name="message" placeholder="Let's discuss your idea" required></textarea>
                <button type="submit" name="contact_us" class="enquiry-btn-submit">Submit</button>
            </form>
        </div>
    </div>
</div>

<script>
// Function to handle modals (generic handler for multiple modals)
function handleModal(modalId, openClass, closeId) {
    // Get all buttons with the specified openClass (e.g., 'openScheduleModal' or 'openModal')
    const openModalBtns = document.querySelectorAll(openClass);
    // Get the modal element by its ID
    const modal = document.getElementById(modalId);
    // Get the close button element by its ID
    const closeModalBtn = document.getElementById(closeId);

    // Loop through each button and add a click event listener
    openModalBtns.forEach(button => {
        button.addEventListener('click', function() {
            modal.style.display = 'flex'; // Show the modal when any button is clicked
        });
    });

    // Close the modal when the close button is clicked
    closeModalBtn.addEventListener('click', function() {
        modal.style.display = 'none'; // Hide the modal
    });

    // Close the modal when clicking outside of it
    window.addEventListener('click', function(event) {
        if (event.target === modal) {
            modal.style.display = 'none'; // Hide the modal
        }
    });
}

// Initialize both modals
handleModal('customScheduleModal', '.openScheduleModal', 'closeScheduleModal'); // For Schedule Modal
handleModal('customEnquiryModal', '.openModal', 'closeModal'); // For Enquiry Modal


</script>


