<?php
include '../includes/header.php';

$jsonFile = '../data/events.json';

if (!file_exists($jsonFile)) {
    file_put_contents($jsonFile, json_encode([]));
}

$events = json_decode(file_get_contents($jsonFile), true);

if (!is_array($events)) {
    $events = [];
}

if ($_SERVER["REQUEST_METHOD"] === "POST") {
    $id = $_POST["id"] ?? "";

    $eventData = [
        "id" => $id !== "" ? $id : uniqid(),
        "title" => $_POST["title"],
        "artist" => $_POST["artist"],
        "date" => $_POST["date"],
        "time" => $_POST["time"],
        "location" => $_POST["location"],
        "stage" => $_POST["stage"],
        "category" => $_POST["category"],
        "description" => $_POST["description"],
        "image" => $_POST["image"]
    ];

    if ($id !== "") {
        foreach ($events as $index => $event) {
            if ($event["id"] === $id) {
                $events[$index] = $eventData;
                break;
            }
        }
    } else {
        $events[] = $eventData;
    }

    file_put_contents($jsonFile, json_encode($events, JSON_PRETTY_PRINT));

    header("Location: admin_events.php");
    exit;
}

if (isset($_GET["delete"])) {
    $deleteId = $_GET["delete"];

    $events = array_filter($events, function ($event) use ($deleteId) {
        return $event["id"] !== $deleteId;
    });

    file_put_contents($jsonFile, json_encode(array_values($events), JSON_PRETTY_PRINT));

    header("Location: admin_events.php");
    exit;
}