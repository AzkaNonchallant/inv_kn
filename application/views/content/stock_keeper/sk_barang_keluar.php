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
                  <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/Barang_keluar') ?>">Barang Keluar</a></li>
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
                    <h5>Data Barang Keluar <b>(Approval)</b></h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Data
                    </button>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <!-- <th>No. Po</th>
                             <th>No Batch</th> -->
                            <th>Nama Barang</th>
                            <th class="text-right">Qty</th>
                            <!-- <th class="text-right">Barang keluar</th> -->
                            <!-- <th class="text-right">Stok</th> -->
                            <th class="text-right">Details</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl =  explode('-', $k['tgl_keluar'])[2] . "/" . explode('-', $k['tgl_keluar'])[1] . "/" . explode('-', $k['tgl_keluar'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['jumlah_keluar'] ?></td>
                              <td class="text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" 
                                  data-id_sk_barang="<?= $k['id_sk_barang']?>" data-tgl_keluar="<?= $tgl?>" data-jumlah_keluar="<?= $k['jumlah_keluar']?>" data-spek="<?= $k['spek']?>" data-unit="<?= $k['unit']?>"  data-op_sk="<?= $k['op_sk']?>" 
                                   >
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin")  { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                    data-id_sk_barang="<?= $k['id_sk_barang']?>"
                                    data-id_sk_barang_keluar="<?= $k['id_sk_barang_keluar'] ?>"
                                    data-nama_barang="<?= $k['nama_barang']?>" 
                                    data-tgl_keluar="<?= $tgl?>" 
                                    data-jumlah_keluar="<?= $k['jumlah_keluar']?>" 
                                    data-spek="<?= $k['spek']?>" 
                                    data-unit="<?= $k['unit']?>"  
                                    data-op_sk="<?= $k['op_sk']?>" 
                                    >
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Stock_keeper/Sk_barang_keluar/delete/<?= $k['id_sk_barang_keluar'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Hapus
                                    </a>
                                  </div>
                                <?php } ?>
                              </td>
                            </tr>
                          <?php } ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>Stock_keeper/Sk_barang_keluar/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_keluar">Tanggal keluar</label>
                <input type="text" class="form-control datepicker" id="tgl_keluar" name="tgl_keluar" placeholder="Tanggal keluar" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="id_sk_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="id_sk_barang" name="id_sk_barang" required>
                  <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                  <?php
                  foreach ($res_barang as $b) {
                  ?>
                    <option value="<?= $b['id_sk_barang'] ?>" data-spek="<?= $b['spek'] ?>" data-unit="<?= $b['unit'] ?>"><?= $b['nama_barang'] ?> (<?= $b['spek'] ?>)</option>
                  <?php
                  }
                  ?>
                </select>
              </div>
            </div>

            <div class="col-md-2">
              <div class="form-group">
                <label for="jumlah_keluar">jumlah_keluar</label>
                <input type="text" class="form-control" id="jumlah_keluar" name="jumlah_keluar" placeholder="jumlah_keluar" autocomplete="off" >
              </div>
            </div>

            <!-- QTY -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="op_sk">OP Stock Keeper</label>
                <input type="text" class="form-control" id="op_sk" name="op_sk" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="OP StockKeeper" readonly>
              </div>
            </div>

            <!-- Display Spec and Unit -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="spek">Spesifikasi</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spesifikasi" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="unit" name="unit" placeholder="Unit" readonly>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>



<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_keluar">Tanggal Keluar</label>
                <input type="text" class="form-control" id="v-tgl_keluar" name="tgl_keluar" placeholder="Tanggal Keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_sk_barang">Nama Barang</label>
                <input type="text" class="form-control" id="v-id_sk_barang" name="id_sk_barang" placeholder="Nama Barang" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jumlah_keluar">jumlah_keluar</label>
                <input type="text" class="form-control" id="v-jumlah_keluar" name="jumlah_keluar" placeholder="jumlah_keluar" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="spek">Spek</label>
                <input type="text" class="form-control" id="v-spek" name="spek" placeholder="Spek" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="v-unit" name="unit" placeholder="Unit" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="op_sk">OP Stock Keeper</label>
                <input type="text" class="form-control" id="v-op_sk" name="op_sk" placeholder="OP StockKeeper" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="qty">jumlah_keluar Bahan</label>
                <input type="text" class="form-control" id="v-qty" name="qty" placeholder="jumlah_keluar Bahan" maxlength="15" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_kemasan">jumlah_keluar Kemasan</label>
                <input type=
                "text" class="form-control" id="v-jml_kemasan" name="jml_kemasan" placeholder="jumlah_keluar Kemasan" maxlength="15" readonly>
              </div>
            </div>
            <div class="col-md-12">
              <div class="form-group">
                <center><label for="pemeriksaan"><b>Hasil Pemeriksaan Fisik Kemasan</b></label></center>
                <div class="row">
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Tutup</label>
                      <input type="text" class="form-control" id="v-tutup" name="tutup" readonly>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#id_sk_barang').change(function() {
      var selectedOption = $(this).find('option:selected');
      var spek = selectedOption.data('spek');
      var unit = selectedOption.data('unit');

      $('#spek').val(spek);  // Update spesifikasi
      $('#unit').val(unit);  // Update unit
    });
  });
