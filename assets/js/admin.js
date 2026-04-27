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


    new Chart(document.getElementById('engagementChart'), {
        type: 'line',
        data: {
            labels: ['Mon', 'Tue', 'Wed', 'Thu', 'Fri'],
            datasets: [{
                data: staticEngagement,
                borderColor: '#a78bfa',
                backgroundColor: 'rgba(139,92,246,0.1)',
                borderWidth: 2.5,
                fill: true,
                tension: 0.3,
                pointBackgroundColor: '#8b5cf6',
                pointBorderColor: '#0f172a',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } }
        }
    });


    new Chart(document.getElementById('artistChart'), {
        type: 'bar',
        data: {
            labels: staticArtistLabels,
            datasets: [{
                data: staticArtistScores,
                backgroundColor: '#8b5cf6',
                borderRadius: 6
            }]
        },
        options: {
            indexAxis: 'y',
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                x: { max: 100, ticks: { callback: (v) => v + '%' } }
            }
        }
    });


    new Chart(document.getElementById('eventRadarChart'), {
        type: 'radar',
        data: {
            labels: ['Day 1', 'Day 2', 'Day 3'],
            datasets: [{
                data: staticEventScores,
                borderColor: '#c084fc',
                backgroundColor: 'rgba(139,92,246,0.2)',
                borderWidth: 2,
                pointBackgroundColor: '#8b5cf6',
                pointBorderColor: '#ffffff',
                pointRadius: 4
            }]
        },
        options: {
            responsive: true,
            plugins: { legend: { display: false } },
            scales: {
                r: {
                    ticks: { stepSize: 20 },
                    grid: { color: 'rgba(139,92,246,0.2)' }
                }
            }
        }
    });

})();