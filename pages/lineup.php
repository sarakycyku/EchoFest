<?php
include '../includes/header.php';



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

// SEARCH (GET)
$search = isset($_GET['q']) ? trim($_GET['q']) : "";

// validation
if ($search && !preg_match("/^[a-zA-Z ]+$/", $search)) {
    die("Invalid search input");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">

    <h1 class="text-center mb-4"> EchoFest Lineup</h1>

    <!-- SEARCH BAR -->
    <form method="GET" class="d-flex justify-content-center mb-4">

        <input class="form-control w-50"
               name="q"
               placeholder="Search artist..."
               value="<?= htmlspecialchars($search) ?>">

        <button class="btn btn-dark ms-2">Search</button>

        <a href="lineup.php" class="btn btn-outline-secondary ms-2">Reset</a>

    </form>

// SEARCH (GET)
$search = isset($_GET['q']) ? trim($_GET['q']) : "";

// validation
if ($search && !preg_match("/^[a-zA-Z ]+$/", $search)) {
    die("Invalid search input");
}
?>

<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">

<div class="container py-4">

    <h1 class="text-center mb-4"> EchoFest Lineup</h1>

    <!-- SEARCH BAR -->
    <form method="GET" class="d-flex justify-content-center mb-4">

        <input class="form-control w-50"
               name="q"
               placeholder="Search artist..."
               value="<?= htmlspecialchars($search) ?>">

        <button class="btn btn-dark ms-2">Search</button>

        <a href="lineup.php" class="btn btn-outline-secondary ms-2">Reset</a>

    </form>

    <div class="row">

        <?php foreach ($events as $e): ?>
            <?php if ($search == "" || stripos($e["artist"], $search) !== false): ?>

                <?php $id = md5($e["artist"]); ?>

                <div class="col-md-4 mb-4">

                    <div class="card shadow-sm h-100 border-0">

                        <img src="<?= $e["image"] ?>"
                             class="card-img-top"
                             style="height:250px; object-fit:cover;">

                        <div class="card-body text-center">

                            <h5 class="fw-bold"><?= $e["artist"] ?></h5>

                            <p class="mb-1"><b>Stage:</b> <?= $e["stage"] ?></p>
                            <p class="mb-3"><b>Day:</b> <?= $e["day"] ?></p>

                            <button class="btn btn-primary btn-sm"
                                data-bs-toggle="modal"
                                data-bs-target="#modal<?= $id ?>">
                                🎵 See Hits
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
                                        <li class="list-group-item"><?= $hit ?></li>
                                    <?php endforeach; ?>
                                </ul>
                            </div>

                        </div>

                    </div>
                </div>

            <?php endif; ?>
        <?php endforeach; ?>

    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>



<?php include '../includes/footer.php'; ?>