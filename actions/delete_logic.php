<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /EchoFest/pages/client/login.php");
    exit;
}
include __DIR__ . "/../data/users.php";

$username = $_SESSION['username'];
unset($users[$username]);
saveUsers($users);

session_destroy();
header("Location: /EchoFest/pages/client/login.php");
exit;
?>
