<?php
include 'db.php';
session_start();

// Only allow logged-in admin
if (!isset($_SESSION['admin'])) {
    header("Location: admin.html");
    exit();
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];

// Insert into volunteers table
$sql = "INSERT INTO volunteers (name, email, phone, address) VALUES ('$name', '$email', '$phone', '$address')";

if ($conn->query($sql) === TRUE) {
    echo "<h2>✅ Volunteer added successfully!</h2>";
    echo "<a href='add_volunteer.php'>Add another</a> | <a href='admin_panel.php'>Dashboard</a>";
} else {
    echo "<h2>❌ Error: " . $conn->error . "</h2>";
    echo "<a href='add_volunteer.php'>Go back</a>";
}

$conn->close();
?>
