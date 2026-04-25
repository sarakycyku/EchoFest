<?php
session_start();

if (isset($_SESSION['admin_id'])) {
    header("Location: admin_dashboard.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>Admin Login</title>
    <link rel="icon" href="../assets/images/logo2-pabg.png">
    <link rel="stylesheet" href="../assets/css/loginp.css">
</head>
<body>

<?php if (isset($_SESSION['error'])): ?>
<script>
    alert("<?= $_SESSION['error'] ?>");
</script>
<?php unset($_SESSION['error']); endif; ?>

<div class="login-container">
    <div class="future-card">
        <div class="chrome-header">
            <div class="retro-logo mt-1">
                <div class="logo-chrome">
                    <img src="../assets/images/logo2-pabg.png" alt="Logo" width="150" height="150">
                </div>
            </div>

            <h1 class="y2k-title">
                <span class="title-chrome">ADMIN</span>
                <span class="title-neon">PANEL</span>
            </h1>

            <p class="login-subtitle">Admin Login</p>
        </div>

        <form class="future-form" method="POST" action="../logic/admin_login_logic.php">
            <div class="retro-field">
                <div class="field-chrome">
                    <input type="text" name="username" required placeholder=" ">
                    <label>Admin Username</label>
                    <div class="field-hologram"></div>
                </div>
            </div>

            <div class="retro-field">
                <div class="field-chrome">
                    <input type="password" name="password" required placeholder=" ">
                    <label>Admin Password</label>
                    <div class="field-hologram"></div>
                </div>
            </div>

            <button type="submit" class="login-btn">
                Login as Admin
            </button>
        </form>
    </div>
</div>

</body>
</html>