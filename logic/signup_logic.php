<?php
session_start();

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $p = $_POST["password"] ?? "";
    $c = $_POST["confirm_password"] ?? "";

    $phone = $_POST["phone"] ?? "";
    $age   = $_POST["age"] ?? "";
    $first_name = $_POST["first_name"] ?? "";
    $last_name  = $_POST["last_name"] ?? "";
    $username   = $_POST["username"] ?? "";
    $email      = $_POST["email"] ?? "";

    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    $_SESSION['passwordErr'] = "";
    $_SESSION['confirmErr'] = "";
    $_SESSION['phoneErr'] = "";
    $_SESSION['ageErr'] = "";
    $_SESSION['firstNameErr'] = "";
    $_SESSION['lastNameErr'] = "";
    $_SESSION['usernameErr'] = "";
    $_SESSION['emailErr'] = "";

    if (!preg_match($pattern, $p)) {
        $_SESSION['passwordErr'] = "Password must be at least 8 characters long and include uppercase, lowercase, number, and special character!";
    }

    if ($p !== $c) {
        $_SESSION['confirmErr'] = "Passwords do not match!";
    }

    if (!preg_match("/^[0-9]{8,15}$/", $phone)) {
        $_SESSION['phoneErr'] = "Phone number is not valid!";
    }

    if (!is_numeric($age) || $age < 18 || $age > 120) {
        $_SESSION['ageErr'] = "Age must be between 18 and 120!";
    }

    if (!preg_match("/^[a-zA-ZëËçÇ]+$/u", $first_name)) {
        $_SESSION['firstNameErr'] = "Only letters are allowed!";
    }

    if (!preg_match("/^[a-zA-ZëËçÇ]+$/u", $last_name)) {
        $_SESSION['lastNameErr'] = "Only letters are allowed!";
    }

    $blocked = ["admin"];
    $patternUsername = "/^[a-zA-Z][a-zA-Z0-9]{2,19}$/";

    if (in_array(strtolower($username), $blocked)) {
        $_SESSION['usernameErr'] = "This username is not allowed!";
    } elseif (!preg_match($patternUsername, $username)) {
        $_SESSION['usernameErr'] = "Username must be 3-20 characters, start with a letter, and contain only letters and numbers!";
    }

    if (strpos($email, "@") === false) {
        $_SESSION['emailErr'] = "Email must contain @";
    } else {
        $parts = explode("@", $email);
        $beforeAt = $parts[0];
        $afterAt  = $parts[1] ?? "";

        if (str_starts_with($beforeAt, ".") || str_ends_with($beforeAt, ".")) {
            $_SESSION['emailErr'] = "Invalid email format before @";
        } elseif (strpos($afterAt, ".") === false) {
            $_SESSION['emailErr'] = "Domain must contain dot (.)";
        } elseif (count(explode(".", $afterAt)) < 2) {
            $_SESSION['emailErr'] = "Invalid domain format";
        }
    }

    if (
        empty($_SESSION['passwordErr']) &&
        empty($_SESSION['confirmErr']) &&
        empty($_SESSION['phoneErr']) &&
        empty($_SESSION['ageErr']) &&
        empty($_SESSION['firstNameErr']) &&
        empty($_SESSION['lastNameErr']) &&
        empty($_SESSION['usernameErr']) &&
        empty($_SESSION['emailErr'])
    ) {
        $_SESSION['success'] = "Account created successfully!";
    }

    header("Location: ../pages/signup.php");
    exit();
}