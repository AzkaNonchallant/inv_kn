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
                  <li class="breadcrumb-item"><a href="javascript:">Stock Keeper</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Master Stock Keeper</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('stock_keeper/sk_master_barang') ?>">Master Barang</a></li>
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
                    <h5>Data Barang</h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
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
                            <th>#</th>
                            <th>Nama Barang</th>
                            <th>Spesifikasi</th>
                            <th>Unit</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $jabatan = $this->session->userdata('jabatan');
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['spek'] ?></td>
                              <td><?= $k['unit'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $jabatan === "supervisor") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_sk_barang="<?= $k['id_sk_barang'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-spek="<?= $k['spek'] ?>" data-unit="<?= $k['unit'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>stock_keeper/sk_master_barang/delete/<?= $k['id_sk_barang'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
                                  </div>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
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
<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>stock_keeper/sk_master_barang/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Speksifikasi</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="unit">Unit</label>
                <select class="form-control chosen-select" id="unit" name="unit" required>
                  <option value="" disabled selected hidden>- Pilih Unit -</option>
                  <option value="Bh">Buah</option>
                  <option value="Set">Set</option>
                  <option value="Pcs">Pcs</option>
                  <option value="Roll">Roll</option>
                  <option value="Mtr">Meter</option>
                  <option value="Klg">Kaleng</option>
                  <option value="Ltr">Liter</option>
                </select>
              </div>
            </div>
        </div>
        <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

< <!-- Modal Edit-->
  <div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <form method="post" action="<?= base_url() ?>stock_keeper/sk_master_barang/update">
          <div class="modal-body">
            <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="hidden" id="e-id_sk_barang" name="id_sk_sbarang">
                <input type="text" class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Speksifikasi</label>
                <input type="text" class="form-control" id="e-spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="unit">Unit</label>
                <select class="form-control chosen-select" id="e-unit" name="unit" required>
                  <option value="" disabled selected hidden>- Pilih Unit -</option>
                  <option value="Bh">Buah</option>
                  <option value="Set">Set</option>
                  <option value="Pcs">Pcs</option>
                  <option value="Roll">Roll</option>
                  <option value="Mtr">Meter</option>
                  <option value="Klg">Kaleng</option>
                  <option value="Ltr">Liter</option>
                </select>
              </div>
            </div>
        </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  </div>
  <script type="text/javascript">
    $(document).ready(function() {
      $('#edit').on('show.bs.modal', function(event) {
        var id_sk_barang = $(event.relatedTarget).data('id_sk_barang')
        var nama_barang = $(event.relatedTarget).data('nama_barang')
        var spek = $(event.relatedTarget).data('spek')
        var unit = $(event.relatedTarget).data('unit')
        
       
        $(this).find('#e-id_sk_barang').val(id_sk_barang)
        $(this).find('#e-nama_barang').val(nama_barang)
        $(this).find('#e-spek').val(spek)
        $(this).find('#e-unit').val(unit)
        $(this).find('#e-unit').trigger("chosen:updated");
    
      });
    })
  </script>