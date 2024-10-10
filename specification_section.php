<?php
$sql = "SELECT * FROM specifications";
$result = $con->query($sql);
?>


    <style>
        /* Add this CSS code to style the specifications in four columns */
        .specification-section {
    text-align: center;
    color : white;
    width : 100%
  
}

.specification-title {
    font-family: 'Cursive', sans-serif;
    font-size: 36px;
    margin-bottom: 10px;
    color: #f4d6b1;
   text-align : center
}

.specification-description {
    font-family: 'Arial', sans-serif;
    font-size: 16px;
    margin-bottom: 40px;
}

.specification-container {
    display: flex;
    justify-content: center;
    gap: 20px;
    flex-wrap: wrap;
}

.spec-item {
    position: relative;
    display: flex;
    align-items: center;
    justify-content: end;
    background-color: #f4d6b1;
    padding: 10px 20px;
    border-radius: 2px;
    width: 274px;
    height: 68px;
    border: 2px solid #fdbc6e;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    margin: 10px 0;
}

.icon-container {
    background-color: #f9e4d2;
    border-radius: 50%;
    width: 70px;
    height: 70px;
    display: flex;
    justify-content: center;
    align-items: center;
    position: absolute;
    left: 23px;
    top: -33px;
    border: 2px solid #fdbc6e;
}

.icon-container img {
    width: 30px;
    height: 30px;
}

.spec-text {
    margin-left: 60px;
    font-size: 18px;
    font-weight: bold;
    color: #4f4f4f;
}

.enquire-btn {
    background-color: #ffc87d;
    color: #0b3254;
    border: none;
    margin-top : 30px;
    padding: 12px 24px;
    font-size: 16px;
    border-radius: 50px;
    cursor: pointer;
    box-shadow: 0 4px 8px rgba(0, 0, 0, 0.1);
    transition: background-color 0.3s ease;
    
}

.enquire-btn:hover {
    background-color: #e6b566;
}

   .specification_info {
            display: none;
            margin-top: 10px;
            font-size: 14px;
            color: #333;
            text-align: left;
        }

         .spec-item:hover .specification_info {
            display: block;
        }

         .spec-item:hover {
            height: auto;
        }
    </style>
</head>
<body>

<?php
$sp_query = "SELECT * FROM `specification_content`";
$is_query_r = mysqli_query($con,$sp_query);

$fs = mysqli_fetch_assoc($is_query_r);


?>
<div class="specification-section">
    <span style="align-text : center; padding : 20px;"><?php echo $fs["heading"]; ?></span>

    
    <div class="specification-container">
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                ?>
                <div class="spec-item">
                    <div class="icon-container">
                        <img src="admin/uploads/<?php echo $row['icon_path']; ?>" alt="<?php echo $row['title']; ?>">
                    </div>
                    <div class="spec-text">
                        <?php echo $row['title']; ?>
                        <div class="specification_info">
                            <p><?php echo $row['info']; ?></p>
                        </div>  
                    </div>
                </div>
                <?php
            }
        } else {
            echo "No specifications found.";
        }

      
        ?>
    </div>

    <button id="openModal" class="enquire-btn openModal">Enquire Now</button>
</div>

