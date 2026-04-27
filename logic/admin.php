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
    return json_decode(file_get_contents($file), true) ?? [];
}
$lineup = loadJSON($LINEUP_FILE);
$events = loadJSON($EVENTS_FILE);
$users  = loadJSON($USERS_FILE);


$totalTicketsSold = file_exists($ORDERS_FILE)
    ? count(file($ORDERS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES))
    : 0;

$capacity = 5000;
$available = max(0, $capacity - $totalTicketsSold);