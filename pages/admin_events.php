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
?>

<title>Admin Events</title>

<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/EchoFest/assets/css/admin_events.css">

<section class="admin-events">
    <div class="admin-container">

        <a href="admin.php" class="btn-back">Back to Dashboard</a>

        <div class="admin-header">
            <h1>Manage Events</h1>
            <p>Add, edit and delete festival events.</p>
        </div>

        <div class="admin-grid">

            <div class="events-list">
                <h2>Event List</h2>
            </div>

            <div class="events-cards">
                    <?php if (count($events) === 0): ?>
                        <div class="no-events">No events yet. Add one using the form.</div>
                    <?php endif; ?>

                    <?php foreach ($events as $event): ?>
                        <div class="admin-event-card">
                            <h3><?= htmlspecialchars($event["title"]); ?></h3>
                            <p class="event-artist"><?= htmlspecialchars($event["artist"]); ?></p>

                            <div class="event-card-body">
                                <div><span>Date:</span> <strong><?= htmlspecialchars($event["date"]); ?></strong></div>
                                <div><span>Time:</span> <strong><?= htmlspecialchars($event["time"]); ?></strong></div>
                                <div><span>Location:</span> <strong><?= htmlspecialchars($event["location"]); ?></strong></div>
                                <div><span>Stage:</span> <strong><?= htmlspecialchars($event["stage"]); ?></strong></div>
                            </div>

                            <div class="event-card-actions">
                                <button 
                                    class="btn-edit-small"
                                    data-id="<?= htmlspecialchars($event["id"]); ?>"
                                    data-title="<?= htmlspecialchars($event["title"]); ?>"
                                    data-artist="<?= htmlspecialchars($event["artist"]); ?>"
                                    data-date="<?= htmlspecialchars($event["date"]); ?>"
                                    data-time="<?= htmlspecialchars($event["time"]); ?>"
                                    data-location="<?= htmlspecialchars($event["location"]); ?>"
                                    data-stage="<?= htmlspecialchars($event["stage"]); ?>"
                                    data-category="<?= htmlspecialchars($event["category"]); ?>"
                                    data-description="<?= htmlspecialchars($event["description"]); ?>"
                                    data-image="<?= htmlspecialchars($event["image"]); ?>"
                                >
                                    Edit
                                </button>

                                <a 
                                    href="admin_events.php?delete=<?= htmlspecialchars($event["id"]); ?>" 
                                    class="btn-delete-small"
                                    onclick="return confirm('Are you sure you want to delete this event?');"
                                >
                                    Delete
                                </a>
                            </div>
                        </div>
                    <?php endforeach; ?>
                </div>
            </div>

            <div class="event-form-container">
                <h2>Add New Event</h2>
            </div>

        </div>
    </div>
</section>

<?php include '../includes/footer.php'; ?>