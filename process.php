<?php
if ($_SERVER["REQUEST_METHOD"] == "POST") {
    // Collect and sanitize input data
    $name = htmlspecialchars(trim($_POST['name']));
    $email = htmlspecialchars(trim($_POST['email']));
    $phone = htmlspecialchars(trim($_POST['phone']));
    $date = htmlspecialchars(trim($_POST['date']));
    $time = htmlspecialchars(trim($_POST['time']));
    $guests = htmlspecialchars(trim($_POST['guests']));
    $requests = htmlspecialchars(trim($_POST['requests']));

    if (!preg_match("/^[a-zA-Z\s]{1,100}$/", $name)) {
        die("Name format is invalid");
    }

    if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
        die("Email format is invalid");
    }

    if (!preg_match("/^[0-9]{10}$/", $phone)) {
        die("Phone Number format is invalid");
    }

    if (!preg_match("/^\d{4}-\d{2}-\d{2}$/", $date)) {
        die("Date must be the future date");
    }

    if (!preg_match("/^\d{2}:\d{2}$/", $time)) {
        die("Please set the time");
    }

    if (!preg_match("/^(?:[1-9]|1[0-9]|20)$/", $guests)) {
        die("Invalid number of guests");
    }

    echo "<h3>Reservation Details</h3>";
    echo "<p><strong>Name:</strong> " . $name . "</p>";
    echo "<p><strong>Email:</strong> " . $email . "</p>";
    echo "<p><strong>Phone:</strong> " . $phone . "</p>";
    echo "<p><strong>Date:</strong> " . $date . "</p>";
    echo "<p><strong>Time:</strong> " . $time . "</p>";
    echo "<p><strong>Number of Guests:</strong> " . $guests . "</p>";
    echo "<p><strong>Special Requests:</strong> " . $requests . "</p>";
} else {
    die("Invalid request");
}
?>
