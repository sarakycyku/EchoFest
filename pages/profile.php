<?php
// Keto te dhena i kam marre si shembull 
$user = [
  "name" => "Artan Krasniqi",
  "username" => "@artank",
  "email" => "ar***@gmail.com",
  "phone" => "+383 *** *** 21",
  "age" => 24,
  "member_since" => "April 2026",
  "initials" => "AK"
];

$stats = [
  "days" => 4,
  "tickets" => 2,
  "artists" => 8
];

$tickets = [
  [
    "type" => "VIP Weekend Pass",
    "meta" => "July 18–21 · Open Air Arena",
    "ref" => "ECH-4821-VIP",
    "class" => "vip"
  ],
  [
    "type" => "General Admission",
    "meta" => "July 18–21 · Open Air Arena",
    "ref" => "ECH-3302-GA",
    "class" => "ga"
  ]
];

$artists = ["Four Tet","Burial","Floating Points","Bonobo","Actress","Objekt","Loraine James","Call Super"];
?>




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


    <div class="pf-card">
    <div class="pf-section-label">My Tickets</div>

    <?php foreach($tickets as $t): ?>
      <div class="pf-ticket pf-ticket-<?= $t["class"] ?>">
        <div>
          <div class="pf-ticket-name"><?= $t["type"] ?></div>
          <div class="pf-ticket-meta"><?= $t["meta"] ?></div>
        </div>
        <div class="pf-ticket-ref pf-ticket-ref-<?= $t["class"] ?>">
          <?= $t["ref"] ?>
        </div>
      </div>
    <?php endforeach; ?>

  </div>


  <div class="pf-card">
    <div class="pf-section-label">Account Details</div>

    <div class="pf-row"><span class="pf-row-lbl">Full name</span><span class="pf-row-val"><?= $user["name"] ?></span></div>
    <div class="pf-row"><span class="pf-row-lbl">Username</span><span class="pf-row-val"><?= $user["username"] ?></span></div>
    <div class="pf-row"><span class="pf-row-lbl">Email</span><span class="pf-row-val dim"><?= $user["email"] ?></span></div>
    <div class="pf-row"><span class="pf-row-lbl">Phone</span><span class="pf-row-val dim"><?= $user["phone"] ?></span></div>
    <div class="pf-row"><span class="pf-row-lbl">Age</span><span class="pf-row-val"><?= $user["age"] ?></span></div>
    <div class="pf-row"><span class="pf-row-lbl">Member since</span><span class="pf-row-val dim"><?= $user["member_since"] ?></span></div>
  </div>


  <div class="pf-card">
   <div class="pf-section-label">Favourite Artists</div>
    <div class="pf-artists">
      <?php foreach($artists as $a): ?>
        <span class="pf-pill"><?= $a ?></span>
      <?php endforeach; ?>
    </div>
  </div>

</div>
</body>
</html>