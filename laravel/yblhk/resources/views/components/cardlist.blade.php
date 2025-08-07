<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<div class="chart-container">
    <div>
        <h3>Grafik Semua Laporan Berdasarkan Status</h3>
        <canvas id="laporanChart"></canvas>
    </div>
    <div>
        <h3>Grafik Semua Laporan Berdasarkan Kategori Laporan</h3>
        <canvas id="kategoriChart"></canvas>
    </div>
    <div>
        <h3>Grafik Trend Status per Bulan</h3>
        <canvas id="trendStatusChart"></canvas>
    </div>
    <div>
        <h3>Grafik Penyelesaian Kasus Perbulan</h3>
        <canvas id="donutChart"></canvas>
    </div>
    <div>
        <h3>Grafik Line Jumlah Laporan Perbulan</h3>
        <canvas id="cartesianChart"></canvas>
    </div>
    @if(Auth::user()->level==="admin")
    <div>
        <h3>Grafik Laporan berdasarkan umur</h3>
        <canvas id="umurChart"></canvas>
    </div>
    <div>
        <h3>Grafik Laporan berdasarkan Gender</h3>
        <canvas id="genderChart"></canvas>
    </div>
    <div>
        <h3>Grafik Laporan kategori laporan berdasarkan umur</h3>
        <canvas id="kategoriUmurChart"></canvas>
    </div>
    <div>
        <h3>Grafik Laporan berdasarkan kategori laporan berdasarkan gender</h3>
        <canvas id="kategoriGenderChart"></canvas>
    </div>
    @endif
</div>
@if(Auth::user()->level === 'admin')
<script>
    const dataByAge = @json($dataByAge);
    const dataByGender = @json($dataByGender);
    const categoryGenderMax = @json($categoryGenderMax->values());
    const categoryAgeMax = @json($categoryAgeMax->values());
</script>
@endif

