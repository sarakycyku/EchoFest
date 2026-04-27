<?php require '../logic/admin.php'; ?>

<!DOCTYPE html>
<html>
<head>
<meta charset="UTF-8">
<title>EchoFest Admin Panel</title>

<link rel="stylesheet" href="../assets/css/admin.css">
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
</head>

<body>


<?php require '../includes/admin_header.php'; ?>
<div class="header">
    <div>
        <h1>Dashboard <span class="neon">Overview</span></h1>
        <p style="font-size:12px;color:#9ca3af;margin-top:4px;">
            Real-time analytics & system performance
        </p>
    </div>
<div>
        Admin: <?= htmlspecialchars($current_admin) ?>
        <a class="btn" id="export" href="?download_report=1">Export CSV</a>
    </div>
</div>
<div class="stats-grid">

    <div class="stat-box"><h4>Artists</h4><div class="num"><?= $totalArtists ?></div></div>
    <div class="stat-box"><h4>Events</h4><div class="num"><?= $totalEvents ?></div></div>
    <div class="stat-box"><h4>Users</h4><div class="num"><?= $totalUsers ?></div></div>
    <div class="stat-box"><h4>Stages</h4><div class="num"><?= $uniqueStages ?></div></div>
    <div class="stat-box"><h4>Engagement</h4><div class="num"><?= $engagementScore ?></div></div>

</div>
<div class="grid">

<div class="card">
    <h3>Revenue</h3>
    <div class="big">$<?= $totalTicketsSold * 50 ?></div>
</div>

<div class="card"><canvas id="ticket"></canvas></div>
<div class="card"><canvas id="users"></canvas></div>
<div class="card"><canvas id="engagement"></canvas></div>
<div class="card"><canvas id="artists"></canvas></div>
<div class="card"><canvas id="events"></canvas></div>

</div>
<script>
const lineup = <?= json_encode($lineup) ?>;
const events = <?= json_encode($events) ?>;


new Chart(document.getElementById('ticket'), {
type:'doughnut',
data:{
labels:['Sold Tickets','Free Tickets'],
datasets:[{
label:'Tickets',
data:[<?= $totalTicketsSold ?>, <?= $available ?>],
backgroundColor:['#8b5cf6','#222']
}]
},
options:{plugins:{legend:{display:true, labels:{color:'#fff'}}}}
});

new Chart(document.getElementById('users'), {
type:'bar',
data:{
labels:['Online Users','Offline Users'],
datasets:[{
label:'Users',
data:[<?= $online ?>, <?= $offline ?>],
backgroundColor:['#8b5cf6','#333']
}]
},
options:{plugins:{legend:{display:true, labels:{color:'#fff'}}}}
});


new Chart(document.getElementById('engagement'), {
type:'line',
data:{
labels:['1','2','3','4','5'],
datasets:[{
label:'Engagement Trend',
data:[20,50,30,80,60],
borderColor:'#8b5cf6',
fill:true,
backgroundColor:'rgba(139,92,246,0.2)'
}]
},
options:{plugins:{legend:{display:true, labels:{color:'#fff'}}}}
});


