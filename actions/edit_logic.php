<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: /EchoFest/pages/client/login.php");
    exit;
}
require_once __DIR__ . "/../db/conn.php";

if ($_SERVER["REQUEST_METHOD"] !== "POST") {
    header("Location: /EchoFest/pages/client/edit_profile.php");
    exit;
}

$username = $_SESSION['username'];

$first_name = trim($_POST['first_name'] ?? '');
$last_name  = trim($_POST['last_name'] ?? '');
$email      = strtolower(trim($_POST['email'] ?? ''));
$phone      = trim($_POST['phone'] ?? '');
$age        = trim($_POST['age'] ?? '');

$regexname = "/^[a-zA-ZëËçÇ\s]+$/u";
$phoneRegex = "/^[0-9]{8,15}$/";

$_SESSION['editFirstNameErr'] = "";
$_SESSION['editLastNameErr'] = "";
$_SESSION['editEmailErr'] = "";
$_SESSION['editPhoneErr'] = "";
$_SESSION['editAgeErr'] = "";

if (!preg_match($regexname, $first_name)) {
    $_SESSION['editFirstNameErr'] = "Only letters are allowed!";
}

if (!preg_match($regexname, $last_name)) {
    $_SESSION['editLastNameErr'] = "Only letters are allowed!";
}

if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
    $_SESSION['editEmailErr'] = "Email is not valid!";
} else {
    $stmt = $pdo->prepare("SELECT id FROM users WHERE email = :email AND username != :username LIMIT 1");
    $stmt->execute([
        ':email' => $email,
        ':username' => $username
    ]);

    if ($stmt->fetch()) {
        $_SESSION['editEmailErr'] = "Email already exists!";
    }
}

if (!preg_match($phoneRegex, $phone)) {
    $_SESSION['editPhoneErr'] = "Phone number is not valid!";
}

if (!is_numeric($age) || $age < 18 || $age > 120) {
    $_SESSION['editAgeErr'] = "Age must be between 18 and 120!";
}

if (
    !empty($_SESSION['editFirstNameErr']) ||
    !empty($_SESSION['editLastNameErr']) ||
    !empty($_SESSION['editEmailErr']) ||
    !empty($_SESSION['editPhoneErr']) ||
    !empty($_SESSION['editAgeErr'])
) {
    header("Location: /EchoFest/pages/client/edit_profile.php");
    exit;
}

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
    ':first_name' => $first_name,
    ':last_name' => $last_name,
    ':email' => $email,
    ':phone' => $phone,
    ':age' => (int)$age,
    ':username' => $username
]);

header("Location: /EchoFest/pages/client/profile.php");
exit;
