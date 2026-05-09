<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>EchoFest Admin</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="icon" href="/EchoFest/assets/images/logo2-pabg.png">
<link rel="stylesheet" href="/EchoFest/assets/css/h.css">
<script src="/EchoFest/assets/js/header.js?v=1.1" defer></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" defer></script>
</head>
<body>

<nav class="navbar navbar-expand-md fixed-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="/EchoFest/pages/admin/admin.php">
       <img src="/EchoFest/assets/images/logo-last.png" class="img-fluid" alt="EchoFest Logo">
    </a>

    <!-- TOGGLER -->
    <button id="menuToggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="menu">

      <!-- LINKS -->
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="/EchoFest/pages/admin/admin.php">Dashboard</a></li>
        <li class="nav-item"><a class="nav-link" href="/EchoFest/pages/admin/admin_tickets.php">Tickets</a></li>
      </ul>

      <!-- BUTTONS -->
      <div class="nav-buttons">
          <span style="color:white; margin-right:10px; margin-top:15px; font-size:14px;">
            Welcome, <?= htmlspecialchars($_SESSION['username']) ?>
          </span>
          <a href="/EchoFest/actions/logout.php" class="btn-login">Logout</a>
      </div>

    </div>
  </div>
</nav>
