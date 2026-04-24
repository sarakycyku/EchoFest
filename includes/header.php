<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Navbar</title>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link href="https://fonts.googleapis.com/css2?family=Space+Grotesk:wght@400;500;700&display=swap" rel="stylesheet">
<link rel="icon" href="../assets/images/logo2-pabg.png">
<link rel="stylesheet" href="../assets/css/h.css">
</head>
<body>

<nav class="navbar navbar-expand-md fixed-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="#">
      <img src="../assets/images/logo2.png">
    </a>

    <!-- TOGGLER -->
    <button id="menuToggle" class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#menu">
      <span class="icon"></span>
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="menu">

      <!-- LINKS -->
      <ul class="navbar-nav mx-auto">
        <li class="nav-item"><a class="nav-link" href="../pages/home.php">Home</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/about.php">About</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/profile.php">Profile</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/tickets.php">Tickets</a></li>
        <li class="nav-item"><a class="nav-link" href="../pages/lineup.php">Line Up</a></li>
      </ul>

      <!-- BUTTONS -->
      <div class="nav-buttons">
        <a href="../pages/login.php" class="btn-login">Login</a>
        <a href="../pages/signup.php" class="btn-signup">Signup</a>
      </div>

    </div>
  </div>
</nav>
