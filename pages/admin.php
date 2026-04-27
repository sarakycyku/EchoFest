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

<div class="charts-grid">
        <div class="chart-panel">
            <div class="chart-header">
                <h3><i class="fas fa-chart-pie"></i> Ticket distribution <span class="static-badge">static demo</span></h3>
                <span class="chart-badge">sold / comp</span>
            </div>
            <canvas id="ticketChart" width="400" height="200"></canvas>
            <div class="chart-footer-stats">
                <span><span class="dot sold-dot"></span> Sold: 3,200</span>
                <span><span class="dot free-dot"></span> Free: 1,800</span>
            </div>
        </div>

        <div class="chart-panel">
            <div class="chart-header">
                <h3><i class="fas fa-user-clock"></i> User presence <span class="static-badge">static demo</span></h3>
                <span class="chart-badge">visual only</span>
            </div>
            <canvas id="userChart" width="400" height="200"></canvas>
            <div class="chart-footer-stats">
                <span><i class="fas fa-circle"></i> Online: 120</span>
                <span><i class="fas fa-circle-off"></i> Offline: 80</span>
            </div>
        </div>

        <div class="chart-panel">
            <div class="chart-header">
                <h3><i class="fas fa-chart-line"></i> Engagement trend <span class="static-badge">static demo</span></h3>
                <span class="chart-badge">peak → Fri</span>
            </div>
            <canvas id="engagementChart" width="400" height="200"></canvas>
            <div class="chart-footer-stats">
                <i class="fas fa-calendar-week"></i> Mon 20% → Fri 80%
            </div>
        </div>
    </div>

 <div class="double-grid">
        <div class="chart-panel">
            <div class="chart-header">
                <h3><i class="fas fa-chart-simple"></i> Artist performance <span class="static-badge">static demo</span></h3>
                <span class="chart-badge">DJ Snake top</span>
            </div>
            <canvas id="artistChart" width="400" height="220"></canvas>
            <div class="chart-footer-stats">
                <i class="fas fa-headphones"></i> Based on demo metrics
            </div>
        </div>
        <div class="chart-panel">
            <div class="chart-header">
                <h3><i class="fas fa-chart-radar"></i> Event intensity <span class="static-badge">static demo</span></h3>
                <span class="chart-badge">day 4 peak</span>
            </div>
            <canvas id="eventRadarChart" width="400" height="220"></canvas>
            <div class="chart-footer-stats">
                <i class="fas fa-calendar-alt"></i> Day 4 → 90% intensity
            </div>
        </div>
    </div>

    <div class="info-strip">
        <div><i class="fas fa-info-circle"></i> Charts display STATIC demo data for visual design</div>
        <div><i class="fas fa-database"></i> Export button uses REAL data from your database</div>
        <div><i class="fas fa-chart-simple"></i> Real revenue: €<?php echo number_format($revenue); ?> | Real tickets: <?php echo $totalTicketsSold; ?></div>
    </div>
</div>
<script>
// ALL CHARTS USE STATIC DATA
(function() {

    const staticTicketSold = 3000;
    const staticTicketFree = 2000;
    const staticOnline = 120;
    const staticOffline = 80;
    const staticEngagement = [20, 50, 30, 80, 60];
    const staticArtistScores = [94, 88, 92, 96, 85, 89, 93, 91];
    const staticArtistLabels = ['Dua Lipa', 'Rita Ora', 'Martin Garrix', 'The Weeknd', 'Billie Eilish', 'Ed Sheeran', 'Rihanna', 'Taylor Swift'];
    const staticEventScores = [65, 80, 90];


    new Chart(document.getElementById('ticketChart'), {
        type: 'doughnut',
        data: {
            labels: ['Sold Tickets', 'Free Tickets'],
            datasets: [{
                data: [staticTicketSold, staticTicketFree],
                backgroundColor: ['#8b5cf6', '#1e293b'],
                borderWidth: 0,
                borderRadius: 4
            }]
        },
        options: {
            responsive: true,
            maintainAspectRatio: true,
            cutout: '70%',
            plugins: { legend: { display: false } }
        }
    });


    new Chart(document.getElementById('userChart'), {
        type: 'bar',
        data: {
            labels: ['Online Users', 'Offline Users'],
            datasets: [{
                data: [staticOnline, staticOffline],
                backgroundColor: ['#8b5cf6', '#334155'],
                borderRadius: 6
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { grid: { display: false } },
                y: { grid: { color: 'rgba(255,255,255,0.05)' } }
            }
        }
    });


</script>
</body>
</html>