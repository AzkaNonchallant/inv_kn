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
                  <!-- <h5 class="m-b-10">Data Barang Masuk</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Gudang Bahan Baku</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('gudang_bahanbaku/Barang_masuk') ?>">Barang Masuk</a></li>
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
                    <h5>Data Barang Masuk <b>(Approval)</b></h5>

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
                            <!-- <th class="text-right">Barang Keluar</th> -->
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
                            $tgl =  explode('-', $k['tgl_msk'])[2] . "/" . explode('-', $k['tgl_msk'])[1] . "/" . explode('-', $k['tgl_msk'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['jumlah_masuk'] ?></td>
                             
                              <td class="text-right">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" 
                                  data-id_sk_barang="<?= $k['id_sk_barang']?>" data-tgl_msk="<?= $tgl?>" data-jumlah_masuk="<?= $k['jumlah_masuk']?>" data-spek="<?= $k['spek']?>" data-unit="<?= $k['unit']?>"  data-op_sk="<?= $k['op_sk']?>" 
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
                                    data-id_sk_barang_masuk="<?= $k['id_sk_barang_masuk'] ?>"
                                    data-nama_barang="<?= $k['nama_barang']?>" 
                                    data-tgl_msk="<?= $tgl?>" 
                                    data-jumlah_masuk="<?= $k['jumlah_masuk']?>" 
                                    data-spek="<?= $k['spek']?>" 
                                    data-unit="<?= $k['unit']?>"  
                                    data-op_sk="<?= $k['op_sk']?>" 
                                    >
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Stock_keeper/Sk_barang_masuk/delete/<?= $k['id_sk_barang_masuk'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { false; }">
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>Stock_keeper/Sk_barang_masuk/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_msk">Tanggal Masuk</label>
                <input type="text" class="form-control datepicker" id="tgl_msk" name="tgl_msk" placeholder="Tanggal Masuk" autocomplete="off" required>
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
                <label for="jumlah_masuk">Jumlah</label>
                <input type="text" class="form-control" id="jumlah_masuk" name="jumlah_masuk" placeholder="jumlah_masuk" autocomplete="off">
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
    </div>
    </form>
  </div>
</div>
</div>

<!-- jQuery to Update Spec and Unit -->
<script>
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


<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add">
        <div class="modal-body">
          <div class="row">
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                <input type="text" class="form-control" id="v-no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
              </div>
            </div> -->
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label for="no_surat_jalan">No. Po</label>
                <input type="text" class="form-control" id="v-no_surat_jalan" name="no_surat_jalan" maxlength="20" placeholder="No. Po" aria-describedby="validationServer03Feedback" readonly>
              </div>
            </div> -->
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_msk">Tanggal Masuk</label>
                <!-- <input type="text" class="form-control" id="v-tgl_msk" name="tgl_msk" placeholder="Tanggal Masuk" readonly > -->
                <input type="text" class="form-control" id="v-tgl_msk" name="tgl_msk" placeholder="Tanggal masuk" readonly>
                <!-- data-id_barang=" -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="id_sk_barang">Nama Barang</label>
                <input type="text" class="form-control" id="v-id_sk_barang" name="id_sk_barang" placeholder="Nama Barang" readonly>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label for="id_supplier">Nama Supplier</label>
                <input type="text" class="form-control" id="v-nama_supplier" name="nama_supplier" placeholder="Nama Supplier" readonly>
              </div>
            </div> -->

            <div class="col-md-4">
              <div class="form-group">
                <label for="jumlah_masuk">Jumlah</label>
                <input type="text" class="form-control" id="v-jumlah_masuk" name="jumlah_masuk" placeholder="jumlah_masuk" readonly  >
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
                <input type="text" class="form-control" id="v-unit" name="unit" placeholder="Unit" readonly >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="op_sk">OP Stock Keeper</label>
                <input type="text" class="form-control" id="v-op_sk" name="op_sk" placeholder="OP StockKeeper" readonly>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label for="dok_pendukung">Dokumen Pendukung</label>
                <input type="text" class="form-control" id="v-dok_pendukung" name="dok_pendukung" readonly>
              </div>
            </div>
            
            <div class="col-md-4"></div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jenis_kemasan">Jenis Kemasan</label>
                <input type="text" class="form-control" id="v-jenis_kemasan" name="jenis_kemasan" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="qty">Jumlah Bahan</label>
                <input type="text" class="form-control" id="v-qty" name="qty" placeholder="Jumlah Bahan" maxlength="15" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jml_kemasan">Jumlah Kemasan</label>
                <input type="text" class="form-control" id="v-jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan" maxlength="15" readonly>
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
                    </div> -->
                    <!-- <div class="col-md-4">
                                            <div>
                                                <input type="text" id="jml_tutup_tidakrapat" name="jml_tutup_tidakrapat" class="form-control form-calculate" readonly> <br>
                                            </div>
                                        </div> -->
                  <!-- </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Wadah</label>
                      <input type="text" class="form-control" id="v-wadah" name="wadah" readonly>
                    </div> -->
                    <!-- <div id="form_wadah_rusak" class="col-md-4">
                                            <div>
                                                <input type="text" id="jml_wadah_rusak" name="jml_wadah_rusak" class="form-control form-calculate" readonly> <br>
                                            </div>
                                        </div> -->
                  <!-- </div>
                  <div class="col-md-4">
                    <div class="form-group">
                      <label>Label</label>
                      <input type="text" class="form-control" id="v-label" name="label" readonly>
                    </div> -->
                    <!-- <div id="form_label_tidakterbaca" class="col-md-4">
                                            <div>
                                                <input type="text" id="jml_label_tidakterbaca" name="jml_label_tidakterbaca" class="form-control form-calculate" readonly> <br>
                                            </div>
                                        </div> -->
                  <!-- </div>
                  <div id="hasil_kemasan" class="col-md-4 form-group">
                    <div>
                      <label class="">Hasil Kemasan</label>
                      <div>
                        <table id="hasil_kemasan">
                          <tr>
                            <td style="width: 5%;">Di Terima</td>
                            <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-25" id="v-diterima_kemasan" name="diterima_kemasan" readonly></td>
                          </tr>
                          <tr>
                            <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                            <td><input type="text" class="form-control form-control-sm w-25" id="v-ditolak_kemasan" name="ditolak_kemasan" readonly></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                  <div id="hasil_bahan" class="col-md-4 form-group">
                    <div>
                      <label class="">Hasil Bahan</label>
                      <div>
                        <table id="hasil_bahan">
                          <tr>
                            <td style="width: 5%;">Di Terima</td>
                            <td style="width: 20%;"><input type="text" class="form-control form-control-sm w-50" id="v-diterima_bahan" name="diterima_bahan" readonly></td>
                          </tr>
                          <tr>
                            <td style="width: 5%;"><span class="">Di Tolak</span> </td>
                            <td style="width: 20%"><input type="text" class="form-control form-control-sm w-50" id="v-ditolak_bahan" name="ditolak_bahan" readonly></td>
                          </tr>
                        </table>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="mfg">Mfg. Date</label>
                <input type="text" class="form-control" id="v-mfg" name="mfg" placeholder="Tanggal Kadaluarsa" readonly>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="exp">Exp Date</label>
                <input type="text" class="form-control" id="v-exp" name="exp" placeholder="Tanggal Kadaluarsa" readonly>
              </div>
            </div> -->
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
    $('#detail').on('show.bs.modal', function(event) {
      // var id_barang_masuk = $(event.relatedTarget).data('id_barang_masuk')
      // jQuery.ajax({
      //   url: `<?= base_url() ?>barang_masuk/getOne/${id_barang_masuk}`,
      //   type: "get",
      

      var id_sk_barang = $(event.relatedTarget).data('id_sk_barang')
      // var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
      // var no_batch = $(event.relatedTarget).data('no_batch')
      var tgl_msk = $(event.relatedTarget).data('tgl_msk')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      
      var jumlah_masuk = $(event.relatedTarget).data('jumlah_masuk')
      var spek = $(event.relatedTarget).data('spek')
      var unit = $(event.relatedTarget).data('unit')
      var op_sk = $(event.relatedTarget).data('op_sk')

      $(this).find('#v-id_sk_barang').val(id_sk_barang)
      $(this).find('#v-tgl_msk').val(tgl_msk)
      $(this).find('#v-nama_barang').val(nama_barang)
      $(this).find('#v-jumlah_masuk').val(jumlah_masuk)
      $(this).find('#v-spek').val(spek)
      $(this).find('#v-unit').val(unit)
      $(this).find('#v-op_sk').val(op_sk)
    })
  })
</script>

<!-- Modal Edit-->
<!-- Modal Edit-->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" id="form_update" action="<?= base_url() ?>Stock_keeper/Sk_barang_masuk/update">
        <input type="hidden" id="e_id_sk_barang_masuk" name="id_sk_barang_masuk">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl">Tanggal Masuk</label>
                <input type="text" class="form-control datepicker" id="e_tgl_msk" name="tgl_msk" placeholder="Tanggal Masuk" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="e_nama_barang" name="nama_barang" required>
                  <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                  <?php foreach ($res_barang as $b) { ?>
                    <option value="<?= $b['id_sk_barang'] ?>" data-spek="<?= $b['spek'] ?>" data-unit="<?= $b['unit'] ?>"><?= $b['nama_barang'] ?> (<?= $b['spek'] ?>)</option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="jumlah_masuk">Jumlah</label>
                <input type="text" class="form-control" id="e_jumlah" name="jumlah_masuk" placeholder="Jumlah" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
          <div class="form-group">
            <label for="op_sk">OP Stock Keeper</label>
            <input type="text" class="form-control" id="e_op_sk" name="op_sk" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="OP StockKeeper" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="spek">Spesifikasi</label>
            <input type="text" class="form-control" id="e_spek" name="spek" placeholder="Spesifikasi" readonly>
          </div>
        </div>
        <div class="col-md-4">
          <div class="form-group">
            <label for="unit">Unit</label>
            <input type="text" class="form-control" id="e_unit" name="unit" placeholder="Unit" readonly>
          </div>
        </div>
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

<!-- jQuery to Update Spec and Unit -->
<script type="text/javascript">
$(document).ready(function() {
  // When the modal is shown, populate the fields
  $('#edit').on('show.bs.modal', function(event) {
    var id_sk_barang = $(event.relatedTarget).data('id_sk_barang');
    var nama_barang = $(event.relatedTarget).data('nama_barang');
    var id_sk_barang_masuk = $(event.relatedTarget).data('id_sk_barang_masuk');
    var tgl_msk = $(event.relatedTarget).data('tgl_msk');
    var spek = $(event.relatedTarget).data('spek');
    var unit = $(event.relatedTarget).data('unit');
    var jumlah_masuk = $(event.relatedTarget).data('jumlah_masuk');
    var op_sk = $(event.relatedTarget).data('op_sk');

    $('#e_id_sk_barang').val(id_sk_barang);
    $('#e_nama_barang').val(id_sk_barang).trigger("chosen:updated");
    $('#e_id_sk_barang_masuk').val(id_sk_barang_masuk);
    $('#e_tgl_msk').val(tgl_msk);
    $('#e_spek').val(spek);
    $('#e_unit').val(unit);
    $('#e_jumlah').val(jumlah_masuk);
    $('#e_op_sk').val(op_sk);
  });

  // Datepicker initialization
  $('#e_tgl_msk').datepicker({
    format: 'dd/mm/yyyy',
    autoclose: true,
    todayHighlight: true
  });

  // When the user changes the barang selection, update spec and unit
  $('#e_nama_barang').on('change', function() {
    var selectedOption = $(this).find('option:selected');
    var spek = selectedOption.data('spek');
    var unit = selectedOption.data('unit');

    // Update the spec and unit fields based on the selected barang
    $('#e_spek').val(spek);
    $('#e_unit').val(unit);
  });
});
</script>
