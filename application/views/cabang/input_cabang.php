<form action="<?= site_url('') ?>cabang/simpanCabang" class="formCabang" method="post">
    <div class="form-group mb-3">
        <input type=" text" class="form-control" name="kodeCabang" placeholder="Kode cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="namaCabang" placeholder="Nama cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="alamatCabang" placeholder="Alamat cabang">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" name="telepon" placeholder="Telepon">
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
        $('.formCabang').bootstrapValidator({
            fields: {
                kodeCabang: {
                    message: 'Kode Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Kode Pelanggan harus diisi !'
                        }
                    }
                },
                namaCabang: {
                    message: 'Nama Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Nama Pelanggan harus diisi !'
                        }
                    }
                },
                alamatCabang: {
                    message: 'Alamat Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Satuan Pelanggan harus diisi !'
                        }
                    }
                },
                telepon: {
                    message: 'No HP Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'No HP Pelanggan harus diisi !'
                        }
                    }
                },
            }
        });
    })
</script>