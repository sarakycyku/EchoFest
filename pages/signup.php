<?php
session_start();

$passwordErr = $_SESSION['passwordErr'] ?? "";
$confirmErr  = $_SESSION['confirmErr'] ?? "";
$success     = $_SESSION['success'] ?? "";

unset($_SESSION['passwordErr'], $_SESSION['confirmErr'], $_SESSION['success']);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up</title>

<link rel="icon" type="image/x-icon" href="../assets/images/logo2-pabg.png">

<!-- Bootstrap ONLY for text utilities -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">

<link rel="stylesheet" href="../assets/css/signupp.css">

<style>
body {
    background: #111 url('../assets/images/bg.png') center/cover no-repeat;
    overflow-y: scroll;
} 
</style>
</head>

<body>

<div class="login-container">
    <div class="future-card">

        <!-- HEADER -->
        <div class="chrome-header">
            <div class="retro-logo">
                <div class="logo-chrome">
                    <img src="../assets/images/logo2-pabg.png" width="150" height="200" alt="Logo">
                </div>
            </div>

            <h1 class="y2k-title">
                <span class="title-chrome">SIGN</span>
                <span class="title-neon">UP</span>
            </h1>
        </div>

        <!-- FORM -->
        <form method="POST" action="../logic/signup_logic.php" class="future-form">

            <!-- NAME -->
            <div class="form-row">
                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" name="first_name" placeholder=" " required>
                        <label>First Name</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" name="last_name" placeholder=" " required>
                        <label>Last Name</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>
            </div>

            <!-- USERNAME + EMAIL -->
            <div class="form-row">
                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" name="username" placeholder=" " required>
                        <label>Username</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="email" name="email" placeholder=" " required>
                        <label>Email</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>
            </div>

            <!-- PHONE + AGE -->
            <div class="form-row">
                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="text" name="phone" placeholder=" " required>
                        <label>Phone</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="number" name="age" placeholder=" " required>
                        <label>Age</label>
                        <div class="field-hologram"></div>
                    </div>
                </div>
            </div>

            <!-- PASSWORD -->
            <div class="form-row">

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="password" name="password" placeholder=" " required>
                        <label>Password</label>
                        <div class="field-hologram"></div>
                    </div>

                    <?php if($passwordErr): ?>
                        <div class="error-wrap text-danger small px-2">
                            <?= $passwordErr ?>
                        </div>
                    <?php endif; ?>
                </div>

                <div class="retro-field">
                    <div class="field-chrome">
                        <input type="password" name="confirm_password" placeholder=" " required>
                        <label>Confirm Password</label>
                        <div class="field-hologram"></div>
                    </div>

                    <?php if($confirmErr): ?>
                        <div class="error-wrap text-danger small px-2">
                            <?= $confirmErr ?>
                        </div>
                    <?php endif; ?>
                </div>

            </div>

            <!-- TERMS -->
            <p class="legal-links">
                By signing up you agree to our 
                <a href="terms.html">Terms & Conditions</a> and 
                <a href="#">Privacy Policy</a>
            </p>

            <!-- BUTTON -->
            <button class="login-btn">
                Create Account
            </button>

            <!-- SUCCESS -->
            <?php if($success): ?>
                <div class="success-msg text-success text-center mt-2"><?= $success ?></div>
            <?php endif; ?>

            <!-- LOGIN -->
            <p class="switch-form">
                Already have an account? <a href="login.php" class="future-link">Login</a>
            </p>

        </form>

    </div>
</div>

</body>
</html>