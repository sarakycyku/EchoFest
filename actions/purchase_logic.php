<?php
session_start();
require_once __DIR__ . "/../db/conn.php";

if (!isset($_SESSION['username'])) {
    header("Location: /EchoFest/pages/client/login.php");
    exit;
}

//i merr te dhenat nga form
$ticketName = $_POST['ticket_name'] ?? '';
$qty = $_POST['qty'] ?? 1;
$eventName = $_POST['event_name'] ?? '';
$eventDates = $_POST['event_dates'] ?? '';
$ticketType = $_POST['ticket_type'] ?? '';
$locationCode = $_POST['event_code'] ?? '';
$total = $_POST['total'] ?? 0;
$expiry = trim($_POST['expiry'] ?? '');
$cvv = trim($_POST['cvv'] ?? '');

//validim i cvv
if (!preg_match('/^\d{3,4}$/', $cvv)) {
    $_SESSION['error'] = "CVV duhet të jetë 3 ose 4 numra.";
    header("Location: /EchoFest/pages/client/purchase.php");
    exit;
}

//validimi per expiry date
if (!preg_match('/^(\d{2})\/(\d{2})$/', $expiry, $m) || (int)$m[1] < 1 || (int)$m[1] > 12) {
    $_SESSION['error'] = "Expiry date jo valid (MM/YY, muaji 01-12).";
    header("Location: /EchoFest/pages/client/purchase.php");
    exit;
}

if ((int)('20' . $m[2]) < (int)date('Y')) {
    $_SESSION['error'] = "Karta ka skaduar.";
    header("Location: /EchoFest/pages/client/purchase.php");
    exit;
}

$stmt = $pdo->prepare("
    INSERT INTO orders (username, ticket_type, ticket_name, qty, event_name, event_dates, location_code, total, order_date)
    VALUES (:username, :ticket_type, :ticket_name, :qty, :event_name, :event_dates, :location_code, :total, NOW())
");

$stmt->execute([
    ':username' => $_SESSION['username'],
    ':ticket_type' => $ticketType,
    ':ticket_name' => $ticketName,
    ':qty' => $qty,
    ':event_name' => $eventName,
    ':event_dates' => $eventDates,
    ':location_code' => $locationCode,
    ':total' => $total,
]);

//me rujt porosine ne session
$_SESSION['order_done'] = true;

header("Location: /EchoFest/pages/client/purchase.php");
exit;
