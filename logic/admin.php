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
$current_admin = $_SESSION['username'] ?? 'SuperAdmin';
$totalArtists = count($lineup);
$totalEvents  = count($events);
$totalUsers   = count($users);

$stages = [];
foreach ($lineup as $a) {
    if (!empty($a['stage'])) $stages[] = $a['stage'];
}


$uniqueStages = count(array_unique($stages));
$revenue = $totalTicketsSold * 50;

if (isset($_GET['download_report']) || isset($_POST['export_report'])) {
    header('Content-Type: text/csv; charset=utf-8');
    header('Content-Disposition: attachment; filename="echofest_report_' . date('Y-m-d_H-i-s') . '.csv"');
    header('Pragma: no-cache');
    header('Expires: 0');

    $output = fopen('php://output', 'w');
    fprintf($output, chr(0xEF).chr(0xBB).chr(0xBF));


    fputcsv($output, ['ECHOFEST FESTIVAL - REAL DATA REPORT']);
    fputcsv($output, ['Generated: ' . date('Y-m-d H:i:s')]);
    fputcsv($output, ['Admin: ' . $current_admin]);
    fputcsv($output, []);


    fputcsv($output, ['=== REAL STATISTICS ===']);
    fputcsv($output, ['Metric', 'Value']);
    fputcsv($output, ['Real Tickets Sold', $totalTicketsSold]);
    fputcsv($output, ['Real Available Seats', $available]);
    fputcsv($output, ['Real Revenue (€)', '€' . number_format($revenue, 2)]);
    fputcsv($output, ['Real Online Users', $online]);
    fputcsv($output, ['Real Offline Users', $offline]);
    fputcsv($output, ['Real Total Users', $totalUsers]);
    fputcsv($output, ['Real Artists', $totalArtists]);
    fputcsv($output, ['Real Events', $totalEvents]);
    fputcsv($output, ['Real Unique Stages', $uniqueStages]);
    fputcsv($output, []);


    fputcsv($output, ['=== REAL LINEUP DATA ===']);
    fputcsv($output, ['Artist', 'Stage', 'Day', 'Time', 'Genre']);
    foreach ($lineup as $artist) {
        fputcsv($output, [
            $artist['artist'] ?? 'N/A',
            $artist['stage'] ?? 'N/A',
            $artist['day'] ?? 'N/A',
            $artist['time'] ?? 'TBD',
            $artist['genre'] ?? 'Various'
        ]);
    }
    fputcsv($output, []);

 fputcsv($output, ['=== REAL EVENTS ===']);
    fputcsv($output, ['Title', 'Location', 'Date', 'Time']);
    foreach ($events as $event) {
        fputcsv($output, [
            $event['title'] ?? 'N/A',
            $event['location'] ?? 'N/A',
            $event['date'] ?? 'N/A',
            $event['time'] ?? 'TBD'
        ]);
    }
    fputcsv($output, []);


    fputcsv($output, ['=== REAL USERS ===']);
    fputcsv($output, ['Username', 'Status', 'Email', 'Role']);
    foreach ($users as $user) {
        fputcsv($output, [
            $user['username'] ?? 'N/A',
            $user['status'] ?? 'offline',
            $user['email'] ?? 'N/A',
            $user['role'] ?? 'user'
        ]);
    }
    fputcsv($output, []);


    fputcsv($output, ['END OF REAL DATA REPORT']);
    fclose($output);
    exit;
}


