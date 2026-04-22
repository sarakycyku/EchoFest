<?php
session_start();
include "../data/users.php";

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    $username = trim($_POST['username']);
    $password = trim($_POST['password']);

    // kontrollo a ekziston useri
    if (isset($users[$username])) {

        // kontrollo password
        if (password_verify($password, $users[$username]['password'])) {

            // login sukses
            $_SESSION['username'] = $username;
            $_SESSION['role'] = $users[$username]['role'];

            
                header("Location: ../pages/home.php");
                exit;
            

        } else {
            echo "Password gabim!";
        }

    } else {
        echo "Useri nuk ekziston!";
    }
}
?>