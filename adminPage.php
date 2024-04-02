<?php
include('database.php');

$sql = "SELECT * FROM studentaccount";
$students = $conn->query($sql);
$row = $students->fetch_assoc()

?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/LagroLogo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <title>GPS TRACKER | Home</title>
</head>
<body>
    <!--NAVIGATION-->
    <nav  class="navbar">
        <h1 class="logo" onclick="closesignUPContainer()"><img src="image/LagroLogo.png">GPS TRACKER</h1>
            <ul class="navigation">
                <a href="#header" onclick="closesignUPContainer()" class="small"><li><i class='bx bxs-home'></i>Home</li></a>
                <a onclick="closesignUPContainer()" class="small"><li><i class='bx bxs-download'></i></i>Download</li></a>
                <form method="post" action="index.php">
                    <button type="submit" name="logout" class="logout">Log Out</button>
                </form>
            </ul>
    </nav>

    <section>
        <div class="listOfStudents">
            <table>
                <tbody>
                    <?php do{?>
                    <tr>
                        <td><?php echo $row['user_name'];?></td>
                        <td><?php echo $row['section'];?></td>
                    </tr>
                    <?php }while($row = $students->fetch_assoc());?>
                </tbody>
            </table>
        </div>
        <section class="mapTrack" id="mapTrack">
        <div class="mapContainer">
            <div id="map"></div>
        </div>
    </section>
    </section>

    <!--FOOTER CONTAINER-->
    <footer>
            <span>Copyright ©2024: CALATORING</span>
    </footer>
    
    <!--TIME-->
    <span class="time"></span>
    <script src="script.js"></script>
    <script async defer src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap">
</script>
</script>
</body>
</html>