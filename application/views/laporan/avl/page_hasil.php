<html>

<head>

    <title>Approved Vendor List</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
        }

        table {
            width: 100%;
            margin: 20px auto;
            border-collapse: collapse;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
        }

        table td {
            /* vertical-align: top; */
        }

        a {
            background: blue;
            color: #fff;
            padding: 8px 10px;
            text-decoration: none;
            border-radius: 2px;
        }

        table #jj {
            margin-left: 20% auto;
        }

        #judul .atas {
            font-size: 11px;
            vertical-align: top;
        }

        #judul .bawah {
            font-size: 11px;
            vertical-align: bottom;
        }

        #judul .bi {
            border: 0px;
        }

        #jj th {
            border: 0px;
            font-size: 15px;
            padding-bottom: 15px;
            text-align: left;
            padding-left: 100px;
        }

        #jj td {
            border: 0px;
        }

        #jj .jdl {
            font-size: 11px;
            /* padding-right: 0; */
            width: 35%;
        }

        #jj .hsl {
            font-size: 11px;
            /* padding-right: 0; */
        }

        #jj .ti {
            font-size: 11px;
            width: 3%;
        }

        #hh .jdl {
            text-align: center;
            font-size: 13px;
            font-weight: bold;
        }

        #hh .namapmr {
            font-size: 11px;
            /* vertical-align: top; */
        }

        #hh .hsl {
            text-align: center;
            font-size: 11px;
        }

        #hh .teks {
            text-align: left;
            font-size: 11px;
            border: 0px;
        }

        #hh .ttd {
            text-align: center;
            vertical-align: top;
            font-size: 11px;
            border: 0px;
        }

        #hh .bi-bt {
            font-size: 11px;
            border-top: 0px;
            border-left: 0px;
            border-right: 0px;
        }

        #hh .ket {
            font-size: 11px;
            vertical-align: bottom;
            border: 0px;
            padding-left: 2%;
        }

        #hh .ket-hsl {
            font-size: 11px;
            vertical-align: bottom;
            border: 0px;
        }
    </style>
</head>

<body>
    <table id="judul">
        <tr>
            <td class="bi" rowspan="3" style="text-align:left; width:80%;">
                <?php $src = base_url('assets/images/knlogo.png'); ?>
                <img style="width:30%;" src="<?= $src ?>">
            </td>
            <td height="10" class="bawah">
                Form – PRC – 02 / RO
            </td>
        </tr>
        <tr>
            <td height="10" class="atas">
                Mulai Berlaku : 01 Januari 2002
            </td>
        </tr>
        <tr>
            <td class="bi">
            </td>
        </tr>
    </table>
    <table style="width:80%;" id="jj">
        <thead>
            <tr>
                <th colspan="3">
                    Approved Vendor List<br>
                </th>
            </tr>
        </thead>
        <tbody>
            <tr>
                <td>[ ] Gelatin</td>
                <td>[ ] Metalize</td>
            </tr>
            <tr>
                <td>[ ] Pewarna</td>
                <td>[ ] Bahan Grease</td>
            </tr>
            <tr>
                <td>[ ] Kemasan Karton</td>
                <td>[ ] Pereaksi Lab</td>
            </tr>
            <tr>
                <td>[ ] Steroform</td>
                <td>[ ] Bengkel</td>
                <td>Periode: 2013</td>
            </tr>

        </tbody>
    </table>

    <!-- Tabel Hasil -->
    <table style="width:100%;" id="hh">
        <tr>
            <th class="text-center">No.</td>
            <th class="text-center">Nama Perusahaan</td>
            <th class="text-center">Alamat</td>
            <th class="text-center">Contact Person</td>
            <th class="text-center">Telepon</td>
            <th class="text-center">Fax</td>
            <th class="text-center">Mutu Barang</td>
            <th class="text-center">Kesesuaian Sistem Mutu</td>
            <th class="text-center">Waktu Pelaksanaan / Pengiriman</td>
            <th class="text-center">Harga</td>
            <th class="text-center">Tanggapan atas permintaan / Keluhan</td>
            <th class="text-center">Pelayanan Purna Jual</td>
            <th class="text-center">Peringkat</td>
        </tr>
        <tr>
            <?php
            $no = 1;
            foreach ($detail as $d) {
            ?>
                <td ><?= $no++ ?>.</td>
                <td ><?= $d['nama_supplier'] ?></td>
                <td ><?= $d['alamat'] ?>, <?=$d['negara']?></td>
                <td ><?= $d['contact_person'] ?></td>
                <td ><?= $d['telepon'] ?></td>
                <td ><?= $d['fax'] ?></td>
                <td ><?= $d['mutu_barang'] ?></td>
                <td ><?= $d['kesesuaian_sistem_mutu'] ?></td>
                <td ><?= $d['waktu_pelaksanaan_pengiriman'] ?></td>
                <td ><?= $d['harga'] ?></td>
                <td ><?= $d['tanggapan_atas_permintaan_keluhan'] ?></td>
                <td ><?= $d['pelayanan_purna_jual'] ?></td>
                <td ><?= $d['peringkat'] ?></td>
            <?php } ?>
        </tr>
    </table>

    <tfoot>
        <table>
            <tr style="border: 0;">
                <td class="text-center">Disetujui oleh,</td>
                <td class="text-center">Disiapkan oleh,</td>
            </tr>
            <tr style="border: 0;">
                <td class="text-center">(plant Manager)</td>
                <td class="text-center">(Manager Dept.)</td>
            </tr>
        </table>
    </tfoot>

</body>

</html>