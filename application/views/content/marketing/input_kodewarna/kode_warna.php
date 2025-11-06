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
                  <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Marketing/master/Kode_warna') ?>">Input Kode Warna</a></li>
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
                    <h5>Data Kode Warna</h5>

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
                            <th>Kode Warna</th>
                            <th>Nama Warna</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['kode_warna_cap'] ?></td>
                              <td><?= $k['warna_cap'] ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#view" 
                                    data-id_master_kw_cap="<?= $k['id_master_kw_cap'] ?>" 
                                    data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" 
                                    data-warna_cap="<?= $k['warna_cap'] ?>" 
                                    data-ti02="<?= $k['f_ti02'] ?>" 
                                    data-r1="<?= $k['f_r1'] ?>" 
                                    data-r3="<?= $k['f_r3'] ?>" 
                                    data-y5="<?= $k['f_y5'] ?>" 
                                    data-b1="<?= $k['f_b1'] ?>" 
                                    data-y10="<?= $k['f_y10'] ?>" 
                                    data-sf="<?= $k['f_sf'] ?>">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                      data-id_master_kw_cap="<?= $k['id_master_kw_cap'] ?>" 
                                      data-kode_warna_cap="<?= $k['kode_warna_cap'] ?>" 
                                      data-warna_cap="<?= $k['warna_cap'] ?>" 
                                      data-ti02="<?= $k['f_ti02'] ?>" 
                                      data-r1="<?= $k['f_r1'] ?>" 
                                      data-r3="<?= $k['f_r3'] ?>" 
                                      data-y5="<?= $k['f_y5'] ?>" 
                                      data-b1="<?= $k['f_b1'] ?>" 
                                      data-y10="<?= $k['f_y10'] ?>" 
                                      data-sf="<?= $k['f_sf'] ?>">
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>Marketing/master/Kode_warna/delete/<?= $k['id_master_kw_cap'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</section>

<!-- Modal Tambah -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kode Warna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/master/Kode_warna/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna</label>
                <div class="input-group">
                  <input type="number" maxlength="4" class="form-control text-uppercase" id="kode_warna" name="kode_warna" placeholder="Kode Warna" autocomplete="off" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="warna">Nama Warna</label>
                <input type="text" class="form-control text-uppercase" id="warna" name="warna" placeholder="Nama Warna" autocomplete="off" required>
              </div>
            </div>
          </div>

          <center><label for="formula_warna" class="font-weight-bold mt-3">Komposisi Formula</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ti02" class="">Titanium Dioksida (Ti02)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="ti02" name="ti02" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r1" class="">Carmoisine (R1)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="r1" name="r1" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r3" class="">Eritrhosine (R3)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="r3" name="r3" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y5" class="">Tartrazine (Y5)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="y5" name="y5" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="b1" class="">Brilliant Blue (B1)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="b1" name="b1" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y10" class="">Quinoline Yellow (Y10)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="y10" name="y10" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sf" class="">Silver F (SF)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="sf" name="sf" placeholder="0.00" autocomplete="off" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="modal-footer">
            <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
            <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini?')) { return false; }">Simpan</button>
          </div>
        </div>
      </form>
    </div>
  </div>
</div>

<!-- Modal View -->
<div class="modal fade" id="view" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Kode Warna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="kode_warna">Kode Warna</label>
              <div class="input-group">
                <input type="text" class="form-control" id="v-kode_warna" name="kode_warna" placeholder="Kode Warna" readonly>
              </div>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="warna">Nama Warna</label>
              <input type="text" class="form-control" id="v-warna" name="warna" placeholder="Nama Warna" readonly>
            </div>
          </div>
        </div>

        <center><label for="formula_warna" class="font-weight-bold mt-3">Komposisi Formula</label></center>
        <div class="row">
          <div class="col-md-6">
            <div class="form-group">
              <label for="ti02" class="">Titanium Dioksida (Ti02)</label><br>
              <input type="text" class="form-control" id="v-ti02" name="ti02" placeholder="Titanium Dioksida" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="r1" class="">Carmoisine (R1)</label><br>
              <input type="text" class="form-control" id="v-r1" name="r1" placeholder="Carmoisine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="r3" class="">Eritrhosine (R3)</label><br>
              <input type="text" class="form-control" id="v-r3" name="r3" placeholder="Eritrhosine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="y5" class="">Tartrazine (Y5)</label><br>
              <input type="text" class="form-control" id="v-y5" name="y5" placeholder="Tartrazine" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="b1" class="">Brilliant Blue (B1)</label><br>
              <input type="text" class="form-control" id="v-b1" name="b1" placeholder="Brilliant Blue" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="y10" class="">Quinoline Yellow (Y10)</label><br>
              <input type="text" class="form-control" id="v-y10" name="y10" placeholder="Quinoline Yellow" readonly>
            </div>
          </div>
          <div class="col-md-6">
            <div class="form-group">
              <label for="sf" class="">Silver F (SF)</label><br>
              <input type="text" class="form-control" id="v-sf" name="sf" placeholder="Silver F" readonly>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        </div>
      </div>
    </div>
  </div>
</div>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Kode Warna</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/master/Kode_warna/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="kode_warna">Kode Warna</label>
                <input type="hidden" id="e-id_master_kw_cap" name="id_master_kw_cap">
                <input type="hidden" id="e-id_master_kw_body" name="id_master_kw_body">
                <div class="input-group">
                  <input type="number" class="form-control" id="e-kode_warna" name="kode_warna" placeholder="Kode Warna" required>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="warna">Nama Warna</label>
                <input type="text" class="form-control" id="e-warna" name="warna" placeholder="Nama Warna" autocomplete="off" required>
              </div>
            </div>
          </div>

          <center><label for="formula_warna" class="font-weight-bold mt-3">Komposisi Formula</label></center>
          <div class="row">
            <div class="col-md-6">
              <div class="form-group">
                <label for="ti02" class="">Titanium Dioksida (Ti02)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-ti02" name="ti02" autocomplete="off" placeholder="Titanium Dioksida" required>
                  <div class="input-group-append">
                    <span class="input-group-text">%</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r1" class="">Carmoisine (R1)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-r1" name="r1" autocomplete="off" placeholder="Carmoisine" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="r3" class="">Eritrhosine (R3)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-r3" name="r3" autocomplete="off" placeholder="Eritrhosine" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y5" class="">Tartrazine (Y5)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-y5" name="y5" autocomplete="off" placeholder="Tartrazine" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="b1" class="">Brilliant Blue (B1)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-b1" name="b1" autocomplete="off" placeholder="Brilliant Blue" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="y10" class="">Quinoline Yellow (Y10)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-y10" name="y10" autocomplete="off" placeholder="Quinoline Yellow" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
            <div class="col-md-6">
              <div class="form-group">
                <label for="sf" class="">Silver F (SF)</label><br>
                <div class="input-group">
                  <input type="number" step="0.01" class="form-control" id="e-sf" name="sf" autocomplete="off" placeholder="Silver F" required>
                  <div class="input-group-append">
                    <span class="input-group-text">ml</span>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Mengedit Data Ini?')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Uppercase function
    uppercase('#kode_warna');
    uppercase('#warna');
    
    // Reset form ketika modal tambah ditutup
    $('#add').on('hidden.bs.modal', function() {
      $(this).find('form')[0].reset();
    });

    // Validasi input length
    $("#kode_warna").keypress(function() {
      if (this.value.length == 4) {
        return false;
      }
    });

    $("#ti02").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#r1").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#r3").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#y5").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#b1").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#y10").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    $("#sf").keypress(function() {
      if (this.value.length == 5) {
        return false;
      }
    });

    // Modal View
    $('#view').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      var id_kw_cap = button.data('id_master_kw_cap');
      var kode_warna = button.data('kode_warna_cap');
      var warna = button.data('warna_cap');
      var ti02 = button.data('ti02');
      var r1 = button.data('r1');
      var r3 = button.data('r3');
      var y5 = button.data('y5');
      var b1 = button.data('b1');
      var y10 = button.data('y10');
      var sf = button.data('sf');

      $(this).find('#v-kode_warna').val(kode_warna);
      $(this).find('#v-warna').val(warna);
      $(this).find('#v-ti02').val(ti02 + " %");
      $(this).find('#v-r1').val(r1 + " ml");
      $(this).find('#v-r3').val(r3 + " ml");
      $(this).find('#v-y5').val(y5 + " ml");
      $(this).find('#v-b1').val(b1 + " ml");
      $(this).find('#v-y10').val(y10 + " ml");
      $(this).find('#v-sf').val(sf + " ml");
    });

    // Modal Edit - FIXED VERSION
    $('#edit').on('show.bs.modal', function(event) {
      var button = $(event.relatedTarget);
      
      // Debug di console
      console.log('All data attributes:', button.data());
      
      // Ambil data dengan cara yang lebih reliable
      var id_kw_cap = button.attr('data-id_master_kw_cap') || button.data('id_master_kw_cap');
      var kode_warna = button.attr('data-kode_warna_cap') || button.data('kode_warna_cap');
      var warna = button.attr('data-warna_cap') || button.data('warna_cap');
      var ti02 = button.attr('data-ti02') || button.data('ti02');
      var r1 = button.attr('data-r1') || button.data('r1');
      var r3 = button.attr('data-r3') || button.data('r3');
      var y5 = button.attr('data-y5') || button.data('y5');
      var b1 = button.attr('data-b1') || button.data('b1');
      var y10 = button.attr('data-y10') || button.data('y10');
      var sf = button.attr('data-sf') || button.data('sf');

      // Debug individual values
      console.log('ID:', id_kw_cap);
      console.log('ti02:', ti02);
      console.log('r1:', r1);

      // Set values ke form edit
      $(this).find('#e-id_master_kw_cap').val(id_kw_cap);
      $(this).find('#e-id_master_kw_body').val(id_kw_cap); // Jika body pakai ID yang sama
      $(this).find('#e-kode_warna').val(kode_warna);
      $(this).find('#e-warna').val(warna);
      $(this).find('#e-ti02').val(ti02);
      $(this).find('#e-r1').val(r1);
      $(this).find('#e-r3').val(r3);
      $(this).find('#e-y5').val(y5);
      $(this).find('#e-b1').val(b1);
      $(this).find('#e-y10').val(y10);
      $(this).find('#e-sf').val(sf);
    });

    // Function untuk uppercase
    function uppercase(selector) {
      $(selector).on('input', function() {
        this.value = this.value.toUpperCase();
      });
    }

    // Function untuk check koma (jika diperlukan)
    function checkKoma(selector) {
      $(selector).on('input', function() {
        this.value = this.value.replace(',', '.');
      });
    }

    // Terapkan checkKoma untuk input edit
    checkKoma('#e-ti02');
    checkKoma('#e-r1');
    checkKoma('#e-r3');
    checkKoma('#e-y5');
    checkKoma('#e-b1');
    checkKoma('#e-y10');
    checkKoma('#e-sf');
  });
</script>