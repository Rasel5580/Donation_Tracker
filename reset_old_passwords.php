<?php
// reset_old_passwords.php
include 'db.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Temporary password for old accounts
$tempPassword = "Temp1234"; 
$hashedTemp = password_hash($tempPassword, PASSWORD_DEFAULT);

// Select old accounts with truncated passwords (<60 chars)
$result = $conn->query("SELECT Contact_Info, Name, LENGTH(`Password`) AS pass_len FROM volunteer WHERE LENGTH(`Password`) < 60");

if ($result === false) {
    die("Error fetching volunteers: " . $conn->error);
}

if ($result->num_rows > 0) {
    echo "Resetting passwords for old accounts:<br><br>";
    while ($row = $result->fetch_assoc()) {
        $contact = $row['Contact_Info'];
        $name = $row['Name'];

        // Update password based on unique contact
        $stmt = $conn->prepare("UPDATE volunteer SET `Password` = ? WHERE Contact_Info = ?");
        $stmt->bind_param("ss", $hashedTemp, $contact);
        $stmt->execute();
        $stmt->close();

        echo "Temporary password set for Name: $name, Contact: $contact<br>";
    }

    echo "<br>All old accounts have been reset. Users can log in with temporary password: <b>$tempPassword</b>";
} else {
    echo "No old truncated passwords found.";
}

$conn->close();
?>
