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

$events = [
    new Event("djsnake-ks", "Midnight Bass Takeover", "July 15, 2026", "21:00 - 23:00", "Pristina", "Main Stage", "DJ Snake brings heavy bass, lights and festival energy to the Main Stage.", "DJ Snake", "../assets/images/dj_snake.png", "electronic"),
    new Event("ritaora-ks", "Pop Lights & Neon Dreams", "July 15, 2026", "19:00 - 20:30", "Pristina", "Pop Stage", "Rita Ora performs a colorful pop show filled with neon visuals and hit songs.", "Rita Ora", "../assets/images/rita_ora.png", "pop"),
    new Event("billieeilish-ks", "Dark Echoes Experience", "July 15, 2026", "23:30 - 01:00", "Pristina", "Main Stage", "Billie Eilish creates a dark, emotional and cinematic live atmosphere.", "Billie Eilish", "../assets/images/billie_eilish.png", "pop"),
    new Event("davidguetta-ks", "Electric Pulse Night", "July 15, 2026", "23:00 - 01:30", "Pristina", "EDM Stage", "David Guetta turns the EDM Stage into a powerful electric party.", "David Guetta", "../assets/images/david_guetta.png", "electronic"),

    new Event("dualipa-ks", "Future Rhythm Show", "July 16, 2026", "22:00 - 23:30", "Pristina", "Main Stage", "Dua Lipa performs a futuristic pop show full of rhythm and movement.", "Dua Lipa", "../assets/images/dua_lipa.png", "pop"),
    new Event("theweeknd-ks", "After Midnight Vibes", "July 16, 2026", "23:45 - 01:15", "Pristina", "Main Stage", "The Weeknd brings late-night atmosphere, lights and emotional vocals.", "The Weeknd", "../assets/images/the_weeknd.png", "pop"),
    new Event("edsheeran-ks", "Strings & Stories Session", "July 16, 2026", "19:00 - 20:30", "Pristina", "Acoustic Stage", "Ed Sheeran performs an intimate acoustic session with guitar and storytelling.", "Ed Sheeran", "../assets/images/ed_sheeran.png", "acoustic"),

    new Event("martingarrix-ks", "Festival Energy Peak", "July 17, 2026", "21:00 - 23:00", "Pristina", "EDM Stage", "Martin Garrix brings the highest energy moment of the festival weekend.", "Martin Garrix", "../assets/images/martin_garrix.png", "electronic"),
    new Event("calvinharris-ks", "Summer Sound Finale", "July 17, 2026", "23:30 - 01:30", "Pristina", "EDM Stage", "Calvin Harris closes the night with summer hits and festival fireworks.", "Calvin Harris", "../assets/images/calvin_harris.png", "electronic"),
    new Event("sia-ks", "Voices of Emotion", "July 17, 2026", "19:30 - 21:00", "Pristina", "Pop Stage", "Sia delivers a powerful emotional vocal performance.", "Sia", "../assets/images/sia.png", "pop"),

    new Event("djsnake-al", "Beach Bass Explosion", "August 5, 2026", "22:00 - 00:00", "Durrës", "Beach Stage", "DJ Snake opens the beach edition with explosive bass and seaside energy.", "DJ Snake", "../assets/images/dj_snake.png", "electronic"),
    new Event("ritaora-al", "Homecoming Pop Night", "August 5, 2026", "20:00 - 21:30", "Durrës", "Arena Stage", "Rita Ora performs a special pop night with Albanian pride and energy.", "Rita Ora", "../assets/images/rita_ora.png", "pop"),
    new Event("billieeilish-al", "Ocean Mood Experience", "August 5, 2026", "23:30 - 01:00", "Durrës", "Arena Stage", "Billie Eilish brings a deep, moody seaside performance.", "Billie Eilish", "../assets/images/billie_eilish.png", "pop"),
    new Event("davidguetta-al", "Midnight Beach Party", "August 5, 2026", "00:30 - 02:30", "Durrës", "Beach Stage", "David Guetta turns the beach into a midnight EDM party.", "David Guetta", "../assets/images/david_guetta.png", "electronic"),

    new Event("dualipa-al", "Neon Waves Show", "August 6, 2026", "22:00 - 23:30", "Durrës", "Arena Stage", "Dua Lipa performs a neon-inspired show near the waves.", "Dua Lipa", "../assets/images/dua_lipa.png", "pop"),
    new Event("theweeknd-al", "Night Lights Experience", "August 6, 2026", "23:45 - 01:15", "Durrës", "Arena Stage", "The Weeknd creates a night show with lights, emotion and atmosphere.", "The Weeknd", "../assets/images/the_weeknd.png", "pop"),
    new Event("edsheeran-al", "Sunset Acoustic Vibes", "August 6, 2026", "19:00 - 20:30", "Durrës", "Sunset Terrace", "Ed Sheeran performs acoustic songs during sunset by the sea.", "Ed Sheeran", "../assets/images/ed_sheeran.png", "acoustic"),

    new Event("martingarrix-al", "Final Drop Experience", "August 7, 2026", "21:00 - 23:00", "Durrës", "Beach Stage", "Martin Garrix delivers one of the final EDM drops of EchoFest Albania.", "Martin Garrix", "../assets/images/martin_garrix.png", "electronic"),
    new Event("calvinharris-al", "Ultimate Beach Finale", "August 7, 2026", "23:30 - 01:30", "Durrës", "Beach Stage", "Calvin Harris closes the beach festival with a massive final show.", "Calvin Harris", "../assets/images/calvin_harris.png", "electronic"),
    new Event("sia-al", "Echoes of Farewell", "August 7, 2026", "19:30 - 21:00", "Durrës", "Arena Stage", "Sia gives an emotional farewell performance to close the festival mood.", "Sia", "../assets/images/sia.png", "pop")
];

