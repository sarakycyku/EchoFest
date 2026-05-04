<?php

if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

if (!isset($_SESSION['username'])) {
    header("Location: ../pages/login.php");
    exit;
}


$pageTitle = 'Profile';
$extraStyles = ['../assets/css/profile.css'];

require_once '../data/festival.php';

require_once '../data/users.php';
require_once '../includes/header.php';

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
$ordersFile = '../data/orders.txt';

if (file_exists($ordersFile)) {
    $lines = file($ordersFile, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);

    foreach ($lines as $lineNumber => $line) {
        if (strpos($line, 'User: ' . $username . ' |') === false) {
            continue;
        }

        $parts = explode(' | ', $line);

        if (count($parts) < 6) {
            continue;
        }

        $orderPart = str_replace('ORDER: ', '', $parts[0]);
        $orderPieces = explode(' x', $orderPart);

        if (count($orderPieces) < 2) {
            continue;
        }

        $ticketType = trim($orderPieces[0]);
        $ticketQty = (int) trim($orderPieces[1]);
        $ticketMeta = trim($parts[2]);
        $locationCode = '';

        foreach ($parts as $part) {
            if (strpos($part, 'Location: ') === 0) {
                $locationCode = trim(str_replace('Location: ', '', $part));
            }
        }

        if ($locationCode !== '' && isset($festivalLocations[$locationCode])) {
            $ticketMeta = $festivalLocations[$locationCode]['dates'] . ' / ' . $festivalLocations[$locationCode]['city'];
        }

        $ticketRef = 'ECH-' . str_pad((string) ($lineNumber + 1), 4, '0', STR_PAD_LEFT);

        $tickets[] = [
            'type' => $ticketQty > 1 ? $ticketType . ' x' . $ticketQty : $ticketType,
            'meta' => $ticketMeta,
            'ref' => $ticketRef,
            'class' => stripos($ticketType, 'vip') !== false ? 'vip' : 'ga',
            'qty' => $ticketQty,
        ];
    }
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