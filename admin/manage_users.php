<?php
session_start();
require_once('../config.php');

// Check if the user is an admin
if (!isset($_SESSION['user_type']) || $_SESSION['user_type'] !== 'admin') {
    header('Location: ../index.php');
    exit;
}

// Handle user management actions
if ($_SERVER['REQUEST_METHOD'] === 'POST') {
    // Handle form submissions and update database accordingly
    // You can add your code here to add, edit, or remove users
}

// Retrieve users from the database
$query = "SELECT * FROM users WHERE user_type = 'user'";
$result = mysqli_query($conn, $query);
$users = mysqli_fetch_all($result, MYSQLI_ASSOC);
?>

<!DOCTYPE html>
<html>
<head>
    <title>Manage Users</title>
    <!-- Include CSS and JavaScript files -->
</head>
<body>
    <h1>Manage Users</h1>

    <div>
        <h2>Add User</h2>
        <!-- Form to add a new user -->
        <!-- You can add your code here to handle the form submission -->
    </div>

    <div>
        <h2>Existing Users</h2>
        <table>
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Email</th>
                    <th>Phone</th>
                    <th>Actions</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($users as $user): ?>
                    <tr>
                        <td><?php echo $user['name']; ?></td>
                        <td><?php echo $user['email']; ?></td>
                        <td><?php echo $user['phone']; ?></td>
                        <td>
                            <!-- Buttons or links to edit or remove the user -->
                            <!-- You can add your code here to handle the actions -->
                        </td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>

</body>
</html>