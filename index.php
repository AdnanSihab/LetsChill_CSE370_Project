<?php
require_once 'includes/db.php';

$events = getEvents();
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Let's Chill</title>
    <link rel="stylesheet" href="styles.css">
</head>
<body>
    <header>
        <div class="container">
            <h1>Let's Chill</h1>
            <nav>
                <ul>
                    <li><a href="#">Home</a></li>
                    <li><a href="#">Events</a></li>
                    <li><a href="#">About</a></li>
                    <li><a href="#">Contact</a></li>
                    <li><a href="#">Login</a></li>
                </ul>
            </nav>
        </div>
    </header>
    
    <section id="hero">
        <div class="container">
            <h2>Welcome to Let's Chill</h2>
            <p>Find and book tickets for your favorite events!</p>
        </div>
    </section>

    <section id="events">
        <div class="container">
            <h2>Upcoming Events</h2>
            <?php foreach ($events as $event): ?>
                <div class="event">
                    <h3><?php echo $event['Name']; ?></h3>
                    <p>Date: <?php echo $event['Date']; ?></p>
                    <p>Type: <?php echo $event['Type']; ?></p>
                    <p>Description: <?php echo $event['Description']; ?></p>
                </div>
            <?php endforeach; ?>
        </div>
    </section>

    <footer>
        <div class="container">
            <p>&copy; <?php echo date('Y'); ?> Let's Chill</p>
        </div>
    </footer>
</body>
</html>
