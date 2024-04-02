<?php
session_start();

//LOGOUT
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: index.php");
    exit();
}


// Database connection
$conn = mysqli_connect(
    "localhost", 
    "root", 
    "", 
    "gpstracking");

if (!$conn) {
    die("Connection failed: " . mysqli_connect_error());
}

// Sign up
if (isset($_POST['signup'])) {
    $email = $_POST['signEmail'];
    $username = $_POST['signUsername'];
    $password = $_POST['signPassword'];
    $section = $_POST['signSection'];

    // Hash the password
    $hashedPassword = password_hash($password, PASSWORD_DEFAULT);

    // Check if user already exists
    $stmt = $conn->prepare("SELECT * FROM studentaccount WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        echo "User already exists";
    } else {
        // Insert new user into the database
        $stmt = $conn->prepare("INSERT INTO studentaccount (email, user_name, password, section) VALUES (?, ?, ?, ?)");
        $stmt->bind_param("sssi", $email, $username, $hashedPassword, $section);
        if ($stmt->execute()) {
            echo "New record created successfully";
        } else {
            echo "Error: " . $stmt->error;
        }
    }
    $stmt->close();
}

// Login
if (isset($_POST['login'])) {
    $email = $_POST['logEmail'];
    $password = $_POST['logPassword'];

    // Check if user exists
    $stmt = $conn->prepare("SELECT * FROM studentaccount WHERE email=?");
    $stmt->bind_param("s", $email);
    $stmt->execute();
    $result = $stmt->get_result();

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        if (password_verify($password, $row['password'])) {
            // Start session
            $_SESSION['email'] = $email;


            $_SESSION['user_details'] = $row;

            header("Location: gpsTracker.php");
            exit();
        } else {
            echo "Incorrect password";
        }
    }else if($email == "Admin@depedqc.ph" &&  $password == "admin123"){
        $_SESSION["isAdmin"] = true;
        header("Location: adminPage.php");

    }else {
        echo "<script>alert('User not found');</script>";
    }
    $stmt->close();
}

mysqli_close($conn);
?>