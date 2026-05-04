<?php
include __DIR__ . '/../includes/header.php';

require_once __DIR__ . '/../classes/Event.php';

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
    new Event("djsnake-ks", "Midnight Bass Takeover", "July 15, 2026", "21:00 - 23:00", "Pristina", "Main Stage", "DJ Snake brings heavy bass, lights and festival energy to the Main Stage.", "DJ Snake", "/EchoFest/assets/images/dj_snake.png", "electronic"),
    new Event("ritaora-ks", "Pop Lights & Neon Dreams", "July 15, 2026", "19:00 - 20:30", "Pristina", "Pop Stage", "Rita Ora performs a colorful pop show filled with neon visuals and hit songs.", "Rita Ora", "/EchoFest/assets/images/rita_ora.png", "pop"),
    new Event("billieeilish-ks", "Dark Echoes Experience", "July 15, 2026", "23:30 - 01:00", "Pristina", "Main Stage", "Billie Eilish creates a dark, emotional and cinematic live atmosphere.", "Billie Eilish", "/EchoFest/assets/images/billie_eilish.png", "pop"),
    new Event("davidguetta-ks", "Electric Pulse Night", "July 15, 2026", "23:00 - 01:30", "Pristina", "EDM Stage", "David Guetta turns the EDM Stage into a powerful electric party.", "David Guetta", "/EchoFest/assets/images/david_guetta.png", "electronic"),

    new Event("dualipa-ks", "Future Rhythm Show", "July 16, 2026", "22:00 - 23:30", "Pristina", "Main Stage", "Dua Lipa performs a futuristic pop show full of rhythm and movement.", "Dua Lipa", "/EchoFest/assets/images/dua_lipa.png", "pop"),
    new Event("theweeknd-ks", "After Midnight Vibes", "July 16, 2026", "23:45 - 01:15", "Pristina", "Main Stage", "The Weeknd brings late-night atmosphere, lights and emotional vocals.", "The Weeknd", "/EchoFest/assets/images/weeknd.png", "pop"),
    new Event("edsheeran-ks", "Strings & Stories Session", "July 16, 2026", "19:00 - 20:30", "Pristina", "Acoustic Stage", "Ed Sheeran performs an intimate acoustic session with guitar and storytelling.", "Ed Sheeran", "/EchoFest/assets/images/ed_sheeran.png", "acoustic"),

    new Event("martingarrix-ks", "Festival Energy Peak", "July 17, 2026", "21:00 - 23:00", "Pristina", "EDM Stage", "Martin Garrix brings the highest energy moment of the festival weekend.", "Martin Garrix", "/EchoFest/assets/images/martin_garrix.png", "electronic"),
    new Event("calvinharris-ks", "Summer Sound Finale", "July 17, 2026", "23:30 - 01:30", "Pristina", "EDM Stage", "Calvin Harris closes the night with summer hits and festival fireworks.", "Calvin Harris", "/EchoFest/assets/images/calvin_harris.png", "electronic"),
    new Event("sia-ks", "Voices of Emotion", "July 17, 2026", "19:30 - 21:00", "Pristina", "Pop Stage", "Sia delivers a powerful emotional vocal performance.", "Sia", "/EchoFest/assets/images/sia.png", "pop"),

    new Event("djsnake-al", "Beach Bass Explosion", "August 5, 2026", "22:00 - 00:00", "Durrës", "Beach Stage", "DJ Snake opens the beach edition with explosive bass and seaside energy.", "DJ Snake", "/EchoFest/assets/images/dj_snake.png", "electronic"),
    new Event("ritaora-al", "Homecoming Pop Night", "August 5, 2026", "20:00 - 21:30", "Durrës", "Arena Stage", "Rita Ora performs a special pop night with Albanian pride and energy.", "Rita Ora", "/EchoFest/assets/images/rita_ora.png", "pop"),
    new Event("billieeilish-al", "Ocean Mood Experience", "August 5, 2026", "23:30 - 01:00", "Durrës", "Arena Stage", "Billie Eilish brings a deep, moody seaside performance.", "Billie Eilish", "/EchoFest/assets/images/billie_eilish.png", "pop"),
    new Event("davidguetta-al", "Midnight Beach Party", "August 5, 2026", "00:30 - 02:30", "Durrës", "Beach Stage", "David Guetta turns the beach into a midnight EDM party.", "David Guetta", "/EchoFest/assets/images/david_guetta.png", "electronic"),

    new Event("dualipa-al", "Neon Waves Show", "August 6, 2026", "22:00 - 23:30", "Durrës", "Arena Stage", "Dua Lipa performs a neon-inspired show near the waves.", "Dua Lipa", "/EchoFest/assets/images/dua_lipa.png", "pop"),
    new Event("theweeknd-al", "Night Lights Experience", "August 6, 2026", "23:45 - 01:15", "Durrës", "Arena Stage", "The Weeknd creates a night show with lights, emotion and atmosphere.", "The Weeknd", "/EchoFest/assets/images/weeknd.png", "pop"),
    new Event("edsheeran-al", "Sunset Acoustic Vibes", "August 6, 2026", "19:00 - 20:30", "Durrës", "Sunset Terrace", "Ed Sheeran performs acoustic songs during sunset by the sea.", "Ed Sheeran", "/EchoFest/assets/images/ed_sheeran.png", "acoustic"),

    new Event("martingarrix-al", "Final Drop Experience", "August 7, 2026", "21:00 - 23:00", "Durrës", "Beach Stage", "Martin Garrix delivers one of the final EDM drops of EchoFest Albania.", "Martin Garrix", "/EchoFest/assets/images/martin_garrix.png", "electronic"),
    new Event("calvinharris-al", "Ultimate Beach Finale", "August 7, 2026", "23:30 - 01:30", "Durrës", "Beach Stage", "Calvin Harris closes the beach festival with a massive final show.", "Calvin Harris", "/EchoFest/assets/images/calvin_harris.png", "electronic"),
    new Event("sia-al", "Echoes of Farewell", "August 7, 2026", "19:30 - 21:00", "Durrës", "Arena Stage", "Sia gives an emotional farewell performance to close the festival mood.", "Sia", "/EchoFest/assets/images/sia.png", "pop")
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
