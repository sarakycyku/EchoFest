<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: ../pages/client/login.php");
    exit;
}
include "../data/users.php";

$username = $_SESSION['username'];
unset($users[$username]);
saveUsers($users);

session_destroy();
header("Location: ../pages/client/login.php");
exit;
?>