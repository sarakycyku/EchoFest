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

$events = [];

$event1 = new Event();
$event1->setId("djsnake-ks");
$event1->setTitle("Midnight Bass Takeover");
$event1->setDate("July 15, 2026");
$event1->setTime("21:00 - 23:00");
$event1->setLocation("Pristina");
$event1->setStage("Main Stage");
$event1->setDescription("DJ Snake brings heavy bass, lights and festival energy to the Main Stage.");
$event1->setArtist("DJ Snake");
$event1->setImage("../assets/images/dj_snake.png");
$event1->setCategory("electronic");
$events[] = $event1;

$event2 = new Event();
$event2->setId("ritaora-ks");
$event2->setTitle("Pop Lights & Neon Dreams");
$event2->setDate("July 15, 2026");
$event2->setTime("19:00 - 20:30");
$event2->setLocation("Pristina");
$event2->setStage("Pop Stage");
$event2->setDescription("Rita Ora performs a colorful pop show filled with neon visuals and hit songs.");
$event2->setArtist("Rita Ora");
$event2->setImage("../assets/images/rita_ora.png");
$event2->setCategory("pop");
$events[] = $event2;

$event3 = new Event();
$event3->setId("billieeilish-ks");
$event3->setTitle("Dark Echoes Experience");
$event3->setDate("July 15, 2026");
$event3->setTime("23:30 - 01:00");
$event3->setLocation("Pristina");
$event3->setStage("Main Stage");
$event3->setDescription("Billie Eilish creates a dark, emotional and cinematic live atmosphere.");
$event3->setArtist("Billie Eilish");
$event3->setImage("../assets/images/billie_eilish.png");
$event3->setCategory("pop");
$events[] = $event3;

$event4 = new Event();
$event4->setId("davidguetta-ks");
$event4->setTitle("Electric Pulse Night");
$event4->setDate("July 15, 2026");
$event4->setTime("23:00 - 01:30");
$event4->setLocation("Pristina");
$event4->setStage("EDM Stage");
$event4->setDescription("David Guetta turns the EDM Stage into a powerful electric party.");
$event4->setArtist("David Guetta");
$event4->setImage("../assets/images/david_guetta.png");
$event4->setCategory("electronic");
$events[] = $event4;

$event5 = new Event();
$event5->setId("dualipa-ks");
$event5->setTitle("Future Rhythm Show");
$event5->setDate("July 16, 2026");
$event5->setTime("22:00 - 23:30");
$event5->setLocation("Pristina");
$event5->setStage("Main Stage");
$event5->setDescription("Dua Lipa performs a futuristic pop show full of rhythm and movement.");
$event5->setArtist("Dua Lipa");
$event5->setImage("../assets/images/dua_lipa.png");
$event5->setCategory("pop");
$events[] = $event5;

$event6 = new Event();
$event6->setId("theweeknd-ks");
$event6->setTitle("After Midnight Vibes");
$event6->setDate("July 16, 2026");
$event6->setTime("23:45 - 01:15");
$event6->setLocation("Pristina");
$event6->setStage("Main Stage");
$event6->setDescription("The Weeknd brings late-night atmosphere, lights and emotional vocals.");
$event6->setArtist("The Weeknd");
$event6->setImage("../assets/images/the_weeknd.png");
$event6->setCategory("pop");
$events[] = $event6;

$event7 = new Event();
$event7->setId("edsheeran-ks");
$event7->setTitle("Strings & Stories Session");
$event7->setDate("July 16, 2026");
$event7->setTime("19:00 - 20:30");
$event7->setLocation("Pristina");
$event7->setStage("Acoustic Stage");
$event7->setDescription("Ed Sheeran performs an intimate acoustic session with guitar and storytelling.");
$event7->setArtist("Ed Sheeran");
$event7->setImage("../assets/images/ed_sheeran.png");
$event7->setCategory("acoustic");
$events[] = $event7;

$event8 = new Event();
$event8->setId("martingarrix-ks");
$event8->setTitle("Festival Energy Peak");
$event8->setDate("July 17, 2026");
$event8->setTime("21:00 - 23:00");
$event8->setLocation("Pristina");
$event8->setStage("EDM Stage");
$event8->setDescription("Martin Garrix brings the highest energy moment of the festival weekend.");
$event8->setArtist("Martin Garrix");
$event8->setImage("../assets/images/martin_garrix.png");
$event8->setCategory("electronic");
$events[] = $event8;

$event9 = new Event();
$event9->setId("calvinharris-ks");
$event9->setTitle("Summer Sound Finale");
$event9->setDate("July 17, 2026");
$event9->setTime("23:30 - 01:30");
$event9->setLocation("Pristina");
$event9->setStage("EDM Stage");
$event9->setDescription("Calvin Harris closes the night with summer hits and festival fireworks.");
$event9->setArtist("Calvin Harris");
$event9->setImage("../assets/images/calvin_harris.png");
$event9->setCategory("electronic");
$events[] = $event9;

$event10 = new Event();
$event10->setId("sia-ks");
$event10->setTitle("Voices of Emotion");
$event10->setDate("July 17, 2026");
$event10->setTime("19:30 - 21:00");
$event10->setLocation("Pristina");
$event10->setStage("Pop Stage");
$event10->setDescription("Sia delivers a powerful emotional vocal performance.");
$event10->setArtist("Sia");
$event10->setImage("../assets/images/sia.png");
$event10->setCategory("pop");
$events[] = $event10;

