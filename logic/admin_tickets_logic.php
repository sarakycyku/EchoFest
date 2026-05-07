<?php
session_start();

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../pages/login.php");
    exit;
}

if ($_SERVER['REQUEST_METHOD'] !== 'POST') {
    header("Location: ../pages/admin_tickets.php");
    exit;
}

$action = $_POST['action'] ?? '';
$ticketsFile = '../data/tickets.json';

$tickets = json_decode(file_get_contents($ticketsFile), true);

?>