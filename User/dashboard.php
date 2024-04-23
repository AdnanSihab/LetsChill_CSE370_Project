<?php
require_once 'db/db.php';

session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true) {
    header("location: login.php");
    exit;
}

$user_id = $_SESSION["id"];

$sql = "SELECT * FROM user WHERE NID = :user_id";
$stmt = $pdo->prepare($sql);
$stmt->bindParam(':user_id', $user_id);
$stmt->execute();
$user = $stmt->fetch(PDO::FETCH_ASSOC);

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $email = $_POST['email'];
    $username = $_POST['username'];
    $password = $_POST['password'];
    $number = $_POST['number'];

    $sql = "UPDATE user SET name = :name, email = :email, username = :username, password = :password, number = :number WHERE NID = :user_id";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':email', $email);
    $stmt->bindParam(':username', $username);
    $stmt->bindParam(':password', $password);
    $stmt->bindParam(':number', $number);
    $stmt->bindParam(':user_id', $user_id);
    
    if ($stmt->execute()) {
        header("Location: profile.php");
        exit();
    } else {
        echo "Error: Unable to update profile.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Edit Profile</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Edit Profile</h1>
    </header>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Name:</label>
            <input type="text" id="name" name="name" value="<?php echo $user['name']; ?>" required><br><br>
            <label for="email">Email:</label>
            <input type="email" id="email" name="email" value="<?php echo $user['email']; ?>" required><br><br>
            <label for="username">Username:</label>
            <input type="text" id="username" name="username" value="<?php echo $user['username']; ?>" required><br><br>
            <label for="password">Password:</label>
            <input type="password" id="password" name="password" value="<?php echo $user['password']; ?>" required><br><br>
            <label for="number">Phone Number:</label>
            <input type="tel" id="number" name="number" pattern="[0-9]{10}" value="<?php echo $user['number']; ?>" required><br><br>
            <input type="submit" value="Save Changes">
        </form>
    </div>
    <footer>
        &copy; 2024 Your Website
    </footer>
</body>
</html>
