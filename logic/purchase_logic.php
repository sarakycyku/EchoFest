<?php
session_start();

if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit;
}

//i merr te dhenat nga form
$ticketName = $_POST['ticket_name'] ?? '';
$qty = $_POST['qty'] ?? 1;
$eventName = $_POST['event_name'] ?? '';
$eventDates = $_POST['event_dates'] ?? '';
$total = $_POST['total'] ?? 0;
$expiry = trim($_POST['expiry'] ?? '');
$cvv = trim($_POST['cvv'] ?? '');

//validim i cvv
if (!preg_match('/^\d{3,4}$/', $cvv)) {
    $_SESSION['error'] = "CVV duhet të jetë 3 ose 4 numra.";
    header("Location: ../pages/purchase.php");
    exit;
}

//validimi per expiry date
if (!preg_match('/^(\d{2})\/(\d{2})$/', $expiry, $m) || (int)$m[1] < 1 || (int)$m[1] > 12) {
    $_SESSION['error'] = "Expiry date jo valid (MM/YY, muaji 01-12).";
    header("Location: ../pages/purchase.php");
    exit;
}

if ((int)('20' . $m[2]) < (int)date('Y')) {
    $_SESSION['error'] = "Karta ka skaduar.";
    header("Location: ../pages/purchase.php");
    exit;
}

//veprimet me files
$filename = "../data/orders.txt";

//shton order pa i fshi tvjetrat
$file = fopen($filename, "a") or die("Unable to open file!");
fwrite($file, "ORDER: $ticketName x$qty | $eventName | $eventDates | Total: EUR $total | User: {$_SESSION['username']} | Date: " . date('Y-m-d H:i:s') . "\n");
fclose($file);

//per lexim
$file = fopen($filename, "r") or die("Unable to open file!");
$content = fread($file, filesize($filename));
fclose($file);

//me rujt porosine ne session
$_SESSION['order_done'] = true;
$_SESSION['order_content'] = $content;

header("Location: ../pages/purchase.php");
exit;