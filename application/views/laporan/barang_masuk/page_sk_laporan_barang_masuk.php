<!DOCTYPE html>
<html>

<head>
  <title>Export Laporan Barang Masuk</title>
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
      padding: 3px 8px;
    }

    table td {
      vertical-align: top;
    }

    a {
      background: blue;
      color: #fff;
      padding: 8px 10px;
      text-decoration: none;
      border-radius: 2px;
    }

    .jj tr td {
      border: 0;
      padding: 0;
    }

    .jj {
      margin-bottom: 2px;
    }

    .jdl_kol {
      font-size: 12px;
      font-weight: bold;
    }

    .no {
      font-size: 11px;
    }

    .hsl {
      font-size: 11px;
    }
  </style>
</head>

<body>
  <?php
  if ($tgl == null && $tgl2 == null) {
    $per = "";
  } else {
    $per = "Periode : " . $tgl . " - " . $tgl2;
  }
  ?>

  <table class="jj">
    <tr>
      <td></td>
      <td style="text-align: center; padding-left: -20px;">
        <?php $src = base_url('assets/images/icon.png'); ?>
        <img style="width: 60px; height: 100px;" src="<?= $src ?>">
      </td>
      <td style="width: 460px;">
        <h2 style="line-height: 0.01; font-size: 30px;">PT KAPSULINDO NUSANTARA</h2>
        <h3 style="line-height: 0.01; font-size: 23px;">Pedagang Besar Bahan Baku Farmasi</h3>
        <p style="line-height: 0.01; font-size: 12px;">Jl. Pancasila 1 Cicadas Gunung Putrri - Kab. Bogor 16964, Indonesia</p>
        <p style="line-height: 0.01; font-size: 12px;">Tlp: (021) 8671165. Fax: (021) 8671168, 86861734. Email: pbbbf@kapsulindo.co.id</p>
      </td>
      <td>
        <?php $src = base_url('assets/images/pom.jpeg'); ?>
        <img style="width: 120px; height: 100px;" src="<?= $src ?>">
      </td>
    </tr>
  </table>
  <hr style="line-height: 0.01;">
  <div style="text-align: center; padding-top: 5px;">
    <h3 style="float: center; line-height: 0.2;">Report Stock In</h3>
    <p style="line-height: 0.1; font-size: 12px;"><?= $per ?></p>
  </div>

  <table id="hh" style="width: 100%;">
    <thead>
      <tr>
        <th class="no">No</th>
        <th class="jdl_kol">Tanggal</th>
        <th class="jdl_kol">Nama Barang</th>
        <th class="jdl_kol">Qty</th>
        <th class="jdl_kol">Spesifikasi</th>
        <th class="jdl_kol" style="width: 15%;">Operator StockKeeper</th>
        <th class="jdl_kol">Unit</th>
      </tr>
    </thead>
    <tbody>
      <?php
      $no = 1;
      $jml = 0;
      foreach ($result as $k) {
        $tgl_msk = explode('-', $k['tgl_msk'])[2] . "/" . explode('-', $k['tgl_msk'])[1] . "/" . explode('-', $k['tgl_msk'])[0];
        $jml += $k['jumlah_masuk'];
      ?>
        <tr>
          <th class="no" scope="row"><?= $no++ ?></th>
          <td class="hsl"><?= $tgl_msk ?></td>
          <td class="hsl"><?= $k['nama_barang'] ?></td>
          <td class="hsl"><?= $k['jumlah_masuk'] ?></td>
          <td class="hsl"><?= $k['spek'] ?></td>
          <td class="hsl"><?= $k['op_sk'] ?></td>
          <td class="hsl"><?= $k['unit'] ?></td>
        </tr>
      <?php
      }
      ?>
    </tbody>
    <tfoot>
      <tr>
        <th colspan="6" class="jdl_kol">Jumlah</th>
        <th class="jdl_kol" style="text-align: right;"><?= number_format($jml, 0, ",", ".") ?>&nbsp;</th>
      </tr>
    </tfoot>
  </table>
</body>

</html>