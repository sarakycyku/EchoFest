<?php
include '../includes/header.php';

if (!isset($_SESSION['username'])) {
    $_SESSION['redirect_after_login'] = 'purchase.php?' . http_build_query($_GET);
    header("Location: ../pages/client/login.php");
    exit;
}

//merr te dhenat e userit nga user.php
include "../data/users.php";

$username = $_SESSION['username'];
$data = [];

if (isset($users[$username]) && is_array($users[$username])) {
    $data = $users[$username];
}

$firstName = $data['first_name'] ?? '';
$lastName = $data['last_name'] ?? '';
$email = $data['email'] ?? '';
$phone = $data['phone'] ?? '';

$ticketParam = $_GET['ticket'] ?? 'early';
$qty = max(1, (int)($_GET['qty'] ?? 1));
$loc = $_GET['loc'] ?? 'xk';

$ticketDefs = [
    'early'=>['name' => 'Early Bird', 'price' => 79],
    'regular'=>['name' => 'Regular', 'price' => 129],
    'vip'=>['name' => 'VIP Experience', 'price' => 299]
];

$ticket = $ticketDefs[$ticketParam] ?? $ticketDefs['early'];
$subtotal = $ticket['price'] * $qty;
$serviceFee = 5;
$total = $subtotal + $serviceFee;

$locations = [
    'xk' => ['flag' => 'XK', 'country' => 'Kosovo',  'city' => 'Pristina', 'dates' => 'July 15-17, 2026'],
    'al' => ['flag' => 'AL', 'country' => 'Albania',  'city' => 'Durres',   'dates' => 'August 5-7, 2026']
];
$event = $locations[$loc] ?? $locations['xk'];
?>