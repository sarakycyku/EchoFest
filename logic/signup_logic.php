<link rel="stylesheet" href="../assets/css/signupp.css">
<?php
session_start();
// echo"Hello from signup_logic.php";

if ($_SERVER["REQUEST_METHOD"] === "POST") {

    $p = $_POST["password"] ?? "";
    $c = $_POST["confirm_password"] ?? "";

    $pattern = "/^(?=.*[a-z])(?=.*[A-Z])(?=.*\d)(?=.*[\W_]).{8,}$/";

    if (!preg_match($pattern, $p)) {
        $_SESSION['passwordErr'] = "Password must be at least 8 characters, include uppercase, lowercase, number, and symbol!";
        
    }

    if ($p !== $c) {
        $_SESSION['confirmErr'] = "Passwords do not match!";
    }

    if (empty($_SESSION['passwordErr']) && empty($_SESSION['confirmErr'])) {
        $_SESSION['success'] = "Account created successfully!";
    }

    header("Location: ../pages/signup.php");
    exit();
}