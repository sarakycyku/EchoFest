<?php 
// fillon sessioni
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_after_login'] = 'purchase.php?' . http_build_query($_GET);
    header("Location: ../pages/login.php");
    exit;
}

//merr te dhenat e userit nga user.php
include "../data/users.php"; 

$username  = $_SESSION['username'];
$data      = $users[$username];

$firstName = $data['first_name'] ?? '';
$lastName  = $data['last_name']  ?? '';
$email     = $data['email']      ?? '';
$phone     = $data['phone']      ?? '';

include '../includes/header.php'; 
?>

<link rel="stylesheet" href="../assets/css/purchase.css">

<h1 class="page-title">Complete Your Purchase</h1>

<form method="POST" action="purchase_logic.php">
<div class="purchase-layout"></div>
</form>

<?php include '../includes/footer.php'; ?>