<?php
include '../includes/header.php';

/* =========================
   EVENTS DATA
   ========================= */
$events = [
    ["artist"=>"Dua Lipa","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/dua_lipa.png","hits"=>["Levitating","New Rules","Don't Start Now"]],
    ["artist"=>"DJ Snake","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/dj_snake.png","hits"=>["Taki Taki","Lean On","Let Me Love You"]],
    ["artist"=>"Martin Garrix","stage"=>"EDM Stage","day"=>"Sunday","image"=>"../assets/images/martin_garrix.png","hits"=>["Animals","Scared to Be Lonely","In the Name of Love"]],
    ["artist"=>"Rita Ora","stage"=>"Pop Stage","day"=>"Friday","image"=>"../assets/images/rita_ora.png","hits"=>["Anywhere","Let You Love Me","Your Song"]],
    ["artist"=>"The Weeknd","stage"=>"Main Stage","day"=>"Saturday","image"=>"../assets/images/the_weeknd.png","hits"=>["Blinding Lights","Starboy","Save Your Tears"]],
    ["artist"=>"Calvin Harris","stage"=>"EDM Stage","day"=>"Sunday","image"=>"../assets/images/calvin_harris.png","hits"=>["Summer","One Kiss","Feel So Close"]],
    ["artist"=>"Billie Eilish","stage"=>"Main Stage","day"=>"Friday","image"=>"../assets/images/billie_eilish.png","hits"=>["Bad Guy","Ocean Eyes","Happier Than Ever"]],
    ["artist"=>"Ed Sheeran","stage"=>"Acoustic Stage","day"=>"Saturday","image"=>"../assets/images/ed_sheeran.png","hits"=>["Shape of You","Perfect","Photograph"]],
    ["artist"=>"David Guetta","stage"=>"EDM Stage","day"=>"Friday","image"=>"../assets/images/david_guetta.png","hits"=>["Titanium","Play Hard","Without You"]],
    ["artist"=>"Sia","stage"=>"Pop Stage","day"=>"Sunday","image"=>"../assets/images/sia.png","hits"=>["Chandelier","Cheap Thrills","Elastic Heart"]],
];

/* =========================
   GET VALUES
   ========================= */
$search = isset($_GET['q']) ? trim($_GET['q']) : "";
$sort   = isset($_GET['sort']) ? $_GET['sort'] : "";

/* VALIDATION */
if ($search && !preg_match("/^[a-zA-Z ]+$/", $search)) {
    die("Invalid search input");
}

/* =========================
   FILTER
   ========================= */
$filtered = array_filter($events, function($e) use ($search) {
    return $search == "" || stripos($e["artist"], $search) !== false;
});

/* =========================
   SORT LOGIC
   ========================= */
if ($sort == "az") {
    usort($filtered, fn($a,$b)=>strcmp($a["artist"],$b["artist"]));
}

if ($sort == "za") {
    usort($filtered, fn($a,$b)=>strcmp($b["artist"],$a["artist"]));
}

if ($sort == "day") {
    $order = ["Friday"=>1, "Saturday"=>2, "Sunday"=>3];
    usort($filtered, fn($a,$b)=>$order[$a["day"]] <=> $order[$b["day"]]);
}

if ($sort == "stage") {
    usort($filtered, fn($a,$b)=>strcmp($a["stage"],$b["stage"]));
}
?>

<!-- BOOTSTRAP + CSS (IMPORTANT ORDER) -->
<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="../assets/css/lineup.css">

<div class="container py-4">

    <h1 class="text-center mb-4">EchoFest Lineup</h1>

    <!-- =========================
         SLIDER (TOP FEATURED)
         ========================= -->
    <div id="artistSlider" class="carousel slide mb-4" data-bs-ride="carousel" data-bs-interval="3000">

        <div class="carousel-inner">

            <?php foreach (array_slice($filtered, 0, 5) as $index => $e): ?>

                <div class="carousel-item <?= $index == 0 ? 'active' : '' ?>">

                    <div class="slider-card">

                        <img src="<?= $e["image"] ?>" class="slider-img">

                        <div class="slider-overlay">
                            <h2><?= $e["artist"] ?></h2>
                            <p><?= $e["stage"] ?> • <?= $e["day"] ?></p>
                        </div>

                    </div>

                </div>

            <?php endforeach; ?>

        </div>

        <!-- controls -->
        <button class="carousel-control-prev" type="button" data-bs-target="#artistSlider" data-bs-slide="prev">
            <span class="carousel-control-prev-icon"></span>
        </button>

        <button class="carousel-control-next" type="button" data-bs-target="#artistSlider" data-bs-slide="next">
            <span class="carousel-control-next-icon"></span>
        </button>

    </div>

    <!-- =========================
         SEARCH + SORT
         ========================= -->
    <form method="GET" class="d-flex justify-content-center mb-4">

        <input class="form-control w-50"
               name="q"
               placeholder="Search artist..."
               value="<?= htmlspecialchars($search) ?>">

        <select name="sort" class="form-select w-auto ms-2">
            <option value="">Sort</option>
            <option value="az" <?= $sort=="az"?"selected":"" ?>>Artist A-Z</option>
            <option value="za" <?= $sort=="za"?"selected":"" ?>>Artist Z-A</option>
            <option value="day" <?= $sort=="day"?"selected":"" ?>>Day</option>
            <option value="stage" <?= $sort=="stage"?"selected":"" ?>>Stage</option>
        </select>

        <button class="btn btn-dark ms-2">Search</button>

        <a href="lineup.php" class="btn btn-outline-secondary ms-2">Reset</a>
    </form>

    <!-- =========================
         CARDS LIST
         ========================= -->
    <div class="row">

        <?php foreach ($filtered as $e): ?>
            <?php $id = md5($e["artist"]); ?>

            <div class="col-md-4 mb-4">

                <div class="card shadow-sm h-100 border-0">

                    <img src="<?= $e["image"] ?>" class="card-img-top" style="height:250px; object-fit:cover;">

                    <div class="card-body text-center">

                        <h5 class="fw-bold"><?= $e["artist"] ?></h5>

                        <p class="mb-1"><b>Stage:</b> <?= $e["stage"] ?></p>
                        <p class="mb-3"><b>Day:</b> <?= $e["day"] ?></p>

                        <button class="btn btn-primary btn-sm"
                            data-bs-toggle="modal"
                            data-bs-target="#modal<?= $id ?>">
                            🎵 Top Hits
                        </button>

                    </div>
                </div>
            </div>

            <!-- MODAL -->
            <div class="modal fade" id="modal<?= $id ?>" tabindex="-1">
                <div class="modal-dialog modal-dialog-centered">

                    <div class="modal-content">

                        <div class="modal-header">
                            <h5 class="modal-title"><?= $e["artist"] ?> Hits</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
                        </div>

                        <div class="modal-body text-dark">
                            <ul class="list-group">
                                <?php foreach ($e["hits"] as $hit): ?>
                                    <li class="list-group-item">🎵 <?= $hit ?></li>
                                <?php endforeach; ?>
                            </ul>
                        </div>

                    </div>

                </div>
            </div>

        <?php endforeach; ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>

<?php include '../includes/footer.php'; ?>