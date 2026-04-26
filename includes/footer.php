<link rel="stylesheet" href="../assets/css/footer.css?v1.1">

<footer class="footer-48201">

  <div class="container">
    <div class="row">
      <div class="col-md-4 pr-md-5">
        <img src="../assets/images/logo-last.png" width="350" height="200">
      </div>
      <div class="col-md">
        <ul class="list-unstyled nav-links">

          <?php if (isset($_SESSION['role']) && $_SESSION['role'] === 'admin'): ?>

            <!-- ADMIN NAV -->
            <li><a href="../pages/admin.php">Dashboard</a></li>
            <li><a href="#">Events</a></li>
            <li><a href="#">Lineup</a></li>
            <li><a href="../pages/admin_tickets.php">Tickets</a></li>
            <li><a href="#">Users Management</a></li>

          <?php else: ?>

            <!-- USER NAV -->
            <li><a href="../pages/index.php">Home</a></li>
            <li><a href="../pages/about.php">About Us</a></li>
            <li><a href="../pages/lineup.php">Line Up</a></li>
            <li><a href="../pages/events.php">Events</a></li>
            <li><a href="../pages/tickets.php">Tickets</a></li>
            <li><a href="../pages/news.php">News</a></li>
            <!-- <li><a href="../pages/profile.php">Profile</a></li> -->

          <?php endif; ?>

        </ul>
      </div>

      <div class="col-md">
        <ul class="list-unstyled nav-links">
          <li><a href="../pages/privacy.html">Privacy Policy</a></li>
          <li><a href="../pages/terms.html">Terms &amp; Conditions</a></li>
          <li><a href="#">Cookies</a></li>
        </ul>
      </div>
    </div>

    <div class="row ">
      <div class="col-12 text-center">
        <div class="copyright mt-5 pt-5">
          <p><small>&copy; 2026 All Rights Reserved to EchoFest .</small></p>
        </div>
      </div>
    </div>
  </div>

</footer>


<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>
<script src="/EchoFest/assets/js/header.js"></script>
</body>

</html>