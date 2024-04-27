<?php
session_start();

// Check if the user is logged in as an admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: admin/login.php');
    exit;
}
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Concerts</title>
    <!-- Add any necessary CSS and JavaScript files here -->
</head>
<body>
    <h1>Manage Concerts</h1>
    <!-- Add functionality to add or remove concerts from concert.php here -->
</body>
</html>