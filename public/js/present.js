document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('presentChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [
                {
                    label: 'Hadir',
                    data: [300, 296, 488, 490, 495, 477, 467],
                    borderColor: 'rgb(75, 192, 192)',
                    backgroundColor: 'rgba(75, 192, 192, 0.2)',
                    fill: false,
                    tension: 0.3
                }
            ]
        },
        options: {
            responsive: true,
            maintainAspectRatio: false,
            scales: {
                y: {
                    beginAtZero: true,
                    min: 0,
                    max: 500
                }
            },
            plugins: {
                legend: {
                    position: 'top'
                },
                title: {
                    display: false
                }
            }
        }
    });
});
