<?php
session_start();

if (isset($_SESSION['success'])):
?>
<script>
    alert("<?= addslashes($_SESSION['success']) ?>");
    window.location.href = "login.php";
</script>
<?php
    unset($_SESSION['success']);
endif;

$passwordErr = $_SESSION['passwordErr'] ?? "";
$confirmErr  = $_SESSION['confirmErr'] ?? "";

$ageErr   = $_SESSION['ageErr'] ?? "";
$phoneErr = $_SESSION['phoneErr'] ?? "";

$firstNameErr = $_SESSION['firstNameErr'] ?? "";
$lastNameErr  = $_SESSION['lastNameErr'] ?? "";
$usernameErr  = $_SESSION['usernameErr'] ?? "";
$emailErr     = $_SESSION['emailErr'] ?? "";

unset(
    $_SESSION['passwordErr'],
    $_SESSION['confirmErr'],
    $_SESSION['ageErr'],
    $_SESSION['phoneErr'],
    $_SESSION['firstNameErr'],
    $_SESSION['lastNameErr'],
    $_SESSION['usernameErr'],
    $_SESSION['emailErr']
);
?>

<!DOCTYPE html>
<html lang="en">
<head>
<meta charset="UTF-8">
<meta name="viewport" content="width=device-width, initial-scale=1.0">
<title>Sign Up | EchoFest 2026</title>

<link rel="icon" type="image/x-icon" href="/EchoFest/assets/images/logo2-pabg.png">
<link rel="stylesheet" href="/EchoFest/assets/css/signupp.css">
</head>

<body>

<main class="signup-stage">
    <nav class="signup-nav">
        <a href="index.php" class="brand-link">
            <img src="/EchoFest/assets/images/logo2-pabg.png" alt="EchoFest Logo">
            <span>EchoFest</span>
        </a>
    </nav>

    <section class="signup-grid">
        <div class="festival-intro">
            <p class="festival-date">JULY 15-17, 2026  ·  OPEN AIR ARENA</p>
            <h1>
                <span>Get Your</span>
                <span>Pass</span>
            </h1>
            <p class="festival-copy">
                Create your festival account to manage tickets, profile details, and weekend plans.
            </p>
        </div>

        <section class="signup-card" aria-label="Signup form">
            <div class="card-topline">
                <span>New Account</span>
                <span>Festival Entry</span>
            </div>

            <h2>Sign up</h2>

            <form class="signup-form" method="POST" action="/EchoFest/actions/signup_logic.php">
                <div class="form-row">
                    <div class="input-block">
                        <input id="first_name" type="text" name="first_name" placeholder=" " required>
                        <label for="first_name">First Name</label>
                        <small id="firstNameFrontErr"></small>
                        <?php if($firstNameErr) echo '<div class="error-wrap">'.$firstNameErr.'</div>'; ?>
                    </div>

                    <div class="input-block">
                        <input id="last_name" type="text" name="last_name" placeholder=" " required>
                        <label for="last_name">Last Name</label>
                        <small id="lastNameFrontErr"></small>
                        <?php if($lastNameErr) echo '<div class="error-wrap">'.$lastNameErr.'</div>'; ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-block">
                        <input id="username" type="text" name="username" placeholder=" " required>
                        <label for="username">Username</label>
                        <small id="usernameFrontErr"></small>
                        <?php if($usernameErr) echo '<div class="error-wrap">'.$usernameErr.'</div>'; ?>
                    </div>

                    <div class="input-block">
                        <input id="email" type="email" name="email" placeholder=" " required>
                        <label for="email">Email</label>
                        <small id="emailFrontErr"></small>
                        <?php if($emailErr) echo '<div class="error-wrap">'.$emailErr.'</div>'; ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-block">
                        <input id="phone" type="text" name="phone" placeholder=" " required>
                        <label for="phone">Phone</label>
                        <small id="phoneFrontErr"></small>
                        <?php if($phoneErr) echo '<div class="error-wrap">'.$phoneErr.'</div>'; ?>
                    </div>

                    <div class="input-block">
                        <input id="age" type="number" name="age" placeholder=" " required>
                        <label for="age">Age</label>
                        <small id="ageFrontErr"></small>
                        <?php if($ageErr) echo '<div class="error-wrap">'.$ageErr.'</div>'; ?>
                    </div>
                </div>

                <div class="form-row">
                    <div class="input-block">
                        <input id="password" type="password" name="password" placeholder=" " required>
                        <label for="password">Password</label>
                        <small id="passwordFrontErr"></small>
                        <?php if($passwordErr) echo '<div class="error-wrap">'.$passwordErr.'</div>'; ?>
                    </div>

                    <div class="input-block">
                        <input id="confirm_password" type="password" name="confirm_password" placeholder=" " required>
                        <label for="confirm_password">Confirm Password</label>
                        <small id="confirmFrontErr"></small>
                        <?php if($confirmErr) echo '<div class="error-wrap">'.$confirmErr.'</div>'; ?>
                    </div>
                </div>

                <p class="legal-copy">
                    By signing up you agree to our
                    <a href="terms.html">Terms & Conditions</a>
                    and
                    <a href="privacy.html">Privacy Policy</a>.
                </p>

                <button class="signup-btn" type="submit">Create Account</button>

                <p class="switch-form">
                    Already have an account? <a href="login.php">Login</a>
                </p>
            </form>
        </section>
    </section>
</main>

<script src="/EchoFest/assets/js/home.js"></script>
<script src="/EchoFest/assets/js/signup.js"></script>
</body>
</html>
