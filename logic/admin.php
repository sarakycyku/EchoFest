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
