@php
    $user = Auth::user();
@endphp

<!-- CHART HTML -->
<div class="content-wrapper">

    <div class="row">
 <!-- Pie Chart -->
  
    @if(Auth::user()->role->role_name==="hr")
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Total Tugas Perdivsi </h4>
                    <div class="doughnutjs-wrapper d-flex justify-content-center">
                        <canvas id="pieChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
        @endif
        <!-- Doughnut Chart -->
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Tugas Anda berdasarkan Statusnya</h4>
                    <div class="doughnutjs-wrapper d-flex justify-content-center">
                        <canvas id="doughnutChart"></canvas>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="row">
        <div class="col-lg-6 grid-margin stretch-card">
            <div class="card">
                <div class="card-body">
                    <h4 class="card-title">Line Chart - Absensi Harian</h4>
                    <canvas id="jamMasukLineChart" style="height:250px"></canvas>
                </div>
            </div>
        </div>
    <!-- Line Chart Absensi Mingguan -->
      @if(Auth::user()->role->role_name==="hr")
    <div class="col-lg-6 grid-margin stretch-card">
        <div class="card">
            <div class="card-body">
                <h4 class="card-title">Line Chart - Absensi Mingguan</h4>
                <canvas id="lineChartWeek" style="height:250px"></canvas>
            </div>
        </div>
    </div>
    @endif
</div>

   
</div>
@php
    use Illuminate\Support\Facades\Auth;
    $user = Auth::user();
@endphp
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    window.chartInstances = window.chartInstances || {};

    function renderChart(canvasId, config) {
        const canvas = document.getElementById(canvasId);
        if (!canvas) {
            console.warn(`⚠️ Canvas '${canvasId}' tidak ditemukan.`);
            return;
        }

        const ctx = canvas.getContext('2d');
        const existing = Chart.getChart(canvas);
        if (existing) {
            console.log(`🧹 Destroy existing chart on: ${canvasId}`);
            existing.destroy();
        }

        console.log(`✅ Creating new chart: ${canvasId}`);
        window.chartInstances[canvasId] = new Chart(ctx, config);
    }

    window.addEventListener("load", function () {
        console.log("📊 Initializing all charts...");

        
        const absensiMonth = @json($chartData['absensi_user_month'] ?? $chartData['absensi_hr_month'] ?? []);
        const taskUser = @json($chartData['task_user'] ?? $chartData['task_hr'] ?? []);
        const jamMasuk = @json($chartData['jam_masuk_user'] ?? []);
        const absensiWeek = @json($chartData['absensi_user_week'] ?? $chartData['absensi_week'] ?? []);


renderChart("lineChartWeek", {
    type: 'line',
    data: {
        labels: Object.keys(absensiWeek),
        datasets: [{
            label: 'Absensi Mingguan',
            data: Object.values(absensiWeek),
            borderColor: '#4b49ac',
            backgroundColor: 'rgba(75, 73, 172, 0.3)',
            fill: true,
            tension: 0.3,
            pointRadius: 4,
            pointHoverRadius: 6
        }]
    },
    options: {
        scales: {
            x: {
                title: {
                    display: true,
                    text: 'Tanggal'
                }
            },
            y: {
                beginAtZero: true,
                title: {
                    display: true,
                    text: 'Jumlah Absensi'
                },
                ticks: {
                    stepSize: 1
                }
            }
        },
        responsive: true,
        plugins: {
            legend: {
                display: true
            },
            tooltip: {
                enabled: true
            }
        }
    }
});
       



        renderChart("doughnutChart", {
            type: 'doughnut',
              label: 'Total tugas anda berdasarkan status',
            data: {
                labels: Object.keys(taskUser),
                datasets: [{
                    label: 'Task User',
                    data: Object.values(taskUser),
                    backgroundColor: ['#4b49ac', '#ff4747', '#28a745']
                }]
            }
        });

        @if ($user->role->role_name === 'hr')
            const taskDivisi = @json($chartData['task_divisi'] ?? []);
            const divisiLabels = Object.keys(taskDivisi);
            const divisiData = divisiLabels.map(label =>
                Object.values(taskDivisi[label]).reduce((a, b) => a + b, 0)
            );

            renderChart("pieChart", {
                type: 'pie',
                 label: 'Total tugas berdasarkan statusnya pada semua divisi',
                data: {
                    labels: divisiLabels,
                    datasets: [{
                        label: 'Total Task per Divisi',
                        data: divisiData,
                        backgroundColor: ['#4b49ac', '#ff4747', '#28a745', '#f39c12', '#17a2b8']
                    }]
                }
            });
        @endif

        renderChart("jamMasukLineChart", {
            type: 'line',
            data: {
                labels: Object.keys(jamMasuk),
                datasets: [{
                    label: 'Jam absen Perhari anda',
                    data: Object.values(jamMasuk),
                    borderColor: '#17a2b8',
                    backgroundColor: 'rgba(23, 162, 184, 0.2)',
                    fill: true,
                    tension: 0.3
                }]
            },
            options: {
                scales: {
                    y: {
                        title: {
                            display: true,
                            text: 'Jam (dalam format desimal)' // mis. 08:15 = 8.25
                        },
                        suggestedMin: 6,
                        suggestedMax: 10
                    }
                }
            }
        });
    });
</script>
