<style>
        .section-container {
           
            color: white;
            padding: 50px 0;
            text-align: center;
        }
        .section-container h2 {
            font-family: 'Poppins', sans-serif;
        }
        .section-container p {
            margin-bottom: 40px;
        }
        .map-container {
            position: relative;
            text-align: center;
            margin: 0 auto;
        }
        .btn-custom {
            background-color: #e9b300;
            color: white;
            padding: 10px 20px;
            border-radius: 5px;
            font-weight: bold;
            margin: 0 10px;
            transition: background-color 0.3s, color 0.3s;
        }
        .btn-custom.active {
            background-color: white;
            color: black;
        }
        .btn-custom:hover {
            background-color: #cfa000;
        }
        .info-box {
            position: absolute;
            top: 30px;
            left: 10px;
            background: white;
            color: black;
            padding: 15px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.3);
            display: none;
            border-radius: 8px;
        }
        .info-box.active {
            display: block;
        }
        /* Map styles */
        iframe {
            height: 400px;
            width: 100%;
            
            border: 0;
        }
        
        .button-container {
    background-color: white;
    padding: 15px;
    border-radius: 5px;
    display: flex;
    width: fit-content;
    align-items: flex-start;
    margin-left: 20px;
    margin-bottom: 20px;
}
    </style>

<div class="section-container">

    <?php
$query1 = "SELECT * FROM landmark_content";
$res1 = mysqli_query($con, $query1);
$fl = mysqli_fetch_assoc($res1);
$l_heading = $fl["heading"];


    ?>
         <span style="text-align : center">
            <?php echo $l_heading; ?>
         </span>


        <div class="button-container">
            <button class="btn btn-custom" id="nearby-btn">Nearby</button>
            <button class="btn btn-custom" id="commute-btn">Commute</button>
        </div>
        
        <div class="map-container">
            <!-- Embedded Map -->
           
            <iframe src="https://www.google.com/maps/embed?pb=!1m18!1m12!1m3!1d242118.17005851687!2d73.6981553041223!3d18.52454504095413!2m3!1f0!2f0!3f0!3m2!1i1024!2i768!4f13.1!3m3!1m2!1s0x3bc2bf2e67461101%3A0x828d43bf9d9ee343!2sPune%2C%20Maharashtra!5e0!3m2!1sen!2sin!4v1728571143215!5m2!1sen!2sin" width="600" height="450" style="border:0;" allowfullscreen="" loading="lazy" referrerpolicy="no-referrer-when-downgrade"></iframe>




            <!-- Info boxes -->
            <div id="nearby-info" class="info-box active">
                <h5>Nearby Places:</h5>

                <?php
                 $sql_nearby = "SELECT name, distance FROM nearby_places WHERE type='nearby'";
                 $result_near_by = $con->query($sql_nearby);
                 if ($result_near_by->num_rows > 0) {
                    echo "<ul style='list-style: none; padding-left: 0;'>";
                    while ($row = $result_near_by->fetch_assoc()) {
                        echo "<li>" . $row['name'] . " - " . $row['distance'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "No nearby places found.";
                }

                ?>
            </div>

            <div id="commute-info" class="info-box">
                <h5>Commute:</h5>
                <?php
                 $sql_nearby = "SELECT name, distance FROM nearby_places WHERE type='commute'";
                 $result_near_by = $con->query($sql_nearby);
                 if ($result_near_by->num_rows > 0) {
                    echo "<ul style='list-style: none; padding-left: 0;'>";
                    while ($row = $result_near_by->fetch_assoc()) {
                        echo "<li>" . $row['name'] . " - " . $row['distance'] . "</li>";
                    }
                    echo "</ul>";
                } else {
                    echo "No nearby places found.";
                }

                ?>
            </div>
        </div>
    </div>

    <script>
        // Make "Nearby" active by default on page load
        document.getElementById('nearby-btn').classList.add('active');
        document.getElementById('nearby-info').classList.add('active');

        // JavaScript to toggle nearby and commute info
        document.getElementById('nearby-btn').addEventListener('click', function() {
            document.getElementById('nearby-info').classList.add('active');
            document.getElementById('commute-info').classList.remove('active');
            // Update button styles
            this.classList.add('active');
            document.getElementById('commute-btn').classList.remove('active');
        });

        document.getElementById('commute-btn').addEventListener('click', function() {
            document.getElementById('commute-info').classList.add('active');
            document.getElementById('nearby-info').classList.remove('active');
            // Update button styles
            this.classList.add('active');
            document.getElementById('nearby-btn').classList.remove('active');
        });
    </script>
    


