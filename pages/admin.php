<?php require '../logic/admin.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EchoFest Admin Panel</title>

<link rel="stylesheet" href="../assets/css/admin.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>


<?php require '../includes/admin_header.php'; ?>
<div class="header">
    <div>
        <h1>Dashboard <span class="neon">Overview</span></h1>
        <p style="font-size:12px;color:#9ca3af;margin-top:4px;">
            Real-time analytics & system performance
        </p>
    </div>
<div>
        Admin: <?= htmlspecialchars($current_admin) ?>
        <a class="btn" id="export" href="?download_report=1">Export CSV</a>
    </div>
</div>
<div class="stats-grid">

    <div class="stat-box"><h4>Artists</h4><div class="num"><?= $totalArtists ?></div></div>
    <div class="stat-box"><h4>Events</h4><div class="num"><?= $totalEvents ?></div></div>
    <div class="stat-box"><h4>Users</h4><div class="num"><?= $totalUsers ?></div></div>
    <div class="stat-box"><h4>Stages</h4><div class="num"><?= $uniqueStages ?></div></div>
    <div class="stat-box"><h4>Engagement</h4><div class="num"><?= $engagementScore ?></div></div>

</div>
