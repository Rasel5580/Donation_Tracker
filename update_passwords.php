<?php
// update_passwords.php
include 'db.php';

if (!$conn) {
    die("Database connection failed: " . mysqli_connect_error());
}

// Select all volunteers
$result = $conn->query("SELECT Volunteer_ID, `Password` FROM volunteer");

if ($result === false) {
    die("Error fetching volunteers: " . $conn->error);
}

if ($result->num_rows > 0) {
    $updated = 0;

    while ($row = $result->fetch_assoc()) {
        $id = $row['Volunteer_ID'];
        $currentPassword = $row['Password'];

        // Skip if already hashed (starts with $2y$)
        if (substr($currentPassword, 0, 4) === '$2y$') {
            continue;
        }

        // Hash the plain password
        $hashedPassword = password_hash($currentPassword, PASSWORD_DEFAULT);

        // Update the database
        $stmt = $conn->prepare("UPDATE volunteer SET `Password` = ? WHERE Volunteer_ID = ?");
        if ($stmt === false) {
            die("Prepare failed: " . $conn->error);
        }

        $stmt->bind_param("si", $hashedPassword, $id);
        if ($stmt->execute()) {
            echo "Password updated for Volunteer_ID: $id <br>";
            $updated++;
        } else {
            echo "Failed to update Volunteer_ID: $id - " . $stmt->error . "<br>";
        }

        $stmt->close();
    }

    if ($updated === 0) {
        echo "No plain-text passwords found to update.";
    } else {
        echo "<br>All eligible passwords updated successfully!";
    }
} else {
    echo "No volunteers found in the database.";
}

$conn->close();
?>
