<form method="POST" action="<?= base_url(); ?>penjualan/simpanBayar" id="formBayar">
    <input type="text" value="<?= $no_faktur ?>" name="i_no_faktur">
    <input type="text" value="<?= $grandtotal ?>" name="i_totalPenjualan" id="i_totalPenjualan">
    <input type="text" value="<?= $totalbayar ?>" name="i_totalBayar" id="i_totalBayar">
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
        <input type="text" class="form-control" value="<?= date("Y-m-d") ?>" name="i_tglBayar" id="i_tglBayar" placeholder="Tanggal Bayar">
    </div>
    <div class="input-icon mb-3">
        <span class="input-icon-addon">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <path d="M16.7 8a3 3 0 0 0 -2.7 -2h-4a3 3 0 0 0 0 6h4a3 3 0 0 1 0 6h-4a3 3 0 0 1 -2.7 -2" />
                <path d="M12 3v3m0 12v3" />
            </svg>
        </span>
        <input type="text" class="form-control" style="text-align: right;" name="i_jmlBayar" id="i_jmlBayar" placeholder="Jumlah Bayar">
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary col-md-12">BAYAR</button>
    </div>
</form>

<script src="https://code.jquery.com/jquery-3.5.1.min.js" integrity="sha256-9/aliU8dGd2tb6OSsuzixeV4y/faTqgFtohetphbbj0=" crossorigin="anonymous"></script>
<script type="text/javascript" src="//cdnjs.cloudflare.com/ajax/libs/jquery.bootstrapvalidator/0.5.2/js/bootstrapValidator.min.js"></script>
<script type="text/javascript" src="<?= base_url('assets/dist/js/datatables.min.js') ?>"></script>
<script>
    flatpickr(document.getElementById('i_tglBayar'), {});

    $(function() {
        $("#formBayar").submit(function() {
            var jmlBayar = $("#i_jmlBayar").val();
            var i_totalPenjualan = $("#i_totalPenjualan").val();
            var totalBayar = $("#i_totalBayar").val();
            var sisaBayar = parseInt(i_totalPenjualan) - parseInt(totalBayar);
            // alert(sisaBayar);
            if (jmlBayar == "" || jmlBayar == 0) {
                swal("Oops!", "Jumlah bayar tidak boleh kosong!", "warning");
                return false;
            } else if (parseInt(jmlBayar) > parseInt(sisaBayar)) {
                swal("Oops!", "Jumlah bayar tidak boleh melebihi sisa bayar, sisa bayar anda sebesar " + sisaBayar, "warning");
                return false;
            } else {
                return true;
            }
        });
    });
</script>