$filteredEvents = [];

foreach ($events as $event) {
    $matchesLocation = $event->getLocation() === $locations[$selectedLocation]["city"];
    $matchesSearch =
        $search === "" ||
        stripos($event->getTitle(), $search) !== false ||
        stripos($event->getArtist(), $search) !== false ||
        stripos($event->getDate(), $search) !== false;

    $matchesCategory = $category === "all" || $event->getCategory() === $category;

    if ($matchesLocation && $matchesSearch && $matchesCategory) {
        $filteredEvents[] = $event;
    }
}

if ($sort === "title") {
    usort($filteredEvents, function($a, $b) {
        return strcmp($a->getTitle(), $b->getTitle());
    });
}
?>

<title>Events</title>
<link rel="stylesheet" href="/EchoFest/assets/css/events.css">

<section class="events-hero">
    <div class="events-hero-content">
        <div class="hero-info">
            <div>
                <span>Festival Dates</span>
                <strong><?= $locations[$selectedLocation]["dates"]; ?></strong>
            </div>
            <div>
                <span>Location</span>
                <strong><?= $locations[$selectedLocation]["venue"]; ?></strong>
            </div>
        </div>
    </div>
</section>

<section class="location-wrap">
    <div class="location-box">
        <p>Select Event Location:</p>

        <div class="location-cards">
            <?php foreach ($locations as $key => $loc): ?>
                <a href="events.php?location=<?= $key; ?>"
                   class="loc-card <?= $selectedLocation === $key ? 'active' : ''; ?>">
                    <strong><?= $loc["country"]; ?></strong>
                    <span><?= $loc["city"]; ?></span>
                    <small><?= $loc["dates"]; ?></small>
                </a>
            <?php endforeach; ?>
        </div>
    </div>
</section>

<section class="filter-section">
    <div class="filter-container">
        <h2>Festival Events</h2>

        <form method="GET">
            <input type="hidden" name="location" value="<?= $selectedLocation; ?>">

            <input type="text" name="search" placeholder="Search events, artists, or dates..."
                   value="<?= htmlspecialchars($search); ?>">

            <select name="category">
                <option value="all" <?= $category === "all" ? "selected" : ""; ?>>All Categories</option>
                <option value="pop" <?= $category === "pop" ? "selected" : ""; ?>>Pop</option>
                <option value="electronic" <?= $category === "electronic" ? "selected" : ""; ?>>Electronic</option>
                <option value="acoustic" <?= $category === "acoustic" ? "selected" : ""; ?>>Acoustic</option>
            </select>

            <select name="sort">
                <option value="date" <?= $sort === "date" ? "selected" : ""; ?>>Sort by Date</option>
                <option value="title" <?= $sort === "title" ? "selected" : ""; ?>>Sort by Title</option>
            </select>

            <button type="submit">Filter</button>
            <a href="events.php">Reset</a>
        </form>

        <?php if ($error): ?>
            <p class="validation-error"><?= $error; ?></p>
        <?php endif; ?>

        <p class="results-count">
            Found <?= count($filteredEvents); ?> event<?= count($filteredEvents) !== 1 ? "s" : ""; ?>
        </p>
    </div>
</section>

<section class="events-list-section">
    <div class="events-container">
        <?php if (count($filteredEvents) === 0): ?>
            <div class="no-results">No events found matching your criteria.</div>
        <?php else: ?>
            <div class="events-grid">
                <?php foreach ($filteredEvents as $event): ?>
                    <div class="event-card">
                        <div class="event-image">
                            <img src="<?= $event->getImage(); ?>" alt="<?= $event->getTitle(); ?>">
                        </div>

                        <div class="event-body">
                            <div class="event-category"><?= $event->getCategory(); ?></div>
                            <h3><?= $event->getTitle(); ?></h3>
                            <p class="event-artist">Artist: <?= $event->getArtist(); ?></p>

                            <div class="event-details-grid">
                                <div><span>Date:</span> <strong><?= $event->getDate(); ?></strong></div>
                                <div><span>Time:</span> <strong><?= $event->getTime(); ?></strong></div>
                                <div><span>Stage:</span> <strong><?= $event->getStage(); ?></strong></div>
                            </div>

                            <div class="event-actions">
                                <button class="btn-details"
                                        data-title="<?= htmlspecialchars($event->getTitle()); ?>"
                                        data-artist="<?= htmlspecialchars($event->getArtist()); ?>"
                                        data-date="<?= htmlspecialchars($event->getDate()); ?>"
                                        data-time="<?= htmlspecialchars($event->getTime()); ?>"
                                        data-location="<?= htmlspecialchars($event->getLocation()); ?>"
                                        data-stage="<?= htmlspecialchars($event->getStage()); ?>"
                                        data-description="<?= htmlspecialchars($event->getDescription()); ?>"
                                        data-image="<?= htmlspecialchars($event->getImage()); ?>">
                                    View Details
                                </button>

                                <a href="tickets.php" class="btn-ticket">Get Ticket</a>
                            </div>
                        </div>
                    </div>
                <?php endforeach; ?>
            </div>
        <?php endif; ?>
    </div>
</section>

<div class="event-modal" id="eventModal">
    <div class="event-modal-content">
        <button id="modalClose" class="modal-close">×</button>
        <img id="modalImage" src="" alt="">
        <div class="modal-body">
            <h2 id="modalTitle"></h2>
            <p id="modalArtist"></p>
            <p id="modalInfo"></p>
            <p id="modalDescription"></p>
            <a href="tickets.php" class="btn-ticket">Get Ticket Now</a>
        </div>
    </div>
</div>

<script src="/EchoFest/assets/js/events.js"></script>

<?php include '../includes/footer.php'; ?>

