<?php
include('database.php');
?>


<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="icon" type="image/png" href="image/LagroLogo.png">
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
    <link rel="stylesheet" href="style.css">
    <title>GPS TRACKER | Sign Up</title>
</head>
<body>
    <!--NAVIGATION-->
    <nav  class="navbar">
        <h1 class="logo" onclick="closesignUPContainer()"><img src="image/LagroLogo.png">GPS TRACKER</h1>
            <ul class="navigation">
            </ul>
    </nav>


    <!--SIGN UP CONTAINER-->
    <section class="signUPContainer">

        <!--LOG IN-->
        <div class="login">
            <h1>LOG IN</h1>
            <form  method="post">
                <div class="field input">
                    <label for="email">Email</label>
                    <input type="text" name="logEmail" id="email" required>
                </div>

                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="logPassword" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    
                    <input type="submit" onclick="logIN()" class="btn" name="login" value="Login" required>
                </div>
            </form>
            <span> Don't have account? <button onclick="showsignUP()">Sign Up Now</button> </span>
        </div>

        <!--SIGN UP-->
        <div class="signup">
            <h1>SIGN UP</h1>
            <form method="post">
                <div class="field input">
                    <label for="username">Username</label>
                    <input type="text" name="signUsername" id="username" autocomplete="off" required>
                </div>

                <div class="field input">
                    <label for="email">Email</label>
                    <input type="email" name="signEmail" id="signEmail" pattern=".*@depedqc\.ph$" title="Please enter a valid Deped email ending with @depedqc.ph" required>
                </div>

                <div class="field input">
                    <label for="age">Section</label>
                    <input type="text" name="signSection" id="age" autocomplete="off" required>
                </div>
                <div class="field input">
                    <label for="password">Password</label>
                    <input type="password" name="signPassword" id="password" autocomplete="off" required>
                </div>

                <div class="field">
                    <input type="submit" class="btn" name="signup" value="Register" required>
                </div>
               
            </form>
            <span> Already a member? <button onclick="showlogIN()">Sign In</button> </span>
        </div>
    </section>
    <script>
        const signup = document.querySelector(".signup");
        const login = document.querySelector(".login"); 

        function showsignUP(){
            signup.style.display = "block";
            login.style.display = "none";
        }
        function showlogIN(){
            signup.style.display = "none";
            login.style.display = "block";
        }
    </script>
</body>
</html>