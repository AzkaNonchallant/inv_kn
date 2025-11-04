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
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">PO Import</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/PO_Import/Prc_po_import') ?>">PO Import</a></li>
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
                    <h5>Data PO Import <b>(Approval)</b></h5>

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
                            <th class="text-center">Tanggal</th>
                            <th class="text-center">No PO Import</th>
                            <!-- <th class="text-center">Jumlah</th> -->
                            <th class="text-center">Details</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_po_import =  explode('-', $k['tgl_po_import'])[2] . "/" . explode('-', $k['tgl_po_import'])[1] . "/" . explode('-', $k['tgl_po_import'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td class="text-center"><?= $tgl_po_import?></td>
                              <td class="text-center"><?= $k['no_po_import'] ?></td>
                              
                             
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" 
                                  data-id_prc_po_import_tf="<?= $k['id_prc_po_import_tf']?>" 
                                  data-prc_admin="<?= $k['prc_admin']?>" 
                                  data-id_prc_master_barang="<?= $k['id_prc_master_barang']?>" 
                                  data-id_prc_ppb_supplier="<?= $k['id_prc_ppb_supplier']?>" 
                                  data-no_po_import="<?= $k['no_po_import']?>"
                                  data-tgl_po_import="<?= $tgl_po_import?>"
                                  data-jumlah="<?= $k['jumlah']?>" 
                                  data-harga_perunit="<?= $k['harga_perunit']?>"
                                  data-total_harga="<?= $k['total_harga']?>"  
                                  data-metode="<?= $k['metode']?>" 
                                  data-shipment="<?= $k['shipment']?>" 
                                  data-pic1="<?= $k['pic1']?>" 
                                  data-pic2="<?= $k['pic2']?>" 
                                  data-pic_po_supplier="<?= $k['pic_po_supplier']?>"
                                  data-nama_po_supplier="<?= $k['nama_po_supplier']?>"
                                  data-nama_barang="<?= $k['nama_barang']?>"
                                  data-satuan="<?= $k['satuan']?>"

      
                                   >
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td>
                              <td class="text-center">
                                <?php if ($level === "admin")  { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                  data-id_prc_po_import="<?= $k['id_prc_po_import']?>" 
                                  data-prc_admin="<?= $k['prc_admin']?>"
                                  data-no_po_import="<?= $k['no_po_import']?>" 
                                  data-tgl_po_import="<?= $tgl_po_import?>" 
                                  data-id_prc_ppb_supplier="<?= $k['id_prc_ppb_supplier']?>" 
                                  data-id_prc_master_barang="<?= $k['id_prc_master_barang']?>" 
                                  data-jumlah="<?= $k['jumlah']?>" 
                                  data-harga_perunit="<?= $k['harga_perunit']?>"
                                  data-total_harga="<?= $k['total_harga']?>"  
                                  data-metode="<?= $k['metode']?>" 
                                  data-shipment="<?= $k['shipment']?>" 
                                  data-pic1="<?= $k['pic1']?>" 
                                  data-pic2="<?= $k['pic2']?>"
                                  data-satuan="<?= $k['satuan']?>"
                                  data-nama_barang="<?= $k['nama_barang']?>"
                                  data-nama_po_supplier="<?= $k['nama_po_supplier']?>"
                                  data-pic_po_supplier="<?= $k['pic_po_supplier']?>"
                                   >
                                      <i class="feather icon-edit-2"></i>Edit
                                    </button>
                                  </div>
                                  <div class="btn-group" role="group">
                                    <a href="<?= base_url() ?>purchasing/Po_import/Prc_po_import/delete/<?= $k['no_po_import'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { false; }">
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah PO Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>Purchasing/Po_import/Prc_po_import/add/">
        <div class="modal-body">
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_po_import">Tanggal PO Import</label>
                <input type="text" class="form-control datepicker" id="tgl_po_import" name="tgl_po_import" placeholder="Tanggal PO Import" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_po_import">No PO Import</label>
                <input type="text" class="form-control" id="no_po_import" name="no_po_import" maxlength="20" placeholder="No PO Import" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PO Import sudah ada.
                </div>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="id_prc_master_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="id_prc_master_barang" name="id_prc_master_barang" required>
                  <option disabled selected hidden value="">-Pilih Barang-</option>
                  <?php foreach ($res_barang as $s) { ?>
                    <option
                      data-satuan="<?= $s['satuan'] ?>"
                      data-nama="<?= $s['nama_barang'] ?>" 
                      data-nama_po_supplier="<?= $s['nama_po_supplier'] ?>" 
                      data-pic_po_supplier="<?= $s['pic_po_supplier'] ?>" 
                      value="<?= $s['nama_barang'] ?>,<?= $s['id_prc_master_barang'] ?>">
                      <?= $s['nama_barang'] ?> | <?= $s['nama_po_supplier'] ?> | <?= $s['satuan'] ?>
                    </option>
                  <?php } ?>
                </select>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="nama_po_supplier">Supplier</label>
                <input type="text" class="form-control" id="nama_po_supplier" name="nama_po_supplier" placeholder="Supplier" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="pic_po_supplier">PIC Supplier</label>
                <input type="text" class="form-control" id="pic_po_supplier" name="pic_po_supplier" placeholder="PIC Supplier" autocomplete="off" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="jumlah">Jumlah</label>
                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" autocomplete="off" required>
              </div>
            </div>
          </div>
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="satuan">Satuan</label>
                <input type="text" class="form-control" id="satuan" name="satuan" placeholder="Satuan" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="harga_perunit">Harga Perunit</label>
                <input type="text" class="form-control" id="harga_perunit" name="harga_perunit" placeholder="Harga Perunit" oninput="calculateTotal()">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="total_harga">Total Harga</label>
                <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" readonly>
              </div>
            </div>

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
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <th>PIC Supplier</th>
                  <th>Jumlah</th>
                  <th>Harga Perunit</th>
                  <th>Total Harga</th>
                  <th class="text-right">Hapus</th>
                </tr>
              </thead>
              <tbody id="insert_batch"></tbody>
            </table>
          </div>

         <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="metode">Metode</label>
                <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="shipment">Shipment</label>
                <input type="text" class="form-control" id="shipment" name="shipment" placeholder="Shipment">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="pic1">PIC Kapsulindo 1</label>
                <input type="text" class="form-control" id="pic1" name="pic1" placeholder="Pic1">
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="pic2">PIC Kapsulindo 2</label>
                <input type="text" class="form-control" id="pic2" name="pic2" placeholder="Pic2">
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

<script>
$(document).ready(function() {
  
  function calculateTotal() {
    const jumlah = parseFloat($('#jumlah').val().replace(/\./g, '').replace(/,/g, '.')) || 0;  
    const hargaPerUnit = parseFloat($('#harga_perunit').val().replace(/\./g, '').replace(/,/g, '.')) || 0;  
    const totalHarga = jumlah * hargaPerUnit;

    $('#total_harga').val(totalHarga.toLocaleString('id-ID', { maximumFractionDigits: 0 })); // Hapus angka di belakang koma
}

// Fungsi untuk memformat angka dengan titik pemisah ribuan saat diketik
function formatAngka(input) {
    let angka = input.value.replace(/\D/g, ""); // Hanya angka
    let angkaFormat = angka.replace(/\B(?=(\d{3})+(?!\d))/g, "."); // Tambahkan titik setiap 3 angka
    input.value = angkaFormat;
}

// Event listener untuk input jumlah dan harga per unit
$('#jumlah, #harga_perunit').on('input', function() {
    formatAngka(this);  // Format angka saat diketik
    calculateTotal();  // Hitung total
});


  $('#id_prc_master_barang').change(function() {
    var selectedOption = $(this).find('option:selected');
    var satuan = selectedOption.data('satuan');
    $('#satuan').val(satuan);  
  });

  $('#id_prc_master_barang').change(function() {
    var selectedOption = $(this).find('option:selected');
    var picPoSupplier = selectedOption.data('pic_po_supplier');
    $('#pic_po_supplier').val(picPoSupplier);
  });
  $('#id_prc_master_barang').change(function() {
    var selectedOption = $(this).find('option:selected');
    var namaPoSupplier = selectedOption.data('nama_po_supplier');
    $('#nama_po_supplier').val(namaPoSupplier);  
  });
  
  $('#input').on('click', function() {
    const kode = $('#id_prc_master_barang').val(); // Asumsikan kode diambil dari input tertentu
    const id_prc_master_barang = kode.split(",")[1];
    const nama_barang = kode.split(",")[0];
    const nama_po_supplier = $('#nama_po_supplier').val();
    const pic_po_supplier = $('#pic_po_supplier').val();
    const jumlah = $('#jumlah').val();
    const harga_perunit = $('#harga_perunit').val();
    const total_harga = $('#total_harga').val();
    const nextform = Date.now(); 
    const no_batch = 'Batch-' + nextform;
    const id_prc_master_barang_detail = kode.split(",")[2]; // Ubah nama variabel untuk menghindari deklarasi ulang

    $('#insert_batch').append(`
        <tr id="tr_${nextform}">
            <input type="hidden" name="id_prc_master_barang[]" value="${id_prc_master_barang}">
            <input type="hidden" name="nama_barang[]" value="${nama_barang}">
            <input type="hidden" name="nama_po_supplier[]" value="${nama_po_supplier}">
            <input type="hidden" name="pic_po_supplier[]" value="${pic_po_supplier}">
            <input type="hidden" name="jumlah[]" value="${jumlah}">
            <input type="hidden" name="harga_perunit[]" value="${harga_perunit}">
            <input type="hidden" name="total_harga[]" value="${total_harga}">
            <input type="hidden" name="id_prc_master_barang_detail[]" value="${id_prc_master_barang_detail}">

            <td>${nama_barang}</td>
            <td>${nama_po_supplier}</td>
            <td>${pic_po_supplier}</td>
            <td>${jumlah}</td>
            <td>${harga_perunit}</td>
            <td>${total_harga}</td>
        
            <td class="text-right">
                <a href="javascript:void(0)" onclick="remove(${nextform})" class="text-danger">
                    <i class="feather icon-trash-2"></i>
                </a>
            </td>
        </tr>
    `);
});

  $("#no_po_import").keyup(function() {
        var no_po_import = $("#no_po_import").val();
        jQuery.ajax({
            url: "<?= base_url() ?>Purchasing/Po_import/Prc_po_import/cek_no_po_import/",
            dataType: 'text',
            type: "post",
            data: {
                no_po_import: no_po_import
            },
            success: function(response) {
                if (response == "true") {
                    $("#no_po_import").addClass("is-invalid");
                    $("#simpan").attr("disabled", "disabled");
                } else {
                    $("#no_po_import").removeClass("is-invalid");
                    $("#simpan").removeAttr("disabled");
                }
            }
        });
    })
});
</script>

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail PO Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>M_purchasing/M_po_impport/M_prc_po_import/">
        <div class="modal-body">
          
          <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-tgl_po_import">Tanggal PO Import</label>
                <input type="text" class="form-control" id="v-tgl_po_import" name="tgl_po_import" placeholder="Tanggal PO Import" autocomplete="off" required readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_po_import">No PO Import</label>
                <input type="text" class="form-control" id="v-no_po_import" name="no_po_import" maxlength="20" placeholder="No PO Import" aria-describedby="validationServer03Feedback" autocomplete="off" readonly required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Nomor PO Import sudah ada.
                </div>
              </div>
            </div>
          </div>

         
          
          

          <div class="table-responsive">
            <table class="table table-bordered table-sm">
              <thead>
                <tr>
                  <th>Nama Barang</th>
                  <th>Supplier</th>
                  <th>PIC Supplier</th>
                  <th>Jumlah</th>
                  <th>Harga Perunit</th>
                  <th>Total Harga</th>
                  
                </tr>
              </thead>
              <tbody id="v-ppb_po_barang"></tbody>
            </table>
          </div>

         <div class="row">
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-metode">Metode</label>
                <input type="text" class="form-control" id="v-metode" name="metode" placeholder="Metode" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-shipment">Shipment</label>
                <input type="text" class="form-control" id="v-shipment" name="shipment" placeholder="Shipment" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-pic1">PIC Kapsulindo 1</label>
                <input type="text" class="form-control" id="v-pic1" name="pic1" placeholder="Pic1" readonly>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="v-pic2">PIC Kapsulindo 2</label>
                <input type="text" class="form-control" id="v-pic2" name="pic2" placeholder="Pic2" readonly>
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

<script type="text/javascript">
  $(document).ready(function() {
  $('#detail').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); 
    var id_prc_po_import = button.data('id_prc_po_import');
    var prc_admin = button.data('prc_admin');
    var no_po_import = button.data('no_po_import');
    var tgl_po_import = button.data('tgl_po_import');
    var id_prc_ppb_supplier = button.data('id_prc_ppb_supplier');
    var id_prc_master_barang = button.data('id_prc_master_barang');
    var jumlah = button.data('jumlah');
    var harga_perunit = button.data('harga_perunit');
    var total_harga = button.data('total_harga'); 
    var metode = button.data('metode');
    var shipment = button.data('shipment');
    var pic1 = button.data('pic1');
    var pic2 = button.data('pic2');
    var pic_po_supplier = button.data('pic_po_supplier');
    var nama_po_supplier = button.data('nama_po_supplier');
    var nama_barang = button.data('nama_barang');
    var satuan = button.data('satuan');

    

    $(this).find('#v-id_prc_po_import').val(id_prc_po_import);
    $(this).find('#v-prc_admin').val(prc_admin);
    $(this).find('#v-no_po_import').val(no_po_import);
    $(this).find('#v-tgl_po_import').val(tgl_po_import);
    $(this).find('#v-id_prc_ppb_supplier').val(id_prc_ppb_supplier);
    $(this).find('#v-id_prc_master_barang').val(id_prc_master_barang);
    $(this).find('#v-jumlah').val(jumlah);
    $(this).find('#v-harga_perunit').val(harga_perunit);
    $(this).find('#v-total_harga').val(total_harga);
    $(this).find('#v-metode').val(metode);
    $(this).find('#v-shipment').val(shipment);
    $(this).find('#v-pic1').val(pic1);
    $(this).find('#v-pic2').val(pic2);
    $(this).find('#v-pic_po_supplier').val(pic_po_supplier);
    $(this).find('#v-nama_po_supplier').val(nama_po_supplier);
    $(this).find('#v-nama_barang').val(nama_barang);
    $(this).find('#v-satuan').val(satuan);

  jQuery.ajax({
        url: "<?= base_url() ?>purchasing/po_import/prc_po_import/det_ppb_barang",
        dataType: 'json',
        type: "post",
        data: {
          no_po_import: no_po_import
        },
        success: function(response) {
          var data = response;
          var $id = $('#v-ppb_po_barang');
          $id.empty(); 

          for (var i = 0; i < data.length; i++) {
            $id.append(`
              <tr>
                <td>` + data[i].nama_barang + `</td>
                <td>` + data[i].nama_po_supplier + `</td>
                <td>` + data[i].pic_po_supplier + `</td>
                
                <td>` + data[i].harga_perunit + `</td>
                <td>` + data[i].total_harga + `</td>


                <td class="text-right">` + data[i].jumlah + "&nbsp" + data[i].total_harga + `</td>
              </tr>
            `);
          }
        }
      });
  });

});