</script>

<script>
  // $(document).ready(function() {
  // $('#detail').on('show.bs.modal', function(event) {
  //   var id_sk_barang = $(event.relatedTarget).data('id_sk_barang');
  //   var tgl_keluar = $(event.relatedTarget).data('tgl_keluar');
  //   var nama_barang = $(event.relatedTarget).data('nama_barang');
  //   var jumlah_keluar = $(event.relatedTarget).data('jumlah_keluar');
  //   var spek = $(event.relatedTarget).data('spek');
  //   var unit = $(event.relatedTarget).data('unit');
  //   var op_sk = $(event.relatedTarget).data('op_sk');

  //   $(this).find('#v-id_sk_barang').val(id_sk_barang);
  //   $(this).find('#v-tgl_keluar').val(tgl_keluar);
  //   $(this).find('#v-nama_barang').val(nama_barang);
  //   $(this).find('#v-jumlah_keluar').val(jumlah_keluar);
  //   $(this).find('#v-spek').val(spek);
  //   $(this).find('#v-unit').val(unit);
  //   $(this).find('#v-op_sk').val(op_sk);
  // });
// });
</script>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang Keluar</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>

      <form method="post" id="form_update" action="<?= base_url() ?>Stock_keeper/Sk_barang_keluar/update">
        <input type="hidden" id="e_id_sk_barang_keluar" name="id_sk_barang_keluar">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_keluar">Tanggal Keluar</label>
                <input type="text" class="form-control datepicker" id="e_tgl_keluar" name="tgl_keluar" placeholder="Tanggal Keluar" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="e_nama_barang" name="nama_barang" required>
                  <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                  <?php foreach ($res_barang as $b) { ?>
                    <option value="<?= $b['id_sk_barang'] ?>"><?= $b['nama_barang'] ?> (<?= $b['spek'] ?>)</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="jumlah_keluar">jumlah_keluar</label>
                <input type="text" class="form-control" id="e_jumlah_keluar" name="jumlah_keluar" placeholder="jumlah_keluar" autocomplete="off">
              </div>
            </div>
          </div> 
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="op_sk">OP Stock Keeper</label>
            <input type="text" class="form-control" id="op_sk" name="op_sk" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="OP StockKeeper" readonly>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" class="btn btn-primary" onclick="if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id_sk_barang = button.data('id_sk_barang');
      var id_sk_barang_keluar = button.data('id_sk_barang_keluar');
      var tgl_keluar = button.data('tgl_keluar');
      var jumlah_keluar = button.data('jumlah_keluar');
      var op_sk = button.data('op_sk');

      $('#e_id_sk_barang_keluar').val(id_sk_barang_keluar);
      $('#e_tgl_keluar').val(tgl_keluar);
      $('#e_nama_barang').val(id_sk_barang);
      $('#e_nama_barang').trigger("chosen:updated");
      $('#e_jumlah_keluar').val(jumlah_keluar);
      $('#op_sk').val(op_sk);

      $('#e_tgl_keluar').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
    });
  });
</script>
