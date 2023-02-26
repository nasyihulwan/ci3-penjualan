<form action="<?= site_url('') ?>barang/simpanHarga" class="formHarga" method="post">
    <div class="form-group mb-3">
        <input type="text" class="form-control" readonly name="kodeHarga" id="kodeHarga" placeholder="Kode harga">
    </div>
    <div class="form-group mb-3">
        <select name="kodeBarang" id="kodeBarang" class="form-select">
            <option value="">Pilih Barang</option>
            <?php foreach ($barang as $row) { ?>
                <option value="<?= $row->kode_barang ?>"><?= $row->kode_barang . " - " . $row->nama_barang ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="form-group mb-3">
        <input type="text" id="harga" class="form-control" name="harga" placeholder="Harga">
    </div>
    <div class="form-group mb-3">
        <input type="text" id="stok" class="form-control" name="stok" placeholder="Stok">
    </div>
    <div class="form-group mb-3">
        <select name="cabang" id="cabang" class="form-select">
            <option value="">Pilih Cabang</option>
            <?php foreach ($cabang as $row) { ?>
                <option value="<?= $row->kode_cabang ?>"><?= $row->kode_cabang . " - " . $row->nama_cabang ?></option>
            <?php } ?>
        </select>
    </div>
    <div class="mb-3">
        <button type="submit" class="btn btn-primary w-100">
            <svg xmlns="http://www.w3.org/2000/svg" class="icon" width="24" height="24" viewBox="0 0 24 24" stroke-width="2" stroke="currentColor" fill="none" stroke-linecap="round" stroke-linejoin="round">
                <path stroke="none" d="M0 0h24v24H0z" fill="none" />
                <line x1="10" y1="14" x2="21" y2="3" />
                <path d="M21 3l-6.5 18a0.55 .55 0 0 1 -1 0l-3.5 -7l-7 -3.5a0.55 .55 0 0 1 0 -1l18 -6.5" />
            </svg>
            Simpan
        </button>
    </div>
</form>

<script>
    $(function() {
        $('.formHarga').bootstrapValidator({
            fields: {
                kodeBarang: {
                    message: 'Kode barang tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Kode barang diisi !'
                        }
                    }
                },
                harga: {
                    message: 'Harga tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Harga harus diisi !'
                        }
                    }
                },
                stok: {
                    message: 'Stok tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Stok harus diisi !'
                        }
                    }
                },
                cabang: {
                    message: 'Cabang tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Cabang harus diisi !'
                        }
                    }
                },
            }
        });

        function loadKodeHarga() {
            var kodeBarang = $("#kodeBarang").val();
            var kodeCabang = $("#cabang").val();
            var kodeHarga = kodeBarang + kodeCabang;
            $("#kodeHarga").val(kodeHarga);
        }
        $("#kodeBarang").change(function() {
            loadKodeHarga();
        });
        $("#cabang").change(function() {
            loadKodeHarga();
        });
    });
</script>