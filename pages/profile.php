<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="stylesheet" href="../css/profile.css">
</head>

<body>
<div class="pf-root">
    <div class="pf-particles" id="pf-particles"></div>
    

    <div class="pf-hero-wrap">
      <div class="pf-toprow">
      <div class="pf-brand">ECHO<span>FEST</span></div>
      <div class="pf-edition">2026 Edition</div>
      </div>

      <div class="pf-avatar-wrap">
      <div class="pf-avatar-ring">
      <div class="pf-avatar"><?= $user["initials"] ?></div>

      </div>
        <div>
        <div class="pf-name"><?= $user["name"] ?></div>
        <div class="pf-username"><?= $user["username"] ?></div>

        <div class="pf-badges">
          <span class="pf-badge pf-badge-vip">VIP</span>
          <span class="pf-badge pf-badge-cyan">All 4 Days</span>
          <span class="pf-badge pf-badge-gray">Since 2026</span>
        </div>
      </div>
      
    </div>

    </div>


    <div class="pf-stats">
      <div class="pf-stat">
      <div class="pf-stat-num" id="s1">0</div>
      <div class="pf-stat-lbl">Days</div>
    </div>
    <div class="pf-stat">
      <div class="pf-stat-num" id="s2">0</div>
      <div class="pf-stat-lbl">Tickets</div>
    </div>
    <div class="pf-stat">
      <div class="pf-stat-num" id="s3">0</div>
      <div class="pf-stat-lbl">Artists</div>
    </div>
  </div>

</div>
</body>
</html>