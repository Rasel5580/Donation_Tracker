<?php
session_start();
include 'db.php';

// Only allow logged-in admin
if (!isset($_SESSION['admin'])) {
    header("Location: admin.html");
    exit();
}

// Fetch all volunteers
$sql = "SELECT * FROM volunteers";
$result = $conn->query($sql);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Volunteers List</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 min-h-screen p-6">

<!-- Header with Logout Button -->
<div class="flex justify-between items-center mb-6">
    <h1 class="text-3xl font-bold">Volunteers</h1>
</div>

<!-- Volunteer List Table -->
<div class="overflow-x-auto">
<table class="min-w-full bg-white border rounded-lg shadow-md">
    <thead class="bg-lime-500 text-white">
        <tr>
            <th class="py-2 px-4 border">ID</th>
            <th class="py-2 px-4 border">Name</th>
            <th class="py-2 px-4 border">Email</th>
            <th class="py-2 px-4 border">Phone</th>
            <th class="py-2 px-4 border">Address</th>
            <th class="py-2 px-4 border">Action</th>
        </tr>
    </thead>
    <tbody>
        <?php
        if ($result->num_rows > 0) {
            while($row = $result->fetch_assoc()) {
                echo "<tr class='text-center'>";
                echo "<td class='py-2 px-4 border'>" . $row['id'] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row['name'] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row['email'] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row['phone'] . "</td>";
                echo "<td class='py-2 px-4 border'>" . $row['address'] . "</td>";
                echo "<td class='py-2 px-4 border'>";
                echo "<a href='delete_volunteer.php?id=" . $row['id'] . "' class='bg-red-500 text-white px-3 py-1 rounded hover:bg-red-600'>Delete</a>";
                echo "</td>";
                echo "</tr>";
            }
        } else {
            echo "<tr><td colspan='6' class='text-center py-4'>No volunteers found</td></tr>";
        }
        ?>
    </tbody>
</table>
</div>

<!-- Buttons -->
<div class="text-center mt-6 flex justify-center gap-4">
    <a href="admin_panel.php" class="bg-lime-500 text-white px-4 py-2 rounded hover:bg-lime-600">Back to Dashboard</a>
    <a href="add_volunteer.php" class="bg-lime-500 text-white px-4 py-2 rounded hover:bg-lime-600">Add Volunteer</a>
</div>

</body>
</html>

<?php
$conn->close();
?>
