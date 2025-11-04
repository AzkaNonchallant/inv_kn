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
                  <!-- <h5 class="m-b-10">Data Barang</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Master Barang PPB</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('purchasing/prc_ppb/prc_ppb_masterbarang') ?>">Master Barang</a></li>
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
                    <div class="float-right">
                      <div class="input-group">
                        <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                          <option value="" disabled selected hidden>- Nama Barang -</option>
                          <?php foreach ($res_barang as $nm) { ?>
                            <option <?= $name === $nm['nama_barang'] ? 'selected' : '' ?> value="<?= $nm['nama_barang'] ?>"><?= $nm['nama_barang'] ?></option>
                          <?php } ?>
                        </select>
                        <div class="btn-group">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                        <div class="btn-group">
                          <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                            <i class="feather icon-plus"></i>Tambah Data
                          </button>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Kode Barang</th>
                            <th>Nama Barang</th>
                            <th>Jenis Barang</th>
                            <th>Tipe Barang</th>
                            <th>Spesifikasi</th>
                            <th>Satuan</th>
                            <th>Nama Supplier</th>
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
                              <td><?= $k['kode_barang'] ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= $k['jenis_barang'] ?></td>
                              <td><?= $k['tipe_barang'] ?></td>
                              <td><?= $k['spek'] ?></td>
                              <td><?= $k['satuan'] ?></td>
                              <td><?= $k['nama_po_supplier'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin" || $jabatan === "supervisor") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>" data-kode_barang="<?= $k['kode_barang'] ?>" data-nama_barang="<?= $k['nama_barang'] ?>" data-jenis_barang="<?= $k['jenis_barang'] ?>" data-tipe_barang="<?= $k['tipe_barang'] ?>" data-spek="<?= $k['spek'] ?>" data-satuan="<?= $k['satuan'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang/delete/<?= $k['id_prc_master_barang'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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

<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();

      // If filter_nama is empty, show an alert (optional validation)
      if (filter_nama == '') {
        window.location = "<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang?alert=warning&msg=barang belum dipilih";
        alert("Barang belum dipilih");
      } else {
        const query = new URLSearchParams({
          name: filter_nama
        });
        window.location = "<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang?" + query.toString();
      }
    });

    $('#export').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();

      // If filter_nama is empty, show an alert (optional validation)
      if (filter_nama == '') {
        window.location = "<?= base_url() ?>Purchasing/prc_ppb/Prc_ppb_masterbarang?alert=warning&msg=barang belum dipilih";
        alert("Barang belum dipilih");
      } else {
        const query = new URLSearchParams({
          name: filter_nama
        });
        var url = "<?= base_url() ?>Purchasing/prc_ppb/pdf_prc_ppb_masterbarang?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });
  });