$event11 = new Event();
$event11->setId("djsnake-al");
$event11->setTitle("Beach Bass Explosion");
$event11->setDate("August 5, 2026");
$event11->setTime("22:00 - 00:00");
$event11->setLocation("Durrës");
$event11->setStage("Beach Stage");
$event11->setDescription("DJ Snake opens the beach edition with explosive bass and seaside energy.");
$event11->setArtist("DJ Snake");
$event11->setImage("../assets/images/dj_snake.png");
$event11->setCategory("electronic");
$events[] = $event11;

$event12 = new Event();
$event12->setId("ritaora-al");
$event12->setTitle("Homecoming Pop Night");
$event12->setDate("August 5, 2026");
$event12->setTime("20:00 - 21:30");
$event12->setLocation("Durrës");
$event12->setStage("Arena Stage");
$event12->setDescription("Rita Ora performs a special pop night with Albanian pride and energy.");
$event12->setArtist("Rita Ora");
$event12->setImage("../assets/images/rita_ora.png");
$event12->setCategory("pop");
$events[] = $event12;

$event13 = new Event();
$event13->setId("billieeilish-al");
$event13->setTitle("Ocean Mood Experience");
$event13->setDate("August 5, 2026");
$event13->setTime("23:30 - 01:00");
$event13->setLocation("Durrës");
$event13->setStage("Arena Stage");
$event13->setDescription("Billie Eilish brings a deep, moody seaside performance.");
$event13->setArtist("Billie Eilish");
$event13->setImage("../assets/images/billie_eilish.png");
$event13->setCategory("pop");
$events[] = $event13;

$event14 = new Event();
$event14->setId("davidguetta-al");
$event14->setTitle("Midnight Beach Party");
$event14->setDate("August 5, 2026");
$event14->setTime("00:30 - 02:30");
$event14->setLocation("Durrës");
$event14->setStage("Beach Stage");
$event14->setDescription("David Guetta turns the beach into a midnight EDM party.");
$event14->setArtist("David Guetta");
$event14->setImage("../assets/images/david_guetta.png");
$event14->setCategory("electronic");
$events[] = $event14;

$event15 = new Event();
$event15->setId("dualipa-al");
$event15->setTitle("Neon Waves Show");
$event15->setDate("August 6, 2026");
$event15->setTime("22:00 - 23:30");
$event15->setLocation("Durrës");
$event15->setStage("Arena Stage");
$event15->setDescription("Dua Lipa performs a neon-inspired show near the waves.");
$event15->setArtist("Dua Lipa");
$event15->setImage("../assets/images/dua_lipa.png");
$event15->setCategory("pop");
$events[] = $event15;

$event16 = new Event();
$event16->setId("theweeknd-al");
$event16->setTitle("Night Lights Experience");
$event16->setDate("August 6, 2026");
$event16->setTime("23:45 - 01:15");
$event16->setLocation("Durrës");
$event16->setStage("Arena Stage");
$event16->setDescription("The Weeknd creates a night show with lights, emotion and atmosphere.");
$event16->setArtist("The Weeknd");
$event16->setImage("../assets/images/the_weeknd.png");
$event16->setCategory("pop");
$events[] = $event16;

$event17 = new Event();
$event17->setId("edsheeran-al");
$event17->setTitle("Sunset Acoustic Vibes");
$event17->setDate("August 6, 2026");
$event17->setTime("19:00 - 20:30");
$event17->setLocation("Durrës");
$event17->setStage("Sunset Terrace");
$event17->setDescription("Ed Sheeran performs acoustic songs during sunset by the sea.");
$event17->setArtist("Ed Sheeran");
$event17->setImage("../assets/images/ed_sheeran.png");
$event17->setCategory("acoustic");
$events[] = $event17;

$event18 = new Event();
$event18->setId("martingarrix-al");
$event18->setTitle("Final Drop Experience");
$event18->setDate("August 7, 2026");
$event18->setTime("21:00 - 23:00");
$event18->setLocation("Durrës");
$event18->setStage("Beach Stage");
$event18->setDescription("Martin Garrix delivers one of the final EDM drops of EchoFest Albania.");
$event18->setArtist("Martin Garrix");
$event18->setImage("../assets/images/martin_garrix.png");
$event18->setCategory("electronic");
$events[] = $event18;

$event19 = new Event();
$event19->setId("calvinharris-al");
$event19->setTitle("Ultimate Beach Finale");
$event19->setDate("August 7, 2026");
$event19->setTime("23:30 - 01:30");
$event19->setLocation("Durrës");
$event19->setStage("Beach Stage");
$event19->setDescription("Calvin Harris closes the beach festival with a massive final show.");
$event19->setArtist("Calvin Harris");
$event19->setImage("../assets/images/calvin_harris.png");
$event19->setCategory("electronic");
$events[] = $event19;

$event20 = new Event();
$event20->setId("sia-al");
$event20->setTitle("Echoes of Farewell");
$event20->setDate("August 7, 2026");
$event20->setTime("19:30 - 21:00");
$event20->setLocation("Durrës");
$event20->setStage("Arena Stage");
$event20->setDescription("Sia gives an emotional farewell performance to close the festival mood.");
$event20->setArtist("Sia");
$event20->setImage("../assets/images/sia.png");
$event20->setCategory("pop");
$events[] = $event20;

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
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
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

