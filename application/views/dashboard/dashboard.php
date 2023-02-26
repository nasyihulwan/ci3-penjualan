<h2 class="page-title">
    Dashboard
</h2>
<div class="alert alert-success" role="alert">
    Selamat datang <b><?php echo $this->session->userdata('nama_lengkap'); ?></b> sebagai <b><?php echo ucfirst($this->session->userdata('level')) ?></b>
</div>
<div class="row">
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-red text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="12" cy="7" r="4" />
                        <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        <?= $jmlPelanggan ?> Pelanggan
                    </div>
                    <div class="text-muted">Data Pelanggan</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-green text-white avatar mr-3"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="9" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        <?= $jmlPenjualan ?> Transaksi
                    </div>
                    <div class="text-muted">Transaksi hari ini</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white avatar mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M8 9l5 5v7h-5v-4m0 4h-5v-7l5 -5m1 1v-6a1 1 0 0 1 1 -1h10a1 1 0 0 1 1 1v17h-8" />
                        <line x1="13" y1="7" x2="13" y2="7.01" />
                        <line x1="17" y1="7" x2="17" y2="7.01" />
                        <line x1="17" y1="11" x2="17" y2="11.01" />
                        <line x1="17" y1="15" x2="17" y2="15.01" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        <?= $jmlCabang ?> Cabang
                    </div>
                    <div class="text-muted">Data Cabang</div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-6 col-xl-3">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-orange text-white avatar mr-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                        <path d="M12 3v3m0 12v3" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        Rp. <?= number_format($jmlPendapatan['totalbayar'], '0', '', '.') ?>
                    </div>
                    <div class="text-muted">Pendapatan hari ini</div>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-12">
        <div class="card">
            <div class="card-header">
                <h3 class="card-title">Grafik penjualan</h3>
            </div>
            <div class="card-body">
                <?php foreach ($rekapPenjualan as $data) {
                    $bulan[] = $data->namabulan;
                    $totalPenjualan[] = $data->totalpenjualan;
                }

                ?>
                <div id="chart-tasks-overview"></div>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/dist/js/datatables.min.js') ?>"></script>
<script>
    // @formatter:off
    document.addEventListener("DOMContentLoaded", function() {
        window.ApexCharts && (new ApexCharts(document.getElementById('chart-tasks-overview'), {
            chart: {
                type: "bar",
                fontFamily: 'inherit',
                height: 320,
                parentHeightOffset: 0,
                toolbar: {
                    show: false,
                },
                animations: {
                    enabled: false
                },
            },
            plotOptions: {
                bar: {
                    columnWidth: '50%',
                }
            },
            dataLabels: {
                enabled: false,
            },
            fill: {
                opacity: 1,
            },
            series: [{
                name: "A",
                data: <?php echo json_encode($totalPenjualan); ?>
            }],
            grid: {
                padding: {
                    top: -20,
                    right: 0,
                    left: -4,
                    bottom: -4
                },
                strokeDashArray: 4,
            },
            xaxis: {
                labels: {
                    padding: 0
                },
                tooltip: {
                    enabled: false
                },
                axisBorder: {
                    show: false,
                },
                categories: <?php echo json_encode($bulan); ?>,
            },
            yaxis: {
                labels: {
                    padding: 4
                },
            },
            colors: ["#206bc4"],
            legend: {
                show: false,
            },
        })).render();
    });
    // @formatter:on
</script>