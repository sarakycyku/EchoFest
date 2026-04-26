<?php
session_start();
// Check if user is logged in and has admin role
// if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true || $_SESSION['role'] !== 'admin') {
//     header('Location: login.php');
//     exit();
//}

// Lineup data file
$LINEUP_FILE = 'lineup_data.json';

// Initialize lineup data file if not exists
if (!file_exists($LINEUP_FILE)) {
    $defaultLineup = [
        ["artist"=>"Dua Lipa","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/dua_lipa.png","hits"=>["Levitating","New Rules","Don't Start Now"]],
        ["artist"=>"DJ Snake","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/dj_snake.png","hits"=>["Taki Taki","Lean On","Let Me Love You"]],
        ["artist"=>"Martin Garrix","stage"=>"EDM Stage","day"=>"Sunday","image"=>"../assets/images/martin_garrix.png","hits"=>["Animals","Scared to Be Lonely","In the Name of Love"]],
        ["artist"=>"Rita Ora","stage"=>"Pop Stage","day"=>"Friday","image"=>"../assets/images/rita_ora.png","hits"=>["Anywhere","Let You Love Me","Your Song"]],
        ["artist"=>"The Weeknd","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/the_weeknd.png","hits"=>["Blinding Lights","Starboy","Save Your Tears"]],
        ["artist"=>"Calvin Harris","stage"=>"EDM Stage","day"=>"Sunday","image"=>"../assets/images/calvin_harris.png","hits"=>["Summer","One Kiss","Feel So Close"]],
        ["artist"=>"Billie Eilish","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/billie_eilish.png","hits"=>["Bad Guy","Ocean Eyes","Happier Than Ever"]],
        ["artist"=>"Ed Sheeran","stage"=>"Acoustic Stage","day"=>"Saturday","image"=>"../assets/images/ed_sheeran.png","hits"=>["Shape of You","Perfect","Photograph"]],
        ["artist"=>"David Guetta","stage"=>"EDM Stage","day"=>"Friday","image"=>"../assets/images/david_guetta.png","hits"=>["Titanium","Play Hard","Without You"]],
        ["artist"=>"Sia","stage"=>"Pop Stage","day"=>"Sunday","image"=>"../assets/images/sia.png","hits"=>["Chandelier","Cheap Thrills","Elastic Heart"]]
    ];
    file_put_contents($LINEUP_FILE, json_encode($defaultLineup, JSON_PRETTY_PRINT));
}

// Load lineup data
function loadLineup() {
    global $LINEUP_FILE;
    $data = file_get_contents($LINEUP_FILE);
    return json_decode($data, true);
}

// Save lineup data
function saveLineup($lineup) {
    global $LINEUP_FILE;
    file_put_contents($LINEUP_FILE, json_encode($lineup, JSON_PRETTY_PRINT));
}

$message = '';
$messageType = '';

// Handle Add Artist
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['add_artist'])) {
    $artist = trim($_POST['artist']);
    $stage = trim($_POST['stage']);
    $day = trim($_POST['day']);
    $image = trim($_POST['image']);
    $hits = array_filter(array_map('trim', explode("\n", $_POST['hits'])));

    if (empty($artist) || empty($stage) || empty($day)) {
        $message = 'Artist name, stage, and day are required!';
        $messageType = 'danger';
    } else {
        $lineup = loadLineup();
        $newArtist = [
            "artist" => $artist,
            "stage" => $stage,
            "day" => $day,
            "image" => !empty($image) ? $image : "../assets/images/default_artist.png",
            "hits" => !empty($hits) ? $hits : ["New Hit Song"]
        ];
        array_push($lineup, $newArtist);
        saveLineup($lineup);
        $message = "Artist '{$artist}' added successfully!";
        $messageType = 'success';
    }
}

// Handle Edit Artist
if ($_SERVER['REQUEST_METHOD'] === 'POST' && isset($_POST['edit_artist'])) {
    $index = intval($_POST['artist_index']);
    $artist = trim($_POST['artist']);
    $stage = trim($_POST['stage']);
    $day = trim($_POST['day']);
    $image = trim($_POST['image']);
    $hits = array_filter(array_map('trim', explode("\n", $_POST['hits'])));

    $lineup = loadLineup();
    if (isset($lineup[$index])) {
        $lineup[$index]['artist'] = $artist;
        $lineup[$index]['stage'] = $stage;
        $lineup[$index]['day'] = $day;
        $lineup[$index]['image'] = !empty($image) ? $image : $lineup[$index]['image'];
        $lineup[$index]['hits'] = !empty($hits) ? $hits : $lineup[$index]['hits'];
        saveLineup($lineup);
        $message = "Artist updated successfully!";
        $messageType = 'success';
    }
}

// Handle Delete Artist
if (isset($_GET['delete']) && is_numeric($_GET['delete'])) {
    $index = intval($_GET['delete']);
    $lineup = loadLineup();
    if (isset($lineup[$index])) {
        $artistName = $lineup[$index]['artist'];
        array_splice($lineup, $index, 1);
        saveLineup($lineup);
        $message = "Artist '{$artistName}' deleted successfully!";
        $messageType = 'success';
    }
}

$lineup = loadLineup();
$days = ['Friday', 'Saturday', 'Sunday'];
?>