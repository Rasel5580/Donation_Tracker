<?php
include 'db.php';

// Only allow POST requests
if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: donation_form.html");
    exit();
}

// Get form data
$name = $_POST['name'];
$email = $_POST['email'];
$phone = $_POST['phone'];
$address = $_POST['address'];
$amount = $_POST['amount'];
$payment_method = $_POST['payment_method'];
$message = $_POST['message'];

// Prepare statement to prevent SQL injection
$stmt = $conn->prepare("INSERT INTO donation (name,email,phone,address,amount,payment_method,message) VALUES (?, ?, ?, ?, ?, ?, ?)");
$stmt->bind_param("ssssdss", $name, $email, $phone, $address, $amount, $payment_method, $message);

if ($stmt->execute()) {
    $stmt->close();
    $conn->close();
    // Redirect to success page
    header("Location: donation_success.php");
    exit();
} else {
    echo "<h2>❌ Error: " . $stmt->error . "</h2>";
    echo "<a href='donation_form.html'>Go back</a>";
    $stmt->close();
    $conn->close();
}
?>
