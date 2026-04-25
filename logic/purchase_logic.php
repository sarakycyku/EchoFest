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

?>