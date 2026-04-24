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
<link rel="stylesheet" href="../assets/css/footer.css">
</head>
<body>

<nav class="navbar navbar-expand-md fixed-top">
  <div class="container">

    <!-- LOGO -->
    <a class="navbar-brand" href="#">
      <img src="../assets/images/logo2.png">
    </a>

    <!-- TOGGLER -->
    <button class="navbar-toggler border-0 text-info" data-bs-toggle="collapse" data-bs-target="#menu">
      ☰
    </button>

    <!-- MENU -->
    <div class="collapse navbar-collapse" id="menu">

      <!-- LINKS (CENTER FIXED) -->
      <ul class="navbar-nav">
        <li><a class="nav-link" href="home.php">Home</a></li>
        <li><a class="nav-link" href="about.php">About</a></li>
        <li><a class="nav-link" href="profile.php">Profile</a></li>
        <li><a class="nav-link" href="tickets.php">Tickets</a></li>
        <li><a class="nav-link" href="lineup.php">Line Up</a></li>
      </ul>

      <!-- BUTTONS (RIGHT SIDE) -->
      <div class="d-flex flex-column flex-md-row gap-2 gap-md-3 ms-auto mt-3 mt-md-0">
        <button class="btn-login"><a href="login.php">Login</a></button>
        <button class="btn-signup"><a href="signup.php">Signup</a></button>
      </div>

    </div>
  </div>
</nav>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

