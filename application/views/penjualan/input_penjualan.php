<h2 class="page-title mb-3">
    Data Penjualan
</h2>
<div><?= $this->session->flashdata("msg") ?></div>
<form id="formPenjualan" method="POST" action="<?= site_url() ?>penjualan/simpanPenjualan">
    <input type="text" id="cekBarang">
    <div class="row">
        <div class="col-md-5">
            <div class="card">
                <div class="card-body">
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
                        <input type="text" value="<?= $no_faktur; ?>" readonly class="form-control" name="noFaktur" id="noFaktur" placeholder="No Faktur">
                    </div>
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
                        <input type="text" class="form-control" value="<?= date("Y-m-d") ?>" name="tglTransaksi" id="tglTransaksi" placeholder="Tanggal Transaksi">
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
                        <input type="hidden" name="kodePelanggan" id="kodePelanggan">
                        <input type="text" readonly class="form-control" name="namaPelanggan" id="namaPelanggan" placeholder="Pelanggan">
                    </div>
                    <div class="mb-3">
                        <select name="jenisTransaksi" id="jenisTransaksi" class="form-select">
                            <option value="">Pilih Jenis Transaksi</option>
                            <option value="tunai">Tunai</option>
                            <option value="kredit">Kredit</option>
                        </select>
                    </div>
                    <div class="input-icon mb-3" id="jt">
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
                        <input type="text" class="form-control" readonly value="" name="jatuhTempo" id="jatuhTempo" placeholder="Jatuh Tempo">
                    </div>
                    <div class="input-icon">
                        <span class="input-icon-addon">
                            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                <circle cx="12" cy="7" r="4" />
                                <path d="M6 21v-2a4 4 0 0 1 4 -4h4a4 4 0 0 1 4 4v2" />
                            </svg>
                        </span>
                        <input type="hidden" name="idUser" value="<?= $this->session->userdata('id_user'); ?>" id="idUser">
                        <input type="text" readonly value="<?= $this->session->userdata('id_user'); ?> - <?= $this->session->userdata('nama_lengkap'); ?>" class="form-control" name="username" id="username" placeholder="Kasir">
                    </div>
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
                        <div class="col-md-2">
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
                                <input type="text" class="form-control" readonly name="kodeBarang" id="kodeBarang" placeholder="Kode Barang">
                            </div>
                        </div>
                        <div class="col-md-5">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <rect x="4" y="4" width="6" height="6" rx="1" />
                                        <rect x="14" y="4" width="6" height="6" rx="1" />
                                        <rect x="4" y="14" width="6" height="6" rx="1" />
                                        <rect x="14" y="14" width="6" height="6" rx="1" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" readonly name="namaBarang" id="namaBarang" placeholder="Nama Barang">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                                        <path d="M12 3v3m0 12v3" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" readonly style="text-align:right" name="harga" id="harga" placeholder="Harga">
                            </div>
                        </div>
                        <div class="col-md-2">
                            <div class="input-icon mb-3">
                                <span class="input-icon-addon">
                                    <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                                        <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                                        <polyline points="12 3 20 7.5 20 16.5 12 21 4 16.5 4 7.5 12 3" />
                                        <line x1="12" y1="12" x2="20" y2="7.5" />
                                        <line x1="12" y1="12" x2="12" y2="21" />
                                        <line x1="12" y1="12" x2="4" y2="7.5" />
                                        <line x1="16" y1="5.25" x2="8" y2="9.75" />
                                    </svg>
                                </span>
                                <input type="text" class="form-control" name="qty" id="qty" placeholder="Qty">
                            </div>
                        </div>
                        <div class="col-md">
                            <a href="#" class="btn btn-primary" id="tambahBarang">
                                +
                            </a>
                        </div>
                        <div class="row">
                            <div class="col-md-12">
                                <table class="table table-bordered table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Kode Barang</th>
                                            <th>Nama Barang</th>
                                            <th>Harga</th>
                                            <th>Qty</th>
                                            <th>Total</th>
                                            <th>Aksi</th>
                                        </tr>
                                    </thead>
                                    <tbody id="loadDataBarang">

                                    </tbody>

                                </table>
                            </div>
                        </div>
                        <div class="row mt-3">
                            <div class="col-md-12">
                                <button type="submit" class="btn btn-primary w-100">
                                    <i class="fa fa-send"></i>
                                    SIMPAN
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</form>
<div class="modal modal-blur fade" id="modalPelanggan" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Pelanggan</h5>
            </div>
            <div class="modal-body">
                <table class="table table-striped table-bordered" id="tablePelanggan">
                    <thead>
                        <tr>
                            <th>No</th>
                            <th>Kode Pelanggan</th>
                            <th>Nama Pelanggan</th>
                            <th>Alamat</th>
                            <th>Nomor HP</th>
                            <th>Cabang</th>
                            <th>AKSI</th>
                        </tr>
                    </thead>
                    <?php $no = 0;
                    foreach ($pelanggan as $row) {
                        $no++ ?>
                        <tbody>
                            <td><?= $no ?></td>
                            <td><?= $row->kode_pelanggan ?></td>
                            <td><?= $row->nama_pelanggan ?></td>
                            <td><?= $row->alamat_pelanggan ?></td>
                            <td><?= $row->no_hp ?></td>
                            <td><?= $row->nama_cabang ?></td>
                            <td>
                                <a href="#" class="btn btn-sm btn-primary pilih" data-kodePelanggan="<?= $row->kode_pelanggan ?>" data-namaPelanggan="<?= $row->nama_pelanggan ?>">Pilih</a>
                            </td>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>
<div class="modal modal-blur fade" id="modalBarangHarga" tabindex="-1" role="dialog" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Data Harga Barang</h5>
            </div>
            <div class="modal-body">
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
                            <th>AKSI</th>
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
                            <td>
                                <a href="#" class="btn btn-sm btn-primary pilihBarang" data-kodeBarang="<?= $row->kode_barang ?>" data-namaBarang="<?= $row->nama_barang ?>" data-harga="<?= $row->harga ?>">Pilih</a>
                            </td>
                        </tbody>
                    <?php } ?>
                </table>
            </div>
            <div class="modal-footer">
            </div>
        </div>
    </div>
