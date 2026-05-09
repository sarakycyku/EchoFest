<?php
include __DIR__ . '/../includes/header.php';

$locations = [
    'xk' => ['country' => 'Kosovo', 'city' => 'Pristina', 'dates' => 'July 15-17, 2026', 'venue' => 'Pristina National Stadium, Pristina 10000'],
    'al' => ['country' => 'Albania', 'city' => 'Durres', 'dates' => 'August 5-7, 2026', 'venue' => 'Arena Kombetare, Durres, Albania']
];

//lexon lokacionin nga GET, default xk
$selected = isset($_GET['loc']) && array_key_exists($_GET['loc'], $locations) ? $_GET['loc'] : 'xk';
$event = $locations[$selected];

$tickets = json_decode(file_get_contents(__DIR__ . '/../data/tickets.json'), true);
?>
