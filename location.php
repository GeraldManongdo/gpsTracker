<?php
include('database.php');
session_start(); // Ensure session is started

// Check if user is logged in
if (!isset($_SESSION['user_details'])) {
    echo "User not logged in";
    exit();
}

// Get user details from session
$userDetails = $_SESSION['user_details'];
$user_name = $userDetails['user_name'];

// Validate latitude and longitude
$latitude = $_POST['latitude'];
$longitude = $_POST['longitude'];

// Update user location
$stmt = $conn->prepare("UPDATE accountlist SET latitude=?, longitude=? WHERE user_name = ?");
$stmt->bind_param("dds", $latitude, $longitude, $user_name);
if ($stmt->execute()) {
    echo "Location updated successfully";
} else {
    echo "Error updating location: " . $conn->error;
}
$stmt->close();
?>
