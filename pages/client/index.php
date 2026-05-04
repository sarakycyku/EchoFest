<?php
include '../../logic/index.php';?>

<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0" />
  <title>EchoFest 2026</title>
  <link rel="stylesheet" href="../../assets/css/style.css" />
  <link rel="stylesheet" href="../../assets/css/home.css" />
</head>
<body>

<div id="particles"></div>

<section class="hero">
    <div class="hero-eyebrow">
        <?= htmlspecialchars($festivalInfo['dates']) ?> &nbsp;&middot;&nbsp; <?= htmlspecialchars($festivalInfo['venue']) ?>
    </div>

    <h1 class="hero-title">
        <span class="outline">ECHO</span><br>
        <span class="grad">FEST</span>
    </h1>

    <p class="hero-sub">
        <?= $daysCount ?> days. <?= $stagesCount ?> stages. <?= $artistsCount ?> artists across electronic,
        ambient, pop, and club music.
    </p>

    <div class="hero-cta">
        <?php if ($loggedIn): ?>
            <a href="tickets.php" class="btn-main">Buy Tickets</a>
            <a href="lineup.php" class="btn-ghost">View Lineup</a>
        <?php else: ?>
            <a href="signup.php" class="btn-main">Get Your Pass</a>
            <a href="lineup.php" class="btn-ghost">View Lineup</a>
        <?php endif; ?>
    </div>

    <div class="hero-meta">
        <span><?= $daysCount ?> Days</span>
        <span class="bar"></span>
        <span><?= $stagesCount ?> Stages</span>
        <span class="bar"></span>
        <span><?= $artistsCount ?> Artists</span>
        <span class="bar"></span>
        <span><?= htmlspecialchars($festivalInfo['location']) ?></span>
    </div>
</section>

<div class="ticker">
    <div class="ticker-track">
        <?php foreach ($tickerArtists as $event): ?>
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
            <div class="summary-value"><?= $daysCount ?></div>
            <div class="summary-label">Festival Days</div>
        </div>
        <div class="summary-stat">
            <div class="summary-value"><?= $stagesCount ?></div>
            <div class="summary-label">Live Stages</div>
        </div>
        <div class="summary-stat">
            <div class="summary-value"><?= $artistsCount ?></div>
            <div class="summary-label">Featured Artists</div>
        </div>
        <div class="summary-stat">
            <div class="summary-value"><?= $loggedIn ? 'Member' : 'Open' ?></div>
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
        <?php foreach ($summaryCards as $card): ?>
            <article class="glass-card">
                <p class="card-kicker"><?= htmlspecialchars($card['kicker']) ?></p>
                <h3 class="card-title"><?= htmlspecialchars($card['title']) ?></h3>
                <p class="card-copy"><?= htmlspecialchars($card['copy']) ?></p>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<section class="content-section two-col-section">
    <div class="section-block">
        <p class="section-eyebrow">Festival Structure</p>
        <h2 class="section-title">Built to give visitors the full <span class="grad">picture</span></h2>
        <p class="section-copy">
            This homepage works like a summary page. It introduces the scale of the festival,
            previews the lineup, surfaces the event structure, and points visitors to the most
            important parts of the website.
        </p>

        <div class="chip-row">
            <?php foreach ($stages as $stage): ?>
                <span class="info-chip"><?= htmlspecialchars($stage) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="detail-panel">
        <div class="detail-row">
            <span class="detail-label">Dates</span>
            <span class="detail-value"><?= htmlspecialchars($festivalInfo['dates']) ?></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Location</span>
            <span class="detail-value"><?= htmlspecialchars($festivalInfo['location']) ?></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Audience</span>
            <span class="detail-value"><?= htmlspecialchars($festivalInfo['audience']) ?></span>
        </div>
        <div class="detail-row">
            <span class="detail-label">Focus</span>
            <span class="detail-value"><?= htmlspecialchars($festivalInfo['focus']) ?></span>
        </div>
    </div>
</section>

<section class="content-section">
    <div class="section-heading split-heading">
        <div>
            <p class="section-eyebrow">Plan The Weekend</p>
            <h2 class="section-title">Schedule <span class="grad">pulse</span></h2>
        </div>
    </div>

    <div class="schedule-grid">
        <?php foreach ($eventsByDay as $day => $dayEvents): ?>
            <article class="schedule-card">
                <div class="schedule-top">
                    <p class="card-kicker"><?= htmlspecialchars($day) ?></p>
                    <span class="schedule-count"><?= count($dayEvents) ?> artists</span>
                </div>

                <div class="schedule-list">
                    <?php foreach (array_slice($dayEvents, 0, 2) as $event): ?>
                        <div class="schedule-item">
                            <span class="schedule-artist"><?= htmlspecialchars($event['artist']) ?></span>
                            <span class="schedule-stage"><?= htmlspecialchars($event['stage']) ?></span>
                        </div>
                    <?php endforeach; ?>
                </div>
            </article>
        <?php endforeach; ?>
    </div>
</section>

<div class="lineup-preview">
    <p class="section-eyebrow">Who's Playing</p>
    <h2 class="section-title">The <span class="grad">Lineup</span></h2>

    <div class="artists-grid">
        <?php foreach ($featuredArtists as $index => $artist): ?>
            <div class="artist-card" style="animation: fadeUp 0.5s <?= $index * 0.07 ?>s ease both;">
                <img src="<?= htmlspecialchars($artist['image']) ?>" alt="<?= htmlspecialchars($artist['artist']) ?>">
                <div class="artist-name"><?= htmlspecialchars($artist['artist']) ?></div>
                <div class="artist-tag">
                    <?= htmlspecialchars($artist['stage']) ?> &nbsp;&middot;&nbsp; <?= htmlspecialchars($artist['day']) ?>
                </div>
            </div>
        <?php endforeach; ?>
    </div>

    <a href="lineup.php" class="lineup-link">Full Lineup &rarr;</a>
</div>

<footer class="home-footer">
    <div class="footer-brand">ECHO<span>FEST</span></div>
    <span class="footer-copy">
        <?= htmlspecialchars($festivalInfo['dates']) ?> / <?= $stagesCount ?> Stages / <?= $artistsCount ?> Artists
    </span>
</footer>

<script src="../../assets/js/home.js"></script>

<?php require_once '../../includes/footer.php'; ?>

</body>
</html>