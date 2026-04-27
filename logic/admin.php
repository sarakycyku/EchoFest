<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

$DATA_DIR = __DIR__ . '/../data/';
$LINEUP_FILE = $DATA_DIR . 'lineup_data.json';
$EVENTS_FILE = $DATA_DIR . 'events_data.json';
$USERS_FILE  = $DATA_DIR . 'users.json';
$ORDERS_FILE = $DATA_DIR . 'orders.txt';


function loadJSON($file) {
    if (!file_exists($file)) return [];
    return json_decode(file_get_contents($file), true) ?? [];
}


$lineup = loadJSON($LINEUP_FILE);
$events = loadJSON($EVENTS_FILE);
$users  = loadJSON($USERS_FILE);


$totalTicketsSold = 0;
if (file_exists($ORDERS_FILE)) {
    $orders = file($ORDERS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $totalTicketsSold = count($orders);
}

$capacity = 5000;
$available = max(0, $capacity - $totalTicketsSold);


$online = 0;
$offline = 0;
foreach ($users as $u) {
    (($u['status'] ?? '') === 'online') ? $online++ : $offline++;
}