</div>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/dist/js/datatables.min.js') ?>"></script>
<script>
    document.addEventListener("DOMContentLoaded", function() {
        flatpickr(document.getElementById('tglTransaksi'), {});
    });
    $(function() {
        function hideJatuhtempo() {
            $("#jt").hide();
        };

        function showJatuhTempo() {
            $("#jt").show();
        };

        function getJatuhTempo() {
            var tglTransaksi = $("#tglTransaksi").val();
            $.ajax({
                type: 'POST',
                url: '<?= site_url(); ?>penjualan/getJatuhTempo',
                data: {
                    tglTransaksi: tglTransaksi
                },
                cache: false,
                success: function(respond) {
                    $("#jatuhTempo").val(respond);
                }
            });
        };

        function cekBarang() {
            $.ajax({
                type: 'POST',
                url: '<?= base_url(); ?>penjualan/cekBarang',
                cache: false,
                success: function(respond) {
                    $("#cekBarang").val(respond);
                }
            });
        };

        function loadDataBarang() {
            var idUser = $("#idUser").val();
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/getDataBarangTemp',
                data: {
                    id_user: idUser
                },
                cache: false,
                success: function(respond) {
                    $("#loadDataBarang").html(respond);
                }
            });
        };

        cekBarang();
        getJatuhTempo();
        hideJatuhtempo();
        loadDataBarang();

        $("#jenisTransaksi").change(function() {
            var jenisTransaksi = $(this).val();
            if (jenisTransaksi == "kredit") {
                showJatuhTempo();
            } else {
                hideJatuhtempo();
            }
        });

        $("#tglTransaksi").change(function() {
            getJatuhTempo();
        });


        $("#formPenjualan").submit(function() {
            var noFaktur = $("#noFaktur").val();
            var tglTransaksi = $("#tglTransaksi").val();
            var kodePelanggan = $("#kodePelanggan").val();
            var jenisTransaksi = $("#jenisTransaksi").val();

            if (noFaktur == "") {
                swal("Oops!", "Nomor Faktur harus diisi", "warning");
                return false;
            } else if (tglTransaksi == "") {
                swal("Oops!", "Tanggal Transaksi harus diisi", "warning");
                return false;
            } else if (kodePelanggan == "") {
                swal("Oops!", "Pelanggan harus diisi", "warning");
                return false;
            } else if (jenisTransaksi == "") {
                swal("Oops!", "Jenis Transaksi harus diisi", "warning");
                return false;
            } else {
                return true;
            }
        });
        $("#namaPelanggan").click(function() {
            $("#modalPelanggan").modal("show");
        });

        $(".pilih").click(function() {
            var kodePelanggan = $(this).attr("data-kodePelanggan");
            var namaPelanggan = $(this).attr("data-namaPelanggan");

            $("#kodePelanggan").val(kodePelanggan);
            $("#namaPelanggan").val(namaPelanggan);
            $("#modalPelanggan").modal("hide");
        });

        $("#kodeBarang").click(function() {
            $("#modalBarangHarga").modal("show");
        });

        $(".pilihBarang").click(function() {
            var kodeBarang = $(this).attr("data-kodeBarang");
            var namaBarang = $(this).attr("data-namaBarang");
            var harga = $(this).attr("data-harga");

            $("#kodeBarang").val(kodeBarang);
            $("#namaBarang").val(namaBarang);
            $("#harga").val(harga);
            $("#modalBarangHarga").modal("hide");
        });

        $("#tambahBarang").click(function() {
            var kodeBarang = $("#kodeBarang").val();
            var harga = $("#harga").val();
            var qty = $("#qty").val();
            var idUser = $("#idUser").val();

            if (kodeBarang == " ") {
                swal("Oops!", "Kode barang harus diisi", "warning");
            } else if (qty == " " || qty == 0) {
                swal("Oops!", "Qty barang harus diisi", "warning");
            } else {
                $.ajax({
                    type: 'POST',
                    url: '<?= site_url(); ?>penjualan/simpanBarangTemp',
                    data: {
                        kode_barang: kodeBarang,
                        harga: harga,
                        qty: qty,
                        id_user: idUser
                    },
                    cache: false,
                    success: function(respond) {
                        if (respond == 1) {
                            swal("Oops!", "Data sudah ada", "warning");
                        } else {
                            loadDataBarang();
                        }
                    }
                });
            }

        });
    });
</script>