</script>

<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit PO Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" id="form_update" action="<?= base_url() ?>Purchasing/Po_Import/Prc_po_import/update">
        <input type="hidden" id="e_id_prc_po_import" name="id_prc_po_import">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_tgl_po_import">Tanggal PO Import</label>
                <input type="text" class="form-control datepicker" id="e_tgl_po_import" name="tgl_po_import" placeholder="Tanggal PO Import" required>
              </div>
            </div>

            <div class="form-group">
                        <label for="e_no_po_import">Kode PO Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="e_no_po_import" name="no_po_import" autocomplete="off" placeholder="No PO Import" aria-describedby="validationServer03Feedback" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            Maaf No PO Import sudah ada.
                        </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_id_prc_po_supplier">Nama Supplier</label>
                <select class="form-control chosen-select" id="e_id_prc_po_supplier" name="id_prc_ppb_supplier" required>
                  <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                  <?php foreach ($res_supplier as $s): ?>
                    <option value="<?= $s['id_prc_ppb_supplier'] ?>" 
                            data-nama_po_supplier="<?= $s['nama_po_supplier'] ?>" 
                            data-pic_po_supplier="<?= $s['pic_po_supplier'] ?>"><?= $s['nama_po_supplier'] ?> (<?= $s['pic_po_supplier'] ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
                <div class="form-group">
                    <label for="e_pic_po_supplier">PIC Supplier</label>
                    <input type="text" class="form-control" id="e_pic_po_supplier" name="pic_po_supplier" placeholder="Pic Supplier" readonly>
                </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_id_prc_master_barang">Nama Barang</label>
                <select class="form-control chosen-select" id="e_id_prc_master_barang" name="id_prc_master_barang" required>
                  <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                  <?php foreach ($res_barang as $b): ?>
                    <option value="<?= $b['id_prc_master_barang'] ?>" data-satuan="<?= $b['satuan'] ?>"><?= $b['nama_barang'] ?> (<?= $b['satuan'] ?>)</option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_spek">Spesifikasi</label>
                <input type="text" class="form-control" id="e_spek" name="satuan" placeholder="satuan" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_jumlah">Jumlah</label>
                <input type="text" class="form-control" id="e_jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_harga_perunit">Harga Perunit</label>
                <input type="text" class="form-control" id="e_harga_perunit" name="harga_perunit" placeholder="Harga Perunit" oninput="calculateTotal()">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_total_harga">Total Harga</label>
                <input type="text" class="form-control" id="e_total_harga" name="total_harga" placeholder="Total Harga" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_metode">Metode</label>
                <input type="text" class="form-control" id="e_metode" name="metode" placeholder="Metode">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_shipment">Shipment</label>
                <input type="text" class="form-control" id="e_shipment" name="shipment" placeholder="Shipment">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_pic1">PIC Kapsulindo 1</label>
                <input type="text" class="form-control" id="e_pic1" name="pic1" placeholder="Pic1">
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_pic2">PIC Kapsulindo 2</label>
                <input type="text" class="form-control" id="e_pic2" name="pic2" placeholder="Pic2">
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_prc_admin">Prc Admin</label>
                <input type="text" class="form-control" id="e_prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
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
  $('#edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); 
    var id_prc_po_import = button.data('id_prc_po_import');
    var no_po_import = button.data('no_po_import');
    var tgl_po_import = button.data('tgl_po_import');
    var id_prc_ppb_supplier = button.data('id_prc_ppb_supplier');
    var id_prc_master_barang = button.data('id_prc_master_barang');
    var jumlah = button.data('jumlah');
    var total_harga = button.data('total_harga');
    var harga_perunit = button.data('harga_perunit');
    var metode = button.data('metode');
    var shipment = button.data('shipment');
    var pic1 = button.data('pic1');
    var pic2 = button.data('pic2');
    var nama_po_supplier = button.data('nama_po_supplier');
    var pic_po_supplier = button.data('pic_po_supplier');
    var satuan = button.data('satuan');

    $('#e_id_prc_po_import').val(id_prc_po_import);
    $('#e_no_po_import').val(no_po_import);
    $('#e_tgl_po_import').val(tgl_po_import); 
    $('#e_id_prc_po_supplier').val(id_prc_ppb_supplier);
    $('#e_id_prc_master_barang').val(id_prc_master_barang);
    $('#e_jumlah').val(jumlah);
    $('#e_total_harga').val(total_harga);
    $('#e_harga_perunit').val(harga_perunit);
    $('#e_metode').val(metode);
    $('#e_shipment').val(shipment);
    $('#e_pic1').val(pic1);
    $('#e_pic2').val(pic2);
    $('#e_pic_po_supplier').val(pic_po_supplier);
    $('#e_spek').val(satuan);
    $(this).find('#e_id_prc_master_barang').trigger("chosen:updated");
    $(this).find('#e_id_prc_po_supplier').trigger("chosen:updated");
  });
  
  $('#e_id_prc_master_barang').on('change', function() {
    var selectedOption = $(this).find('option:selected');
    var satuan = selectedOption.data('satuan');
    $('#e_spek').val(satuan);
  });

  $('#e_id_prc_po_supplier').on('change', function() {
    var selectedOption = $(this).find('option:selected');
    var pic_po_supplier = selectedOption.data('pic_po_supplier');
    $('#e_pic_po_supplier').val(pic_po_supplier);
  });

  function calculateTotal() {
    var jumlah = parseFloat($('#e_jumlah').val()) || 0; 
    var harga_perunit = parseFloat($('#e_harga_perunit').val()) || 0; 

    var total_harga = jumlah * harga_perunit;
    $('#e_total_harga').val(total_harga.toFixed(0));
  }

  $('#e_jumlah, #e_harga_perunit').on('input', function() {
    calculateTotal();
  });
  $("#e_no_po_import").keyup(function() {
      var no_batch = $("#e_no_po_import").val();
      jQuery.ajax({
        url: "<?= base_url() ?>Purchasing/Po_import/Prc_po_import/cek_no_po_import",
        dataType: 'text',
        type: "post",
        data: {
          no_po_import: no_po_import
        },
        success: function(response) {
          if (response == "true") {
            $("#e_no_po_import").addClass("is-invalid");
            $("#simpan").attr("disabled", "disabled");
          } else {
            $("#e_no_po_import").removeClass("is-invalid");
            $("#simpan").removeAttr("disabled");
          }
        }
      });
    })
    $(this).find('#e_tgl_po_import').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
});

</script>