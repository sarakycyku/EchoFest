<?php
include '../includes/header.php';

$locations = [
    'xk' => ['country' => 'Kosovo', 'city' => 'Pristina', 'dates' => 'July 15-17, 2026', 'venue' => 'Pristina National Stadium, Pristina 10000'],
    'al' => ['country' => 'Albania', 'city' => 'Durres', 'dates' => 'August 5-7, 2026', 'venue' => 'Arena Kombetare, Durres, Albania']
];

//lexon lokacionin nga GET, default xk
$selected = isset($_GET['loc']) && array_key_exists($_GET['loc'], $locations) ? $_GET['loc'] : 'xk';
$event = $locations[$selected];

$tickets = json_decode(file_get_contents('../data/tickets.json'), true);
?>

<link rel="stylesheet" href="../assets/css/tickets.css?v=1.2">

<!--HERO -->
<section class="hero">
    <div class="hero-container">
        <div class="hero-info">
            <div class="info-block">
                <span class="info-label">Festival Dates</span>
                <span class="info-value">
                    <?= $event['dates'] ?>
                </span>
            </div>
            <div class="info-block">
                <span class="info-label">Location</span>
                <span class="info-value">
                    <?= $event['venue'] ?>
                </span>
            </div>
        </div>
    </div>
</section>

<!--LOCATION -->
<div class="location-wrap">
    <div class="location-box animate">
        <div class="location-label">Select Event Location:</div>
        <div class="location-cards">
            <?php foreach ($locations as $key => $loc): ?>
                <a href="?loc=<?= $key ?>" style="text-decoration:none;">
                    <div class="loc-card <?= $selected === $key ? 'active' : '' ?>">
                        <div class="loc-country"><?= $loc['country'] ?></div>
                        <div class="loc-city"><?= $loc['city'] ?></div>
                        <div class="loc-dates"><?= $loc['dates'] ?></div>
                    </div>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</div>

<!--TICKETS -->
<section class="tickets-section">
    <h2 class="section-title"><span class='highlight'>Choose Your Ticket</span></h2>

    <div class="ticket-list">
        <?php foreach ($tickets as $t): ?>
            <div class="ticket-card <?= !$t['available'] ? 'disabled' : '' ?> animate">

                <div class="ticket-img">
                    <img src="<?= $t['img_src'] ?>" class="<?= $t['img_class'] ?>">
                </div>

                <div class="ticket-body">
                    <div>
                        <div class="ticket-top">
                            <div>
                                <div class="ticket-name"><?= $t['name'] ?></div>
                                <?php if ($t['coming_date']): ?>
                                    <div class="coming-badge"> <?= $t['coming_date'] ?></div>
                                <?php endif; ?>
                            </div>
                        </div>
                        <p class="ticket-desc"><?= $t['desc'] ?></p>
                    </div>

                    <div class="ticket-footer">
                        <div class="ticket-price-block">
                            <div class="price-label">Price per ticket</div>
                            <div class="price-amount">€<?= $t['price'] ?></div>
                        </div>

                        <div class="ticket-actions">
                            <?php if ($t['available']): ?>
                                <div class="qty-control" id="qty-<?= $t['id'] ?>">
                                    <button class="qty-btn" onclick="changeQty('<?= $t['id'] ?>', -1)">-</button>
                                    <span class="qty-num" id="num-<?= $t['id'] ?>">1</span>
                                    <button class="qty-btn" onclick="changeQty('<?= $t['id'] ?>', 1)">+</button>
                                </div>
                                <button class="buy-btn" onclick="buyNow('<?= $t['id'] ?>', <?= $t['price'] ?>, '<?= $selected ?>')">
                                    Buy Ticket
                                </button>
                            <?php else: ?>
                                <button class="coming-btn" disabled>Coming Soon</button>
                            <?php endif; ?>
                        </div>
                    </div>
                </div>

            </div>
        <?php endforeach; ?>
    </div>
</section>

<script src="../assets/js/tickets.js"></script>

<?php include '../includes/footer.php'; ?>