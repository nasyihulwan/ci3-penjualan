<?php $no = 0;
$totalPenjualan = 0;
foreach ($barangTemp as $row) {
    $totalPenjualan = $totalPenjualan + $row->total;
    $no++;
?>
    <tr>
        <td><?= $no ?></td>
        <td><?= $row->kode_barang ?></td>
        <td><?= $row->nama_barang ?></td>
        <td align="right"><?= number_format($row->harga, '0', '', '.')  ?></td>
        <td><?= $row->qty ?></td>
        <td align="right"><?= number_format($row->total, '0', '', '.')  ?></td>
        <td width="10%">
            <a href="#" class="btn btn-danger btn-sm hapus" data-kodeBarang="<?= $row->kode_barang ?>" data-idUser="<?= $row->id_user ?>"> Hapus</a>
        </td>
    </tr>
<?php } ?>
<tr>
    <th colspan="5">GRAND TOTAL</th>
    <th style="text-align: right;">
        <p id="grandTotal"><?= number_format($totalPenjualan, '0', '', '.')  ?></p>
    </th>
    <th></th>
</tr>

<script>
    $(function() {
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

        function loadGrandTotal() {
            var grandTotal = $("#grandTotal").text();
            $("#totalPenjualan").text(grandTotal);
        }
        loadGrandTotal();

        $(".hapus").click(function() {
            var kodeBarang = $(this).attr("data-kodeBarang");
            var idUser = $(this).attr("data-idUser");
            $.ajax({
                type: 'POST',
                url: '<?= site_url() ?>penjualan/hapusBarangTemp',
                data: {
                    kode_barang: kodeBarang,
                    id_user: idUser
                },
                cache: false,
                success: function(respond) {
                    if (respond == 1) {
                        swal("Deleted", "Data berhasil dihapus!", "success");
                        loadDataBarang();
                    }
                }
            });
        });
    });
</script>