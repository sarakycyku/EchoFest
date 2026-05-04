<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../pages/client/login.php");
    exit;
}
include "../data/users.php";
$username = $_SESSION['username'];

$users[$username]['first_name'] = $_POST['first_name'];
$users[$username]['last_name']  = $_POST['last_name'];
$users[$username]['email']      = $_POST['email'];
$users[$username]['phone']      = $_POST['phone'];
$users[$username]['age']        = $_POST['age'];

saveUsers($users);
header("Location: ../pages/client/profile.php");
exit;