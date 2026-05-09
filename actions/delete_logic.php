<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /EchoFest/pages/client/login.php");
    exit;
}
require_once __DIR__ . "/../db/conn.php";

$username = $_SESSION['username'];

$stmt = $pdo->prepare("DELETE FROM users WHERE username = :username");
$stmt->execute([':username' => $username]);

session_destroy();
header("Location: /EchoFest/pages/client/login.php");
exit;
?>
