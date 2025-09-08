<?php
$name = isset($_GET['name']) ? htmlspecialchars($_GET['name']) : 'Friend';
?>
<!doctype html>
<html lang="en">
<head>
  <meta charset="utf-8">
  <title>Thank you</title>
  <script src="https://cdn.tailwindcss.com"></script>
</head>
<body class="min-h-screen flex items-center justify-center bg-gray-100">
  <div class="bg-white p-8 rounded-lg shadow text-center max-w-md">
    <h1 class="text-3xl font-bold mb-4">Thank you, <?php echo $name; ?>!</h1>
    <p class="mb-6">We received your donation. Your support makes a real difference.</p>
    <a href="index.html" class="inline-block px-6 py-2 bg-blue-600 text-white rounded">Back to Home</a>
    <a href="donation_form.html" class="inline-block px-6 py-2 border ml-3 rounded">Donate Again</a>
  </div>
</body>
</html>
