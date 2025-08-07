<div class="row mt-5">
    <div class="col-md-12 col-xl-12 mb-4">
        <h5 class="text-center">Grafik Absensi</h5>
        <canvas id="pieChart" style="max-width: 100%; height: auto;"></canvas>
    </div>
</div>

<table class="table table-bordered">
    <thead class="table-light">
        <tr>
            <th>Mata Kuliah</th>
            <th>Kode Kelas</th>
            <th>Nilai Absen</th>
        </tr>
    </thead>
    <tbody>
        @forelse($scores as $item)
        <tr>
            <td>{{ $item['matakuliah'] }}</td>
            <td>{{ $item['kelas']->kode_kelas }}</td>
            <td>
                <span class="badge bg-{{ $item['score'] >= 75 ? 'success' : ($item['score'] >= 50 ? 'warning' : 'danger') }}">
                    {{ $item['score'] }}%
                </span>
            </td>
        </tr>
        @empty
        <tr>
            <td colspan="3" class="text-center">Tidak ada data kelas</td>
        </tr>
        @endforelse
    </tbody>
</table>



<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
<script>
    document.addEventListener('DOMContentLoaded', function () {
        const labels = {!! json_encode(collect($scores)->pluck('matakuliah')) !!};
        const data = {!! json_encode(collect($scores)->pluck('score')) !!};

        const backgroundColors = data.map(score => {
            if (score >= 75) return 'rgba(40, 167, 69, 0.7)';     // green
            if (score >= 50) return 'rgba(255, 193, 7, 0.7)';     // yellow
            return 'rgba(220, 53, 69, 0.7)';                      // red
        });

        const borderColors = backgroundColors.map(c => c.replace('0.7', '1'));

        const dataset = {
            labels: labels,
            datasets: [{
                label: 'Nilai Absen (%)',
                data: data,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            }]
        };


        new Chart(document.getElementById('pieChart'), {
            type: 'pie',
            data: dataset,
            options: {
                responsive: true,
                plugins: {
                    legend: {
                        position: 'bottom',
                        labels: {
                            boxWidth: 50
                        }
                    },
                    tooltip: {
                        callbacks: {
                            label: function (ctx) {
                                return `${ctx.label}: ${ctx.parsed}%`;
                            }
                        }
                    }
                }
            }
        });
    });
</script>
