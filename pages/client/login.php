<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Login | EchoFest 2026</title>
    <link rel="icon" type="image/x-icon" href="/EchoFest/assets/images/logo2-pabg.png">
    <link rel="stylesheet" href="/EchoFest/assets/css/loginp.css">
</head>
<body>
    <?php
    if (isset($_SESSION['error'])):
    ?>
    <script>
        alert("<?= addslashes($_SESSION['error']) ?>");
    </script>
    <?php
        unset($_SESSION['error']);
    endif;
    ?>


    <main class="login-stage">
        <nav class="login-nav">
            <a href="index.php" class="brand-link">
                <img src="/EchoFest/assets/images/logo2-pabg.png" alt="EchoFest Logo">
                <span>EchoFest</span>
            </a>
        </nav>

        <section class="login-grid">
            <div class="festival-intro">
                <p class="festival-date">JULY 15-17, 2026  ·  OPEN AIR ARENA</p>
                <h1>
                    <span>Member</span>
                    <span>Access</span>
                </h1>
                <p class="festival-copy">
                    Log in to continue with tickets, profile details, and your festival plan.
                </p>
            </div>

            <section class="login-card" aria-label="Login form">
                <div class="card-topline">
                    <span>Account</span>
                    <span>Secure Entry</span>
                </div>

                <h2>Login</h2>

                <form class="login-form" id="loginForm" method="POST" action="/EchoFest/actions/login_logic.php">
                    <div class="input-block">
                        <input type="text" id="username" name="username" required placeholder=" ">
                        <label for="username">Username</label>
                    </div>

                    <div class="input-block">
                        <input type="password" id="password" name="password" required placeholder=" ">
                        <label for="password">Password</label>
                    </div>

                    <button type="submit" class="login-btn">Login</button>

                    <div class="account-links">
                        <p>Don't have an account? <a href="signup.php">Sign up</a></p>
                        <div class="policy-links">
                            <a href="terms.html">Terms</a>
                            <span>&bull;</span>
                            <a href="privacy.html">Privacy</a>
                        </div>
                    </div>
                </form>
            </section>
        </section>

        
    </main>

    <script src="/EchoFest/assets/js/home.js"></script>
</body>
</html>
