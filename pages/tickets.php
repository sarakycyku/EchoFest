<?php
include '../includes/header.php';

$locations = [
    'xk' => [
        'country'=>'Kosovo',
        'city'=>'Pristina',
        'dates'=>'July 15-17, 2026',
        'venue'=>'Pristina National Stadium, Rr. Agim Ramadani, Pristina 10000'
    ],
    'al' => [
        'country'=>'Albania',
        'city'=>'Durrës',
        'dates'=>'August 5-7, 2026',
        'venue'=>'Arena Kombëtare, Durrës, Albania'
    ],
];

//lexon lokacionin nga GET, default xk
$selected = isset($_GET['loc']) && array_key_exists($_GET['loc'], $locations) ? $_GET['loc'] :'xk'; 
$event = $locations[$selected];

?>

<title>Tickets</title>    
<link rel="stylesheet" href="../assets/css/style.css">
<link rel="stylesheet" href="../assets/css/tickets.css">

<section class="hero">

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

<div class="location-wrap">
  <div class="location-box">
    <div class="location-label">Select Event Location:</div>
    <div class="location-cards">
      <?php foreach($locations as $key=>$loc): ?>
        <a href="?loc=<?= $key ?>" style="text-decoration:none;">
          <div class="loc-card <?= $selected === $key ? 'active' : '' ?>">
            <div class="loc-country"><?= $loc['country'] ?></div>
            <div class="loc-city"><?= $loc['city'] ?></div>
            <div class="loc-dates"><?= $loc['dates']?></div>
          </div>
        </a>
      <?php endforeach; ?>
    </div>
  </div>
</div>

<?php
include '../includes/footer.php';
?>