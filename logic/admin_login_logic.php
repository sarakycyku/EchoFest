<?php
session_start();

require_once __DIR__ . "/../data/users.php"; 

$username = trim($_POST['username'] ?? '');
$password = $_POST['password'] ?? '';

if ($username === '' || $password === '') {
    $_SESSION['error'] = "Please fill in all fields!";
    header("Location: ../pages/loginadmin.php");
    exit;
}

if (!isset($users[$username])) {
    $_SESSION['error'] = "Invalid admin username or password!";
    header("Location: ../pages/loginadmin.php");
    exit;
}

$user = $users[$username];

if (($user['role'] ?? '') !== 'admin') {
    $_SESSION['error'] = "Access denied! Admins only.";
    header("Location: ../pages/loginadmin.php");
    exit;
}

if (!password_verify($password, $user['password'])) {
    $_SESSION['error'] = "Invalid admin username or password!";
    header("Location: ../pages/loginadmin.php");
    exit;
}

$_SESSION['admin_id'] = $username;
$_SESSION['admin_username'] = $username;
$_SESSION['admin_role'] = "admin";
$_SESSION['admin_name'] = $user['first_name'] . " " . $user['last_name'];

header("Location: ../pages/admin_dashboard.php");
exit;