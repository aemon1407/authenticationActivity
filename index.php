<?php
session_start();
if (!isset($_SESSION['email'])) {
    header("Location: login.php");
    exit();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Restaurant Reservation</title>
    <link rel="stylesheet" href="style.css">
</head>
<body>
    <div class="reservation-container">
        <div class="reservation-form-container">
            <h2>Restaurant Reservation</h2>
            <form id="reservation-form" action="process.php" method="POST">
                <label for="name">Name:</label>
                <input type="text" id="name" name="name" required>

                <label for="email">Email:</label>
                <input type="email" id="email" name="email" required>

                <label for="phone">Phone:</label>
                <input type="tel" id="phone" name="phone" pattern="[0-9]{10}" required>

                <label for="date">Reservation Date:</label>
                <input type="date" id="date" name="date" required>

                <label for="time">Reservation Time:</label>
                <input type="time" id="time" name="time" required>

                <label for="guests">Number of Guests:</label>
                <input type="number" id="guests" name="guests" min="1" max="20" required>

                <label for="requests">Special Requests:</label>
                <textarea id="requests" name="requests"></textarea>

                <button type="submit">Submit</button>
            </form>
        </div>
        <div id="reservation-details" class="reservation-details"></div>
    </div>
    <script src="js/script.js"></script>
</body>
</html>
