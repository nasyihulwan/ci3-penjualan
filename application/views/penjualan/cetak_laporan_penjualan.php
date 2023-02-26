<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Laporan Penjualan</title>
    <style>
        body {
            -webkit-print-color-adjust: exact;
            font-family: Tahoma;
        }

        table,
        th,
        td {
            border-collapse: collapse;
            border: 2px solid black;
            padding: 5px;
        }

        th {
            font-size: 14px;
            background-color: #0f638a;
            color: white;
        }
    </style>
</head>

<body>
    <h4>
        Laporan Penjualan <br>
        <?php if (empty($cabang)) {
            echo "SEMUA CABANG";
        } else {
            echo "CABANG" . $cabang;
        } ?>
        <br>
        PERIODE <?= $dari ?> s/d <?= $sampai ?>
    </h4>
    <br>

    <table border="1">
        <tr>
            <th>NO</th>
            <th>NO FAKTUR</th>
            <th>TGL TRANSAKSI</th>
            <th>KODE PELANGGAN</th>
            <th>NAMA PELANGGAN</th>
            <th>JENIS TRANSAKSI</th>
            <th>JATUH TEMPO</th>
            <th>TOTAL PENJUALAN</th>
            <th>TOTAL BAYAR</th>
            <th>SISA BAYAR</th>
            <th>KET.</th>
            <th>KASIR</th>
        </tr>
        <?php
        $totalpenjualan = 0;
        $totalbayar = 0;
        $totalsisabayar = 0;
        $no = 0;
        foreach ($laporanPenjualan as $row) {
            $no++;
            $totalpenjualan += $row->totalpenjualan;
            $totalbayar += $row->totalbayar;
            $sisabayar = $row->totalpenjualan - $row->totalbayar;
            $totalsisabayar += $sisabayar;
            if ($sisabayar != 0) {
                $ket = 'Belum Lunas';
                $colorbg = "#cf384c";
                $colortext = 'white';
            } else {
                $ket = 'Lunas';
                $colorbg = "#38cf44";
                $colortext = '';
            }
        ?>
            <tr style="background-color: <?= $colorbg; ?>; color: <?= $colortext; ?>">
                <td><?= $no ?></td>
                <td><?= $row->no_faktur ?></td>
                <td><?= $row->tgltransaksi ?></td>
                <td><?= $row->kode_pelanggan ?></td>
                <td><?= $row->nama_pelanggan ?></td>
                <td><?= $row->jenistransaksi ?></td>
                <td><?= $row->jatuhtempo ?></td>
                <td align="right"><?= number_format($row->totalpenjualan, '0', '', '.')  ?></td>
                <td align="right"><?= number_format($row->totalbayar, '0', '', '.')  ?></td>
                <td align="right"><?= number_format($sisabayar, '0', '', '.')  ?></td>
                <td><?= $ket ?></td>
                <td><?= $row->nama_lengkap ?></td>
            </tr>
        <?php } ?>

        <tr>
            <th colspan="7">TOTAL</td>
            <th align="right"><?= number_format($totalpenjualan, '0', '', '.')  ?></td>
            <th align="right"><?= number_format($totalbayar, '0', '', '.')  ?></td>
            <th align="right"><?= number_format($totalsisabayar, '0', '', '.')  ?></td>
            <th colspan="3">
                </td>
        </tr>
    </table>
</body>

</html>