<?= $this->extend('admin/layouts/app') ?>

<?= $this->section('content') ?>

<div class="page-content">
    <a href="#" class="burger-btn d-block d-xl-none">
        <i class="bi bi-justify fs-3"></i>
    </a>

    <div class="page-heading">
        <h3>Dashboard</h3>
    </div>

    <section class="row">
        <div class="col-12 col-lg-9">
            <div class="row">

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon purple">
                                        <i class="iconly-boldShow"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">User Visit</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?= isset($auth_logins) ? esc($auth_logins) : 'Data not available' ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon blue">
                                        <i class="iconly-boldProfile"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Total Users</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?= isset($users) ? esc(count($users)) : 'Data not available' ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon green">
                                        <i class="iconly-boldAdd-User"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">User Active</h6>
                                    <h6 class="font-extrabold mb-0">
                                        <?= isset($users) ? esc(count($users)) : 'Data not available' ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-6 col-lg-3 col-md-6">
                    <div class="card">
                        <div class="card-body px-3 py-4-5">
                            <div class="row">
                                <div class="col-md-4">
                                    <div class="stats-icon red">
                                        <i class="iconly-boldBookmark"></i>
                                    </div>
                                </div>
                                <div class="col-md-8">
                                    <h6 class="text-muted font-semibold">Shortened Url</h6>
                                    <h6>
                                        <?= isset($links) ? esc(count($links)) : 'Data not available' ?>
                                    </h6>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>

            <div class="col-12">
                <div class="card">

                    <div class="card-header">
                        <h4>User Per Bulan</h4>
                    </div>

                    <div class="card-body">
                        <div id="user-per-month-chart"></div>
                    </div>

                </div>
            </div>

            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Shortlink Per Bulan</h4>
                    </div>
                    <div class="card-body">
                        <div id="urls-per-month-chart"></div>
                    </div>
                </div>
            </div>

            <div class="row">
                <div class="col-12">
                    <div class="card">
                        <div class="card-header">
                            <h4>Unit Organisasi</h4>
                        </div>
                        <div class="card-body">
                            <div id="unit-organisasi-chart"></div>
                        </div>
                    </div>

                    <div class="card">
                        <div class="card-header">
                            <h4>Unit Kerja</h4>
                        </div>

                        <div class="card-body">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>No</th>
                                        <th>Unit Kerja</th>
                                        <th>Jumlah</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php $no = 1; ?>
                                    <?php foreach ($countUnitKerja as $unit => $count): ?>
                                        <tr>
                                            <td><?= $no++ ?></td>
                                            <td><?= esc($unit) ?></td>
                                            <td><?= esc($count) ?></td>
                                        <?php endforeach; ?>
                                </tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

</section>
</div>

<?= $this->endSection() ?>

<?= $this->section('javascript') ?>

<script>
    document.addEventListener('DOMContentLoaded', function () {
        var unitOrganisasiOptions = {
            series: [{
                name: 'Jumlah',
                data: [
                    <?php foreach ($countUnitOrganisasi as $unit => $count): ?>
                                                        <?= esc($count) ?>,
                    <?php endforeach; ?>
                ]
            }],
            chart: {
                type: 'bar',
                height: 350
            },
            plotOptions: {
                bar: {
                    horizontal: false,
                    columnWidth: '45%',
                    endingShape: 'rounded'
                },
            },
            dataLabels: {
                enabled: false
            },
            xaxis: {
                categories: [
                    <?php foreach ($countUnitOrganisasi as $unit => $count): ?>
                                                        '<?= esc($unit) ?>',
                    <?php endforeach; ?>
                ],
            },
            yaxis: {
                title: {
                    text: 'Jumlah'
                }
            },
            fill: {
                opacity: 1
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        };
        var unitOrganisasiChart = new ApexCharts(document.querySelector("#unit-organisasi-chart"), unitOrganisasiOptions);
        unitOrganisasiChart.render();

        var userPerMonthOptions = {
            series: [{
                name: 'Users',
                data: [
                    <?php foreach ($userPerMonth as $month => $count): ?>
                                                        <?= esc($count) ?>,
                    <?php endforeach; ?>
                ]
            }],
            chart: {
                type: 'line',
                height: 350
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: [
                    <?php foreach ($userPerMonth as $month => $count): ?>
                                                        '<?= esc($month) ?>',
                    <?php endforeach; ?>
                ],
            },
            yaxis: {
                title: {
                    text: 'Users'
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val
                    }
                }
            }
        };
        var userPerMonthChart = new ApexCharts(document.querySelector("#user-per-month-chart"), userPerMonthOptions);
        userPerMonthChart.render();

        var urlsPerMonthOptions = {
            series: [{
                name: 'Shortened URLs',
                data: [
                    <?php foreach ($urlsPerMonth as $month => $count): ?>
                                                        <?= esc($count) ?>,
                    <?php endforeach; ?>
                ]
            }],
            chart: {
                type: 'line',
                height: 350
            },
            stroke: {
                curve: 'smooth'
            },
            xaxis: {
                categories: [
                    <?php foreach ($urlsPerMonth as $month => $count): ?>
                                                        '<?= esc($month) ?>',
                    <?php endforeach; ?>
                ],
            },
            yaxis: {
                title: {
                    text: 'Shortlink'
                }
            },
            tooltip: {
                y: {
                    formatter: function (val) {
                        return val;
                    }
                }
            }
        };
        var urlsPerMonthChart = new ApexCharts(document.querySelector("#urls-per-month-chart"), urlsPerMonthOptions);
        urlsPerMonthChart.render();
    });
</script>

<script src="/assets/vendors/apexcharts/apexcharts.js"></script>
<script src="/assets/js/pages/dashboard.js"></script>

<?= $this->endSection() ?>