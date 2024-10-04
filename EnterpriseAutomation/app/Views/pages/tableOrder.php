<!DOCTYPE html>
<html>

<head>
    <style>
        table,
        th,
        td {
            border: 1px solid black;
            border-collapse: collapse;
        }

        th {
            vertical-align: middle !important;
            text-align: center !important;
        }
    </style>
</head>

<body>
    <table style="width:100%;">
        <thead>
            <tr>
                <th colspan="2">
                    <img style="width:100%; padding: 1rem 3rem;" src="/assets/img/polman.png" alt="">
                </th>
                <th style="text-align: center !important;" colspan="7">
                    <h4>BON PERMINTAAN BARANG KE UPT LOGISTIK</h4>
                </th>
            </tr>
            <tr>
                <th colspan="2">Pemesan</th>
                <th>Tanggal</th>
                <th>Unit Kerja</th>
                <th>Batas Waktu</th>
                <th colspan="2">Disetujui</th>
                <th colspan="2">No.Pembebanan</th>
            </tr>
            <tr>
                <th rowspan="2">No</th>
                <th rowspan="2">Jumlah</th>
                <th rowspan="2">Nama Barang/Uraian/Ukuran</th>
                <th rowspan="2">No.Barang</th>
                <th rowspan="2">No.Gambar</th>
                <th colspan="2">Penerima</th>
                <th rowspan="2">Berat</th>
                <th rowspan="2">Tgl Pelaporan</th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>Nama & paraf</th>

            </tr>
        </thead>
        <tbody>
            <?php 
                $no_order = 1;
                foreach($getOrder as $dataOrder){ ?>
            <tr>
                <td><?= $no_order;?></td>
                <td><?= $dataOrder['jml_satuan'];?></td>
                <td><?= $dataOrder['nama_barang']."/".$dataOrder['uraian']."/".$dataOrder['ukuran'];?></td>
                <td><?= $dataOrder['no_barang'];?></td>
                <td><?= $dataOrder['no_gambar'];?></td>
                <td><?php 
                if($dataOrder['tgl_penerima'] != "0000-00-00") {
                    echo $dataOrder['tgl_penerima'];
                } else {
                    echo "";
                }?></td>
                <td><?= $dataOrder['nama_penerima'];?></td>
                <td><?php 
                if($dataOrder['berat_barang'] != 0) {
                    echo $dataOrder['berat_barang'];
                } else {
                    echo "";
                }?></td>
                <td><?php
                if($dataOrder['tgl_pembelian'] != "0000-00-00") {
                    echo $dataOrder['tgl_pembelian'];
                } else {
                    echo "";
                }?></td>
            </tr>

            <?php $no_order++; } ?>
        </tbody>
        <tfoot>
            <tr>
                <th style="vertical-align: top !important;
                text-align: left !important;" rowspan="2" colspan="7">Catatan:</th>
                <th colspan="2">Pelaksana & Pesanan</th>
            </tr>
            <tr>
                <th>Tanggal</th>
                <th>Nama & paraf</th>
            </tr>
        </tfoot>
    </table>
</body>

</html>