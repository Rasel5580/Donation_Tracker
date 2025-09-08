<?php
include 'db.php';
session_start();

$email = $_POST['contact'];
$password = $_POST['password'];

// Query admin table
$sql = "SELECT * FROM admin WHERE email='$email' AND password='$password'";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
    // Login success
    $_SESSION['admin'] = $email;
    header("Location: admin_panel.php");
    exit();
} else {
    // Login failed
    echo "<h2>❌ Invalid email or password</h2>";
    echo "<a href='admin.html'>Go back</a>";
}

$conn->close();
?>
