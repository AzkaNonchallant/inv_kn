<html>

<head>
    <title>Print Schedule Marketing</title>
    <style type="text/css">
        body {
            font-family: sans-serif;
            margin: 0;
            padding: 10px;
        }

        table {
            width: 100%;
            margin: 10px auto;
            border-collapse: collapse;
            font-size: 10px;
        }

        table th,
        table td {
            border: 1px solid #3c3c3c;
            padding: 3px;
        }

        .periode {
            text-align: center;
            font-size: 12px;
            line-height: 1.2;
            margin-bottom: 10px;
        }

        .header-title {
            text-align: center;
            margin: 5px 0;
        }

        .header-title h3 {
            margin: 5px 0;
            line-height: 1;
        }

        /* Styling untuk tabel utama */
        #schedule-table th {
            background-color: #ffa07a; /* lightsalmon */
            color: #000080; /* darkblue */
            font-weight: bold;
            text-align: center;
            font-size: 9px;
            padding: 4px 2px;
        }

        #schedule-table td {
            font-size: 8px;
            vertical-align: middle;
        }

        .mesin-header {
            background-color: #f0f0f0;
            font-weight: bold;
            text-align: center;
            font-size: 10px;
        }

        .customer-name {
            text-align: left;
            font-weight: bold;
            padding-left: 3px;
        }

        .text-center {
            text-align: center;
        }

        .note-row {
            background-color: #fff0f0;
        }

        .note-cell {
            color: red;
            font-weight: bold;
            text-align: center;
            font-size: 10px;
            padding: 8px;
        }

        .spacer-row {
            height: 8px;
        }

        .spacer-cell {
            border: none;
            background-color: #f8f8f8;
        }

        /* Warna untuk mesin yang berbeda */
        .mesin-A { background-color: #e6f3ff; }
        .mesin-B { background-color: #fff0e6; }
        .mesin-C { background-color: #f0ffe6; }
        .mesin-D { background-color: #fff6e6; }
        .mesin-E { background-color: #f6e6ff; }
        .mesin-F { background-color: #e6fff6; }
        .mesin-G { background-color: #ffe6e6; }
        .mesin-H { background-color: #ffffe6; }
        .mesin-I { background-color: #e6e6ff; }
    </style>
</head>

<body>

    <?php
    function bulan($bulan)
    {
        $bulanMap = [
            '01' => 'Januari', '02' => 'Februari', '03' => 'Maret',
            '04' => 'April', '05' => 'Mei', '06' => 'Juni',
            '07' => 'Juli', '08' => 'Agustus', '09' => 'September',
            '10' => 'Oktober', '11' => 'November', '12' => 'Desember'
        ];
        return $bulanMap[$bulan] ?? 'No Month';
    }

    // Format periode
    if ($tgl == null && $tgl2 == null) {
        $per = "";
    } else {
        $tglParts = explode('-', $tgl);
        $tgl2Parts = explode('-', $tgl2);
        $new_tgl = $tglParts[2] . " " . bulan($tglParts[1]) . " " . $tglParts[0];
        $new_tgl2 = $tgl2Parts[2] . " " . bulan($tgl2Parts[1]) . " " . $tgl2Parts[0];
        $per = "Periode : " . $new_tgl . " - " . $new_tgl2;
    }
    ?>

    <div class="header-title">
        <h3>SCHEDULE PRODUCTION</h3>
        <p class="periode"><?= $per ?></p>
    </div>

    <!-- Tabel Schedule -->
    <table id="schedule-table">
        <thead>
            <tr>
                <th style="width: 3%">MC</th>
                <th style="width: 2%">NO</th>
                <th style="width: 15%">NAMA CUSTOMER</th>
                <th style="width: 4%">SIZE</th>
                <th style="width: 7%">KODE WARNA</th>
                <th style="width: 12%">NAMA WARNA</th>
                <th style="width: 10%">PRINT</th>
                <th style="width: 3%">TINTA</th>
                <th style="width: 5%">MINYAK</th>
                <th style="width: 4%">JML</th>
                <th style="width: 4%">SISA</th>
                <th style="width: 7%">TGL SCH</th>
                <th style="width: 4%">CR</th>
                <th style="width: 6%">DELIVERY</th>
                <th style="width: 4%">BOX</th>
                <th style="width: 4%">ZAK</th>
                <th style="width: 6%">NO BATCH</th>
            </tr>
        </thead>
        <tbody>
            <?php
            $mesins = array('A', 'B', 'C', 'D', 'E', 'F', 'G', 'H', 'I');
            
            foreach ($mesins as $mesin) {
                $no = 1;
                
                // Filter data berdasarkan mesin
                $detail_per_mesin = array();
                foreach ($detail as $item) {
                    if ($item['mesin'] === $mesin) {
                        $detail_per_mesin[] = $item;
                    }
                }

                // Jika tidak ada data untuk mesin ini
                if (count($detail_per_mesin) === 0) {
            ?>
                    <tr class="mesin-<?= $mesin ?>">
                        <td class="mesin-header"><?= $mesin ?></td>
                        <td class="note-cell" colspan="16">
                            NOTE : MC. <?= $mesin ?> STOP OPERASIONAL
                        </td>
                    </tr>
                    <tr class="spacer-row">
                        <td class="spacer-cell" colspan="17"></td>
                    </tr>
                <?php
                    continue;
                }

                // Tampilkan data untuk mesin ini
                foreach ($detail_per_mesin as $k) {
                    $tgl_sch = explode('-', $k['tgl_sch'])[2] . "-" . explode('-', $k['tgl_sch'])[1] . "-" . explode('-', $k['tgl_sch'])[0];
                    $tgl_kirim = explode('-', $k['tgl_kirim'])[2] . "-" . explode('-', $k['tgl_kirim'])[1] . "-" . explode('-', $k['tgl_kirim'])[0];
                    
                    // Format jumlah dengan separator
                    $jumlah = number_format($k['jumlah'], 0, ',', '.');
                    $sisa = $k['sisa'] != 0 ? number_format($k['sisa'], 0, ',', '.') : '-';
                ?>
                    <tr class="mesin-<?= $mesin ?>">
                        <?php if ($no === 1) { ?>
                            <td class="mesin-header text-center"><?= $k['mesin'] ?></td>
                        <?php } else { ?>
                            <td class="text-center"></td>
                        <?php } ?>
                        <td class="text-center"><?= $no++ ?></td>
                        <td class="customer-name"><?= $k['nama_customer'] ?></td>
                        <td class="text-center"><?= $k['size'] ?></td>
                        <td class="text-center"><?= $k['kode_warna_cap'] ?>-<?= $k['kode_warna_body'] ?></td>
                        <td class="text-center"><?= $k['warna_cap'] ?>-<?= $k['warna_body'] ?></td>
                        <td class="text-center"><?= $k['print'] ?></td>
                        <td class="text-center"><?= $k['tinta'] ?></td>
                        <td class="text-center"><?= $k['minyak'] ?></td>
                        <td class="text-center"><?= $jumlah ?></td>
                        <td class="text-center"><?= $sisa ?></td>
                        <td class="text-center"><?= $tgl_sch ?></td>
                        <td class="text-center"><?= $k['no_cr'] ?></td>
                        <td class="text-center"><?= $tgl_kirim ?></td>
                        <td class="text-center"><?= $k['jenis_box'] ?></td>
                        <td class="text-center"><?= $k['jenis_zak'] ?></td>
                        <td class="text-center"><?= $k['no_batch'] ?></td>
                    </tr>
                <?php } ?>
                
                <!-- Baris spacer antara mesin -->
                <tr class="spacer-row">
                    <td class="spacer-cell" colspan="17"></td>
                </tr>
            <?php } ?>
        </tbody>
    </table>

    <!-- Informasi Footer -->
    <div style="margin-top: 20px; font-size: 9px; text-align: center;">
        <p><strong>Keterangan:</strong></p>
        <p>MC = Mesin | CR = Customer Request | JML = Jumlah | SCH = Schedule</p>
        <p>Dicetak pada: <?= date('d-m-Y H:i:s') ?></p>
    </div>

</body>

</html>