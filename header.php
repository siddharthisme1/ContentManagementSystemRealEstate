<style>
    .hamburger {
        display: inline-block;
        cursor: pointer;
        padding: 10px;
        margin: 20px;
        display: none; /* Default to hidden */
    }
    .ctan {

      display : none;
    }

    .bar {
        display: block;
        width: 30px;
        height: 4px;
        margin: 5px auto;
        background-color: #fff;
        transition: 0.4s;
    }

    .container-header {
        display: flex;
        justify-content: space-between;
        align-items: center;
        background: linear-gradient(135deg, 
            #000000, /* Black */
            #72746d, /* Dawnstone */
            #b6b9b5, /* Greystone */
            #9da49c, /* Sage Grey */
            #3c3c3b  /* Shoe Wax */
        );
        backdrop-filter: blur(10px);
        box-shadow: 0 2px 10px rgba(0, 0, 0, 0.5);
        z-index: 1000;
        padding: 20px;
    }

    .logo {
        display: flex;
        align-items: center;
    }

    .logo img {
        width: 157px;
        height: auto;
    }

    .nav {
        display: flex;
        gap: 25px;
    }

    .nav a {
        text-decoration: none;
        color: white;
        font-size: 16px;
        font-weight: 500;
        transition: color 0.3s ease;
    }

    .nav a:hover {
        color: #c69c00;
    }

    .cta {
        background-color: #c69c00;
        color: white;
        padding: 10px 15px;
        border-radius: 5px;
        font-weight: bold;
        cursor: pointer;
        transition: background-color 0.3s ease;
    }

    .cta:hover {
        background-color: #b58b00;
    }

    /* Sidebar styles */
    .sidebar {
        position: fixed;
        z-index: 1000;
        top: 0;
        left: -250px;
        width: 250px;
        height: 100%;
        background-color: #333;
        padding: 20px;
        transition: left 0.3s ease;
        box-shadow: 2px 0 5px rgba(0, 0, 0, 0.5);
    }

    .sidebar a {
        display: block;
        color: white;
        padding: 10px 0;
        text-decoration: none;
        font-size: 18px;
        transition: background 0.3s;
    }

    .sidebar a:hover {
        background: #444;
    }

    .close-btn {
        color: white;
        background: none;
        border: none;
        font-size: 24px;
        cursor: pointer;
        margin-bottom: 20px;
    }

    /* Show sidebar when active */
    .sidebar.show {
        left: 0;
    }

    /* Responsive styling */
    @media (max-width: 768px) {
        .container-header {
            flex-direction: column;
            align-items: flex-start;
            padding: 0;
        }

        .nav {
            display: none; /* Hide nav on mobile */
        }

        .hamburger {
            display: block; /* Show hamburger on mobile */
        }

        .mobile-contact {
            display: block; /* Show mobile contact */
            background: darkgoldenrod;
            border-radius: 20px;
            text-align: center; /* Corrected property */
            padding: 10px;
            font-size: 10px;
        }

        .cta {
            display: none; /* Hide regular CTA on mobile */
        }
    }
    @media (min-width: 769px) {
    .ctan {
        display: none; /* Hide on desktop and larger screens */
    }
}

@media (max-width: 768px) {
    .ctan {
        display: block; /* Show on mobile devices */
    }
}
   
</style>
<?php
  $sql = "SELECT * FROM `header` WHERE id= 1";
  $result = mysqli_query($con,$sql);
  $fetch = mysqli_fetch_assoc($result);
  $logo = $fetch["logo_image"];
  $mob = $fetch["mobile_number"];
?>
<div class="container-header">
    <div class="logo">
        <div class="hamburger" onclick="toggleMenu()"> 
            <div class="bar"></div>
            <div class="bar"></div>
            <div class="bar"></div>
        </div>
        <img src="admin/logo/<?php echo  $logo; ?>" alt="Logo">
        <!-- <div class="mobile-contact">+91 8310768803</div> -->
    </div>
    <nav class="nav">
        <a href="#overview-section" >OVERVIEW</a>
        <a href="#gallery-section">GALLERY</a>
        <a href="#security_m_section">FEATURES</a>
        <a href="#lifestyle_sectio">LIFESTYLE</a>
        <a href="#amini-section">AMENITIES</a>
        <a href="#specification-section">SPECIFICATION</a>
        <a href="#landmark-section">LANDMARK</a>
        <a href="#master-plan-section">DOWNLOADS</a>
    </nav>
    <div class="cta"><?php echo $mob; ?></div>
</div>

<!-- Sidebar Menu -->
<div class="sidebar" id="sidebar">
    <button class="close-btn" onclick="toggleMenu()">×</button>
    <a href="#overview-section" >OVERVIEW</a>
        <a href="#gallery-section">GALLERY</a>
        <a href="#security_m_section">FEATURES</a>
        <a href="#lifestyle_sectio">LIFESTYLE</a>
        <a href="#amini-section">AMENITIES</a>
        <a href="#specification-section">SPECIFICATION</a>
        <a href="#landmark-section">LANDMARK</a>
        <a href="#master-plan-section">DOWNLOADS</a>
</div>

<script>
    function toggleMenu() {
        const sidebar = document.getElementById('sidebar');
        sidebar.classList.toggle('show');
    }
</script>
