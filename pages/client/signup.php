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
<title>Sign Up</title>

<link rel="icon" type="image/x-icon" href="/EchoFest/assets/images/logo2-pabg.png">
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="/EchoFest/assets/css/signupp.css">

<style>
body {
    background: #111 url('/EchoFest/assets/images/bg.png') center/cover no-repeat;
    overflow-y: scroll;
}
</style>
</head>

<body>

<div class="login-container">
<div class="future-card">

<!-- HEADER (SAME AS LOGIN) -->
<div class="chrome-header">

    <div class="retro-logo mt-1">
        <div class="logo-chrome">
            <img src="/EchoFest/assets/images/logo2-pabg.png" width="150" height="200" alt="Logo">
        </div>
    </div>

    <h1 class="y2k-title">
        <span class="title-chrome">ECHO</span>
        <span class="title-neon">FEST</span>
    </h1>

    <p class="login-subtitle">Sign up</p>

</div>

<!-- FORM -->
<form class="future-form" method="POST" action="/EchoFest/actions/signup_logic.php">

<div class="form-row">

<div class="retro-field">
<div class="field-chrome">
<input id="first_name" type="text" name="first_name" placeholder=" " required>
<label>First Name</label>
</div>
<small id="firstNameFrontErr" class="text-danger small px-2"></small>
<?php if($firstNameErr) echo '<div class="error-wrap text-danger small px-2">'.$firstNameErr.'</div>'; ?>
</div>

<div class="retro-field">
<div class="field-chrome">
<input id="last_name" type="text" name="last_name" placeholder=" " required>
<label>Last Name</label>
</div>
<small id="lastNameFrontErr" class="text-danger small px-2"></small>
<?php if($lastNameErr) echo '<div class="error-wrap text-danger small px-2">'.$lastNameErr.'</div>'; ?>
</div>

</div>


<!-- USERNAME + EMAIL -->
<div class="form-row">

<div class="retro-field">
<div class="field-chrome">
<input id="username" type="text" name="username" placeholder=" " required>
<label>Username</label>
</div>
<small id="usernameFrontErr" class="text-danger small px-2"></small>
<?php if($usernameErr) echo '<div class="error-wrap text-danger small px-2">'.$usernameErr.'</div>'; ?>
</div>

<div class="retro-field">
<div class="field-chrome">
<input id="email" type="email" name="email" placeholder=" " required>
<label>Email</label>
</div>
<small id="emailFrontErr" class="text-danger small px-2"></small>
<?php if($emailErr) echo '<div class="error-wrap text-danger small px-2">'.$emailErr.'</div>'; ?>
</div>

</div>

<div class="form-row">

<div class="retro-field">
<div class="field-chrome">
<input id="phone" type="text" name="phone" placeholder=" " required>
<label>Phone</label>
</div>
<small id="phoneFrontErr" class="text-danger small px-2"></small>
<?php if($phoneErr) echo '<div class="error-wrap text-danger small px-2">'.$phoneErr.'</div>'; ?>
</div>

<div class="retro-field">
<div class="field-chrome">
<input id="age" type="number" name="age" placeholder=" " required>
<label>Age</label>
</div>
<small id="ageFrontErr" class="text-danger small px-2"></small>
<?php if($ageErr) echo '<div class="error-wrap text-danger small px-2">'.$ageErr.'</div>'; ?>
</div>

</div>

<div class="form-row">

<div class="retro-field">
<div class="field-chrome">
<input id="password" type="password" name="password" placeholder=" " required>
<label>Password</label>
</div>
<small id="passwordFrontErr" class="text-danger small px-2"></small>
<?php if($passwordErr) echo '<div class="error-wrap text-danger small px-2">'.$passwordErr.'</div>'; ?>
</div>

<div class="retro-field">
<div class="field-chrome">
<input id="confirm_password" type="password" name="confirm_password" placeholder=" " required>
<label>Confirm Password</label>
</div>
<small id="confirmFrontErr" class="text-danger small px-2"></small>
<?php if($confirmErr) echo '<div class="error-wrap text-danger small px-2">'.$confirmErr.'</div>'; ?>
</div>

</div>

<!-- TERMS -->
<p class="legal-links">
By signing up you agree to our 
<a href="terms.html">Terms & Conditions</a> and 
<a href="privacy.html">Privacy Policy</a>
</p>

<!-- BUTTON -->
<button class="login-btn">
Create Account
</button>


<!-- LOGIN -->
<p class="switch-form">
Already have an account? <a href="login.php" class="future-link">Login</a>
</p>

</form>

</div>
</div>

<script src="/EchoFest/assets/js/signup.js"></script>
</body>
</html>
