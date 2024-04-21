<?php
session_start();

if (!isset($_SESSION["loggedin"]) || $_SESSION["loggedin"] !== true || $_SESSION["role_id"] !== 1) {
    header("location: login.php");
    exit;
}

require_once "db/db.php";

$sql = "SELECT purchasing_info.ticket_ID, purchasing_info.buyer_nid, user.name AS buyer_name, tickets.Type, tickets.price, tickets.concert_id, concert.Name AS concert_name
        FROM purchasing_info
        INNER JOIN tickets ON purchasing_info.ticket_ID = tickets.ticket_ID
        INNER JOIN user ON purchasing_info.buyer_nid = user.NID
        INNER JOIN concert ON tickets.concert_id = concert.Concert_id";

$stmt = $pdo->query($sql);
$purchases = $stmt->fetchAll(PDO::FETCH_ASSOC);
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>View Purchases</title>
    <link rel="stylesheet" href="css/styles.css">
</head>
<body>
    <header>
        <h1>View Purchases</h1>
        <nav>
            <ul>
                <li><a href="index.php">Admin Dashboard</a></li>
                <li><a href="logout.php">Logout</a></li>
            </ul>
        </nav>
    </header>
    <div class="container">
        <h2>Purchase History</h2>
        <table>
            <thead>
                <tr>
                    <th>Ticket ID</th>
                    <th>Buyer NID</th>
                    <th>Buyer Name</th>
                    <th>Ticket Type</th>
                    <th>Price</th>
                    <th>Concert ID</th>
                    <th>Concert Name</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($purchases as $purchase): ?>
                    <tr>
                        <td><?php echo $purchase['ticket_ID']; ?></td>
                        <td><?php echo $purchase['buyer_nid']; ?></td>
                        <td><?php echo $purchase['buyer_name']; ?></td>
                        <td><?php echo $purchase['Type']; ?></td>
                        <td><?php echo $purchase['price']; ?></td>
                        <td><?php echo $purchase['concert_id']; ?></td>
                        <td><?php echo $purchase['concert_name']; ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <footer>
        &copy; 2024 Your Website
    </footer>
</body>
</html>
