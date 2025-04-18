document.addEventListener("DOMContentLoaded", function () {
    const ctx = document.getElementById('absentChart').getContext('2d');

    new Chart(ctx, {
        type: 'line',
        data: {
            labels: ['Sen', 'Sel', 'Rab', 'Kam', 'Jum', 'Sab', 'Min'],
            datasets: [
                {
                    label: 'Izin',
                    data: [10, 5, 8, 6, 7, 4, 5],
                    borderColor: 'rgba(255, 206, 86, 0.8)',
                    backgroundColor: 'rgba(255, 206, 86, 0.8)',
                    fill: false,
                    tension: 0.3
                },
                {
                    label: 'Sakit',
                    data: [5, 3, 2, 4, 3, 2, 1],
                    borderColor: 'rgba(255, 99, 132, 0.8)',
                    backgroundColor: 'rgba(255, 99, 132, 0.8)',
                    fill: false,
                    tension: 0.3
                },
                {
                    label: 'Tanpa Keterangan',
                    data: [2, 6, 2, 3, 1, 2, 3],
                    borderColor: 'rgba(153, 102, 255, 0.8)',
                    backgroundColor: 'rgba(153, 102, 255, 0.8)',
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
                    max: 50
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
