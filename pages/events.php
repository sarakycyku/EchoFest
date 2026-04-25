<?php
include '../includes/header.php';

require_once '../classes/Event.php';

$locations = [
    "xk" => ["country" => "Kosovo", "city" => "Pristina", "dates" => "July 15-17, 2026", "venue" => "Pristina National Stadium"],
    "al" => ["country" => "Albania", "city" => "Durrës", "dates" => "August 5-7, 2026", "venue" => "Arena Kombëtare, Durrës"]
];
?>

<title>Events</title>
<link rel="stylesheet" href="/EchoFest/assets/css/events.css">

<?php include '../includes/footer.php'; ?>