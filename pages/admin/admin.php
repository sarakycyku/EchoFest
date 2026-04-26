<?php
// admin_dashboard.php - Admin panel for managing lineup
require '../logic/admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin Dashboard - Manage Lineup | EchoFest</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">
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