</script>


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
      <form method="post" action="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang/add">
        <div class="modal-body">
          <div class="row">

          <div class="col-md-6">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="text" class="form-control" id="kode_barang" name="kode_barang" maxlength="20" placeholder="Kode Barang" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Kode Barang sudah ada.
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label for="id_prc_ppb_supplier">Nama Supplier</label>
                    <select class="form-control chosen-select" id="id_prc_ppb_supplier" name="id_prc_ppb_supplier" required>
                        <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                        <?php foreach ($res_supp as $k): ?>
                            <option value="<?= $k['id_prc_ppb_supplier'] ?>"><?= $k['nama_po_supplier'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Spesifikasi</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-control chosen-select" id="satuan" name="satuan" required>
                  <option value="" disabled selected hidden>- Pilih Satuan -</option>
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
            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control chosen-select" id="jenis_barang" name="jenis_barang" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Barang -</option>
                  <option value="Bahan Baku">Bahan Baku</option>
                  <option value="Bahan Tambahan">Bahan Tambahan</option>
                  <option value="Bahan Kemas">Bahan Kemas</option>
                  <option value="Sparepart">Sparepart</option>
                  <option value="Atk">Atk</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tipe_barang">Tipe Barang</label>
                <select class="form-control chosen-select" id="tipe_barang" name="tipe_barang" required>
                  <option value="" disabled selected hidden>- Pilih Tipe Barang -</option>
                  <option value="Import">Import</option>
                  <option value="Non Import">Non Import</option>
                </select>
              </div>
            </div>
          </div>
        
        
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>
<script>
  $(document).ready(function() {
    $("#kode_barang").keyup(function() {
            var kode_barang = $("#kode_barang").val();
            jQuery.ajax({
                url: "<?= base_url() ?>Purchasing/Prc_ppb/Prc_ppb_masterbarang/cek_kode_barang/",
                dataType: 'text',
                type: "post",
                data: {
                    kode_barang: kode_barang
                },
                success: function(response) {
                    if (response == "true") {
                        $("#kode_barang").addClass("is-invalid");
                        $("#simpan").attr("disabled", "disabled");
                    } else {
                        $("#kode_barang").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                }
            });
        })
  } );
</script>

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
      <form method="post" action="<?= base_url() ?>purchasing/prc_ppb/prc_ppb_masterbarang/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_barang">Kode Barang</label>
                <input type="hidden" id="e-id_prc_master_barang" name="id_prc_master_barang">
                <input type="text" class="form-control" id="e-kode_barang" name="kode_barang" placeholder="Kode Barang" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="e-nama_barang" name="nama_barang" placeholder="Nama Barang" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-6">
                <div class="form-group">
                    <label for="e-id_prc_ppb_supplier">Nama Supplier</label>
                    <select class="form-control chosen-select" id="e-id_prc_ppb_supplier" name="id_prc_ppb_supplier" required>
                        <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                        <?php foreach ($res_supp as $k): ?>
                            <option value="<?= $k['id_prc_ppb_supplier'] ?>"><?= $k['nama_po_supplier'] ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
            </div>

            <div class="col-md-6">
              <div class="form-group">
                <label for="jenis_barang">Jenis Barang</label>
                <select class="form-control chosen-select" id="e-jenis_barang" name="jenis_barang" required>
                  <option value="" disabled selected hidden>- Pilih Jenis Barang -</option>
                  <option value="Bahan Baku">Bahan Baku</option>
                  <option value="Bahan Tambahan">Bahan Tambahan</option>
                  <option value="Bahan Kemas">Bahan Kemas</option>
                  <option value="Sparepart">Sparepart</option>
                  <option value="Atk">Atk</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="tipe_barang">Tipe Barang</label>
                <select class="form-control chosen-select" id="e-tipe_barang" name="tipe_barang" required>
                  <option value="" disabled selected hidden>- Pilih Tipe Barang -</option>
                  <option value="Import">Import</option>
                  <option value="Non Import">Non Import</option>
                </select>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="spek">Spesifikasi</label>
                <input type="text" class="form-control" id="e-spek" name="spek" placeholder="Spesifikasi" autocomplete="off">
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <select class="form-control chosen-select" id="e-satuan" name="satuan" required>
                  <option value="" disabled selected hidden>- Pilih Satuan -</option>
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
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_prc_master_barang = $(event.relatedTarget).data('id_prc_master_barang');
      var id_prc_ppb_supplier = $(event.relatedTarget).data('id_prc_ppb_supplier');
      var kode_barang = $(event.relatedTarget).data('kode_barang');
      var nama_barang = $(event.relatedTarget).data('nama_barang');
      var jenis_barang = $(event.relatedTarget).data('jenis_barang');
      var tipe_barang = $(event.relatedTarget).data('tipe_barang');
      var spek = $(event.relatedTarget).data('spek');
      var satuan = $(event.relatedTarget).data('satuan');
      // var nama_po_supplier = $(event.relatedTarget).data('nama_po_supplier');
      
      $(this).find('#e-id_prc_master_barang').val(id_prc_master_barang);
      $(this).find('#e-id_prc_ppb_supplier').val(id_prc_ppb_supplier);
      $(this).find('#e-kode_barang').val(kode_barang);
      $(this).find('#e-nama_barang').val(nama_barang);
      $(this).find('#e-jenis_barang').val(jenis_barang);
      $(this).find('#e-tipe_barang').val(tipe_barang);
      $(this).find('#e-spek').val(spek);
      $(this).find('#e-satuan').val(satuan);
      // $(this).find('#e-nama_po_supplier').val(nama_po_supplier);
      $(this).find('#e-id_prc_ppb_supplier').trigger("chosen:updated");
      $(this).find('#e-satuan').trigger("chosen:updated");
      $(this).find('#e-jenis_barang').trigger("chosen:updated");
      $(this).find('#e-tipe_barang').trigger("chosen:updated");
    });
  });
</script>