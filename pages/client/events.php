<?php include(__DIR__ . "/../../logic/events.php");?>

<title>Events</title>
<link href="https://fonts.googleapis.com/css2?family=Black+Han+Sans&family=DM+Sans:wght@300;400;500&display=swap" rel="stylesheet">
<link rel="stylesheet" href="/EchoFest/assets/css/events.css?v=1.1">

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
            <a href="events.php" class="text-center">Reset</a>
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
        <button id="modalClose" class="modal-close">&times;</button>
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

<?php include __DIR__ . '/../../includes/footer.php'; ?>

