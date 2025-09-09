<?php
session_start();
include 'db.php';

// Only allow logged-in admin
if (!isset($_SESSION['admin'])) {
    header("Location: admin.html");
    exit();
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Add Volunteer</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-200 min-h-screen p-6">

<!-- Header with Logout -->
<div class="flex justify-center mb-6">
    <h1 class="text-3xl font-bold text-center">Add Volunteer</h1>
</div>

<!-- Add Volunteer Form -->
<div class="flex justify-center">
    <div class="max-w-2xl w-full bg-white pt-6 p-6 rounded-lg shadow-lg">
    <form action="insert_volunteer.php" method="POST" class="space-y-4">
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Name:</label>
            <input type="text" name="name" required class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Email:</label>
            <input type="email" name="email" required class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Phone:</label>
            <input type="text" name="phone" class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>
        <div>
            <label class="block text-gray-700 font-semibold mb-1">Address:</label>
            <textarea name="address" class="w-full px-4 py-2 border border-gray-400 rounded-lg focus:outline-none focus:ring-2 focus:ring-blue-500"></textarea>
        </div>
        <button type="submit" class="w-full bg-lime-600 hover:bg-lime-700 text-white font-bold py-2 rounded-lg transition">Add Volunteer</button>
    </form>
</div>
</div>

<div class="text-center mt-6">
    <a href="view_add_volunteer.php" class="bg-lime-500 text-white px-4 py-2 rounded hover:bg-lime-600">Back to Volunteer List</a>
</div>

</body>
</html>
