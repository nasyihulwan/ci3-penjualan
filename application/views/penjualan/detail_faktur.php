<h2 class="page-title mb-3">
    Detail Faktur
</h2>
<input type="hidden" id="cekBarang">
<div class="row">
    <div class="col-md-5">
        <div class="card">
            <div class="card-body">
                <table class="table table-bordered table-striped">
                    <tr>
                        <th>No Faktur</th>
                        <th><?= $penjualan['no_faktur'] ?></th>
                    </tr>
                    <tr>
                        <th>Tanggal Transaksi</th>
                        <th><?= $penjualan['tgltransaksi'] ?></th>
                    </tr>
                    <tr>
                        <th>Kode Pelanggan</th>
                        <th><?= $penjualan['kode_pelanggan'] ?></th>
                    </tr>
                    <tr>
                        <th>Nama Pelanggan</th>
                        <th><?= $penjualan['nama_pelanggan'] ?></th>
                    </tr>
                    <tr>
                        <th>Jenis Transaksi</th>
                        <th><?= ucwords($penjualan['jenistransaksi']) ?></th>
                    </tr>
                    <?php if ($penjualan['jenistransaksi'] == "kredit") { ?>
                        <tr>
                            <th>Jatuh Tempo</th>
                            <th><?= $penjualan['jatuhtempo'] ?></th>
                        </tr>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
    <div class="col-md-7">
        <div class="card card-sm">
            <div class="card-body d-flex align-items-center">
                <span class="bg-blue text-white avatar mr-3" style="height: 9rem;"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <circle cx="9" cy="19" r="2" />
                        <circle cx="17" cy="19" r="2" />
                        <path d="M3 3h2l2 12a3 3 0 0 0 3 2h7a3 3 0 0 0 3 -2l1 -7h-15.2" />
                    </svg>
                </span>
                <div class="mr-3">
                    <div class="font-weight-medium">
                        <h2 id="totalPenjualan" style="font-size: 5rem;">0</h2>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-md-12 mt-3">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Data Barang
                </h4>
            </div>
            <div class="card-body">

                <div class="row">
                    <div class="col-md-12">
                        <div><?= $this->session->flashdata('msg') ?></div>
                        <table class="table table-bordered table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Kode Barang</th>
                                    <th>Nama Barang</th>
                                    <th>Harga</th>
                                    <th>Qty</th>
                                    <th>Total</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 0;
                                $grandTotal = 0;
                                foreach ($detail as $row) {
                                    $no++;
                                    $totalHarga = $row->harga * $row->qty;
                                    $grandTotal += $totalHarga;
                                ?>
                                    <tr>
                                        <td><?= $no ?></td>
                                        <td><?= $row->kode_barang ?></td>
                                        <td><?= $row->nama_barang ?></td>
                                        <td align="right"><?= number_format($row->harga, '0', '', '.') ?></td>
                                        <td><?= $row->qty ?></td>
                                        <td align="right"><?= number_format($totalHarga, '0', '', '.') ?></td>
                                    </tr>
                                <?php } ?>
                            </tbody>
                            <tfoot>
                                <tr>
                                    <th colspan="5">GRAND TOTAL</th>
                                    <th id="grandTotal" style="text-align: right;"><?= number_format($grandTotal, '0', '', '.') ?></th>
                                </tr>
                            </tfoot>
                        </table>
                    </div>
                </div>

                <div class="card-header" hidden>
                    <h4 class="card-title">
                        Data Barang
                    </h4>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="row mt-3">
    <div class="col-md-12">
        <div class="card">
            <div class="card-header">
                <h4 class="card-title">
                    Histori Bayar
                </h4>
            </div>
            <div class="card-body">
                <a href="#" id="bayar" class="btn btn-success mb-3 col-md-12">Bayar</a>
                <table class="table table-bordered table-striped">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>No Bukti</th>
                            <th>Tanggal Bayar</th>
                            <th>Jumlah Bayar</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php
                        $totalBayar = 0;
                        $no = 0;

                        foreach ($bayar as $row) {
                            $no++;
                            $totalBayar = $totalBayar + $row->bayar;
                        ?>
                            <tr>
                                <td><?= $no ?></td>
                                <td><?= $row->nobukti ?></td>
                                <td><?= $row->tglbayar ?></td>
                                <td align="right"><?= number_format($row->bayar, '0', '', '.') ?></td>
                                <td>
                                    <a href="#" data-href="<?= site_url() ?>penjualan/hapusBayar/<?= $row->nobukti ?>/<?= $penjualan['no_faktur'] ?>" class="btn btn-danger btn-sm hapus">HAPUS</a>
                                </td>
                            </tr>
                        <?php }  ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalBayar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Bayar</h5>
            </div>
            <div class="modal-body">
                <div id="loadFormInputBayar">

                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalHapusBayar" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin hapus data ini?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <a href="#" id="hapusBayar" type="button" class="btn btn-danger">Yes, delete all my data</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/dist/js/datatables.min.js') ?>"></script>
<script>
    $(function() {
        var grandTotal = $("#grandTotal").text();
        $("#totalPenjualan").text(grandTotal);

        $(".hapus").click(function() {
            var href = $(this).attr("data-href");
            $("#modalHapusBayar").modal("show");
            $("#hapusBayar").attr("href", href);
        });

        $("#bayar").click(function() {
            var noFaktur = "<?= $penjualan['no_faktur']; ?>";
            var grandTotal = "<?= $grandTotal; ?>";
            var totalBayar = "<?= $totalBayar; ?>";
            $("#modalBayar").modal("show");

            $.ajax({
                type: 'POST',
                url: '<?= base_url() ?>penjualan/inputBayar/' + noFaktur,
                data: {
                    noFaktur: noFaktur,
                    grandTotal: grandTotal,
                    totalBayar: totalBayar
                },
                cache: false,
                success: function(respond) {
                    $("#loadFormInputBayar").html(respond);
                }
            });
        });
    });
</script>