<?php
// Include the database connection file
include 'includes/db.php';

// Define the getEvents function to fetch events from the database
function getEvents() {
    global $pdo; // Access the database connection object

    try {
        // Prepare and execute a SQL query to fetch events
        $stmt = $pdo->prepare("SELECT * FROM events");
        $stmt->execute();

        // Fetch all rows from the result set as an associative array
        $events = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $events; // Return the fetched events
    } catch(PDOException $e) {
        // Handle any database errors
        die("Error: " . $e->getMessage());
    }
}

// Call the getEvents function to fetch events
$events = getEvents();

// Now you can use the $events array to display events on your webpage
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Events</title>
</head>
<body>

<h1>Events</h1>

<?php
// Check if there are any events to display
if ($events) {
    // Loop through each event and display its details
    foreach ($events as $event) {
        echo "<h2>" . $event['event_name'] . "</h2>";
        echo "<p>Date: " . $event['event_date'] . "</p>";
        echo "<p>Description: " . $event['event_description'] . "</p>";
        // Add more details as needed
    }
} else {
    echo "<p>No events found.</p>";
}
?>

</body>
</html>
