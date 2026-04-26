<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$pageTitle = $pageTitle ?? 'EchoFest';
$extraStyles = $extraStyles ?? [];
?>
<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title><?= htmlspecialchars($pageTitle, ENT_QUOTES, 'UTF-8'); ?></title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=DM+Sans:wght@300;400;500;700&display=swap" rel="stylesheet">
<link rel="icon" href="../assets/images/logo2-pabg.png">
<link rel="stylesheet" href="../assets/css/h.css">
<?php foreach ($extraStyles as $style): ?>
<link rel="stylesheet" href="<?= htmlspecialchars($style, ENT_QUOTES, 'UTF-8'); ?>">
<?php endforeach; ?>
</head>
<body>

<nav class="navbar navbar-expand-md fixed-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="../pages/index.php">
       <img src="../assets/images/logo-last.png"  class="img-fluid " alt="EchoFest Logo"> 
       
    </a>

    <!-- TOGGLER -->
    <button id="menuToggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="menu">

      <!-- LINKS -->
      <ul class="navbar-nav mx-auto">
            <li class="nav-item"><a class="nav-link" href="../pages/index.php">Home</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/about.php">About us</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/lineup.php">Line Up</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/events.php">Events</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/tickets.php">Tickets</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/profile.php">Profile</a></li>
            <li class="nav-item"><a class="nav-link" href="../pages/news.php">News</a></li>
            <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>
              <li class="nav-item">
                <a class="nav-link" href="../pages/loginadmin.php">Admin</a>
              </li>
            <?php endif; ?>
      </ul>

      <!-- BUTTONS -->
      <div class="nav-buttons">
          <?php if (!isset($_SESSION['username'])): ?>
            <a href="../pages/login.php" class="btn-login">Login</a>
            <a href="../pages/signup.php" class="btn-signup">Signup</a>
          <?php else: ?>
            <span style="color:white; margin-right:10px; margin-top:15px; font-size:14px;">
              Welcome, <?= $_SESSION['username'] ?>
            </span>
            <a href="../logic/logout.php" class="btn-login">Logout</a>
          <?php endif; ?>
      </div>

    </div>
  </div>
</nav>
