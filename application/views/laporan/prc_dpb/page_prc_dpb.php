<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>DAFTAR PENERIMAAN BARANG - CPOB</title>
    <style>
        body {
            font-family: sans-serif;
            margin: 20px;
            padding: 0;
        }
        .title {
            text-align: center;
            font-size: 18px;
            font-weight: bold;
            color: blue;
        }
        table {
            width: 100%;    
            border-collapse: collapse;
            margin-top: 10px 0;
        }
    
        th, td {
            padding: 8px;
            border: 1px solid #3c3c3c;
            padding: 5px;
            font-size: 9px;
            text-align: left;
        }
        .signature tr td{
            border: none;
        }
        .signature {
            width: 100%;
            text-align: center;
            margin-top: 20px;
        }
        .signature td {
            padding-top: 30px;
        }
    </style>
</head>
<body>
    <div class="title">DAFTAR PENERIMAAN BARANG<br>BAGIAN : CPOB</div>
    
    <table>
    <tbody>
    <?php 
        foreach($detail as $k){ 
    ?>

        <tr>
            <td>Diterima Tanggal :  <?= $k['tgl_diterima'] ?></td>
            <td>JJ NO : <?= $k['no_jj_dpb'] ?></td>
            <td>NO DPB : <?= $k['no_dpb'] ?></td>
        </tr>
        <tr>
            <td>Supplier :  <?= $k['nama_po_supplier'] ?>  </td>
            <td>RB NO :  <?= $k['no_rb'] ?></td>
            <td>TGL : <?= $k['tgl_ppb'] ?></td>
        </tr>
        <tr>
            <td>PO NO : </td>
            <td>PPB NO : <?= $k['no_ppb_accounting'] ?></td>
            <td></td>
        </tr>
        <?php } ?>
    </tbody>

    </table>
    <table>
        <thead>
        <tr>
            <th rowspan="2" style="text-align: center;">NO Urut</th>
            <th rowspan="2" style="text-align: center;">NO Kode</th>
            <th rowspan="2" style="text-align: center;">Barang Spesifikasi</th>
            <th rowspan="2" style="text-align: center;">Jumlah Menurut Dokumen</th>
            <th colspan="2" style="text-align: center;">Diterima</th>'
        </tr>
            <tr>
                <th style="text-align: center;">Baik</th>
                <th style="text-align: center;">Ket</th>
            </tr>
        </thead>
        <?php foreach($detail as $k) { ?>
        <tbody>
        <tr>
            <td>1</td>
            <td> <?= $k['kode_barang'] ?></td>
            <td> <?= $k['spek'] ?></td>
            <td></td>
            <td></td>
            <td></td>           
        </tr>
            <?php }?>
        </tbody>
    </table>
    
    <p style="font-size: 10px;">Cicadas, 06 Januari 2025</p>
    
    <table class="signature" style="border: none;">
        <tr >
            <td style="border: none;"><b></b></td>
            <td style="border: none;"><b>Bag Pembelian</b></td>
            <td style="border: none;"><b>Stock Keeper</b></td>
            <td style="border: none;"><b>Kepala Bagian</b></td>
        </tr>
        <tr style="margin-top:20%;">
            <td style="border: none;">ADM/StockKeeper</td>
            <td style="border: none;">Supv/Kasie</td>
            <td style="border: none;">Manager Dept</td>
            <td style="border: none;">Plant Manager</td>
        </tr>
    </table>
</body>
</html>
