<h2 class="page-tittle">
    Laporan Penjualan
</h2>
<div class="row mt-3">
    <div class="col-md-6">
        <div class="card">
            <div class="card-body">
                <form action="<?= site_url() ?>penjualan/cetakLaporanPenjualan" method="post">
                    <?php if ($this->session->userdata('kode_cabang') == 'PST') { ?>
                        <div class="form-group mb-3">
                            <select name="cabang" class="form-select">
                                <option value="">Semua Cabang</option>
                                <?php foreach ($cabang as $row) { ?>
                                    <option value="<?= $row->kode_cabang; ?>"><?= $row->nama_cabang; ?></option>
                                <?php } ?>
                            </select>
                        </div>
                    <?php } else { ?>
                        <input type="hidden" value="<?= $this->session->userdata('kode_cabang') ?>" name="cabang">
                    <?php } ?>
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
                                <input type="text" class="form-control" value="" name="dari" id="dari" placeholder="Dari">
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
                                <input type="text" class="form-control" value="" name="sampai" id="sampai" placeholder="Sampai">
                            </div>
                        </div>
                    </div>
                    <div class="row">
                        <div class="col-md-6">
                            <button type="submit" name="submit" class="btn btn-primary w-100 ">Cari Data</button>
                        </div>
                        <div class="col-md-6">
                            <button type="submit" name="export" class="btn btn-success w-100 ">Export Excel</button>
                        </div>
                    </div>
                </form>
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
</script>