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

// --- LLOGARITJA E STATISTIKAVE NGA ORDERS.TXT ---
$totalTicketsSold = 0;
if (file_exists($ORDERS_FILE)) {
    // Numëron çdo rresht si një biletë të shitur
    $orders = file($ORDERS_FILE, FILE_IGNORE_NEW_LINES | FILE_SKIP_EMPTY_LINES);
    $totalTicketsSold = count($orders);
}
$festivalCapacity = 5000; // Kapaciteti total
$availableTickets = $festivalCapacity - $totalTicketsSold;
if ($availableTickets < 0) $availableTickets = 0;

// --- HANDLE ADD ARTIST ---
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_artist'])) {
    $newArtist = [
        "artist" => trim($_POST['artist']),
        "stage"  => trim($_POST['stage']),
        "day"    => $_POST['day'],
        "image"  => !empty($_POST['image']) ? trim($_POST['image']) : "../assets/images/default.png",
        "hits"   => array_filter(array_map('trim', explode(',', $_POST['hits'])))
    ];
    $lineup[] = $newArtist;
    saveJSON($LINEUP_FILE, $lineup);
    header("Location: admin.php?view=lineup");
    exit();
}

?>