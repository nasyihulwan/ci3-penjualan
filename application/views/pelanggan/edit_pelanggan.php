<form action="<?= site_url('') ?>pelanggan/updatePelanggan" class="formPelanggan" method="post">
    <div class="form-group mb-3">
        <input type=" text" class="form-control" value="<?= $updatePelanggan->kode_pelanggan ?>" name="kodePelanggan" placeholder="Kode pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" value="<?= $updatePelanggan->nama_pelanggan ?>" name="namaPelanggan" placeholder="Nama pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" value="<?= $updatePelanggan->alamat_pelanggan ?>" name="alamatPelanggan" placeholder="Alamat pelanggan">
    </div>
    <div class="form-group mb-3">
        <input type="text" class="form-control" value="<?= $updatePelanggan->no_hp ?>" name="noHP" placeholder="No HP">
    </div>
    <div class="form-group mb-3">
        <select name="cabang" class="form-select">
            <option value="">Pilih Cabang</option>
            <?php foreach ($cabang as $row) { ?>
                <option <?php if ($updatePelanggan->kode_cabang == $row->kode_cabang) {
                            echo "selected";
                        } ?> value="<?= $row->kode_cabang; ?>"><?= $row->nama_cabang; ?></option>
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
        $('.formPelanggan').bootstrapValidator({
            fields: {
                kodePelanggan: {
                    message: 'Kode Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Kode Pelanggan harus diisi !'
                        }
                    }
                },
                namaPelanggan: {
                    message: 'Nama Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Nama Pelanggan harus diisi !'
                        }
                    }
                },
                alamatPelanggan: {
                    message: 'Alamat Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'Satuan Pelanggan harus diisi !'
                        }
                    }
                },
                noHP: {
                    message: 'No HP Pelanggan tidak valid !',
                    validators: {
                        notEmpty: {
                            message: 'No HP Pelanggan harus diisi !'
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
    })
</script>