<script>
    const softGridColor = '#e0e0e0';
    const textColor = '#333';

    const dataPolar = {
        labels: @json($data->keys()),
        datasets: [{
            label: 'Jumlah Laporan',
            data: @json($data->values()),
            backgroundColor: [
                '#FF6384', '#36A2EB', '#FFCE56', '#4BC0C0', '#9966FF'
            ],
            borderColor: 'white',
            borderWidth: 1
        }]
    };

    const dataCartesian = {
        labels: @json($dataLine->keys()),
        datasets: [{
            label: 'Jumlah Data per Bulan',
            data: @json($dataLine->values()),
            fill: false,
            borderColor: '#36A2EB',
            backgroundColor: '#36A2EB',
            tension: 0.4,
            pointBackgroundColor: 'white',
            pointBorderColor: '#36A2EB',
            pointBorderWidth: 2,
        }]
    };

    new Chart(document.getElementById('laporanChart').getContext('2d'), {
        type: 'polarArea',
        data: dataPolar,
        options: {
            responsive: true,
            scales: {
                r: {
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        color: softGridColor
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: textColor
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('cartesianChart').getContext('2d'), {
        type: 'line',
        data: dataCartesian,
        options: {
            responsive: true,
            scales: {
                x: {
                    title: {
                        display: true,
                        text: 'Bulan',
                        color: textColor
                    },
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        color: softGridColor
                    }
                },
                y: {
                    beginAtZero: true,
                    title: {
                        display: true,
                        text: 'Jumlah Laporan',
                        color: textColor
                    },
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        color: softGridColor
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: textColor
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('kategoriChart').getContext('2d'), {
        type: 'bar',
        data: {
            labels: @json(array_keys($dataKategori->toArray())),
            datasets: [{
                label: 'Jumlah Laporan',
                data: @json(array_values($dataKategori->toArray())),
                backgroundColor: '#4BC0C0'
            }]
        },
        options: {
            responsive: true,
            scales: {
                x: {
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        color: softGridColor
                    }
                },
                y: {
                    beginAtZero: true,
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        color: softGridColor
                    }
                }
            },
            plugins: {
                legend: {
                    labels: {
                        color: textColor
                    }
                }
            }
        }
    });

    new Chart(document.getElementById('trendStatusChart').getContext('2d'), {
        type: 'line',
        data: {
            labels: @json(array_values(collect($dataLine->keys())->unique()->toArray())),
            datasets: [
                @foreach($dataStatusBulanan as $status => $records) {
                    label: '{{ $status }}',
                    data: @json(array_values($records->pluck('total')->toArray())),
                    fill: false,
                    borderColor: '{{ sprintf("#%06X", mt_rand(0, 0xFFFFFF)) }}',
                    tension: 0.4
                },
                @endforeach
            ]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: textColor
                    }
                }
            },
            scales: {
                x: {
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        color: softGridColor
                    }
                },
                y: {
                    ticks: {
                        color: textColor
                    },
                    grid: {
                        color: softGridColor
                    }
                }
            }
        }
    });

    const donutChart = new Chart(document.getElementById('donutChart').getContext('2d'), {
        type: 'doughnut',
        data: {
            labels: ['Selesai', 'Belum Selesai'],
            datasets: [{
                label: 'Status Penyelesaian',
                data: [{{ $totalSelesai }}, {{ $totalPending }}],
                backgroundColor: ['#4CAF50', '#FF9800'],
            }]
        },
        options: {
            responsive: true,
            plugins: {
                legend: {
                    labels: {
                        color: 'black' 
                    }
                }
            }
        }
    });
    

    new Chart(document.getElementById('umurChart'), {
        type: 'bar',
        data: {
            labels: dataByAge.map(d => d.umur + ' thn'),
            datasets: [{
                label: 'Jumlah Pelapor',
                data: dataByAge.map(d => d.total_pelapor),
                backgroundColor: 'rgba(54, 162, 235, 0.6)'
            }]
        },
        options: {
            responsive: true,
            plugins: { title: { display: true, text: 'Pelapor Berdasarkan Umur' } }
        }
    });



    new Chart(document.getElementById('genderChart'), {
        type: 'pie',
        data: {
            labels: dataByGender.map(d => d.gender),
            datasets: [{
                data: dataByGender.map(d => d.total_pelapor),
                backgroundColor: ['#36A2EB', '#FF6384', '#FFCE56']
            }]
        },
        options: {
            responsive: true,
            plugins: { title: { display: true, text: 'Pelapor Berdasarkan Gender' } }
        }
    });
    
const totalGender = categoryGenderMax.reduce((sum, d) => sum + d.jumlah, 0);
const sortedGenderData = [...categoryGenderMax].sort((a, b) => b.jumlah - a.jumlah);

const getColor = (index) => {
    switch (index) {
        case 0: return 'gold';       
        case 1: return 'silver';     
        case 2: return '#cd7f32';    
        default: return 'rgba(255, 99, 132, 0.6)';
    }
};

new Chart(document.getElementById('kategoriGenderChart'), {
    type: 'bar',
    data: {
        labels: categoryGenderMax.map(d => d.kategori_pelapor),
        datasets: [{
            label: 'Gender Terbanyak',
            data: categoryGenderMax.map(d => d.jumlah),
            backgroundColor: categoryGenderMax.map((d, i) => {
                const rank = sortedGenderData.findIndex(x => x.kategori_pelapor === d.kategori_pelapor);
                return getColor(rank);
            })
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: { display: true, text: 'Kategori Pelapor vs Gender Terbanyak' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const index = context.dataIndex;
                        const data = categoryGenderMax[index];
                        const jumlah = data.jumlah;
                        const persen = ((jumlah / totalGender) * 100).toFixed(1);
                        const rank = sortedGenderData.findIndex(x => x.kategori_pelapor === data.kategori_pelapor) + 1;
                        return `#${rank} ${data.kategori_pelapor}\nGender: ${data.gender}\nJumlah: ${jumlah} (${persen}%)`;
                    }
                }
            }
        }
    }
});

const totalUmur = categoryAgeMax.reduce((sum, d) => sum + d.jumlah, 0);

const sortedAgeData = [...categoryAgeMax].sort((a, b) => b.jumlah - a.jumlah);

const getAgeColor = (index) => {
    switch (index) {
        case 0: return 'gold';
        case 1: return 'silver';
        case 2: return '#cd7f32';
        default: return 'rgba(153, 102, 255, 0.6)';
    }
};

new Chart(document.getElementById('kategoriUmurChart'), {
    type: 'bar',
    data: {
        labels: categoryAgeMax.map(d => d.kategori_pelapor),
        datasets: [{
            label: 'Umur Terbanyak',
            data: categoryAgeMax.map(d => d.jumlah),
            backgroundColor: categoryAgeMax.map((d, i) => {
                const rank = sortedAgeData.findIndex(x => x.kategori_pelapor === d.kategori_pelapor);
                return getAgeColor(rank);
            })
        }]
    },
    options: {
        responsive: true,
        plugins: {
            title: { display: true, text: 'Kategori Pelapor vs Umur Terbanyak' },
            tooltip: {
                callbacks: {
                    label: function(context) {
                        const data = categoryAgeMax[context.dataIndex];
                        const persen = ((data.jumlah / totalUmur) * 100).toFixed(1);
                        const rank = sortedAgeData.findIndex(x => x.kategori_pelapor === data.kategori_pelapor) + 1;
                        return `#${rank} ${data.kategori_pelapor}\nUmur: ${data.umur}\nJumlah: ${data.jumlah} (${persen}%)`;
                    }
                }
            }
        }
    }
});

</script>