<?php require '../logic/admin.php'; ?>
<?php require '../includes/admin_header.php'; ?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>EchoFest | Master Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<link rel="stylesheet" href="/EchoFest/assets/css/admin.css">
</head>
<style>
    :root {
      --bg: #000;
      --sidebar: #09090b;
      --card: #09090b;
      --border: #27272a;
      --accent: #a855f7;
      --text: #fafafa;
      --dim: #71717a;
    }

    body {
      background: var(--bg);
      color: var(--text);
      font-family: 'Plus Jakarta Sans', sans-serif;
      margin: 0;
    }
    </style>
<body>
    <div class="sidebar d-flex flex-column">
            <div class="mb-5 px-3">
                <h3 class="fw-800 m-0" style="letter-spacing:-1.5px;">ECHOFEST<span class="text-primary">.</span></h3>
                <span class="text-muted small fw-bold">MISSION CONTROL</span>
            </div>
            <nav class="nav flex-column flex-grow-1">
                <a href="?view=dashboard" class="nav-link <?= (!isset($_GET['view']) || $_GET['view']=='dashboard') ? 'active':'' ?>"><i class="fa-solid fa-grid-2 me-3"></i> Dashboard</a>
                <a href="?view=lineup" class="nav-link <?= ($_GET['view']??'')=='lineup' ? 'active':'' ?>"><i class="fa-solid fa-microphone-lines me-3"></i> Manage Lineup</a>
                <a href="?view=events" class="nav-link <?= ($_GET['view']??'')=='events' ? 'active':'' ?>"><i class="fa-solid fa-calendar-day me-3"></i> Manage Events</a>
                <a href="?download_csv=1" class="nav-link text-info"><i class="fa-solid fa-file-csv me-3"></i> Export CSV</a>
            </nav>
            <div class="pt-4 border-top border-secondary">
                <a href="../logout.php" class="nav-link text-danger"><i class="fa-solid fa-power-off me-3"></i> Logout</a>
            </div>
        </div>

        <div class="main-view">
            <?php $view = $_GET['view'] ?? 'dashboard'; ?>

            <?php if($view == 'dashboard'): ?>
                <h1 class="fw-800 mb-5 text-white">Overview</h1>
                <div class="row g-4 mb-5">
                    <div class="col-lg-4">
                        <div class="f-card">
                            <p class="text-muted small fw-bold uppercase">TOTAL USERS</p>
                            <div style="font-size: 3rem; font-weight: 800;"><?= count($users_list) ?></div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="f-card text-center">
                            <p class="text-muted small fw-bold text-start uppercase">ORDERS SATURATION</p>
                            <div class="py-2"><canvas id="orderChart" style="max-height: 120px;"></canvas></div>
                            <div class="small mt-2 text-muted fw-bold"><?= $totalTicketsSold ?> / <?= $festivalCapacity ?> Tickets Sold</div>
                        </div>
                    </div>
                    <div class="col-lg-4">
                        <div class="f-card">
                            <p class="text-muted small fw-bold uppercase">ACTIVE ARTISTS</p>
                            <div style="font-size: 3rem; font-weight: 800; color: var(--accent);"><?= count($lineup) ?></div>
                        </div>
                    </div>
                </div>

             <div class="f-card">
                            <h5 class="fw-800 mb-4 text-white">Recent Database Entry</h5>
                            <table class="f-table">
                                <thead><tr><th class="text-muted px-3 small">USERNAME</th><th class="text-muted px-3 small">EMAIL</th><th class="text-muted px-3 small">ROLE</th></tr></thead>
                                <tbody>
                                    <?php foreach(array_slice($users_list, -5) as $name => $u): ?>
                                    <tr><td class="fw-bold"><?= $name ?></td><td class="text-dim"><?= $u['email'] ?></td><td><span class="text-accent"><?= $u['role'] ?></span></td></tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                     <?php elseif($view == 'lineup'): ?>
                                <div class="d-flex justify-content-between align-items-center mb-5">
                                    <h1 class="fw-800 text-white">Festival Lineup</h1>
                                    <button class="btn btn-vivid" data-bs-toggle="modal" data-bs-target="#addArtModal">+ Add Artist</button>
                                </div>
