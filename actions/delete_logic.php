<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit;
}
include "../data/users.php";

$username = $_SESSION['username'];
unset($users[$username]);
saveUsers($users);

session_destroy();
header("Location: ../pages/login.php");
exit;
?>