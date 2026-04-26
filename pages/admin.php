<?php
// admin_dashboard.php - Admin panel for managing lineup
session_start();

// Check if user is logged in and has admin role
if (!isset($_SESSION['admin_logged_in']) || $_SESSION['admin_logged_in'] !== true || $_SESSION['role'] !== 'admin') {
    header('Location: login.php');
    exit();
}

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
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Lineup | EchoFest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <style>
        body {
            background: linear-gradient(135deg, #0a0f1c 0%, #0f172a 100%);
            font-family: 'Segoe UI', Tahoma, Geneva, Verdana, sans-serif;
            min-height: 100vh;
        }
        .admin-wrapper {
            max-width: 1400px;
            margin: 0 auto;
            padding: 1.5rem;
        }
        .glass-card {
            background: rgba(15, 25, 45, 0.75);
            backdrop-filter: blur(10px);
            border-radius: 1.25rem;
            padding: 1.5rem;
            margin-bottom: 1.5rem;
            border: 1px solid rgba(255,255,255,0.08);
        }
        .admin-header {
            background: rgba(15, 25, 45, 0.9);
            backdrop-filter: blur(10px);
            border-radius: 1.25rem;
            padding: 1rem 1.5rem;
            margin-bottom: 1.5rem;
            display: flex;
            justify-content: space-between;
            align-items: center;
            flex-wrap: wrap;
        }
        .logo h1 {
            background: linear-gradient(135deg, #f97316, #ffb347);
            -webkit-background-clip: text;
            background-clip: text;
            color: transparent;
            font-weight: 700;
        }
        .artist-card {
            background: rgba(30, 41, 59, 0.6);
            border-radius: 1rem;
            overflow: hidden;
            transition: transform 0.2s;
            height: 100%;
        }
        .artist-card:hover {
            transform: translateY(-5px);
        }
        .artist-image {
            height: 200px;
            object-fit: cover;
            width: 100%;
        }
        .hits-list {
            font-size: 0.85rem;
            color: #cbd5e1;
        }
        table {
            color: #e2e8f0;
        }
        th {
            color: #94a3b8;
        }
        .form-label {
            color: #cbd5e1;
            font-weight: 500;
        }
        textarea, input, select {
            background: #1e293b;
            border: 1px solid #334155;
            color: white;
        }
        textarea:focus, input:focus, select:focus {
            background: #1e293b;
            border-color: #f97316;
            color: white;
            box-shadow: 0 0 0 0.2rem rgba(249,115,22,0.25);
        }
        .btn-warning-custom {
            background: #f59e0b;
            color: white;
        }
        .btn-warning-custom:hover {
            background: #d97706;
        }
    </style>
</head>
<body>
    <div class="admin-wrapper">
        <!-- Header -->
        <div class="admin-header">
            <div class="logo">
                <h1><i class="fas fa-ticket-alt"></i> EchoFest Admin Panel</h1>
                <p class="text-muted mb-0">Manage Festival Lineup</p>
            </div>
            <div class="d-flex gap-3 align-items-center">
                <span class="text-light"><i class="fas fa-user-shield"></i> <?php echo htmlspecialchars($_SESSION['username']); ?> (Admin)</span>
                <a href="logout.php" class="btn btn-danger btn-sm"><i class="fas fa-sign-out-alt"></i> Logout</a>
                <a href="lineup.php" target="_blank" class="btn btn-outline-info btn-sm"><i class="fas fa-eye"></i> View Live Lineup</a>
            </div>
        </div>

        <!-- Messages -->
        <?php if ($message): ?>
            <div class="alert alert-<?php echo $messageType; ?> alert-dismissible fade show" role="alert">
                <?php echo htmlspecialchars($message); ?>
                <button type="button" class="btn-close" data-bs-dismiss="alert"></button>
            </div>
        <?php endif; ?>

        <!-- Add Artist Form -->
        <div class="glass-card">
            <h3 class="text-light mb-3"><i class="fas fa-plus-circle text-warning"></i> Add New Artist to Lineup</h3>
            <form method="POST">
                <div class="row g-3">
                    <div class="col-md-4">
                        <label class="form-label">Artist Name *</label>
                        <input type="text" name="artist" class="form-control" required placeholder="e.g., Taylor Swift">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Stage *</label>
                        <input type="text" name="stage" class="form-control" required placeholder="Main Stage / EDM Stage">
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Day *</label>
                        <select name="day" class="form-select" required>
                            <option value="">Select Day</option>
                            <?php foreach ($days as $d): ?>
                                <option value="<?php echo $d; ?>"><?php echo $d; ?></option>
                            <?php endforeach; ?>
                        </select>
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Image URL</label>
                        <input type="text" name="image" class="form-control" placeholder="../assets/images/artist.png">
                    </div>
                    <div class="col-12">
                        <label class="form-label">Hit Songs (one per line)</label>
                        <textarea name="hits" class="form-control" rows="3" placeholder="Song 1&#10;Song 2&#10;Song 3"></textarea>
                    </div>
                    <div class="col-12">
                        <button type="submit" name="add_artist" class="btn btn-warning"><i class="fas fa-save"></i> Add Artist to Lineup</button>
                    </div>
                </div>
            </form>
        </div>

        <!-- Current Lineup Table -->
        <div class="glass-card">
            <h3 class="text-light mb-3"><i class="fas fa-music"></i> Current Lineup Management</h3>
            <div class="table-responsive">
                <table class="table table-dark table-hover">
                    <thead>
                        <tr><th>#</th><th>Artist</th><th>Stage</th><th>Day</th><th>Image Path</th><th>Hits</th><th>Actions</th></tr>
                    </thead>
                    <tbody>
                        <?php foreach ($lineup as $index => $artist): ?>
                        <tr>
                            <form method="POST" style="display: inline;">
                                <input type="hidden" name="artist_index" value="<?php echo $index; ?>">
                                <td><?php echo $index + 1; ?></td>
                                <td><input type="text" name="artist" value="<?php echo htmlspecialchars($artist['artist']); ?>" class="form-control form-control-sm" style="width: 150px;"></td>
                                <td><input type="text" name="stage" value="<?php echo htmlspecialchars($artist['stage']); ?>" class="form-control form-control-sm" style="width: 130px;"></td>
                                <td>
                                    <select name="day" class="form-select form-select-sm" style="width: 110px;">
                                        <?php foreach ($days as $d): ?>
                                            <option value="<?php echo $d; ?>" <?php echo ($artist['day'] == $d) ? 'selected' : ''; ?>><?php echo $d; ?></option>
                                        <?php endforeach; ?>
                                    </select>
                                 </td>
                                <td><input type="text" name="image" value="<?php echo htmlspecialchars($artist['image']); ?>" class="form-control form-control-sm" style="width: 160px;"></td>
                                <td><textarea name="hits" class="form-control form-control-sm" rows="2" style="width: 180px;"><?php echo implode("\n", $artist['hits']); ?></textarea></td>
                                <td style="white-space: nowrap;">
                                    <button type="submit" name="edit_artist" class="btn btn-sm btn-warning-custom"><i class="fas fa-edit"></i> Update</button>
                                    <a href="?delete=<?php echo $index; ?>" class="btn btn-sm btn-danger" onclick="return confirm('Delete <?php echo htmlspecialchars($artist['artist']); ?> from lineup?')"><i class="fas fa-trash"></i> Delete</a>
                                </td>
                            </form>
                        </tr>
                        <?php endforeach; ?>
                    </tbody>
                </table>
            </div>
        </div>

        <!-- Preview Cards -->
        <div class="glass-card">
            <h3 class="text-light mb-3"><i class="fas fa-eye"></i> Lineup Preview</h3>
            <div class="row">
                <?php
                $previewArtists = array_slice($lineup, 0, 4);
                foreach ($previewArtists as $artist):
                ?>
                <div class="col-md-3 mb-3">
                    <div class="artist-card">
                        <img src="<?php echo htmlspecialchars($artist['image']); ?>" class="artist-image" onerror="this.src='https://placehold.co/400x300?text=Artist'">
                        <div class="p-3">
                            <h5 class="text-warning mb-1"><?php echo htmlspecialchars($artist['artist']); ?></h5>
                            <p class="mb-1"><i class="fas fa-map-marker-alt"></i> <?php echo htmlspecialchars($artist['stage']); ?></p>
                            <p class="mb-2"><i class="fas fa-calendar"></i> <?php echo htmlspecialchars($artist['day']); ?></p>
                            <div class="hits-list">
                                <small><i class="fas fa-headphones"></i> <?php echo implode(', ', array_slice($artist['hits'], 0, 2)); ?></small>
                            </div>
                        </div>
                    </div>
                </div>
                <?php endforeach; ?>
            </div>
            <p class="text-center text-muted mt-2">Total artists in lineup: <?php echo count($lineup); ?></p>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
</body>
</html>