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
    <title>Admin Profile</title>
    <!-- Add any necessary CSS and JavaScript files here -->
</head>
<body>
    <h1>Admin Profile</h1>
    <ul>
        <li><a href="profile.php">Email</a></li>
        <li><a href="profile.php">Phone</a></li>
        <li><a href="concert_manage.php">Manage Concerts</a></li>
        <!-- Add more options as needed -->
    </ul>
</body>
</html>