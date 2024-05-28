<?php
session_start();

if (isset($_SESSION['email'])) {
    header("Location: index.php");
    exit();
}

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "restaurant_reservation";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
    die("Connection failed: " . $conn->connect_error);
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $email = htmlspecialchars(trim($_POST['email']));
    $password = htmlspecialchars(trim($_POST['password']));

    // Hash the password
    $hashed_password = password_hash($password, PASSWORD_DEFAULT);

    // Sanitize the email
    $sanitized_email = htmlspecialchars($email);

    $sql = "INSERT INTO users (email, password) VALUES ('$sanitized_email', '$hashed_password')";

    if ($conn->query($sql) === TRUE) {
        echo "Registration successful. <a href='login.php'>Login here</a>.";
    } else {
        echo "Error: " . $sql . "<br>" . $conn->error;
    }

    $conn->close();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Register</title>
    <link rel="stylesheet" href="css/style.css">
</head>
<body>
    <h2>Register</h2>
    <form method="POST" action="">
        <label for="email">Email:</label>
        <input type="email" id="email" name="email" required><br>
        <label for="password">Password:</label>
        <input type="password" id="password" name="password" required><br>
        <button type="submit">Register</button>
    </form>
    <p>Already have an account? <a href="login.php">Login here</a>.</p>
</body>
</html>
