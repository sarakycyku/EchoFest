<?php
session_start();
include "../data/users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    if (isset($users[$username])) {

        if (password_verify($password, $users[$username]['password'])) {

            $_SESSION['username'] = $username;
            $_SESSION['role'] = $users[$username]['role'];

            header("Location: ../pages/home.php");
            exit;

        } else {
            $_SESSION['error'] = "Username or password is incorrect!";
        }

    } else {
        $_SESSION['error'] = "User doesn't exist!";
    }

    header("Location: ../pages/login.php");
    exit;
}
?>