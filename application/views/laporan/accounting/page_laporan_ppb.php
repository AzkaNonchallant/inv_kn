<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>PERMOHONAN PERMINTAAN BARANG</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 0;
        }

        table {
            width: 100%;
            border-collapse: collapse;
            margin: 10px 0;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 5px;
            font-size: 9px;
            text-align: left;
        }

        .header {
            display: flex;
            justify-content: space-between;
            align-items: center;
            margin-bottom: 10px;
        }

        .header img {
            height: 50px;
        }

        .header .form-number {
            color:darkturquoise;
            font-size: 12px;
            font-weight: bold;
        }

        .title {
            text-align: center;
            font-size: 14px;
            font-weight: bold;
            color:darkturquoise;
            margin: 10px 0;
            border-top: 2px solid #000;
            border-bottom: 2px solid #000;
            padding: 5px 0;
        }

        .budgeting {
            text-align: right;
            font-size: 9px;
        }


        .info {
            display: flex;
            justify-content: space-around;
        }
        

    </style>
</head>

<body>
    <table>
        <tbody>
            <tr>
                <td style="border: none;">
                    <img src="" alt="">
                </td>
                <td style="border: none;"></td>
                <td style="border:none; text-align: right; color:darkturquoise; font-size:10px;">Form-PRC-12/R1</td>
            </tr>
            <tr>
                <td style="border: none;"></td>
                <td style="border: none;"></td>
                <td style="border:none; text-align: right; color:darkturquoise; font-size:10px;">Mulai Berlaku : 01 Desember 2006</td>
            </tr>
        </tbody>
    </table>

    <div class="title" style="font-size:20px; ">PERMOHONAN PERMINTAAN BARANG</div>

    <table>
        <tbody>
            <tr>
                <td style="border:none; text-align:left; font-size:14px; color:darkturquoise;">Bagian</td>
                <td style="border:none; text-align:left; font-size:14px; color:darkturquoise;">: MAINTENANCE UTILITY</td>
                <td style="border:none; text-align:left;  color:darkturquoise;"></td>
            </tr>
            <tr>
                <td style="border:none; text-align:left; font-size:14px; color:darkturquoise;">Bulan</td>
                <td style="border:none; text-align:left; font-size:14px; color:darkturquoise;">: Januari, 2025</td>
                <td style="border:none; text-align:center; font-size:25px; color:darkturquoise;"><?php echo(isset($jenis_ppb) && $jenis_ppb == "budget") ? "BUDGETING" : "NON-BUDGETING"; ?></td>
            </tr>
            <tr>
                <td style="border:none; text-align:left; font-size:14px; color:darkturquoise; ">No PPB</td>
                <td style="border:none; text-align:left; font-size:14px; color:darkturquoise;">: <?= $no_ppb_accounting ?></td>
                <td style="border:none; text-align:center; font-size:14px; color:darkturquoise;">FORM A/C* <?= $form_ppb ?></td>
            </tr>
        </tbody>
    </table>
    

       
        
    <table>
        <thead>
            <tr>
                <th>No</th>
                <th>No Budget</th>
                <th>Nama Barang</th>
                <th>Spesifikasi</th>
                <th>Satuan</th>
                <th>Jumlah</th>
                <th>Tanggal Pakai</th>
                <th>Budget Pengganti</th>
                <th>Stock Akhir</th>
                <th>Keterangan</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $no = 1;
            foreach ($detail as $key) {
            ?>
                <tr>
                    <td><?= $no++ ?></td>
                    <td></td>
                    <td><?= $key['nama_barang'] ?></td>
                    <td><?= $key['spek'] ?></td>
                    <td><?= $key['satuan'] ?></td>
                    <td><?= $key['jumlah'] ?></td>
                    <td><?= $key['tgl_pakai'] ?></td>
                    <td></td>
                    <td></td>
                    <td><?= $key['ket'] ?></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <table>
        <thead>
            <tr>
                <td style= "border:none; text-align:center; " ></td>
                <td style= "border:none; text-align:center;"></td>
                <td style= "border:none; text-align:center;"><b> Diperiksa </b></td>
                <td style= "border:none; text-align:center;"><b> Mengetahui </b></td>
                <td style= "border:none; text-align:center;"><b> Menyetujui </b></td>
                
            </tr>
        </thead>

               
            
        <tbody>
        <tr>
                <td style= "border:none;" ></td>
                <td style= "border:none;" ></td>
                <td style= "border:none;" ></td>
                <td style= "border:none;" ></td>
                <td style= "border:none;" ></td>
                <td style= "border:none;" ></td>
                
                
            </tr>
            <tr>
                <td style= "border:none;"></td>
                <td style= "border:none;"></td>
                <td style= "border:none;"></td>
                <td style= "border:none;"></td>
                <td style= "border:none;"></td>
                <td style= "border:none;"></td>
                <td style= "border:none;"></td>
                <td style= "border:none;"></td>
                
                
                
            </tr>
            <tr>
                <td style= "border:none; text-align:center;"></td>
                <td style= "border:none; text-align:center;" ><?= $key['nama_admin'] ?></td>
                <td style= "border:none; text-align:center;" ><?= $key['nama_spv'] ?></td>
                <td style= "border:none; text-align:center;"><?= $key['nama_manager'] ?></td>
                <td style= "border:none; text-align:center;" ><?= $key['nama_pm'] ?></td>
                
                
            </tr>
            <tr>
                <td style= "border:none; text-align:center;" ></td>
                <td style= "border:none; text-align:center;" >ADM/Stock Keeper</td>
                <td style= "border:none; text-align:center;" >Supv/Kasie</td>
                <td style= "border:none; text-align:center;" >Manager Dept</td>
                <td style= "border:none; text-align:center;" >Plant Manager</td>
                
                
            </tr>
        </tbody>
    </table>


</body>

</html>