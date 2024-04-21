<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role_id"] !== 1) {
    header("location: login.php");
    exit;
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Welcome Admin</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Welcome Admin</h1>
        <nav>
            <ul>
                <li><a href="add_event.php">Add Event</a></li>
                <li><a href="edit_event.php">Edit Event</a></li>
                <li><a href="view_users.php">View Users</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <p>Welcome to the admin dashboard. You can manage events and users here.</p>
    </div>
    <footer>
        &copy; 2024 Your Website
    </footer>
</body>
</html>
