<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (!isset($_SESSION['role']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../pages/client/login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Admin Panel</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="icon" href="../assets/images/logo2-pabg.png">
<link rel="stylesheet" href="../assets/css/h.css">


</head>

<body>

<nav class="navbar navbar-expand-md fixed-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="../pages/admin/admin.php">
       <img src="../assets/images/logo-last.png" alt="Logo">
    </a>


    <!-- MENU -->
    <div class="collapse navbar-collapse" id="menu">

      <!-- ADMIN LINKS -->
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="../pages/admin/admin.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Events</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Lineup</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/admin/admin_tickets.php">Tickets</a></li>
        <li class="nav-item"><a class="nav-link" href="#">Users Management</a></li>
      </ul>

      <!-- RIGHT SIDE -->
      <div class="nav-buttons">
        <span style="color:white; margin-right:10px; margin-top:15px; font-size:14px;">
          Admin: <?= $_SESSION['username'] ?>
        </span>
        <a href="../logic/logout.php" class="btn-login">Logout</a>
      </div>

    </div>
  </div>
</nav>