<?php
include '../includes/admin_header.php';

include '../logic/admin.php';
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ECHOFEST ADMIN | Dashboard</title>
    <script src="https://cdn.jsdelivr.net/npm/chart.js@4.4.0/dist/chart.umd.min.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta3/css/all.min.css">
    <link rel="stylesheet" href="../assets/css/admin.css">

</head>
<body>
<div class="dashboard-container">
    <div class="dashboard-header">
        <div class="title-section">
            <h1><i style="color: #8b5cf6; margin-right: 10px;"></i>ECHOFEST · Admin Dashboard</h1>
            <div class="badge">
                <i class="fas fa-chart-line"></i> CHARTS: STATIC DEMO DATA
                <i class="fas fa-file-export" style="margin-left: 8px;"></i> EXPORT: REAL DATA
            </div>
        </div>
        <div class="header-actions">
            <div class="live-indicator">
                <i class="fas fa-circle" style="color:#10b981;"></i>
                <?php echo htmlspecialchars($current_admin); ?>
            </div>
            <a href="?download_report=1" class="btn-export-form">
                <i class="fas fa-file-csv"></i> EXPORT REAL DATA (CSV)
            </a>
            <form method="POST" style="display: inline;">
                <button type="submit" name="export_report" value="1" class="btn-export-form">
                    <i class="fas fa-download"></i> EXPORT (POST)
                </button>
            </form>
        </div>
    </div>

  <!-- KPI Cards (mixed: static values for visual, but tooltip shows real) -->
    <div class="kpi-grid">
        <div class="kpi-card">
            <div class="kpi-icon"><i class="fas fa-ticket-alt"></i></div>
            <div class="kpi-content">
                <div class="kpi-title">TICKETS SOLD <span class="static-badge">demo</span></div>
                <div class="kpi-number">3000 / 5,000</div>
                <div class="kpi-trend"><i class="fas fa-chart-line"></i> Real: <?php echo number_format($totalTicketsSold); ?> sold</div>
            </div>
        </div>
        <div class="kpi-card">
            <div class="kpi-icon"><i class="fas fa-users"></i></div>
            <div class="kpi-content">
                <div class="kpi-title">USER ACTIVITY <span class="static-badge">demo</span></div>
                <div class="kpi-number">120 / 200</div>
                <div class="kpi-trend"><i class="fas fa-wifi"></i> Real: <?php echo $online; ?> online / <?php echo $offline; ?> offline</div>
            </div>
        </div>
        <div class="kpi-card">
            <div class="kpi-icon"><i class="fas fa-microphone-alt"></i></div>
            <div class="kpi-content">
                <div class="kpi-title">ARTISTS <span class="static-badge">demo</span></div>
                <div class="kpi-number">4 featured</div>
                <div class="kpi-trend"><i class="fas fa-map-marker-alt"></i> Real: <?php echo $totalArtists; ?> artists</div>
            </div>
        </div>
        <div class="kpi-card">
            <div class="kpi-icon"><i class="fas fa-chart-line"></i></div>
            <div class="kpi-content">
                <div class="kpi-title">ENGAGEMENT <span class="static-badge">demo</span></div>
                <div class="kpi-number">80% peak</div>
                <div class="kpi-trend"><i class="fas fa-calendar"></i> Real revenue: €<?php echo number_format($revenue); ?></div>
            </div>
        </div>
    </div>