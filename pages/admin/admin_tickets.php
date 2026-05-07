<?php include '../includes/header.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../pages/login.php");
    exit;
}

$tickets = json_decode(file_get_contents('../data/tickets.json'), true);
?>
<link rel="stylesheet" href="../assets/css/admin_tickets.css">

<div class="admin-wrap">
    <div class="admin-header">
        <h1 class="admin-title">Manage Tickets</h1>
        <p class="admin-sub">Add, enable, disable or delete ticket types</p>
    </div>
</div>