
<!DOCTYPE html>

<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Edit Profile</title>
  <link rel="stylesheet" href="../assets/css/profile.css">
</head>
<body>
<div class="pf-root">

  <div class="pf-hero-wrap a1">
    <div class="pf-toprow">
      <div class="pf-brand">ECHO<span>FEST</span></div>
      <div class="pf-edition">Edit Profile</div>
    </div>
  </div>

   <form method="POST" action="../logic/edit_logic.php">
  <div class="pf-card a2">
    <div class="pf-section-label">Account Details</div>
   

      <div class="pf-row">
        <span class="pf-row-lbl">First Name</span>
        <input type="text" name="first_name" value="<?= $data['first_name'] ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>

      <div class="pf-row">
        <span class="pf-row-lbl">Last Name</span>
        <input type="text" name="last_name" value="<?= $data['last_name'] ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>

      <div class="pf-row">
        <span class="pf-row-lbl">Email</span>
        <input type="text" name="email" value="<?= $data['email'] ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>

      <div class="pf-row">
        <span class="pf-row-lbl">Phone</span>
        <input type="text" name="phone" value="<?= $data['phone'] ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>

      <div class="pf-row">
        <span class="pf-row-lbl">City</span>
        <input type="text" name="city" value="<?= $data['city'] ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>

      <div class="pf-row">
        <span class="pf-row-lbl">Age</span>
        <input type="text" name="age" value="<?= $data['age'] ?>" style="background:transparent;border:none;border-bottom:0.5px solid rgba(255,255,255,0.15);color:#f0eee8;font-size:13px;text-align:right;outline:none;">
      </div>

    </div>
 

  <div class="pf-actions a3">
    <button type="submit" class="pf-btn pf-btn-edit">Save Changes</button>
    <button type="button" class="pf-btn pf-btn-out" onclick="window.location='../pages/profile.php'">Cancel</button>
  </div>

    </form>
</div>
</body>
</html>