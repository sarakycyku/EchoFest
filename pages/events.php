<?php
include '../includes/header.php';

require_once '../classes/Event.php';

$locations = [
    "xk" => ["country" => "Kosovo", "city" => "Pristina", "dates" => "July 15-17, 2026", "venue" => "Pristina National Stadium"],
    "al" => ["country" => "Albania", "city" => "Durrës", "dates" => "August 5-7, 2026", "venue" => "Arena Kombëtare, Durrës"]
];

$selectedLocation = $_GET['location'] ?? "xk";
$search = trim($_GET['search'] ?? "");
$category = $_GET['category'] ?? "all";
$sort = $_GET['sort'] ?? "date";

if (!array_key_exists($selectedLocation, $locations)) {
    $selectedLocation = "xk";
}

$error = "";

if ($search !== "" && !preg_match("/^[a-zA-Z0-9\s\-&,.']*$/", $search)) {
    $error = "Invalid characters in search.";
    $search = "";
}

?>

<title>Events</title>
<link rel="stylesheet" href="/EchoFest/assets/css/events.css">

<?php include '../includes/footer.php'; ?>