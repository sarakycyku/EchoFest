<?php
session_start();

$DATA_DIR = __DIR__ . '/../data/';
$LINEUP_FILE = $DATA_DIR . 'lineup_data.json';
$EVENTS_FILE = $DATA_DIR . 'events_data.json';
$USERS_FILE  = $DATA_DIR . 'users.json';
$ORDERS_FILE = $DATA_DIR . 'orders.txt';

// Funksioni për leximin e JSON
function loadJSON($file) {
    if (!file_exists($file)) return [];
    $content = file_get_contents($file);
    return json_decode($content, true) ?? [];
}
// Funksioni për ruajtjen në JSON
function saveJSON($file, $data) {
    file_put_contents($file, json_encode(array_values($data), JSON_PRETTY_PRINT));
}

// Ngarkimi i të dhënave
$lineup = loadJSON($LINEUP_FILE);
$events = loadJSON($EVENTS_FILE);
$users_list = loadJSON($USERS_FILE);

?>