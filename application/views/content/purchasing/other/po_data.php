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
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Other/Po') ?>">PO</a></li>
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
                    <h5>Data Pre Order</h5>
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah PO
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
                            <th class="text-center">No. PO</th>
                            <th class="text-center">Tanggal PO</th>
                            <th class="text-center">Nama Supplier</th>
                            <th class="text-center">Nama Barang</th>
                            <th class="text-center">Aksi</th>
   x  
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_pib =  explode('-', $k['tgl_pib'])[2] . "/" . explode('-', $k['tgl_pib'])[1] . "/" . explode('-', $k['tgl_pib'])[0];
                          ?>
                            <tr>
                              <th scope="row" class="text-center"> <?= $no ?></th>
                              <td class="text-center"><?=$k['no_po']?></td>
                              <td class="text-center"><?=$k['tgl_po']?></td>
                              <td class="text-center"><?=$k['nama_supplier']?></td>
                              <td class="text-center"><?=$k['nama_barang']?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button style="margin-right: 5px;" type="button" class="btn btn-info btn-square btn-sm">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                  <a style="margin-left: 5px;" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah PO</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Other/Po/add">
        <div class="modal-body">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_po">No. PO</label>
                <input type="text" class="form-control" id="no_po" name="no_po" value="" placeholder="No PO" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_po">Tanggal PO</label>
                <input type="text" class="form-control datepicker" id="tgl_po" name="tgl_po" placeholder="Tanggal PO" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_supplier">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_supplier" name="nama_supplier" placeholder="Nama Supplier" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-2">
              <div class="form-group">
                <label for="PIC_Supplier">PIC Supplier</label>
                <input type="text" class="form-control" id="PIC_Supplier" name="PIC_Supplier" placeholder="PIC Supplier" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="size">Nama Barang</label>
                <select class="form-control chosen-select" id="size" name="size" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Nama Barang -</option>
                  <option> </option>
                </select>
              </div>
            </div>

            <div class="col-4">
              <div class="form-group">
                <label for="Spesifikasi">Spesifikasi</label>
                <input type="text" class="form-control" id="Spesifikasi" name="Spesifikasi" placeholder="Spesifikasi" autocomplete="off" required>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="Jumlah">Jumlah</label>
                <input type="text" class="form-control" id="Jumlah" name="Jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="harga_per_unit">Harga per Unit</label>
                <input type="text" class="form-control" id="harga_per_unit" name="harga_per_unit" placeholder="Harga/Unit" autocomplete="off" required>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="tot_value">Total value</label>
                <input type="text" class="form-control" id="tot_value" name="tot_value" placeholder="Total value" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="metode">Metode</label>
                <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="shipment">Shipment</label>
                <input type="text" class="form-control" id="shipment" name="shipment" placeholder="Shipment" autocomplete="off" required>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="pic_kapsulindo_1">PIC Kapsulindo 1</label>
                <input type="text" class="form-control" id="pic_kapsulindo_1" name="pic_kapsulindo_1" placeholder="PIC Kapsulindo 1" autocomplete="off" required>
              </div>
            </div>

            <div class="col-2">
              <div class="form-group">
                <label for="pic_kapsulindo_2">PIC Kapsulindo 2</label>
                <input type="text" class="form-control" id="pic_kapsulindo_2" name="pic_kapsulindo_2" placeholder="PIC Kapsulindo 2" autocomplete="off" required>
              </div>
            </div>

          </div>

          <div class="row">

            <div class="col-3">
              <div class="form-group">
                <label for="no_ppb">NO PPB</label>
                <input type="text" class="form-control" id="no_ppb" name="no_ppb" placeholder="NO PPB" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="harga_netto">Harga Netto</label>
                <input type="text" class="form-control" id="harga_netto" name="harga_netto" placeholder="Harga Netto" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="pajak">Pajak</label>
                <input type="text" class="form-control" id="pajak" name="pajak" placeholder="Pajak" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="tot_harga">Total Harga</label>
                <input type="text" class="form-control" id="tot_harga" name="tot_harga" placeholder="Total Harga" autocomplete="off" required>
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