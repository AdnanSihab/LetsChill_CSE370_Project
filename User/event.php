<?php
require_once 'db/db.php';

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST['name'];
    $date = $_POST['date'];
    $type = $_POST['type'];
    $description = $_POST['description'];
    $organizer_nid = $_POST['organizer_nid'];
    $location_id = $_POST['location_id'];
    $location_address = $_POST['location_address'];

    $sql = "INSERT INTO concert (Name, Date, type, description, organizer_nid, location_id, location_address) 
            VALUES (:name, :date, :type, :description, :organizer_nid, :location_id, :location_address)";
    
    $stmt = $pdo->prepare($sql);
    
    $stmt->bindParam(':name', $name);
    $stmt->bindParam(':date', $date);
    $stmt->bindParam(':type', $type);
    $stmt->bindParam(':description', $description);
    $stmt->bindParam(':organizer_nid', $organizer_nid);
    $stmt->bindParam(':location_id', $location_id);
    $stmt->bindParam(':location_address', $location_address);
    
    if ($stmt->execute()) {
        header("Location: events.php");
        exit();
    } else {
        echo "Error: Unable to add event.";
    }
}
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Add Event</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>Add Event</h1>
    </header>
    <div class="container">
        <form action="<?php echo htmlspecialchars($_SERVER["PHP_SELF"]); ?>" method="post">
            <label for="name">Event Name:</label>
            <input type="text" id="name" name="name" required><br><br>
            <label for="date">Date:</label>
            <input type="date" id="date" name="date" required><br><br>
            <label for="type">Type:</label>
            <input type="text" id="type" name="type" required><br><br>
            <label for="description">Description:</label><br>
            <textarea id="description" name="description" rows="4" cols="50" required></textarea><br><br>
            <label for="organizer_nid">Organizer NID:</label>
            <input type="text" id="organizer_nid" name="organizer_nid" required><br><br>
            <label for="location_id">Location ID:</label>
            <input type="text" id="location_id" name="location_id" required><br><br>
            <label for="location_address">Location Address:</label>
            <input type="text" id="location_address" name="location_address" required><br><br>
            <input type="submit" value="Add Event">
        </form>
    </div>
    <footer>
        &copy; 2024 Your Website
    </footer>
</body>
</html>
