<?php include("../logic/profile.php")?>
<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <title>Profile</title>
  <link rel="icon" type="image/x-icon" href="../assets/images/logo2-pabg.png">
  <link rel="stylesheet" href="../assets/css/profile.css">
</head>

<body>
<div class="pf-root">
    <div class="pf-particles" id="pf-particles"></div>

    <div class="pf-hero-wrap">
        <div class="pf-toprow">
            <div class="pf-brand">ECHO<span>FEST</span></div>
            <div class="pf-edition">2026 Edition</div>
        </div>

        <div class="pf-avatar-wrap">
            <div class="pf-avatar-ring">
                <div class="pf-avatar"><?= htmlspecialchars($user['initials']) ?></div>
            </div>
            <div>
                <div class="pf-name"><?= htmlspecialchars($user['name']) ?></div>
                <div class="pf-username"><?= htmlspecialchars($user['username']) ?></div>

                <div class="pf-badges">
                    <span class="pf-badge pf-badge-vip"><?= count($tickets) > 0 ? 'Ticket Holder' : 'Member' ?></span>
                    <span class="pf-badge pf-badge-cyan">All <?= $stats['days'] ?> Days</span>
                    <span class="pf-badge pf-badge-gray"><?= count($festivalStages) ?> Stages</span>
                </div>
            </div>
        </div>
    </div>

    <div class="pf-stats">
        <div class="pf-stat">
            <div class="pf-stat-num" id="s1"><?= $stats['days'] ?></div>
            <div class="pf-stat-lbl">Days</div>
        </div>
        <div class="pf-stat">
            <div class="pf-stat-num" id="s2"><?= $stats['tickets'] ?></div>
            <div class="pf-stat-lbl">Tickets</div>
        </div>
        <div class="pf-stat">
            <div class="pf-stat-num" id="s3"><?= $stats['artists'] ?></div>
            <div class="pf-stat-lbl">Artists</div>
        </div>
    </div>

    <div class="pf-card">
        <div class="pf-section-label">My Tickets</div>

        <?php if ($tickets): ?>
            <?php foreach ($tickets as $ticket): ?>
                <div class="pf-ticket pf-ticket-<?= htmlspecialchars($ticket['class']) ?>">
                    <div>
                        <div class="pf-ticket-name"><?= htmlspecialchars($ticket['type']) ?></div>
                        <div class="pf-ticket-meta"><?= htmlspecialchars($ticket['meta']) ?></div>
                    </div>
                    <div class="pf-ticket-ref pf-ticket-ref-<?= htmlspecialchars($ticket['class']) ?>">
                        <?= htmlspecialchars($ticket['ref']) ?>
                    </div>
                </div>
            <?php endforeach; ?>
        <?php else: ?>
            <div class="pf-ticket pf-ticket-ga">
                <div>
                    <div class="pf-ticket-name">No tickets yet</div>
                    <div class="pf-ticket-meta">Buy a ticket and it will show up here automatically.</div>
                </div>
                <div class="pf-ticket-ref pf-ticket-ref-ga">EMPTY</div>
            </div>
        <?php endif; ?>
    </div>

    <div class="pf-card">
        <div class="pf-section-label">Account Details</div>

        <div class="pf-row"><span class="pf-row-lbl">Full name</span><span class="pf-row-val"><?= htmlspecialchars($user['name']) ?></span></div>
        <div class="pf-row"><span class="pf-row-lbl">Username</span><span class="pf-row-val"><?= htmlspecialchars($user['username']) ?></span></div>
        <div class="pf-row"><span class="pf-row-lbl">Email</span><span class="pf-row-val dim"><?= htmlspecialchars($user['email']) ?></span></div>
        <div class="pf-row"><span class="pf-row-lbl">Phone</span><span class="pf-row-val dim"><?= htmlspecialchars($user['phone']) ?></span></div>
        <div class="pf-row"><span class="pf-row-lbl">Age</span><span class="pf-row-val"><?= htmlspecialchars((string) $user['age']) ?></span></div>
        <div class="pf-row"><span class="pf-row-lbl">Member since</span><span class="pf-row-val dim"><?= htmlspecialchars($user['member_since']) ?></span></div>
    </div>

    <div class="pf-card">
        <div class="pf-section-label">Favourite Artists</div>
        <div class="pf-artists">
            <?php foreach ($artists as $artist): ?>
                <span class="pf-pill"><?= htmlspecialchars($artist) ?></span>
            <?php endforeach; ?>
        </div>
    </div>

    <div class="pf-actions">
        <button class="pf-btn pf-btn-edit" onclick="window.location='../pages/edit_profile.php'">Edit Profile</button>
        <button class="pf-btn pf-btn-out" onclick="window.location='../logic/logout.php'">Log Out</button>
        <button class="pf-btn" onclick="confirmDelete()" style="background:rgba(220,50,50,0.1);color:#fca5a5;border:0.5px solid rgba(220,50,50,0.3);">Delete Account</button>
    </div>

    <div class="pf-footer"><?= htmlspecialchars($festivalInfo['dates']) ?> / <?= count($festivalStages) ?> Stages / <?= $stats['artists'] ?> Artists</div>
</div>

<script src="../assets/js/profile.js"></script>
<script>
window.stats = {
  days: <?= $stats['days'] ?>,
  tickets: <?= $stats['tickets'] ?>,
  artists: <?= $stats['artists'] ?>
};
</script>
<script>
function confirmDelete() {
    if (confirm("Are you sure you want to delete your account? This cannot be undone.")) {
        window.location = '../logic/delete_logic.php';
    }
}
</script>


</body>
</html>
<?php require_once '../includes/footer.php'; ?>
