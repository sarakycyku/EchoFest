<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if ($_SERVER["REQUEST_METHOD"] == "POST") {

    try {
        $usersFile = __DIR__ . "/../data/users.php";

        if (!file_exists($usersFile)) {
            throw new Exception("Users file not found.");
        }

        include $usersFile;

        if (!isset($users) || !is_array($users)) {
            throw new Exception("Users data is not valid.");
        }

        $username = trim($_POST['username'] ?? '');
        $password = $_POST['password'] ?? '';

        if (empty($username) || empty($password)) {
            $_SESSION['error'] = "Please fill in all fields!";
            header("Location: /EchoFest/pages/client/login.php");
            exit;
        }

        if (isset($users[$username]) && password_verify($password, $users[$username]['password'])) {

            session_regenerate_id(true);

            $_SESSION['username'] = $username;
            $_SESSION['role'] = $users[$username]['role'];

            header("Location: /EchoFest/pages/client/index.php");
            exit;

        } else {
            $_SESSION['error'] = "Username or password is incorrect!";
            header("Location: /EchoFest/pages/client/login.php");
            exit;
        }
    } catch (Throwable $e) {
        $_SESSION['error'] = "Login failed. Please try again.";
        header("Location: /EchoFest/pages/client/login.php");
        exit;
    }
}
?>
