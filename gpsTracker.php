

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
                <a href="#mapTrack" onclick="closesignUPContainer()" class="small"><li><i class='bx bxs-map'></i>Map</li></a>
                <a href="#aboutUs" onclick="closesignUPContainer()" class="small"><li><i class='bx bx-group'></i>About Us</li></a>
                <a href="#contactUs" onclick="closesignUPContainer()" class="small"><li><i class='bx bxs-envelope'></i>Contact Us</li></a>
                <form method="post" action="index.php">
                    <button type="submit" name="logout" class="logout">Log Out</button>
                </form>
            </ul>
    </nav>


    <!--HEADER CONTAINER-->
    <section id="header">
        <header>
            <h1>Hello! LAGRONIANS</h1>
            <p>Welcome to Our Web-based GPS TRACKING System! We are excited to provide you with a smooth and efficient method to track your real-time location.</p>
            <span>CLICK THAT TO LOCATE YOUR LOCATION ➔</span>
        </header>
        <div class="imageLogo">
            <a href="#mapTrack"><i class='bx bx-map-alt'></i></a>
        </div>
    </section>

    <!--MAPS CONTAINER-->
    <section class="mapTrack" id="mapTrack">
        <h2>Tracking and Monitoring</h2>
        <div class="mapContainer">
            <div id="map"></div>
        </div>
    </section>

    <!--DEVELOPER CONTAINER-->
    <section class="developerContainer" id="aboutUs">
        <h1>OUR HARD WORKING TEAM</h1>
        <h6>With 2 years combined experience, we've got well-seasoned team at the helm</h6>
        <div class="slideContainer">
            <div class="cardContainer">
                <div class="card">
                    <div class="imageContainer">
                        <img src="image/recto.png">
                    </div>
                    <h1>Aeron Dhaniel E. Recto</h1>
                    <span>PROJECT MANAGER</span>
                    <ul>
                        <a href=""><li><i class='bx bxl-gmail'></i>Gmail</li></a>
                        <a href=""><li><i class='bx bxl-facebook'></i>Facebook</li></a>
                        <a href=""><li><i class='bx bxl-instagram' ></i>Instagram</li></a>
                    </ul>
                </div>

                <div class="card">
                    <div class="imageContainer">
                        <img src="image/lappay.png">
                    </div>
                    <h1>Lappay, Mark Anthony</h1>
                    <span>BACK-END DEVELOPER</span>
                    <ul>
                        <a href=""><li><i class='bx bxl-gmail'></i>Gmail</li></a>
                        <a href=""><li><i class='bx bxl-facebook'></i>Facebook</li></a>
                        <a href=""><li><i class='bx bxl-instagram' ></i>Instagram</li></a>
                    </ul>
                </div>

                <div class="card">
                    <div class="imageContainer">
                        <img src="image/abril.png">
                    </div>
                    <h1>Abril, Mark Paul Andrei</h1>
                    <span>TESTER</span>
                    <ul>
                        <a href=""><li><i class='bx bxl-gmail'></i>Gmail</li></a>
                        <a href=""><li><i class='bx bxl-facebook'></i>Facebook</li></a>
                        <a href=""><li><i class='bx bxl-instagram' ></i>Instagram</li></a>
                    </ul>
                </div>

                <div class="card">
                    <div class="imageContainer">
                        <img src="image/nuque.png">
                    </div>
                    <h1>Nuque, Anthony R.</h1>
                    <span>FRONT-END DEVELOPER</span>
                    <ul>
                        <a href=""><li><i class='bx bxl-gmail'></i>Gmail</li></a>
                        <a href=""><li><i class='bx bxl-facebook'></i>Facebook</li></a>
                        <a href=""><li><i class='bx bxl-instagram' ></i>Instagram</li></a>
                    </ul>
                </div>

                <div class="card">
                    <div class="imageContainer">
                        <img src="image/sunder.png">
                    </div>
                    <h1>Beloria, Sunder</h1>
                    <span>UI/UX DESIGNER</span>
                    <ul>
                        <a href=""><li><i class='bx bxl-gmail'></i>Gmail</li></a>
                        <a href=""><li><i class='bx bxl-facebook'></i>Facebook</li></a>
                        <a href=""><li><i class='bx bxl-instagram' ></i>Instagram</li></a>
                    </ul>
                </div>
                
            </div>
            <div class="navigation">
                <button class="prev-btn"><i class='bx bx-chevron-left'></i></button>
                <button class="next-btn"><i class='bx bx-chevron-right'></i></button>
              </div>
        </div>
    </section>

    <!--CONTACT US CONTAINER-->
    <section class="contactUsContainer" id="contactUs">
        <div class="contactUsTitle">For any assistance Required Please React out</div>
        <form>
            <input type="text" id="fname" name="fname" placeholder="First name" required>
            <input type="text" id="lname" name="lname" placeholder="Last name" required>
            <textarea id="content" name="content" placeholder="Leave us Message" required></textarea><br>
            <input type="submit" value="Submit">
          </form>
    </section>

    <!--FOOTER CONTAINER-->
    <footer>
            <span>Copyright ©2024: CALATORING</span>
    </footer>
    
    <!--TIME-->
    <span class="time"></span>
    <script src="script.js"></script>
    <script async defer
src="https://maps.googleapis.com/maps/api/js?key=AIzaSyAOVYRIgupAurZup5y1PRh8Ismb1A3lLao&libraries=places&callback=initMap">
</script>
</script>
</body>
</html>