<?php
session_start();


$DATA_DIR = __DIR__ . '/../data/';
$LINEUP_FILE = $DATA_DIR . 'lineup_data.json';
$EVENTS_FILE = $DATA_DIR . 'events_data.json';
$USERS_FILE  = $DATA_DIR . 'users.json';
$ORDERS_FILE = $DATA_DIR . 'orders.txt';
$TICKETS_FILE = $DATA_DIR . 'tickets.json';


function loadJSON($file) {
    if (!file_exists($file)) return [];
    return json_decode($current_admin = $_SESSION['username'] ?? 'SuperAdmin';
file_get_contents($file), true) ?? [];
}
$lineup = loadJSON($LINEUP_FILE);
$events = loadJSON($EVENTS_FILE);
$users  = loadJSON($USERS_FILE);


$totalTicketsSold = file_exists($ORDERS_FILE)
    ? count(file($ORDERS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES))
    : 0;

$capacity = 5000;
$available = max(0, $capacity - $totalTicketsSold);
$online = 0;
$offline = 0;

foreach ($users as $u) {
    (($u['status'] ?? '') === 'online') ? $online++ : $offline++;
}

$current_admin = $_SESSION['username'] ?? 'SuperAdmin';
$totalArtists = count($lineup);
$totalEvents  = count($events);
$totalUsers   = count($users);

$stages = [];
foreach ($lineup as $a) {
    if (!empty($a['stage'])) $stages[] = $a['stage'];
}
$uniqueStages = count(array_unique($stages));

$engagementScore = ($totalTicketsSold * 2) + ($online * 5);
if (isset($_GET['download_report'])) {

    header('Content-Type: text/csv');
    header('Content-Disposition: attachment; filename="echofest_report.csv"');

    $out = fopen("php://output", "w");

    fputcsv($out, ['TYPE','NAME','DETAIL','INFO']);

    foreach ($lineup as $a) {
        fputcsv($out, ['Artist',$a['artist'] ?? '',$a['stage'] ?? '',$a['day'] ?? '']);
    }

    foreach ($events as $e) {
        fputcsv($out, ['Event',$e['title'] ?? '',$e['location'] ?? '',$e['date'] ?? '']);
    }

    fputcsv($out, ['STAT','Tickets Sold',$totalTicketsSold,'']);
    fputcsv($out, ['STAT','Revenue',$totalTicketsSold * 50,'']);
    fputcsv($out, ['STAT','Users',$totalUsers,'']);

    fclose($out);
    exit;
}
?>