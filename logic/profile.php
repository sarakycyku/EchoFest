<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: /EchoFest/pages/client/login.php");
    exit;
}


$pageTitle = 'Profile';
$extraStyles = ['/EchoFest/assets/css/profile.css'];

require_once __DIR__ . '/../data/festival.php';

require_once __DIR__ . '/../data/users.php';
require_once __DIR__ . '/../includes/header.php';

$username = $_SESSION['username'];
$data = $users[$username];

$lineup = loadLineupData();
$allArtists = [];
$festivalDays = [];
$festivalStages = [];

foreach ($lineup as $event) {
    if (!in_array($event['artist'], $allArtists, true)) {
        $allArtists[] = $event['artist'];
    }

    if (!in_array($event['day'], $festivalDays, true)) {
        $festivalDays[] = $event['day'];
    }

    if (!in_array($event['stage'], $festivalStages, true)) {
        $festivalStages[] = $event['stage'];
    }
}

$tickets = [];
$stmt = $pdo->prepare("SELECT id, ticket_name, qty, event_dates, location_code FROM orders WHERE username = :username ORDER BY id");
$stmt->execute([':username' => $username]);
$orders = $stmt->fetchAll();

foreach ($orders as $order) {
    $ticketType = $order['ticket_name'];
    $ticketQty = (int) $order['qty'];
    $ticketMeta = $order['event_dates'];
    $locationCode = $order['location_code'];

    if ($locationCode !== '' && isset($festivalLocations[$locationCode])) {
        $ticketMeta = $festivalLocations[$locationCode]['dates'] . ' / ' . $festivalLocations[$locationCode]['city'];
    }

    $ticketRef = 'ECH-' . str_pad((string) $order['id'], 4, '0', STR_PAD_LEFT);

    $tickets[] = [
        'type' => $ticketQty > 1 ? $ticketType . ' x' . $ticketQty : $ticketType,
        'meta' => $ticketMeta,
        'ref' => $ticketRef,
        'class' => stripos($ticketType, 'vip') !== false ? 'vip' : 'ga',
        'qty' => $ticketQty,
    ];
}

$ticketCount = 0;
foreach ($tickets as $ticket) {
    $ticketCount += $ticket['qty'];
}

$user = [
    'name' => $data['first_name'] . ' ' . $data['last_name'],
    'username' => '@' . $username,
    'email' => $data['email'],
    'phone' => $data['phone'],
    'age' => $data['age'],
    'member_since' => 'April 2026',
    'initials' => strtoupper(substr($data['first_name'], 0, 1) . substr($data['last_name'], 0, 1)),
];

$stats = [
    'days' => count($festivalDays),
    'tickets' => $ticketCount,
    'artists' => count($allArtists),
];

$artists = array_slice($allArtists, 0, 8);
?>
