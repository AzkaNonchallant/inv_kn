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
                  <li class="breadcrumb-item"><a href="<?= base_url('Ppb/PPB') ?>">PPB</a></li>
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
                    <h5>Data PPB</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah PPB
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
                            <th class="text-center">A</th>
                            <th class="text-center">B</th>
                            <th class="text-center">C</th>
                            <th class="text-center">D</th>
                            <th class="text-center">E</th>
                            <th class="text-center">F</th>
                            <th class="text-center">G</th>
                            <th class="text-center">H</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          // foreach ($result as $k)
                          {
                          ?>
                            <tr>
                              <th scope="row" class="text-center"><?= $no++ ?></th>
                              <td class="text-center">...</td>
                              <td class="text-center">...</td>
                              <td class="text-center">...</td>
                              <td class="text-center">...</td>
                              <td class="text-center">...</td>
                              <td class="text-center">...</td>
                              <td class="text-center">...</td>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah PPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Ppb/PPB">
        <div class="modal-body">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="budget_non_budget">Budget / Non Budget</label>
                <input type="text" class="form-control" id="budget_non_budget" name="budget_non_budget" placeholder="Budget / Non Budget" required>
              </div>
            </div>


            <div class="col-md-4">
              <div class="form-group">
                <label for="bagian">Bagian</label>
                <input type="text" class="form-control" id="bagian" name="bagian" value="" placeholder="Bagian" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="form_a_c">Form A/C</label>
                <input type="text" class="form-control" id="form_a_c" name="form_a_c" placeholder="Form A/C" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label for="no_ppb">No. PPB</label>
                <input type="text" class="form-control" id="no_ppb" name="no_ppb" placeholder="No. PPB" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control datepicker" id="tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="size">Nama Barang</label>
                <select class="form-control chosen-select" id="size" name="size" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Nama Barang -</option>
                  <option> </option>
                </select>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="spesifikasi">Spesifikasi</label>
                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-3">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="tgl_kebutuhan">Tanggal Kebutuhan</label>
                <input type="text" class="form-control datepicker" id="tgl_kebutuhan" name="tgl_tgl_kebutuhanppb" placeholder="Tanggal Kebutuhan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-3">
              <div class="form-group">
                <label for="stock_akhir">Stock Akhir</label>
                <input type="text" class="form-control" id="stock_akhir" name="stock_akhir" placeholder="Stock Akhir" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="nama_admin">Nama Admin</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" placeholder="Nama Admin" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="nama_supervisor">Nama Supervisor</label>
                <input type="text" class="form-control" id="nama_supervisor" name="nama_supervisor" placeholder="Nama Supervisor" autocomplete="off" required>
              </div>
            </div>
            <div class="col-3">
              <div class="form-group">
                <label for="nama_menager">Nama Menager</label>
                <input type="text" class="form-control" id="nama_menager" name="nama_menager" placeholder="Nama Menager" autocomplete="off" required>
              </div>
            </div>

          </div>

          <div class="row">
            <div class="col-6">
              <div class="form-group">
                <label for="nama_plant_menager">Nama Plant Menager</label>
                <input type="text" class="form-control" id="nama_plant_menager" name="nama_plant_menager" placeholder="Nama Plant Menager" autocomplete="off" required>
              </div>
            </div>
            <div class="col-6">
              <div class="form-group">
                <label for="nama_direktur">Nama Direktur</label>
                <input type="text" class="form-control" id="nama_direktur" name="nama_direktur" placeholder="Nama Direktur" autocomplete="off" required>
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