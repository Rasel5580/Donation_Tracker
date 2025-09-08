<?php
session_start();

// If admin is not logged in, redirect to login page
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
<title>Admin Panel</title>
<script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="bg-gray-300">

<h1 class="text-4xl font-bold underline mt-10 text-center">Admin Panel</h1>

<div class="flex justify-center mx-14 my-10 gap-10">

    <!-- Volunteers Button -->
    <div class="h-28 content-center bg-lime-500 border rounded-2xl flex items-center justify-center">
        <a href="view_add_volunteer.php" class="uppercase text-xl font-bold text-white text-center px-5">
            Manage <br> Volunteers
        </a>
    </div>

    <!-- Donations Button -->
    <div class="h-28 content-center bg-lime-500 border rounded-2xl flex items-center justify-center">
        <a href="view_donations.php" class="uppercase text-xl font-bold text-white text-center px-5">
            Donations
        </a>
    </div>

</div>

<div class="text-center mt-10">
    <a href="logout.php" class="bg-red-500 text-white px-4 py-2 rounded hover:bg-red-600">Logout</a>
</div>

</body>
</html>
