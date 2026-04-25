<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once '../data/events.php';
require_once '../includes/header.php';

$logged_in = isset($_SESSION['username']);

// featured artists for the grid
$featured = array_slice($events, 0, 4);

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

    <div class="hero-eyebrow">July 18-21, 2026 &nbsp;&middot;&nbsp; Open Air Arena</div>

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
            <span><?= $days_count ?> Days</span>
            <span class="bar"></span>
            <span><?= $stages_count ?> Stages</span>
            <span class="bar"></span>
            <span><?= $artists_count ?>+ Artists</span>
            <span class="bar"></span>
            <span>Pristina, Kosovo</span>
        </div>


    </section>

    <div class="ticker">
        <div class="ticker-track">
            <?php foreach ($ticker as $event): ?>
            <span class="ticker-item">
            <span class="spark"></span>
            <?= htmlspecialchars($event['artist']) ?>
            </span>
            <?php endforeach; ?>
        </div>
    </div>

    <section class="summary-shell">
        <div class="summary-panel">
            <div class="summary-stat">
                <div class="summary-value"><?= $days_count ?></div>
                <div class="summary-label">Festival Days</div>
            </div>
            <div class="summary-stat">
                <div class="summary-value"><?= $stages_count ?></div>
                <div class="summary-label">Live Stages</div>
            </div>
            <div class="summary-stat">
                <div class="summary-value"><?= $artists_count ?>+</div>
                <div class="summary-label">Featured Artists</div>
            </div>
            <div class="summary-stat">
                <div class="summary-value"><?= $logged_in ? 'Member' : 'Open' ?></div>
                <div class="summary-label">Access Status</div>
            </div>
        </div>
    </section>

    <section class="content-section">
        <div class="section-heading">
            <p class="section-eyebrow">Festival Snapshot</p>
            <h2 class="section-title">Why <span class="grad">EchoFest</span> matters</h2>
        </div>

        <div class="highlight-grid">
            <article class="glass-card">
                <p class="card-kicker">What It Is</p>
                <h3 class="card-title">A fast overview of EchoFest</h3>
                <p class="card-copy">EchoFest brings together headline artists, immersive stages, and a crowd experience built around music, visuals, and atmosphere.</p>
            </article>

            <article class="glass-card">
                <p class="card-kicker">Where To Start</p>
                <h3 class="card-title">Everything important in one page</h3>
                <p class="card-copy">This homepage works like a summary, helping visitors quickly understand the lineup, tickets, story, and account pages.</p>
            </article>

            <article class="glass-card">
                <p class="card-kicker">What To Expect</p>
                <h3 class="card-title">Music, planning, and identity</h3>
                <p class="card-copy">The page keeps the cinematic festival style, but it also guides users through the main parts of the website.</p>
            </article>
        </div>
    </section>


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
