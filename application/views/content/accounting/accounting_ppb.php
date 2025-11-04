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
                  <li class="breadcrumb-item"><a href="javascript:">Accounting</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Accounting PPB</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('accounting/accounting_ppb') ?>">PPB</a></li>
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
                    <div class="float-right">
                      <div class="input-group">
                        
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Filter Dari Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Filter Sampai Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="btn-group">
                          <button class="btn btn-secondary btn-sm" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary btn-sm" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>Accounting/Accounting_ppb" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                        <button type="button" class="btn btn-primary btn-sm" data-toggle="modal" data-target="#add">
                          <i class="feather icon-plus"></i>Tambah Data
                        </button>
                      </div>
                    </div>
                    <br><br>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-bordered table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>No PPB</th>
                            <th class="text-center">Detail</th>
                            <th class="text-center">Approval</th> 
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $jabatan = $this->session->userdata('jabatan');
                          $status = $this->session->userdata('status');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_ppb =  explode('-', $k['tgl_ppb'])[2] . "/" . explode('-', $k['tgl_ppb'])[1] . "/" . explode('-', $k['tgl_ppb'])[0];
                            $tgl_pakai =  explode('-', $k['tgl_pakai'])[2] . "/" . explode('-', $k['tgl_pakai'])[1] . "/" . explode('-', $k['tgl_pakai'])[0];
                            // $formatted_tgl = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
                          ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                
                                <td><?= $tgl_ppb ?></td>
                                <td><?= $k['no_ppb_accounting'] ?></td>
                                
                                <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" 
                                      data-no_ppb_accounting="<?= $k['no_ppb_accounting'] ?>",
                                      data-departement="<?= $k['departement'] ?>",
                                      data-form_ppb="<?= $k['form_ppb']?>",
                                      data-jenis_ppb="<?= $k['jenis_ppb']?>",
                                      data-tgl_ppb="<?= $tgl_ppb ?>",
                                      data-tgl_pakai="<?= $tgl_pakai ?>",
                                      data-ket="<?= $k['ket']?>",
                                      data-nama_admin="<?= $k['nama_admin']?>",
                                      data-nama_spv="<?= $k['nama_spv']?>",
                                      data-nama_manager="<?= $k['nama_manager']?>",
                                      data-nama_pm="<?= $k['nama_pm']?>",
                                      data-nama_direktur="<?= $k['nama_direktur']?>",
                                       >
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td>

                              <td class="text-center">
                                  <?php if (($jabatan == "admin" || $jabatan == "supervisor") && $k['acc_spv'] == "") { ?>
                                      <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-danger btn-sm" 
                                              data-toggle="modal" data-target="#approval" 
                                               data-no_ppb_accounting="<?= $k['no_ppb_accounting'] ?>"
                                              onclick="setApprovalData('<?= $k['no_ppb_accounting'] ?>', 'acc_spv')">
                                              <i class="feather icon-check"></i> ACC SPV
                                          </button>
                                      </div>
                                  <?php } elseif (($jabatan == "admin" || $jabatan == "manager") && $k['acc_manager'] == '' && $k['acc_spv'] == "Approved") { ?>
                                      <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-warning btn-sm" 
                                              data-toggle="modal" data-target="#approval" 
                                              data-no_ppb_accounting="<?= $k['no_ppb_accounting'] ?>"
                                              onclick="setApprovalData('<?= $k['no_ppb_accounting'] ?>', 'acc_manager')">
                                              <i class="feather icon-check"></i> ACC Manager
                                          </button>
                                      </div>
                                  <?php } elseif (($jabatan == "admin" || $jabatan == "pm") && $k['acc_pm'] == '' && $k['acc_manager'] == "Approved" && $k['acc_spv'] == "Approved") { ?>
                                      <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-primary btn-sm" 
                                              data-toggle="modal" data-target="#approval" 
                                              data-no_ppb_accounting="<?= $k['no_ppb_accounting'] ?>"
                                              onclick="setApprovalData('<?= $k['no_ppb_accounting'] ?>', 'acc_pm')">
                                              <i class="feather icon-check"></i> ACC PM
                                          </button>   
                                      </div>
                                  <?php } elseif (($jabatan == "admin" || $jabatan == "direktur") && $k['acc_direktur'] == '' && $k['acc_spv'] == "Approved") { ?>
                                      <div class="btn-group" role="group">
                                          <button type="button" class="btn btn-warning btn-sm" 
                                              data-toggle="modal" data-target="#approval" 
                                              data-no_ppb_accounting="<?= $k['no_ppb_accounting'] ?>"
                                              onclick="setApprovalData('<?= $k['no_ppb_accounting'] ?>', 'acc_direktur')">
                                              <i class="feather icon-check"></i> ACC Direktur
                                          </button>
                                      </div>
                                  <?php } ?>
                              </td>

                              
                                                                
                              <td class="text-center">
                                <?php if ($level === "admin")  { ?>
                                
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>accounting/accounting_ppb/pdf_cetak/<?= str_replace('/', '--', $k['no_ppb_accounting']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " >
                                        <i class="feather icon-file"></i>Cetak
                                    </a>
                                  </div>

                                <div class="btn-group" role="group" aria-label="Basic example">
                                    <button type="button" class="btn btn-primary btn-square btn-sm" 
                                        data-bs-toggle="modal" data-bs-target="#edit"
                                        data-no_ppb_accounting="<?= $k['no_ppb_accounting'] ?>"
                                        data-departement="<?= $k['departement'] ?>"
                                        data-form_ppb="<?= $k['form_ppb']?>"
                                        data-jenis_ppb="<?= $k['jenis_ppb']?>"
                                        data-tgl_ppb="<?= $tgl_ppb ?>"
                                        data-tgl_pakai="<?= $tgl_pakai ?>"
                                        data-ket="<?= $k['ket']?>"
                                        data-nama_admin="<?= $k['nama_admin']?>"
                                        data-nama_spv="<?= $k['nama_spv']?>"
                                        data-nama_manager="<?= $k['nama_manager']?>"
                                        data-nama_pm="<?= $k['nama_pm']?>"
                                        data-nama_direktur="<?= $k['nama_direktur']?>"
                                    >
                                        <i class="feather icon-edit-2"></i> Edit
                                    </button>
                                </div>

                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>Accounting/Accounting_ppb/delete/<?= str_replace('/', '--', $k['no_ppb_accounting']) ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                      <i class="feather icon-trash-2"></i>Delete
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

<script type="text/javascript">    
  $(document).ready(function() {
    $('#export').click(function() {
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk menampilkan data.');
      } else {
        var url = "<?= base_url() ?>laporan_barang_stok/pdf_laporan_barang_stok/" + filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0] + "/" + filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];
        window.open(url, 'pdf_laporan_barang_stok', 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });

    $('#lihat').click(function() {
      var filter_tgl = $('#filter_tgl').val       ();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {    
        window.location.href = "<?= base_url() ?>Account/Account_ppbfilter_tg=" + filter_tgl + "&filter_tgl2=" + filter_tgl2;
      }
    });
  });
</script>

<!-- Modal -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Data</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span> 
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Accounting/Accounting_ppb/add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_ppb">Budget/Non Budget</label>
                <select class="form-control chosen-select" id="jenis_ppb" name="jenis_ppb" required onchange="toggleDirekturField()">
                  <option value="jenis_ppb" disabled selected hidden>- Pilih Budget/Non Budget -</option>
                  <option value="Budget">Budget</option>
                  <option value="Non-Budget">Non Budget</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="form_ppb">Form A/C</label>
                <select class="form-control chosen-select" id="form_ppb" name="form_ppb" required>
                  <option value="" disabled selected hidden>- Pilih Form A/C -</option>
                  <option value="FormA">FormA</option>
                  <option value="FormB">FormB</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="departement">Departement</label>
                <input type="text" class="form-control" id="departement" name="departement" value="Accounting" autocomplete="off" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_ppb_accounting">No PPB</label>
                <input type="text" class="form-control" id="no_ppb_accounting" name="no_ppb_accounting" maxlength="20" placeholder="No PPB" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PPB sudah ada.
                </div>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control datepicker" id="tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="kode_barang">Pilih Barang</label>
                <select class="form-control chosen-select" id="kode_barang_add" name="kode_barang_add" required>
                  <option disabled selected hidden value="">-Pilih Barang-</option>
                  <?php foreach ($pm as $s) { ?>
                    <option 
                      data-satuan="<?= $s['satuan'] ?>" 
                      data-spek="<?= $s['spek'] ?>" 
                      data-nama="<?= $s['nama_barang'] ?>"
                      data-nama_po_supplier="<?= $s['nama_po_supplier'] ?>"
                      value="<?= $s['kode_barang'] ?>,<?= $s['nama_barang'] ?>,<?= $s['id_prc_master_barang']?>">
                      <?= $s['kode_barang'] ?> | <?= $s['nama_barang'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="spek">Spek</label>
                <input type="text" class="form-control" id="spek" name="spek" placeholder="Spek" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="satuan">Unit</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Unit" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="nama_po_supplier">Nama Supplier</label>
                <input type="text" class="form-control" id="nama_po_supplier" name="nama_po_supplier" placeholder="Nama Supplier" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-2">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" onkeypress="return hanyaAngka(event)" maxlength="15" autocomplete="off" required>
              </div>
            </div>

            <!-- Tombol Input -->
            <div class="col-md-1 text-right">
              <a href="javascript:void(0)" id="input" class="btn btn-primary" style="margin-top: 31px;">
                <b class="text">Input</b>
              </a>
            </div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th>Unit</th>
                  <th>Nama Supplier</th>
                  <th>Jumlah</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch">
              </tbody>
            </table>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_pakai">Tanggal Kebutuhan</label>
                <input type="text" class="form-control datepicker" id="tgl_pakai" name="tgl_pakai" placeholder="Tanggal Kebutuhan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="ket">Keterangan</label>
                <input type="text" class="form-control" id="ket" name="ket" placeholder="Keterangan" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_admin">Nama Admin</label>
                <input type="text" class="form-control" id="nama_admin" name="nama_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_spv">Nama Supervisor</label>
                <input type="text" class="form-control" id="nama_spv" name="nama_spv" placeholder="Nama Supervisor" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_manager">Nama Manager</label>
                <input type="text" class="form-control" id="nama_manager" name="nama_manager" placeholder="Nama Manager" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_pm">Nama Plant Manager</label>
                <input type="text" class="form-control" id="nama_pm" name="nama_pm" placeholder="Nama Plant Manager" autocomplete="off" required>
              </div>
            </div>

            <!-- Div untuk Nama Direktur (Hidden by Default) -->
            <div class="col-md-3" id="nama_direktur_div" style="display: none;">
              <div class="form-group">
                <label for="nama_direktur">Nama Direktur</label>
                <input type="text" class="form-control" id="nama_direktur" name="nama_direktur" placeholder="Nama Direktur" autocomplete="off">
              </div>    
            </div>
          </div>
          <input type="hidden" id="jumlah_batch" name="jumlah_batch" value="1">
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary" onclick="if (!confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Cek Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>      
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Ketika kode_barang_add berubah (barang dipilih)
    $('#kode_barang_add').on('change', function() {
      const selected = $(this).find(':selected');
      const satuan = selected.attr('data-satuan'); 
      const spek = selected.attr('data-spek'); 
      const nama_barang = selected.attr('data-nama_barang'); 
      const nama_po_supplier = selected.attr('data-nama_po_supplier'); 

      $('#satuan').val(satuan).prop('readonly', true);  
      $('#spek').val(spek).prop('readonly', true);  
      $('#nama_po_supplier').val(nama_po_supplier).prop('readonly', true);  
      $('#nama_barang_add').val(nama_barang);  
    });

    $('#kode_barang_add').on('change', function() {
      if ($(this).val() === "") {
        $('#satuan').val("").prop('readonly', false); 
        $('#spek').val("").prop('readonly', false);  
        $('#nama_po_supplier').val("").prop('readonly', false);  
        $('#nama_barang_add').val(""); 
      }
    });

    // Fungsi untuk toggle Nama Direktur field visibility
    function toggleDirekturField() {
      const jenis_ppbValue = $('#jenis_ppb').val();
      if (jenis_ppbValue === 'Non-Budget') { // If "Non Budget" is selected
        $('#nama_direktur_div').show();
      } else { // If "Budget" is selected
        $('#nama_direktur_div').hide();
      }
    }

    // Call the function when the dropdown value changes
    $('#jenis_ppb').on('change', toggleDirekturField);

    // Trigger the function on page load to set initial state
    toggleDirekturField();

    // Input button to add items to table
    $('#input').on('click', function() {
      const kode = $('#kode_barang_add').val();
      const kode_barang = kode.split(",")[0];
      const nama_barang = kode.split(",")[1];
      const spek = $('#spek').val();
      const satuan = $('#satuan').val();
      const unit = $('#unit').val();
      const nama_po_supplier = $('#nama_po_supplier').val();
      const jumlah = $('#jumlah').val();
      const nextform = Date.now(); 
      const no_batch = 'Batch-' + nextform;
      const id_prc_master_barang = kode.split(",")[2];

      $('#insert_batch').append(`
        <tr id="tr_${nextform}">
          <input type="hidden" name="kode_barang[]" value="${kode_barang}">
          <input type="hidden" name="nama_barang[]" value="${nama_barang}">
          <input type="hidden" name="spek[]" value="${spek}">
          <input type="hidden" name="unit[]" value="${satuan}">
          <input type="hidden" name="jumlah[]" value="${jumlah}">
          <input type="hidden" name="id_prc_master_barang[]" value="${id_prc_master_barang}">

          <td>${kode_barang}</td>
          <td>${nama_barang}</td> <!-- Nama Barang -->
          <td>${spek}</td>
          <td>${satuan}</td>
          <td>${nama_po_supplier}</td>
          <td>${jumlah}</td>
          <td class="text-right">
            <a href="javascript:void(0)" onclick="remove(${nextform})" class="text-danger">
              <i class="feather icon-trash-2"></i>
            </a>
          </td>
        </tr>
      `);
    });
    $("#no_ppb_accounting").keyup(function() {
        var no_ppb_accounting = $("#no_ppb_accounting").val();
        jQuery.ajax({
            url: "<?= base_url() ?>Accounting/Accounting_ppb/cek_no_ppb/",
            dataType: 'text',
            type: "post",
            data: {
                no_ppb_accounting: no_ppb_accounting
            },
            success: function(response) {
                if (response == "true") {
                    $("#no_ppb_accounting").addClass("is-invalid");
                    $("#simpan").attr("disabled", "disabled");
                } else {
                    $("#no_ppb_accounting").removeClass("is-invalid");
                    $("#simpan").removeAttr("disabled");
                }
            }
        });
    })
  });

  // Fungsi untuk menghapus baris
  function remove(id) {
    $('#tr_' + id).remove();
  }
</script>

<!-- Modal Details -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Accounting PPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>M_accounting/M_accounting_ppb/">

        <div class="modal-body">
          <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-jenis_ppb">Jenis PPB</label>
                <input type="text" class="form-control" id="v-jenis_ppb" name="jenis_ppb" placeholder="Budget/Non-budget" readonly>
              </div>
            </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-form_ppb">Form A/C</label>
                <input type="text" class="form-control" id="v-form_ppb" name="form_ppb" placeholder="Form A/C" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-departement">Departement</label>
                <input type="text" class="form-control" id="v-departement" name="v-departement" placeholder="Departement" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_ppb_accounting">No PPB</label>
                <input type="text" class="form-control" id="v-no_ppb_accounting" name="no_ppb_accounting" placeholder="No PPB" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control" id="v-tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB" readonly>
              </div>
            </div>
          
            <div class="col-md-6">
            </div>
          </div>
          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th class="text-right">Jumlah</th>
                  
                  
                </tr>
              </thead>
              <tbody id="v-ppb_barang_det">
              </tbody>
            </table>
          </div>
        </div>
        <div class="modal-body">
          <div class="row">
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-tgl_pakai">Tanggal Kebutuhan</label>
                <input type="text" class="form-control" id="v-tgl_pakai" name="tgl_pakai" placeholder="Tanggal Kebutuhan" readonly>
              </div>
            </div>
          
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-ket">Keterangan</label>
                <input type="text" class="form-control" id="v-ket" name="ket" placeholder="Keterangan" readonly>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-nama_admin">Nama Admin</label>
                <input type="text" class="form-control" id="v-nama_admin" name="nama_admin" placeholder="Admin" readonly>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-nama_spv">Nama Supervisor</label>
                <input type="text" class="form-control" id="v-nama_spv" name="nama_spv" placeholder="Nama Supervisor" readonly>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-nama_manager">Nama Manager</label>
                <input type="text" class="form-control" id="v-nama_manager" name="nama_manager" placeholder="Nama Manager" readonly>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-nama_pm">Nama Plant Manager</label>
                <input type="text" class="form-control" id="v-nama_pm" name="nama_pm" placeholder="Nama Plant Manager" readonly>
              </div>
          </div>
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-nama_direktur">Nama Direktur</label>
                <input type="text" class="form-control" id="v-nama_direktur" name="nama_direktur" placeholder="-" readonly>
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
    $('#detail').on('show.bs.modal', function(event) {
      var jenis_ppb = $(event.relatedTarget).data('jenis_ppb')
      var form_ppb = $(event.relatedTarget).data('form_ppb')
      var departement = $(event.relatedTarget).data('departement')
      var no_ppb_accounting = $(event.relatedTarget).data('no_ppb_accounting')
      var tgl_ppb = $(event.relatedTarget).data('tgl_ppb')
      var tgl_pakai = $(event.relatedTarget).data('tgl_pakai')
      var ket = $(event.relatedTarget).data('ket')
      var nama_admin = $(event.relatedTarget).data('nama_admin')
      var nama_spv = $(event.relatedTarget).data('nama_spv')
      var nama_manager = $(event.relatedTarget).data('nama_manager')
      var nama_pm = $(event.relatedTarget).data('nama_pm')
      var nama_direktur = $(event.relatedTarget).data('nama_direktur')

      $(this).find('#v-jenis_ppb').val(jenis_ppb)
      $(this).find('#v-form_ppb').val(form_ppb)
      $(this).find('#v-departement').val(departement)
      $(this).find('#v-no_ppb_accounting').val(no_ppb_accounting)
      $(this).find('#v-tgl_ppb').val(tgl_ppb)
      $(this).find('#v-tgl_pakai').val(tgl_pakai)
      $(this).find('#v-ket').val(ket)
      $(this).find('#v-nama_admin').val(nama_admin)
      $(this).find('#v-nama_spv').val(nama_spv)
      $(this).find('#v-nama_manager').val(nama_manager)
      $(this).find('#v-nama_pm').val(nama_pm)
      $(this).find('#v-nama_direktur').val(nama_direktur)
      jQuery.ajax({
        url: "<?= base_url() ?>Accounting/Accounting_ppb/data_ppb_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_ppb_accounting: no_ppb_accounting
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-ppb_barang_det');
          $id.empty();
          for (var i = 0; i < data.length; i++) {
            // var exp = data[i].exp.split("-")[2] + "/" + data[i].exp.split("-")[1] + "/" + data[i].exp.split("-")[0]
            // var mfg = data[i].mfg.split("-")[2] + "/" + data[i].mfg.split("-")[1] + "/" + data[i].mfg.split("-")[0]
            $id.append(`
              <tr>
                <td>` + data[i].kode_barang + `</td>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].spek + `</td>
                
                <td class="text-right">` + data[i].jumlah + "&nbsp" + data[i].satuan + `</td>
                
                
              </tr>
            `);
          }
        }
      });
    })
  })
</script>
              
<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Accounting PPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" action="<?= base_url() ?>Accounting/Accounting_ppb/update">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-jenis_ppb">Budget/Non Budget</label>
                <select class="form-control chosen-select" id="e-jenis_ppb" name="jenis_ppb" required onchange="toggleDirekturField()">
                  <option value="jenis_ppb" disabled selected hidden>- Pilih Budget/Non Budget -</option>
                  <option value="Budget">Budget</option>
                  <option value="Non-Budget">Non Budget</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-form_ppb">Form A/C</label>
                <select class="form-control chosen-select" id="e-form_ppb" name="form_ppb" required>
                  <option value="" disabled selected hidden>- Pilih Form A/C -</option>
                  <option value="FormA">FormA</option>
                  <option value="FormB">FormB</option>
                </select>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-departement">Departement</label>
                <input type="text" class="form-control" id="e-departement" name="e-departement" placeholder="Departement" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-no_ppb_accounting">No PPB</label>
                <input type="text" class="form-control" id="e-no_ppb_accounting" name="no_ppb_accounting" placeholder="No PPB">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-tgl_ppb">Tanggal PPB</label>
                <input type="text" class="form-control" id="e-tgl_ppb" name="tgl_ppb" placeholder="Tanggal PPB">
              </div>
            </div>
            <div class="col-md-6"></div>
          </div>

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Kode Barang</th>
                  <th>Nama Barang</th>
                  <th>Spek</th>
                  <th class="text-right">Unit</th>
                  <th class="text-right">Jumlah</th>
                </tr>
              </thead>
            </table>
          </div>
        </div>

        <div class="modal-body">
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-tgl_pakai">Tanggal Kebutuhan</label>
                <input type="text" class="form-control" id="e-tgl_pakai" name="tgl_pakai" placeholder="Tanggal Kebutuhan">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-ket">Keterangan</label>
                <input type="text" class="form-control" id="e-ket" name="ket" placeholder="Keterangan">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-nama_admin">Nama Admin</label>
                <input type="text" class="form-control" id="e-nama_admin" name="nama_admin" placeholder="Admin" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-nama_spv">Nama Supervisor</label>
                <input type="text" class="form-control" id="e-nama_spv" name="nama_spv" placeholder="Nama Supervisor">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-nama_manager">Nama Manager</label>
                <input type="text" class="form-control" id="e-nama_manager" name="nama_manager" placeholder="Nama Manager">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-nama_pm">Nama Plant Manager</label>
                <input type="text" class="form-control" id="e-nama_pm" name="nama_pm" placeholder="Nama Plant Manager">
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="e-nama_direktur">Nama Direktur</label>
                <input type="text" class="form-control" id="e-nama_direktur" name="nama_direktur" placeholder="-">
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


<script type="text/javascript">
  $(document).ready(function() {
    $('#edit').on('show.bs.modal', function(event) {
      var id_accounting_ppb_tf = $(event.relatedTarget).data('id_accounting_ppb_tf')
      var jenis_ppb = $(event.relatedTarget).data('jenis_ppb')
      var form_ppb = $(event.relatedTarget).data('form_ppb')
      var departement = $(event.relatedTarget).data('departement')
      var no_ppb_accounting = $(event.relatedTarget).data('no_ppb_accounting')
      var tgl_ppb = $(event.relatedTarget).data('tgl_ppb')
      var tgl_pakai = $(event.relatedTarget).data('tgl_pakai')
      var ket = $(event.relatedTarget).data('ket')
      var nama_admin = $(event.relatedTarget).data('nama_admin')
      var nama_spv = $(event.relatedTarget).data('nama_spv')
      var nama_manager = $(event.relatedTarget).data('nama_manager')
      var nama_pm = $(event.relatedTarget).data('nama_pm')
      var nama_direktur = $(event.relatedTarget).data('nama_direktur')

      $(this).find('#e-jenis_ppb').val(jenis_ppb)
      $(this).find('#e-form_ppb').val(form_ppb)
      $(this).find('#e-no_ppb_accounting').val(no_ppb_accounting)
      $(this).find('#e-departement').val(departement)
      $(this).find('#e-tgl_ppb').val(tgl_ppb)
      $(this).find('#e-tgl_pakai').val(tgl_pakai)
      $(this).find('#e-ket').val(ket)
      $(this).find('#e-nama_admin').val(nama_admin)
      $(this).find('#e-nama_spv').val(nama_spv)
      $(this).find('#e-nama_manager').val(nama_manager)
      $(this).find('#e-nama_pm').val(nama_pm)
      $(this).find('#e-nama_direktur').val(nama_direktur)
    })
  })

  function toggleDirekturField() {
      const jenis_ppbValue = $('#jenis_ppb').val();
      if (jenis_ppbValue === 'Non-Budget') { 
        $('#nama_direktur_div').show();
      } else { 
        $('#nama_direktur_div').hide();
      }
    }
</script>

<div class="modal fade" id="approval" tabindex="-1" aria-labelledby="modalLabel" aria-hidden="true">
    <div class="modal-dialog modal-sm">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="modalLabel">Approval</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Accounting/Accounting_ppb/approve">
                <input type="hidden" name="no_ppb_accounting" id="a-no_ppb_accounting">
                <input type="hidden" name="approval_level" id="approval_level">

                <div class="modal-body text-center">
                    <p>Apakah Anda yakin ingin menyetujui?</p>
                </div>
                
                <div class="modal-footer justify-content-center">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                    <button type="submit" class="btn btn-success" onclick="return confirm('Konfirmasi persetujuan?')">Setuju</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script>
    function setApprovalData(idAccountingPpbTf, approvalLevel) {
        document.getElementById('no_ppb_accounting').value = idAccountingPpbTf;
        document.getElementById('approval_level').value = approvalLevel;
    }

    
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#approval').on('show.bs.modal', function(event) {
      var no_ppb_accounting = $(event.relatedTarget).data('no_ppb_accounting')

      $(this).find('#a-no_ppb_accounting').val(no_ppb_accounting)

      // alert(id_accounting_ppb_tf)
    })

})


</script>