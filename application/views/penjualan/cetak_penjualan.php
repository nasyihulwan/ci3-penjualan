<style>
    table {
        font-family: arial;
    }
</style>

<center>
    <h4 style="font-family: arial;">FAKTUR PENJUALAN</h4>

    <table style="width: 100%;">
        <tr>
            <td style="text-align:lefts">
                <table border="0">
                    <tr>
                        <td>No Faktur</td>
                        <td>:</td>
                        <td><?= $penjualan['no_faktur'] ?></td>
                    </tr>
                    <tr>
                        <td>No Faktur</td>
                        <td>:</td>
                        <td><?= $penjualan['tgltransaksi'] ?></td>
                    </tr>
                </table>
            </td>
            <td style="text-align:right">
                <table border="0">
                    <tr>
                        <td>Kode Pelanggan</td>
                        <td>:</td>
                        <td><?= $penjualan['kode_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <td>Nama Pelanggan</td>
                        <td>:</td>
                        <td><?= $penjualan['nama_pelanggan'] ?></td>
                    </tr>
                    <tr>
                        <td>Alamat</td>
                        <td>:</td>
                        <td><?= $penjualan['alamat_pelanggan'] ?></td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
    <br>
    <br>
    <table style="width: 100%; border-collapse: collapse;" border="1">
        <tr style="font-weight: bold; text-align:center">
            <td>NO</td>
            <td>KODE BARANG</td>
            <td>NAMA BARANG</td>
            <td>HARGA</td>
            <td>QTY</td>
            <td>SUBTOTAL</td>
        </tr>
        <?php
        $no = 0;
        $total = 0;
        foreach ($detail as $row) {
            $no++;
            $totalharga = $row->qty * $row->harga;
            $total = $total + $totalharga;
        ?>
            <tr style="text-align:center">
                <td><?= $no ?></td>
                <td><?= $row->kode_barang ?></td>
                <td><?= $row->nama_barang ?></td>
                <td align="right"><?= number_format($row->harga, '0', '', '.') ?></td>
                <td><?= $row->qty ?></td>
                <td align="right"><?= number_format($totalharga, '0', '', '.') ?></td>
            </tr>
        <?php } ?>
        <tr>
            <td style="font-weight: bold; font-size:16" colspan="5">TOTAL</td>
            <td align="right"><?= number_format($total, '0', '', '.') ?></td>
        </tr>
        <tr style="font-size: 16; font-weight:bold;">
            <td colspan="6">
                <i><?= ucwords(terbilang($total)) ?></i>
            </td>
        </tr>
    </table>
</center>