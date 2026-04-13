<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $p = $_POST["password"] ?? "";
    $c = $_POST["confirm_password"] ?? "";

    $phone = $_POST["phone"] ?? "";
    $age   = $_POST["age"] ?? "";

    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    $_SESSION['passwordErr'] = "";
    $_SESSION['confirmErr'] = "";
    $_SESSION['phoneErr'] = "";
    $_SESSION['ageErr'] = "";

    if (!preg_match($pattern, $p)) {
        $_SESSION['passwordErr'] = " Password must be at least 8 characters long, contain an uppercase letter, a lowercase letter, a number, and a special character! ";
    }

    if ($p !== $c) {
        $_SESSION['confirmErr'] = "Passwords do not match!";
    }

    if (!preg_match("/^[0-9]{8,15}$/", $phone)) {
        $_SESSION['phoneErr'] = "Phone number is not valid!";
    }

    if (!is_numeric($age) || $age < 18 || $age > 120) {
        $_SESSION['ageErr'] = "Age must be a number between 18 and 120!";
    }

    if (
        empty($_SESSION['passwordErr']) &&
        empty($_SESSION['confirmErr']) &&
        empty($_SESSION['phoneErr']) &&
        empty($_SESSION['ageErr'])
    ) {
        $_SESSION['success'] = "Account created successfully!";
    }

    header("Location: ../pages/signup.php");
    exit();
}