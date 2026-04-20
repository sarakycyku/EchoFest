<?php
include '../includes/header.php';

$locations = [
    'xk' => [
        'flag'=>'XK',
        'country'=>'Kosovo',
        'city'=>'Pristina',
        'dates'=>'July 15-17, 2026',
        'venue'=>'Pristina National Stadium, Rr. Agim Ramadani, Pristina 10000'
    ],
    'al' => [
        'flag'=>'AL',
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

<?php
include '../includes/footer.php';
?>