<table class="f-table">
                <thead><tr><th class="text-muted px-3 small">ARTIST</th><th class="text-muted px-3 small">STAGE</th><th class="text-muted px-3 small">DAY</th><th class="text-end text-muted px-3 small">ACTIONS</th></tr></thead>
                <tbody>
                    <?php foreach($lineup as $i => $a): ?>
                    <tr>
                        <td><div class="d-flex align-items-center gap-3"><img src="<?= $a['image'] ?>" class="artist-img"><span class="fw-bold fs-5"><?= $a['artist'] ?></span></div></td>
                        <td class="text-dim"><?= $a['stage'] ?></td>
                        <td><span class="badge bg-dark border border-secondary p-2 px-3"><?= $a['day'] ?></span></td>
                        <td class="text-end"><a href="?delete_artist=<?= $i ?>" class="text-danger fs-5 mx-3"><i class="fa-solid fa-trash-can"></i></a></td>
                    </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>


        <?php elseif($view == 'events'): ?>
                    <div class="d-flex justify-content-between align-items-center mb-5">
                        <h1 class="fw-800 text-white">Manage Events</h1>
                        <button class="btn btn-vivid" data-bs-toggle="modal" data-bs-target="#addEvModal">+ Create Event</button>
                    </div>

                <table class="f-table">
                                <thead><tr><th class="text-muted px-3 small">EVENT TITLE</th><th class="text-muted px-3 small">DATE & TIME</th><th class="text-muted px-3 small">STAGE</th></tr></thead>
                                <tbody>
                                    <?php foreach($events as $e): ?>
                                    <tr>
                                        <td class="fw-bold fs-5 text-white"><?= $e['title'] ?></td>
                                        <td><div class="text-white"><?= $e['date'] ?></div><small class="text-accent"><?= $e['time'] ?? '' ?></small></td>
                                        <td class="text-dim"><?= $e['stage'] ?? 'TBA' ?></td>
                                    </tr>
                                    <?php endforeach; ?>
                                </tbody>
                            </table>
                         <?php endif; ?>
                            </div>

                            <div class="modal fade" id="addArtModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered">
                                    <div class="modal-content" style="background:#0c0c0e; border:1px solid #27272a; border-radius:24px;">
                                        <form method="POST">
                                            <div class="modal-header border-0 pt-4 px-4"><h4 class="fw-800 m-0">New Artist</h4></div>
                                            <div class="modal-body p-4">
                                                <input type="text" name="artist" class="form-control f-input mb-3" placeholder="Artist Name" required>
                                                <input type="text" name="image" class="form-control f-input mb-3" placeholder="Image Path (../assets/images/name.png)">
                                                <input type="text" name="stage" class="form-control f-input mb-3" placeholder="Stage" required>
                                                <select name="day" class="form-select f-input mb-3"><option>Friday</option><option>Saturday</option><option>Sunday</option></select>
                                                <textarea name="hits" class="form-control f-input" placeholder="Hits (comma separated)"></textarea>
                                            </div>
                                            <div class="modal-footer border-0 p-4"><button type="submit" name="add_artist" class="btn btn-vivid w-100 py-3">Confirm Entry</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>

                            <div class="modal fade" id="addEvModal" tabindex="-1">
                                <div class="modal-dialog modal-dialog-centered modal-lg">
                                    <div class="modal-content" style="background:#0c0c0e; border:1px solid #27272a; border-radius:24px;">
                                        <form method="POST">
                                            <div class="modal-header border-0 pt-4 px-4"><h4 class="fw-800 m-0">Create Event</h4></div>
                                            <div class="modal-body p-4 row g-3">
                                                <div class="col-12"><input type="text" name="event_title" class="form-control f-input" placeholder="Event Title" required></div>
                                                <div class="col-md-6"><input type="text" name="event_date" class="form-control f-input" placeholder="July 15, 2026"></div>
                                                <div class="col-md-6"><input type="text" name="event_time" class="form-control f-input" placeholder="Time (21:00 - 23:00)"></div>
                                                <div class="col-md-6"><input type="text" name="event_location" class="form-control f-input" placeholder="Location"></div>
                                                <div class="col-md-6"><input type="text" name="event_stage" class="form-control f-input" placeholder="Stage"></div>
                                                <div class="col-12"><textarea name="event_desc" class="form-control f-input" placeholder="Description"></textarea></div>
                                            </div>
                                            <div class="modal-footer border-0 p-4"><button type="submit" name="add_event" class="btn btn-vivid w-100 py-3">Publish Event</button></div>
                                        </form>
                                    </div>
                                </div>
                            </div>


                        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
                            <script>
                                const ctx = document.getElementById('orderChart').getContext('2d');
                                new Chart(ctx, {
                                    type: 'doughnut',
                                    data: {
                                        labels: ['Sold', 'Available'],
                                        datasets: [{
                                            data: [<?= $totalTicketsSold ?>, <?= $availableTickets ?>],
                                            backgroundColor: ['#a855f7', '#18181b'],
                                            borderWidth: 0
                                        }]
                                    },
                                    options: { cutout: '80%', plugins: { legend: { display: false } } }
                                });
                            </script>


</body>
</html>