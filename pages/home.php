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
            Four days. Four stages. <?= count($events) ?>+ artists across electronic,
            ambient, and club music.
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

    </section>
</body>
</html>