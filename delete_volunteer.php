<?php
session_start();
include 'db.php';

if (!isset($_SESSION['admin'])) {
    header("Location: admin.html");
    exit();
}

if (isset($_GET['id'])) {
    $id = $_GET['id'];
    $sql = "DELETE FROM volunteers WHERE id=$id";
    $conn->query($sql);
}

header("Location: view_add_volunteer.php");
exit();
?>
