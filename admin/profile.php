<?php
session_start();
require_once('../config.php');

// Check if the user is an admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

// Retrieve admin information from the database
$query = "SELECT * FROM users WHERE id = '" . $_SESSION['user_id'] . "'";
$result = mysqli_query($conn, $query);
$admin = mysqli_fetch_assoc($result);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Admin Profile</title>
    <!-- Include CSS and JavaScript files -->
</head>
<body>
    <div class="container">
        <div class="row">
            <div class="col-md-6">
                <h2>Admin Profile</h2>
                <p><strong>Name:</strong> <?php echo $admin['name']; ?></p>
                <p><strong>Email:</strong> <?php echo $admin['email']; ?></p>
                <p><strong>Phone:</strong> <?php echo $admin['phone']; ?></p>
            </div>
            <div class="col-md-6">
                <h2>Manage Concerts</h2>
                <!-- Add functionality to manage concerts -->
            </div>
        </div>
    </div>
</body>
</html>