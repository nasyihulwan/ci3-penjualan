<h2 class="page-title">
    Data Harga
</h2>
<div class="row">
    <div class="col-md-12">
        <div class="card">
            <div class="card-body">
                <?php if ($this->session->userdata('level') == 'administrator') { ?>
                    <button type="button" class="btn btn-secondary mb-3" id="tambahHarga">
                        <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                            <line x1="12" y1="5" x2="12" y2="19" />
                            <line x1="5" y1="12" x2="19" y2="12" />
                        </svg>
                        Tambah Data
                    </button>
                <?php } ?>
                <div class="mb-3"><?= $this->session->flashdata('message'); ?></div>
                <table class="table table-striped table-bordered">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Harga</th>
                            <th>Kode Barang</th>
                            <th>Nama</th>
                            <th>Satuan</th>
                            <th>Harga</th>
                            <th>Stok</th>
                            <th>Cabang</th>
                            <?php if ($this->session->userdata('level') == 'administrator') { ?>
                                <th>AKSI</th>
                            <?php } ?>
                        </tr>
                    </thead>
                    <?php $no = 0;
                    foreach ($harga as $row) {
                        $no++ ?>
                        <tbody>
                            <td><?= $no ?></td>
                            <td><?= $row->kode_harga ?></td>
                            <td><?= $row->kode_barang ?></td>
                            <td><?= $row->nama_barang ?></td>
                            <td><?= $row->satuan ?></td>
                            <td align="right"><?= number_format($row->harga, '0', '', '.'); ?></td>
                            <td><?= $row->stok ?></td>
                            <td><?= $row->kode_cabang ?></td>
                            <?php if ($this->session->userdata('level') == 'administrator') { ?>
                                <td>
                                    <a data-kodeHarga="<?= $row->kode_harga; ?>" class="col-sm mx-auto btn btn-sm btn-warning edit"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <path d="M9 7h-3a2 2 0 0 0 -2 2v9a2 2 0 0 0 2 2h9a2 2 0 0 0 2 -2v-3" />
                                            <path d="M9 15h3l8.5 -8.5a1.5 1.5 0 0 0 -3 -3l-8.5 8.5v3" />
                                            <line x1="16" y1="5" x2="19" y2="8" />
                                        </svg>Edit</a>
                                    <a data-kodeHarga="<?= $row->kode_harga; ?>" data-href="<?= site_url(); ?>barang/hapusHarga/<?= $row->kode_harga; ?>" class="col-sm mx-auto btn btn-sm btn-danger hapus"><svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                            <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                            <line x1="4" y1="7" x2="20" y2="7" />
                                            <line x1="10" y1="11" x2="10" y2="17" />
                                            <line x1="14" y1="11" x2="14" y2="17" />
                                            <path d="M5 7l1 12a2 2 0 0 0 2 2h8a2 2 0 0 0 2 -2l1 -12" />
                                            <path d="M9 7v-3a1 1 0 0 1 1 -1h4a1 1 0 0 1 1 1v3" />
                                        </svg>Delete</a>
                                </td>
                            <?php } ?>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalHarga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Input Harga</h5>
            </div>
            <div class="modal-body">
                <div id="loadFormInputHarga">

                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalEditHarga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Edit Barang</h5>
            </div>
            <div class="modal-body">
                <div id="loadFormEditHarga">

                </div>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalHapusHarga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-body">
                <div class="modal-title">Anda yakin hapus data ini?</div>
                <div>Jika dihapus, Anda akan kehilangan data ini.</div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-link link-secondary mr-auto" data-dismiss="modal">Cancel</button>
                <a href="#" id="hapusHarga" type="button" class="btn btn-danger">Yes, delete all my data</a>
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/dist/js/datatables.min.js') ?>"></script>

<script type="text/javascript">
    $(function() {
        $("#tambahHarga").click(function() {
            $("#modalHarga").modal("show");
            $("#loadFormInputHarga").load("<?= site_url(); ?>barang/inputHarga");
        });
    });
    $(".edit").click(function() {
        var kodeHarga = $(this).attr("data-kodeHarga");
        $("#modalEditHarga").modal("show");
        $("#loadFormEditHarga").load("<?= base_url(); ?>barang/editHarga/" + kodeHarga);
    });
    $(".hapus").click(function() {
        var href = $(this).attr("data-href");
        $("#modalHapusHarga").modal("show");
        $("#hapusHarga").attr("href", href);
    });
</script>