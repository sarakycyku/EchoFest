<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once __DIR__ . '/../data/events.php';
require_once __DIR__ . '/../includes/header.php';
require_once __DIR__ . '/../data/festival.php';
require_once __DIR__ . '/../includes/cookies.php';

$pageTitle = 'EchoFest 2026';
$extraStyles = [
    '/EchoFest/assets/css/h.css',
    '/EchoFest/assets/css/home.css',
];

require_once __DIR__ . '/../includes/header.php';

$loggedIn = isset($_SESSION['username']);
$lineup = loadLineupData();
$featuredArtists = array_slice($lineup, 0, 4);
$tickerArtists = array_merge($lineup, $lineup);

$days = [];
$stages = [];
$artists = [];
$eventsByDay = [];

foreach ($lineup as $event) {
    if (!in_array($event['day'], $days, true)) {
        $days[] = $event['day'];
    }

    if (!in_array($event['stage'], $stages, true)) {
        $stages[] = $event['stage'];
    }

    if (!in_array($event['artist'], $artists, true)) {
        $artists[] = $event['artist'];
    }

    $eventsByDay[$event['day']][] = $event;
}

/* ===================== FIXED PART ===================== */
$daysCount = count($days);
$stagesCount = count($stages);
$artistsCount = count($artists);

$summaryCards = [
    [
        'kicker' => 'What It Is',
        'title' => 'A fast overview of EchoFest',
        'copy' => 'EchoFest brings together headline artists, immersive stages, and a crowd experience built around music, visuals, and atmosphere.',
    ],
    [
        'kicker' => 'Where To Start',
        'title' => 'Everything important in one page',
        'copy' => 'This homepage works like a summary, helping visitors quickly understand the lineup, tickets, story, and account pages.',
    ],
    [
        'kicker' => 'What To Expect',
        'title' => 'Music, planning, and identity',
        'copy' => 'The page keeps the cinematic festival style, but it also guides users through the main parts of the website.',
    ],
];
?>
