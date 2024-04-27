<?php
session_start();

// Database connection
// ...

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = $_POST["email"];
    $password = $_POST["password"];

    // Check if the user is an admin
    $sql = "SELECT * FROM users WHERE email = '$email' AND user_type = 'admin'";
    $result = $conn->query($sql);

    if ($result->num_rows > 0) {
        $row = $result->fetch_assoc();
        $hashedPassword = $row["password"];

        if (password_verify($password, $hashedPassword)) {
            $_SESSION["user_id"] = $row["id"];
            $_SESSION["user_type"] = $row["user_type"];
            header("Location: profile.php");
            exit;
        } else {
            $error_message = "Invalid email or password.";
        }
    } else {
        $error_message = "Invalid email or password.";
    }
}

// Close database connection
$conn->close();
?>