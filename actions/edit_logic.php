<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /EchoFest/pages/client/login.php");
    exit;
}
require_once __DIR__ . "/../db/conn.php";
$username = $_SESSION['username'];

$stmt = $pdo->prepare("
    UPDATE users
    SET first_name = :first_name,
        last_name = :last_name,
        email = :email,
        phone = :phone,
        age = :age
    WHERE username = :username
");

$stmt->execute([
    ':first_name' => $_POST['first_name'],
    ':last_name' => $_POST['last_name'],
    ':email' => $_POST['email'],
    ':phone' => $_POST['phone'],
    ':age' => $_POST['age'],
    ':username' => $username,
]);

header("Location: /EchoFest/pages/client/profile.php");
exit;
