<?php

function validateForm($name, $phoneNum, $pax, $email) {
    $errors = [];

    $nameRegex = '/^[a-zA-Z\s]+$/';
    $phoneRegex = '/^\d{10}$/';
    $paxRegex = '/^[1-9][0-9]*$/';
    $emailRegex = '/^[^\s@]+@[^\s@]+\.[^\s@]+$/';

    if (!preg_match($nameRegex, $name)) {
        $errors[] = "Name must contain only letters and spaces.";
    }

    if (!preg_match($phoneRegex, $phoneNum)) {
        $errors[] = "Phone number must be 10 digits.";
    }

    if (!preg_match($paxRegex, $pax)) {
        $errors[] = "Total Pax must be a positive integer.";
    }

    if (!preg_match($emailRegex, $email)) {
        $errors[] = "Invalid email format.";
    }

    return $errors;
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $name = $_POST["name"];
    $phoneNum = $_POST["phoneNum"];
    $pax = $_POST["pax"];
    $email = $_POST["email"];

    $errors = validateForm($name, $phoneNum, $pax, $email);

    if (!empty($errors)) {
        foreach ($errors as $error) {
            echo "<p>Error: $error</p>";
        }
    } else {
        header("Location: submit.html");
        exit;
    }
}
?>
