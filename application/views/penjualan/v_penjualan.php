<h2 class="page-title mb-3">
    Data Penjualan
</h2>
<div><?= $this->session->flashdata("msg") ?></div>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <a href="<?= base_url() ?>penjualan/inputPenjualan" type="button" class="btn btn-secondary mb-3">
                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                        <line x1="12" y1="5" x2="12" y2="19" />
                        <line x1="5" y1="12" x2="19" y2="12" />
                    </svg>
                    Tambah Data
                </a>
                <form action="<?= site_url() ?>penjualan" method="post">
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <path d="M4 7v-1a2 2 0 0 1 2 -2h2" />
                                <path d="M4 17v1a2 2 0 0 0 2 2h2" />
                                <path d="M16 4h2a2 2 0 0 1 2 2v1" />
                                <path d="M16 20h2a2 2 0 0 0 2 -2v-1" />
                                <rect x="5" y="11" width="1" height="2" />
                                <line x1="10" y1="11" x2="10" y2="13" />
                                <rect x="14" y="11" width="1" height="2" />
                                <line x1="19" y1="11" x2="19" y2="13" />
                            </svg>
                        </span>
                        <input type="text" value="<?= $no_faktur ?>" class="form-control" name="noFaktur" id="noFaktur" placeholder="No Faktur">
                    </div>
                    <div class="input-icon mb-3">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="9" cy="7" r="4" />
                                <path d="M3 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                                <path d="M16 3.13a4 4 0 0 1 0 7.75" />
                                <path d="M21 21v-2a4 4 0 0 0 -3 -3.85" />
                            </svg>
                        </span>
                        <input type="text" class="form-control" value="<?= $nama_pelanggan ?>" name="namaPelanggan" id="namaPelanggan" placeholder="Pelanggan">
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="11" y1="15" x2="12" y2="15" />
                                        <line x1="12" y1="15" x2="12" y2="18" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" value="<?= $dari ?>" name="dari" id="dari" placeholder="Dari">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="5" width="16" height="16" rx="2" />
                                        <line x1="16" y1="3" x2="16" y2="7" />
                                        <line x1="8" y1="3" x2="8" y2="7" />
                                        <line x1="4" y1="11" x2="20" y2="11" />
                                        <line x1="11" y1="15" x2="12" y2="15" />
                                        <line x1="12" y1="15" x2="12" y2="18" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" value="<?= $sampai ?>" name="sampai" id="sampai" placeholder="Sampai">
                            </div>
                        </div>
                    </div>
                    <div class="mb-3">
                        <button type="submit" name="submit" class="btn btn-primary w-100">Cari Data</button>
                    </div>
                </form>
                <div class="mb-3"><?= $this->session->flashdata('message'); ?></div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Nomor Faktur</th>
                            <th>Tgl. Transaksi</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Jenis Transaksi</th>
                            <th>Jatuh Tempo</th>
                            <th>Total Penjualan</th>
                            <th>Total Bayar</th>
                            <th>Sisa Bayar</th>
                            <th>Ket.</th>
                            <th>Kasir</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php $no = 0;
                        foreach ($penjualan as $row) {
                            $no++;
                            $sisabayar = $row->totalpenjualan - $row->totalbayar;
                            if ($sisabayar  > 0) {
                                $ket = "Belum lunas";
                                $warna = "bg-red";
                            } else {
                                $ket = "Lunas";
                                $warna = "bg-green";
                            } ?>

                            <tr>
                                <td><?= $no ?></td>
                                <td><a href="<?= site_url() ?>penjualan/detailFaktur/<?= $row->no_faktur ?>" target="_blank" class="btn btn-sm btn-success print" data-href="<?= site_url() ?>penjualan/<?= $row->no_faktur ?>"><?= $row->no_faktur ?></a></td>
                                <td><?= $row->tgltransaksi ?></td>
                                <td><?= $row->kode_pelanggan ?></td>
                                <td><?= $row->nama_pelanggan ?></td>
                                <td><?= $row->jenistransaksi ?></td>
                                <td><?= $row->jatuhtempo ?></td>
                                <td align="right"><?= number_format($row->totalpenjualan, '0', '', '.')  ?></td>
                                <td align="right"><?= number_format($row->totalbayar, '0', '', '.')  ?></td>
                                <td align="right"><?= number_format(($row->totalpenjualan - $row->totalbayar), '0', '', '.')  ?></td>
                                <td align="center"> <span class="badge <?= $warna ?>"><?= $ket ?></span> </td>
                                <td><?= $row->nama_lengkap ?></td>
                                <td>
                                    <a href="#" class="btn btn-sm btn-danger hapus" data-href="<?= site_url() ?>penjualan/hapusPenjualan/<?= $row->no_faktur ?>">Hapus</a>
                                    <a href="<?= site_url() ?>penjualan/cetakPenjualan/<?= $row->no_faktur ?>" target="_blank" class="btn btn-sm btn-primary print" data-href="<?= site_url() ?>penjualan/<?= $row->no_faktur ?>">Print</a>
                                    <?php if ($sisabayar != 0) { ?>
                                        <a href="<?= site_url() ?>penjualan/detailFaktur/<?= $row->no_faktur ?>" target="_blank" class="btn btn-sm btn-success print" data-href="<?= site_url() ?>penjualan/<?= $row->no_faktur ?>">Bayar</a>
                                    <?php } ?>
                                </td>
                            </tr>
                        <?php } ?>
                    </tbody>
                </table>
                <div>
                    <?= $pagination ?>
                </div>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalHapusPenjualan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin hapus data ini?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <a href="#" id="hapusPenjualan" type="button" class="btn btn-danger">Yes, delete all my data</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/dist/js/datatables.min.js') ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('dari'), {});
        flatpickr(document.getElementById('sampai'), {});
    });

    $(".hapus").click(function() {
        var href = $(this).attr("data-href");
        $("#modalHapusPenjualan").modal("show");
        $("#hapusPenjualan").attr("href", href);
    });
</script>