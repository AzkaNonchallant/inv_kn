<!-- [ Main Content ] start -->
<section class="pcoded-main-container">
  <div class="pcoded-wrapper">
    <div class="pcoded-content">
      <div class="pcoded-inner-content">
        <!-- [ breadcrumb ] start -->
        <div class="page-header">
          <div class="page-block">
            <div class="row align-items-center">
              <div class="col-md-12">
                <div class="page-header-title">
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>">Other</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Other/Rekap_impor') ?>">Rekap Import</a></li>
                </ul>
              </div>
            </div>
          </div>
        </div>
        <!-- [ breadcrumb ] end -->
        <div class="main-body">
          <div class="page-wrapper">
            <!-- [ Main Content ] start -->
            <div class="row">
              <!-- [ basic-table ] start -->
              <div class="col-xl-12">
                <div class="card">
                  <div class="card-header">
                    <h5>Data Rekap Import</h5>
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah Rekap Import
                    </button>
                  </div>

                  <div class="card-block table-border-style">
                    <?php
                    // print_r($result);
                    ?>
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th class="text-center">#</th>
                            <th class="text-center">NO. Order</th>
                            <th class="text-center">Tanggal P.I.B.</th>
                            <th class="text-center">Supplier</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Jumlah</th>
                            <th class="text-center">Payment</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_pib =  explode('-', $k['tgl_pib'])[2] . "/" . explode('-', $k['tgl_pib'])[1] . "/" . explode('-', $k['tgl_pib'])[0];
                          ?>
                            <tr>
                              <th scope="row" class="text-center"><?= $no++ ?></th>
                              <td class="text-center"><?= $k['no_order'] ?></td>
                              <td class="text-center"><?= $tgl_pib ?></td>
                              <td class="text-center"><?= $k['nama_supplier'] ?></td>
                              <td class="text-center"><?= $k['nama_barang'] ?></td>
                              <td class="text-center"><?= $k['jumlah'] ?></td>
                              <td class="text-center"><?= $k['metode_payment'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button style="margin-right: 5px;" type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                  <a style="margin-left: 5px;"  href="<?= base_url() ?>purchasing/other/rekap_impor/delete/<?= $k['id_rekap_import'] ?>"  class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>hapus
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
              <!-- [ basic-table ] end -->
            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Rekap Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Purchasing/Other/Rekap_impor/add">
        <div class="modal-body">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="No_order">No Order</label>
                <input type="text" class="form-control" id="no_order" name="no_order" value="" placeholder="No Order" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_pib">Tanggal P.I.B</label>
                <input type="text" class="form-control datepicker" id="tgl_pib" name="tgl_pib" placeholder="Tanggal P.I.B" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="No_pib">No PIB</label>
                <input type="text" class="form-control" id="no_pib" name="no_pib" placeholder="No PIB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-3">
              <div class="form-group">
                <label for="id_supplier">Nama Supplier</label>
                <select class="form-control chosen-select" id="id_supplier" name="id_supplier" required>
                  <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                  <?php
                  foreach ($res_supplier as $s) {
                  ?>
                    <option value="<?= $s['id_supplier'] ?>">(<?= $s['kode_supplier'] ?>) <?= $s['nama_supplier'] ?></option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="id_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="id_barang" name="id_barang" required>
                  <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                  <?php
                  foreach ($res_barang as $b) {
                  ?>
                    <option data-qtypack="<?= $b['qty_pack'] ?>" value="<?= $b['id_barang'] ?> ">(<?= $b['kode_barang'] ?>) <?= $b['nama_barang'] ?> (<?= $b['satuan'] ?>)</option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="spesifikasi">Spesifikasi</label>
                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi" autocomplete="off" required>
              </div>
            </div>

            <div class="col-1">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="harga_per_unit">Harga per Unit</label>
                <input type="text" class="form-control" id="harga_per_unit" name="harga_per_unit" placeholder="Harga/Unit" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-2">
              <div class="form-group">
                <label for="tot_value">Total value</label>
                <input type="text" class="form-control" id="tot_value" name="tot_value" placeholder="Total value" autocomplete="off" required>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="No_Invoice">No Invoice</label>
                <input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="No Invoice" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="tgl_invoice">Tanggal Invoice</label>
                <input type="text" class="form-control datepicker" id="tgl_invoice" name="tgl_invoice" placeholder="Tanggal Invoice" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="metode_payment">Metode Payment</label>
                <select class="form-control chosen-select" id="metode_payment" name="metode_payment" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Metode Payment -</option>
                  <?php $metode_payment = ["Tunai", "Non-Tunai"];
                  foreach ($metode_payment as $mp) { ?>
                    <option value="<?= $mp ?>"><?= $mp ?></option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="etd">ETD</label>
                <input type="text" class="form-control datepicker" id="etd" name="etd" placeholder="ETD" autocomplete="off" required>
              </div>
            </div>
          </div>



          <div class="row">

            <div class="col-3">
              <div class="form-group">
                <label for="eta">ETA</label>
                <input type="text" class="form-control datepicker" id="eta" name="eta" placeholder="ETA" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="No_bl">No BL</label>
                <input type="text" class="form-control" id="no_bl" name="no_bl" placeholder="No BL" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="voyager">Voyager</label>
                <input type="text" class="form-control" id="voyager" name="voyager" placeholder="Voyager" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="No_voyager">No Voyager</label>
                <input type="text" class="form-control" id="no_voyager" name="no_voyager" placeholder="No Voyager" autocomplete="off" required>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" class="btn btn-primary">Simpan</button>
          </div>
      </form>
    </div>
  </div>
</div>