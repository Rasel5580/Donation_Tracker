<?php
// Database connection settings
$servername = "localhost";
$username   = "root";        // Default XAMPP username
$password   = "";            // Default XAMPP password
$dbname     = "donation_tracker";

// Create connection
$conn = new mysqli($servername, $username, $password, $dbname);

// Check connection
if ($conn->connect_error) {
    // Stop the script if connection fails
    die("❌ Connection failed: " . $conn->connect_error);
}
?>
