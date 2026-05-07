<?php include '../includes/header.php';

if (!isset($_SESSION['username']) || $_SESSION['role'] !== 'admin') {
    header("Location: ../pages/login.php");
    exit;
}

$tickets = json_decode(file_get_contents('../data/tickets.json'), true);
?>
<link rel="stylesheet" href="../assets/css/admin_tickets.css">

<div class="admin-wrap">
    <div class="admin-header">
        <h1 class="admin-title">Manage Tickets</h1>
        <p class="admin-sub">Add, enable, disable or delete ticket types</p>
    </div>

    <!--me shtu ticket -->
    <div class="add-card">
        <div class="add-title">Add New Ticket</div>
        <form method="POST" action="../logic/admin_tickets_logic.php" class="add-form">
            <input type="hidden" name="action" value="add">

            <div class="add-grid">
                <div class="add-field">
                    <label>ID <span class="req">*</span></label>
                    <input type="text" name="id" placeholder="p.sh. premium" required>
                </div>
                <div class="add-field">
                    <label>Name <span class="req">*</span></label>
                    <input type="text" name="name" placeholder="p.sh. Premium Pass" required>
                </div>
                <div class="add-field">
                    <label>Price (€) <span class="req">*</span></label>
                    <input type="number" name="price" placeholder="199" min="1" required>
                </div>
                <div class="add-field">
                    <label>Coming Date</label>
                    <input type="text" name="coming_date" placeholder="Coming July 1, 2026">
                </div>
                <div class="add-field">
                    <label>Image path</label>
                    <input type="text" name="img_src" placeholder="../assets/images/ticket4.jpg">
                </div>
                <div class="add-field full">
                    <label>Description <span class="req">*</span></label>
                    <textarea name="desc" placeholder="Describe this ticket type..." required></textarea>
                </div>
            </div>

            <button class="btn-add">+ Add Ticket</button>
        </form>
    </div>
    <!-- tickets ekzistuese -->
    <div class="tickets-grid">
        <?php foreach ($tickets as $t): ?>
            <div class="ticket-row <?= $t['available'] ? 'enabled' : 'disabled' ?>">

                <div class="ticket-info">
                    <div class="ticket-name"><?= $t['name'] ?></div>
                    <div class="ticket-price">€<?= $t['price'] ?></div>
                    <?php if ($t['coming_date']): ?>
                        <div class="ticket-coming"><?= $t['coming_date'] ?></div>
                    <?php endif; ?>
                </div>

                <div class="ticket-status">
                    <span class="status-badge <?= $t['available'] ? 'badge-on' : 'badge-off' ?>">
                        <?= $t['available'] ? 'Enabled' : 'Disabled' ?>
                    </span>
                </div>
                
                 <div class="ticket-actions">
                    <!-- per toggle enable/disable -->
                    <form method="POST" action="../logic/admin_tickets_logic.php">
                        <input type="hidden" name="id" value="<?= $t['id'] ?>">
                        <input type="hidden" name="action" value="<?= $t['available'] ? 'disable' : 'enable' ?>">
                        <label class="toggle">
                            <input type="checkbox" <?= $t['available'] ? 'checked' : '' ?> onchange="this.form.submit()">
                            <span class="slider"></span>
                        </label>
                    </form>
                    
                     <!-- delete -->
                    <form method="POST" action="../logic/admin_tickets_logic.php">
                        <input type="hidden" name="id" value="<?= $t['id'] ?>">
                        <input type="hidden" name="action" value="delete">
                        <button class="btn-delete" type="submit">Delete</button>
                    </form>

                </div>

            </div>
        <?php endforeach; ?>
    </div>
</div>
<?php include '../includes/footer.php'; ?>