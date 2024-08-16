<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <div class="content-wrapper">
            <div class="content-header">
                <div class="container-fluid">
                    <div class="row">
                    </div>
                </div>
            </div>
            <div class="container-fluid">
                <div class="row">
                    <!-- Bar Chart -->
                    <div class="col-lg-6 col-md-12 chart-container">
                        <div class="card card-success">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Dusun</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="dusunChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                    <!-- Agama Chart -->
                    <div class="col-lg-6 col-md-12 chart-container">
                        <div class="card card-danger">
                            <div class="card-header">
                                <h3 class="card-title">Grafik Agama</h3>
                            </div>
                            <div class="card-body">
                                <div class="chart">
                                    <canvas id="agamaChart"></canvas>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>

<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    // Data untuk chart
    var umurData = <?php echo json_encode(array_values($chartData['umur'])); ?>;
    var umurLabels = <?php echo json_encode(array_keys($chartData['umur'])); ?>;
    
    var rwData = <?php echo json_encode(array_values($chartData['rw'])); ?>;
    var rwLabels = <?php echo json_encode(array_keys($chartData['rw'])); ?>;
    
    var rtData = <?php echo json_encode(array_values($chartData['rt'])); ?>;
    var rtLabels = <?php echo json_encode(array_keys($chartData['rt'])); ?>;
    
    var dusunData = <?php echo json_encode(array_values($chartData['dusun'])); ?>;
    var dusunLabels = <?php echo json_encode(array_keys($chartData['dusun'])); ?>;

    var agamaData = <?php echo json_encode(array_values($chartData['agama'])); ?>;
    var agamaLabels = <?php echo json_encode(array_keys($chartData['agama'])); ?>;

    // Chart umur
    var dusunCtx = document.getElementById('dusunChart').getContext('2d');
    var dusunChart = new Chart(dusunCtx, {
        type: 'pie',
        data: {
            labels: dusunLabels,
            datasets: [{
                label: 'Jumlah Penduduk Berdasarkan dusun',
                data: dusunData,
                backgroundColor: [
                    'rgba(54, 162, 235, 0.2)',
                    'rgba(255, 99, 132, 0.2)',
                    'rgba(255, 206, 86, 0.2)',
                    'rgba(75, 192, 192, 0.2)',
                    'rgba(153, 102, 255, 0.2)',
                    'rgba(255, 159, 64, 0.2)'
                ],
                borderColor: [
                    'rgba(54, 162, 235, 1)',
                    'rgba(255, 99, 132, 1)',
                    'rgba(255, 206, 86, 1)',
                    'rgba(75, 192, 192, 1)',
                    'rgba(153, 102, 255, 1)',
                    'rgba(255, 159, 64, 1)'
                ],
                borderWidth: 1
            }]
        },
        options: {
            scales: {
                y: {
                    beginAtZero: true
                }
            },
        }
    });

    const ctx = document.getElementById('agamaChart').getContext('2d');

// Chart Configuration
const chartConfig = {
    type: 'bar',
    data: {
        labels: <?php echo json_encode(array_keys($chartData['agama'])); ?>,
        datasets: [{
            label: 'Jumlah Penduduk Berdasarkan Agama', // Added dataset label here
            backgroundColor: [
                'rgba(54, 162, 235, 0.2)',
                'rgba(255, 99, 132, 0.2)',
                'rgba(255, 206, 86, 0.2)',
                'rgba(75, 192, 192, 0.2)',
                'rgba(153, 102, 255, 0.2)',
                'rgba(255, 159, 64, 0.2)'
            ],
            borderColor: [
                'rgba(54, 162, 235, 1)',
                'rgba(255, 99, 132, 1)',
                'rgba(255, 206, 86, 1)',
                'rgba(75, 192, 192, 1)',
                'rgba(153, 102, 255, 1)',
                'rgba(255, 159, 64, 1)'
            ],
            borderWidth: 1,
            data: <?php echo json_encode(array_values($chartData['agama'])); ?>
        }]
    },
    options: {
        responsive: true,
        plugins: {
            legend: {
                position: 'top',
            },
            tooltip: {
                callbacks: {
                    label: (tooltipItem) => `${tooltipItem.label}: ${tooltipItem.raw}`
                }
            }
        }
    }
};

// Create the chart
new Chart(ctx, chartConfig);



</script>
</body>
