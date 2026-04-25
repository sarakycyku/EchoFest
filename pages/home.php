<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../data/events.php';
require_once '../includes/header.php';

$logged_in = isset($_SESSION['username']);

// 3 featured artists for the grid
$featured = array_slice($events, 0, 3);

// doubled for seamless ticker loop
$ticker = array_merge($events, $events);

$days = [];
$stages = [];
foreach ($events as $event) {
    if (!in_array($event['day'], $days)) {
        $days[] = $event['day'];
    }

    if (!in_array($event['stage'], $stages)) {
        $stages[] = $event['stage'];
    }
}

$days_count = count($days);
$stages_count = count($stages);
$artists_count = count($events);
?>


<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EchoFest 2026</title>
  <link rel="stylesheet" href="../assets/css/style.css" />
  <link rel="stylesheet" href="../assets/css/home.css" />
</head>
<body>
    <div id="particles"></div>

    <section class="hero">

    <div class="hero-eyebrow">July 18–21, 2026 &nbsp;·&nbsp; Open Air Arena</div>

        <h1 class="hero-title">
            <span class="outline">ECHO</span><br>
            <span class="grad">FEST</span>
        </h1>

         <p class="hero-sub">
            <?= $days_count ?> days. <?= $stages_count ?> stages. <?= $artists_count ?>+ artists across electronic,
            ambient, pop, and club music.
        </p>

        <div class="hero-cta">
            <?php if ($logged_in): ?>
            <a href="tickets.php" class="btn-main">Buy Tickets</a>
            <a href="lineup.php"  class="btn-ghost">View Lineup</a>
            <?php else: ?>
            <a href="signup.php" class="btn-main">Get Your Pass</a>
            <a href="lineup.php" class="btn-ghost">View Lineup</a>
            <?php endif; ?>
        </div>

        <div class="hero-meta">
            <span>4 Days</span>
            <span class="bar"></span>
            <span>4 Stages</span>
            <span class="bar"></span>
            <span><?= count($events) ?>+ Artists</span>
            <span class="bar"></span>
            <span>Pristina, Kosovo</span>
        </div>


    </section>

    <div class="ticker">
        <div class="ticker-track">
            <?php foreach ($ticker as $e): ?>
            <span class="ticker-item">
            <span class="spark"></span>
            <?= htmlspecialchars($e['artist']) ?>
            </span>
            <?php endforeach; ?>
        </div>
    </div>


    <div class="lineup-preview">
        <p class="section-eyebrow">Who's Playing</p>
        <h2 class="section-title">The <span class="grad">Lineup</span></h2>

        <div class="artists-grid">
            <?php foreach ($featured as $i => $a): ?>
            <div class="artist-card" style="animation: fadeUp 0.5s <?= $i * 0.07 ?>s ease both;">
            <img src="<?= htmlspecialchars($a['image']) ?>"
                alt="<?= htmlspecialchars($a['artist']) ?>"
                onerror="this.style.display='none'">
            <div class="artist-name"><?= htmlspecialchars($a['artist']) ?></div>
            <div class="artist-tag">
                <?= htmlspecialchars($a['stage']) ?> &nbsp;·&nbsp; <?= htmlspecialchars($a['day']) ?>
            </div>
            </div>
            <?php endforeach; ?>
        </div>

        <a href="lineup.php" class="lineup-link">Full Lineup &nbsp;→</a>
    </div>

    <footer class="home-footer">
        <div class="footer-brand">ECHO<span>FEST</span></div>
        <span class="footer-copy">
            July 18–21, 2026 &nbsp;/&nbsp; 4 Stages &nbsp;/&nbsp; <?= count($events) ?>+ Artists
        </span>
    </footer>

    <script src="../assets/js/home.js"></script>

</body>
</html>

<?php require_once '../includes/footer.php'; ?>
