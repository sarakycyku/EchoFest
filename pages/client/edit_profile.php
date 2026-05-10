<?php
session_start();
if (!isset($_SESSION['username'])) {
    header("Location: login.php");
    exit;
}
include __DIR__ . "/../../data/users.php";
$username = $_SESSION['username'];
$data = $users[$username];

$firstNameErr = $_SESSION['editFirstNameErr'] ?? "";
$lastNameErr  = $_SESSION['editLastNameErr'] ?? "";
$emailErr     = $_SESSION['editEmailErr'] ?? "";
$phoneErr     = $_SESSION['editPhoneErr'] ?? "";
$ageErr       = $_SESSION['editAgeErr'] ?? "";

unset(
    $_SESSION['editFirstNameErr'],
    $_SESSION['editLastNameErr'],
    $_SESSION['editEmailErr'],
    $_SESSION['editPhoneErr'],
    $_SESSION['editAgeErr']
);
?>


<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="/EchoFest/assets/css/profile.css">
</head>
<body>
<div class="pf-root">

  <div class="pf-hero-wrap a1">
    <div class="pf-toprow">
      <div class="pf-brand">ECHO<span>FEST</span></div>
      <div class="pf-edition">Edit Profile</div>
    </div>
  </div>

   <form method="POST" action="/EchoFest/actions/edit_logic.php">
  <div class="pf-card a2">
    <div class="pf-section-label">Account Details</div>
   

      <div class="pf-row">
        <span class="pf-row-lbl">First Name</span>
        <input type="text" name="first_name" value="<?= htmlspecialchars($data['first_name'], ENT_QUOTES, 'UTF-8') ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>
      <?php if($firstNameErr) echo '<div class="error-wrap">'.$firstNameErr.'</div>'; ?>

      <div class="pf-row">
        <span class="pf-row-lbl">Last Name</span>
        <input type="text" name="last_name" value="<?= htmlspecialchars($data['last_name'], ENT_QUOTES, 'UTF-8') ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>
      <?php if($lastNameErr) echo '<div class="error-wrap">'.$lastNameErr.'</div>'; ?>

      <div class="pf-row">
        <span class="pf-row-lbl">Email</span>
        <input type="text" name="email" value="<?= htmlspecialchars($data['email'], ENT_QUOTES, 'UTF-8') ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>
      <?php if($emailErr) echo '<div class="error-wrap">'.$emailErr.'</div>'; ?>

      <div class="pf-row">
        <span class="pf-row-lbl">Phone</span>
        <input type="text" name="phone" value="<?= htmlspecialchars($data['phone'], ENT_QUOTES, 'UTF-8') ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>
      <?php if($phoneErr) echo '<div class="error-wrap">'.$phoneErr.'</div>'; ?>

      

      <div class="pf-row">
        <span class="pf-row-lbl">Age</span>
        <input type="text" name="age" value="<?= htmlspecialchars($data['age'], ENT_QUOTES, 'UTF-8') ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>
      <?php if($ageErr) echo '<div class="error-wrap">'.$ageErr.'</div>'; ?>

    </div>
 

  <div class="pf-actions a3">
    <button type="submit" class="pf-btn pf-btn-edit">Save Changes</button>
    <button type="button" class="pf-btn pf-btn-out" onclick="window.location='profile.php'">Cancel</button>
  </div>

    </form>
</div>
</body>
</html>
