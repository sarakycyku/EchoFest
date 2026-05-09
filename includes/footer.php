<link rel="stylesheet" href="/EchoFest/assets/css/footer.css?v1.1">

<footer class="footer-48201">

  <div class="container">
    <div class="row">
      <div class="col-md-4 pr-md-5">
        <img src="/EchoFest/assets/images/logo-last.png" width="350" height="200">
      </div>
      <div class="col-md">
        <ul class="list-unstyled nav-links">
            <!-- USER NAV -->
            <?php if ($_SESSION['role'] != 'admin'): ?>
              <li><a href="/EchoFest/pages/client/index.php">Home</a></li>
              <li><a href="/EchoFest/pages/client/about.php">About Us</a></li>
              <li><a href="/EchoFest/pages/client/lineup.php">Line Up</a></li>
              <li><a href="/EchoFest/pages/client/events.php">Events</a></li>
              <li><a href="/EchoFest/pages/client/tickets.php">Tickets</a></li>
              <li><a href="/EchoFest/pages/client/news.php">News</a></li>
              <li><a href="/EchoFest/pages/client/profile.php">Profile</a></li>
            <!-- ADMIN NAV -->
            <?php else: ?>
              <li><a href="/EchoFest/pages/admin/admin.php">Dashboard</a></li>
              <li><a href="/EchoFest/pages/admin/admin_tickets.php">Tickets</a></li>
            <?php endif; ?>
        </ul>
      </div>

      <div class="col-md">
        <ul class="list-unstyled nav-links">
          <li><a href="/EchoFest/pages/client/privacy.html">Privacy Policy</a></li>
          <li><a href="/EchoFest/pages/client/terms.html">Terms &amp; Conditions</a></li>
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
</body>

</html>
