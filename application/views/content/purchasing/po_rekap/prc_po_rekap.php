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
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/PO_import/Prc_po_rekap') ?>">Rekap Import</a></li>
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
                    <h5>Data Rekap PO <b>(Approval)</b></h5>

                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-plus"></i>Tambah Rekap Import
                    </button>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th class="text-center">No. Order</th>
                            <th class="text-center">Tanggal P.I.B</th>
                            <th class="text-center">No P.I.B</th>
                            <th class="text-center">Status</th>
                            <th class="text-center">Details</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_pib =  explode('-', $k['tgl_pib'])[2] . "/" . explode('-', $k['tgl_pib'])[1] . "/" . explode('-', $k['tgl_pib'])[0];
                            $tgl_invoice =  explode('-', $k['tgl_invoice'])[2] . "/" . explode('-', $k['tgl_invoice'])[1] . "/" . explode('-', $k['tgl_invoice'])[0];
                            $tgl_etd =  explode('-', $k['tgl_etd'])[2] . "/" . explode('-', $k['tgl_etd'])[1] . "/" . explode('-', $k['tgl_etd'])[0];
                            $tgl_eta =  explode('-', $k['tgl_eta'])[2] . "/" . explode('-', $k['tgl_eta'])[1] . "/" . explode('-', $k['tgl_eta'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td class="text-center"><?= $k['no_order'] ?></td>
                              <td class="text-center"><?= $tgl_pib?></td>
                              <td class="text-center"><?= $k['no_pib'] ?></td>
                              <td class="text-center"><?= $k['status'] ?></td>
                              
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#details" 
                                  data-id_prc_po_import="<?= $k['id_prc_po_import']?>"
                                  data-no_po_import="<?= $k['no_po_import']?>"
                                  
                                  data-jumlah="<?= $k['jumlah']?>"
                                  data-id_prc_master_barang="<?= $k['id_prc_master_barang']?>"
                                  data-harga_perunit="<?= $k['harga_perunit']?>"
                                  data-total_harga="<?= $k['total_harga']?>"
                                  data-metode="<?= $k['metode']?>"
                                  data-no_order="<?= $k['no_order']?>"
                                  data-tgl_pib="<?= $tgl_pib?>"
                                  data-no_pib="<?= $k['no_pib']?>"
                                  data-no_invoice="<?= $k['no_invoice']?>"
                                  data-tgl_invoice="<?= $tgl_invoice?>"
                                  data-tgl_etd="<?= $tgl_etd?>"
                                  data-tgl_eta="<?= $tgl_eta?>"
                                  data-no_bl="<?= $k['no_bl']?>" 
                                  data-voyager="<?= $k['voyager']?>" 
                                  data-no_voyager="<?= $k['no_voyager']?>" 
                                  data-prc_admin="<?= $k['prc_admin']?>"
                                  data-nama_po_supplier="<?= $k['nama_po_supplier']?>"
                                  data-nama_barang="<?= $k['nama_barang']?>"
                                  data-spek="<?= $k['spek']?>">
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td>

                              <?php if ($level === "admin")  { ?>
                                <td class="text-center">
                                  <?php if ($k['status'] == 'Selesai') { ?>
                                  <?php } elseif ($k['status'] == 'Perjalanan') { ?>
                                    <div class="btn-group" role="group">
                                      <button type="button" class="btn btn-success btn-square btn-sm" data-toggle="modal" data-target="#updateStatus" 
                                      data-id_prc_rekap_import="<?= $k['id_prc_rekap_import'] ?>" 
                                      data-status="<?= $k['status'] ?>">
                                        <i class="feather icon-refresh-ccw"></i>Update Status
                                      </button>
                                    </div>
                                  <?php } else { ?>
                                    <div class="btn-group" role="group">
                                      <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                      data-id_prc_po_import="<?= $k['id_prc_po_import']?>"
                                      data-no_po_import="<?= $k['no_po_import']?>"
                                      data-id_prc_rekap_import="<?= $k['id_prc_rekap_import']?>"
                                     
                                      data-jumlah="<?= $k['jumlah']?>"
                                      data-id_prc_master_barang="<?= $k['id_prc_master_barang']?>"
                                      data-harga_perunit="<?= $k['harga_perunit']?>"
                                      data-total_harga="<?= $k['total_harga']?>"
                                      data-metode="<?= $k['metode']?>"
                                      data-no_order="<?= $k['no_order']?>"
                                      data-tgl_pib="<?= $tgl_pib?>"
                                      data-no_pib="<?= $k['no_pib']?>"
                                      data-no_invoice="<?= $k['no_invoice']?>"
                                      data-tgl_invoice="<?= $tgl_invoice?>"
                                      data-tgl_etd="<?= $tgl_etd?>"
                                      data-tgl_eta="<?= $tgl_eta?>"
                                      data-no_bl="<?= $k['no_bl']?>" 
                                      data-voyager="<?= $k['voyager']?>" 
                                      data-no_voyager="<?= $k['no_voyager']?>" 
                                      data-prc_admin="<?= $k['prc_admin']?>"
                                      data-nama_po_supplier="<?= $k['nama_po_supplier']?>"
                                      data-nama_barang="<?= $k['nama_barang']?>"
                                      data-spek="<?= $k['spek']?>">
                                        <i class="feather icon-edit-2"></i>Edit
                                      </button>
                                    </div>
                                    <div class="btn-group" role="group">
                                      <a href="<?= base_url() ?>purchasing/Po_rekap/Prc_po_rekap/delete/<?= $k['id_prc_rekap_import'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { false; }">
                                        <i class="feather icon-trash-2"></i>Hapus
                                      </a>
                                    </div>
                                    <div class="btn-group" role="group">
                                      <button type="button" class="btn btn-success btn-square btn-sm" data-toggle="modal" data-target="#updateStatus" 
                                      data-id_prc_rekap_import="<?= $k['id_prc_rekap_import'] ?>" 
                                      data-status="<?= $k['status'] ?>">
                                        <i class="feather icon-refresh-ccw"></i>Update Status
                                      </button>
                                    </div>
                                  <?php } ?>
                                </td>
                              <?php } ?>
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
        <h5 class="modal-title" id="exampleModalLabel">Tambah Rekap Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add" action="<?= base_url() ?>Purchasing/Po_rekap/Prc_po_rekap/add/">
        <div class="modal-body">
          <div class="row">

          <div class="col-md-4">
              <div class="form-group">
                <label for="id_prc_po_import">Nomor PO Import</label>
                <select class="form-control chosen-select" id="id_prc_po_import" name="id_prc_po_import" required>
                  <option value="" disabled selected hidden>- Pilih Nomor Rekap -</option>
                  <?php foreach ($res_rekap as $s): ?>
                    <option value="<?= $s['id_prc_po_import'] ?>" 
                            data-nama_po_supplier="<?= $s['nama_po_supplier'] ?>" 
                            data-nama_barang="<?= $s['nama_barang'] ?>"
                            data-spek="<?= $s['spek'] ?>"
                            data-jumlah="<?= $s['jumlah'] ?>"
                            data-harga_perunit="<?= $s['harga_perunit'] ?>"
                            data-total_harga="<?= $s['total_harga'] ?>"
                            data-metode="<?= $s['metode'] ?>"
                            ><?= $s['no_po_import'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nama_po_supplier">Nama Supplier</label>
                    <input type="text" class="form-control" id="nama_po_supplier" name="nama_po_supplier" placeholder="Nama Supplier" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="spek">Spesifikasi</label>
                    <input type="text" class="form-control" id="spek" name="spek" placeholder="Spesifikasi" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="harga_perunit">Harga Perunit</label>
                    <input type="text" class="form-control" id="harga_perunit" name="harga_perunit" placeholder="Harga Perunit" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="total_harga">Total Harga</label>
                    <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="metode">Metode Payment</label>
                    <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode Payment" readonly>
                </div>
            </div>
          </div>
          <br>------------------------------------------------------------------- <br> <br>
          <div class="row"> 

            <div class="col-md-4">
              <div class="form-group">
                <label for="no_order">No. Order</label>
                <input type="text" class="form-control" id="no_order" name="no_order" value="<?= $new_order_number ?>"  readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_pib">Tanggal P.I.B</label>
                <input type="text" class="form-control datepicker" id="tgl_pib" name="tgl_pib" placeholder="Tanggal P.I.B" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_pib">No. PIB</label>
                <input type="text" class="form-control" id="no_pib" name="no_pib" placeholder="No PIB" autocomplete="off" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_invoice">No. Invoice</label>
                <input type="text" class="form-control" id="no_invoice" name="no_invoice" placeholder="No Invoice" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_invoice">Tanggal Invoice</label>
                <input type="text" class="form-control datepicker" id="tgl_invoice" name="tgl_invoice" placeholder="Tanggal Invoice" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_etd">ETD</label>
                <input type="text" class="form-control datepicker" id="tgl_etd" name="tgl_etd" placeholder="ETD" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_eta">ETA</label>
                <input type="text" class="form-control datepicker" id="tgl_eta" name="tgl_eta" placeholder="ETA" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_bl">No. BL</label>
                <input type="text" class="form-control" id="no_bl" name="no_bl" placeholder="No BL" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="voyager">Voyager</label>
                <input type="text" class="form-control" id="voyager" name="voyager" placeholder="Voyager" autocomplete="off" >
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="no_voyager">No. Voyager</label>
                <input type="text" class="form-control" id="no_voyager" name="no_voyager" placeholder="No Voyager" autocomplete="off">
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="prc_admin">Purchasing Admin</label>
                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
              </div>
            </div>
            <!-- <div class="col-md-4">
              <div class="form-group">
                <label for="status">Status</label>
                <input type="text" class="form-control" id="status" name="status" value="Status" readonly>
              </div>
            </div>-->
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

<script>
$(document).ready(function() {
  
  

  // Panggil fungsi calculateTotal ketika input jumlah atau harga per unit berubah
  
  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var namaPoSupplier = selectedOption.data('nama_po_supplier');
    $('#nama_po_supplier').val(namaPoSupplier);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var namaBarang = selectedOption.data('nama_barang');
    $('#nama_barang').val(namaBarang);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var spek = selectedOption.data('spek');
    $('#spek').val(spek);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var jumlah = selectedOption.data('jumlah');
    $('#jumlah').val(jumlah);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var hargaPerunit = selectedOption.data('harga_perunit');
    $('#harga_perunit').val(hargaPerunit);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var totalHarga = selectedOption.data('total_harga');
    $('#total_harga').val(totalHarga);  
  });
  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var metode = selectedOption.data('metode');
    $('#metode').val(metode);  
  });


  
});
</script>

<!-- Modal Detail -->
<div class="modal fade" id="details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">  
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail PO Rekap Import</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      
      <form method="post" id=form_add>
        
        <div class="modal-body">
          <div class="row">

          <div class="col-md-4">
                <div class="form-group">
                    <label for="v-no_po_import">Nomor PO</label>
                    <input type="text" class="form-control" id="v-no_po_import" name="no_po_import" placeholder="Nomor PO" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="v-nama_po_supplier">Nama Supplier</label>
                    <input type="text" class="form-control" id="v-nama_po_supplier" name="nama_po_supplier" placeholder="Nama Supplier" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="v-nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="v-spek">Spesifikasi</label>
                    <input type="text" class="form-control" id="v-spek" name="spek" placeholder="Spesifikasi" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="v-jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="v-jumlah" name="jumlah" placeholder="Jumlah" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="v-harga_perunit">Harga Perunit</label>
                    <input type="text" class="form-control" id="v-harga_perunit" name="harga_perunit" placeholder="Harga Perunit" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="v-total_harga">Total Harga</label>
                    <input type="text" class="form-control" id="v-total_harga" name="total_harga" placeholder="Total Harga" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="v-metode">Metode Payment</label>
                    <input type="text" class="form-control" id="v-metode" name="metode" placeholder="Metode Payment" readonly>
                </div>
            </div>
          </div>
          <br>------------------------------------------------------------------- <br> <br>
          <div class="row"> 

            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_order">No. Order</label>
                <input type="text" class="form-control" id="v-no_order" name="no_order" placeholder="No. Order" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-tgl_pib">Tanggal P.I.B</label>
                <input type="text" class="form-control datepicker" id="v-tgl_pib" name="tgl_pib" placeholder="Tanggal P.I.B" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_pib">No. PIB</label>
                <input type="text" class="form-control" id="v-no_pib" name="no_pib" placeholder="No PIB" readonly >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_invoice">No. Invoice</label>
                <input type="text" class="form-control" id="v-no_invoice" name="no_invoice" placeholder="No Invoice" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-tgl_invoice">Tanggal Invoice</label>
                <input type="text" class="form-control" id="v-tgl_invoice" name="tgl_invoice" placeholder="Tanggal Invoice" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-tgl_etd">ETD</label>
                <input type="text" class="form-control" id="v-tgl_etd" name="tgl_etd" placeholder="ETD" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-tgl_eta">ETA</label>
                <input type="text" class="form-control" id="v-tgl_eta" name="tgl_eta" placeholder="ETA" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_bl">No. BL</label>
                <input type="text" class="form-control" id="v-no_bl" name="no_bl" placeholder="No BL" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-voyager">Voyager</label>
                <input type="text" class="form-control" id="v-voyager" name="voyager" placeholder="Voyager" readonly >
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-no_voyager">No. Voyager</label>
                <input type="text" class="form-control" id="v-no_voyager" name="no_voyager" placeholder="No Voyager" readonly >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="v-prc_admin">Purchasing Admin</label>
                <input type="text" class="form-control" id="v-prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
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

<!-- jQuery to Update Spec and Unit -->
<script type="text/javascript">
  $(document).ready(function() {
  $('#details').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); 
    var no_po_import = button.data('no_po_import');
    // var id_prc_po_import = button.data('id_prc_po_import');
    var nama_po_supplier = button.data('nama_po_supplier');
    
    
    var nama_barang = button.data('nama_barang');
    var spek = button.data('spek');
    var jumlah = button.data('jumlah');
    var harga_perunit = button.data('harga_perunit');
    var total_harga = button.data('total_harga'); 
    var metode = button.data('metode');
    var no_order = button.data('no_order');
    var tgl_pib = button.data('tgl_pib');
    var no_pib = button.data('no_pib');
    var no_invoice = button.data('no_invoice');
    var tgl_invoice = button.data('tgl_invoice');
    var tgl_etd = button.data('tgl_etd');
    var tgl_eta = button.data('tgl_eta');
    var no_bl = button.data('no_bl');
    var voyager = button.data('voyager');
    var no_voyager = button.data('no_voyager');
    var prc_admin = button.data('prc_admin');
    var nama_po_supplier = button.data('nama_po_supplier');
    var nama_barang = button.data('nama_barang');

    

    $(this).find('#v-no_po_import').val(no_po_import);
    $(this).find('#v-tgl_invoice').val(tgl_invoice);
    $(this).find('#v-nama_barang').val(nama_barang);
    $(this).find('#v-spek').val(spek);
    $(this).find('#v-jumlah').val(jumlah);
    $(this).find('#v-harga_perunit').val(harga_perunit);
    $(this).find('#v-total_harga').val(total_harga);
    $(this).find('#v-metode').val(metode);
    $(this).find('#v-no_order').val(no_order);
    $(this).find('#v-tgl_pib').val(tgl_pib);
    $(this).find('#v-no_pib').val(no_pib);
    $(this).find('#v-no_invoice').val(no_invoice);
    $(this).find('#v-tgl_invoice').val(tgl_invoice);
    $(this).find('#v-tgl_etd').val(tgl_etd);
    $(this).find('#v-tgl_eta').val(tgl_eta);
    $(this).find('#v-no_bl').val(no_bl);
    $(this).find('#v-voyager').val(voyager);
    $(this).find('#v-no_voyager').val(no_voyager);
    $(this).find('#v-prc_admin').val(prc_admin);
    $(this).find('#v-nama_po_supplier').val(nama_po_supplier);
    $(this).find('#v-nama_barang').val(nama_barang);
    
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var namaPoSupplier = selectedOption.data('nama_po_supplier');
    $('#nama_po_supplier').val(namaPoSupplier);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var namaBarang = selectedOption.data('nama_barang');
    $('#nama_barang').val(namaBarang);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var spek = selectedOption.data('spek');
    $('#spek').val(spek);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var jumlah = selectedOption.data('jumlah');
    $('#jumlah').val(jumlah);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var hargaPerunit = selectedOption.data('harga_perunit');
    $('#harga_perunit').val(hargaPerunit);  
  });

  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var totalHarga = selectedOption.data('total_harga');
    $('#total_harga').val(totalHarga);  
  });
  $('#id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var metode = selectedOption.data('metode');
    $('#metode').val(metode);  
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
      
      <form method="post" id="form_update" action="<?= base_url() ?>purchasing/Po_rekap/Prc_po_rekap/update">
        <input type="hidden" id="e_id_prc_rekap_import" name="id_prc_rekap_import">
        <div class="modal-body">
          <div class="row">

          <div class="col-md-4">
              <div class="form-group">
                <label for="id_prc_po_import">Nomor PO Import</label>
                <select class="form-control chosen-select" id="e_id_prc_po_import" name="id_prc_po_import" required>
                  <option value="" disabled selected hidden>- Pilih Nomor Rekap -</option>
                  <?php foreach ($res_rekap as $s): ?>
                    <option value="<?= $s['id_prc_po_import'] ?>" 
                            data-nama_po_supplier="<?= $s['nama_po_supplier'] ?>" 
                            data-nama_barang="<?= $s['nama_barang'] ?>"
                            data-spek="<?= $s['spek'] ?>"
                            data-jumlah="<?= $s['jumlah'] ?>"
                            data-harga_perunit="<?= $s['harga_perunit'] ?>"
                            data-total_harga="<?= $s['total_harga'] ?>"
                            data-metode="<?= $s['metode'] ?>"
                            ><?= $s['no_po_import'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="e_nama_po_supplier">Nama Supplier</label>
                    <input type="text" class="form-control" id="e_nama_po_supplier" name="nama_po_supplier" placeholder="Nama Supplier" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="e_nama_barang">Nama Barang</label>
                    <input type="text" class="form-control" id="e_nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="e_spek">Spesifikasi</label>
                    <input type="text" class="form-control" id="e_spek" name="spek" placeholder="Spesifikasi" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="e_jumlah">Jumlah</label>
                    <input type="text" class="form-control" id="e_jumlah" name="jumlah" placeholder="Jumlah" readonly>
                </div>
            </div>
            <div class="col-md-4">
                <div class="form-group">
                    <label for="e_harga_perunit">Harga Perunit</label>
                    <input type="text" class="form-control" id="e_harga_perunit" name="harga_perunit" placeholder="Harga Perunit" readonly>
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
                    <label for="e_metode">Metode Payment</label>
                    <input type="text" class="form-control" id="e_metode" name="metode" placeholder="Metode Payment" readonly>
                </div>
            </div>
          </div>
          <br>------------------------------------------------------------------- <br> <br>
          <div class="row"> 

            <div class="col-md-4">
              <div class="form-group">
                <label for="e_no_order">No. Order</label>
                <input type="text" class="form-control" id="e_no_order" name="no_order" placeholder="No. Order" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_tgl_pib">Tanggal P.I.B</label>
                <input type="text" class="form-control datepicker" id="e_tgl_pib" name="tgl_pib" placeholder="Tanggal P.I.B" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_no_pib">No. PIB</label>
                <input type="text" class="form-control" id="e_no_pib" name="no_pib" placeholder="No PIB" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_no_invoice">No. Invoice</label>
                <input type="text" class="form-control" id="e_no_invoice" name="no_invoice" placeholder="No Invoice" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_tgl_invoice">Tanggal Invoice</label>
                <input type="text" class="form-control datepicker" id="e_tgl_invoice" name="tgl_invoice" placeholder="Tanggal Invoice" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_tgl_etd">ETD</label>
                <input type="text" class="form-control datepicker" id="e_tgl_etd" name="tgl_etd" placeholder="ETD" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_tgl_eta">ETA</label>
                <input type="text" class="form-control datepicker" id="e_tgl_eta" name="tgl_eta" placeholder="ETA" autocomplete="off" required>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_no_bl">No. BL</label>
                <input type="text" class="form-control" id="e_no_bl" name="no_bl" placeholder="No BL" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_voyager">Voyager</label>
                <input type="text" class="form-control" id="e_voyager" name="voyager" placeholder="Voyager" >
              </div>
            </div>
            
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_no_voyager">No. Voyager</label>
                <input type="text" class="form-control" id="e_no_voyager" name="no_voyager" placeholder="No Voyager" >
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="e_prc_admin">Purchasing Admin</label>
                <input type="text" class="form-control" id="e_prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
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
  $('#edit').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); 
    var no_po_import = button.data('no_po_import');
    var nama_po_supplier = button.data('nama_po_supplier');
    var id_prc_rekap_import = button.data('id_prc_rekap_import');
    var id_prc_po_import = button.data('id_prc_po_import');
    var nama_barang = button.data('nama_barang');
    var spek = button.data('spek');
    var jumlah = button.data('jumlah');
    var harga_perunit = button.data('harga_perunit');
    var total_harga = button.data('total_harga'); 
    var metode = button.data('metode');
    var no_order = button.data('no_order');
    var tgl_pib = button.data('tgl_pib');
    var no_pib = button.data('no_pib');
    var no_invoice = button.data('no_invoice');
    var tgl_invoice = button.data('tgl_invoice');
    var tgl_etd = button.data('tgl_etd');
    var tgl_eta = button.data('tgl_eta');
    var no_bl = button.data('no_bl');
    var voyager = button.data('voyager');
    var no_voyager = button.data('no_voyager');
    var prc_admin = button.data('prc_admin');
    var nama_po_supplier = button.data('nama_po_supplier');
    var nama_barang = button.data('nama_barang');
    

    // $('#e_no_po_import').val(no_po_import);
    $('#e_tgl_invoice').val(tgl_invoice);
    $('#e_nama_barang').val(nama_barang);
    $('#e_no_po_import').val(no_po_import);
    $('#e_id_prc_po_import').val(id_prc_po_import);
    $('#e_id_prc_rekap_import').val(id_prc_rekap_import);
    $('#e_spek').val(spek);
    $('#e_jumlah').val(jumlah);
    $('#e_harga_perunit').val(harga_perunit);
    $('#e_total_harga').val(total_harga);
    $('#e_metode').val(metode);
    $('#e_no_order').val(no_order);
    $('#e_tgl_pib').val(tgl_pib);
    $('#e_no_pib').val(no_pib);
    $('#e_no_invoice').val(no_invoice);
    $('#e_tgl_invoice').val(tgl_invoice);
    $('#e_tgl_etd').val(tgl_etd);
    $('#e_tgl_eta').val(tgl_eta);
    $('#e_no_bl').val(no_bl);
    $('#e_voyager').val(voyager);
    $('#e_no_voyager').val(no_voyager);
    $('#e_prc_admin').val(prc_admin);
    $('#e_nama_po_supplier').val(nama_po_supplier);
    $('#e_nama_barang').val(nama_barang);


    // $(this).find('#e_id_prc_po_import').trigger("chosen:updated");
    $(this).find('#e_id_prc_po_import').trigger("chosen:updated");

  });

  

  // Ambil data dari atribut data-*
  
  $(this).find('#e_tgl_invoice, #e_tgl_etd, #e_tgl_eta').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });

  // Iterasi melalui semua input terkait dan atur nilainya

  
  $('#e_id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var namaPoSupplier = selectedOption.data('nama_po_supplier');
    $('#e_nama_po_supplier').val(namaPoSupplier);  
  });

  $('#e_id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var namaBarang = selectedOption.data('nama_barang');
    $('#e_nama_barang').val(namaBarang);  
  });

  $('#e_id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var spek = selectedOption.data('spek');
    $('#e_spek').val(spek);  
  });

  $('#e_id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var jumlah = selectedOption.data('jumlah');
    $('#e_jumlah').val(jumlah);  
  });

  $('#e_id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var hargaPerunit = selectedOption.data('harga_perunit');
    $('#e_harga_perunit').val(hargaPerunit);  
  });

  $('#e_id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var totalHarga = selectedOption.data('total_harga');
    $('#e_total_harga').val(totalHarga);  
  });
  $('#e_id_prc_po_import').change(function() {
    var selectedOption = $(this).find('option:selected');
    var metode = selectedOption.data('metode');
    $('#e_metode').val(metode);  
  });

  
}); 
</script> 

<!-- Modal for Update Status -->
<div class="modal fade" id="updateStatus" tabindex="-1" role="dialog" aria-labelledby="updateStatus" aria-hidden="true">
  <div class="modal-dialog" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="updateStatus">Update Status</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form action="<?= base_url('Purchasing/Po_rekap/Prc_po_rekap/upt') ?>" method="post">
        <div class="modal-body">
          <input type="hidden" name="id_prc_rekap_import" id="u_id_prc_rekap_import">
          <div class="form-group">
            <label for="status">Pilih Status</label>
            <select name="status" id="u_status" class="form-control">
              <option value="Proses">Proses</option>
              <option value="Perjalanan">Perjalanan</option>
              <option value="Selesai">Selesai</option>
            </select>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Tutup</button>
          <button type="submit" class="btn btn-primary">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
  $('#updateStatus').on('show.bs.modal', function(event) {
    var button = $(event.relatedTarget); 
    var id_prc_rekap_import = button.data('id_prc_rekap_import');
    var status = button.data('status');

    

    // $('#e_no_po_import').val(no_po_import);
    $('#u_id_prc_rekap_import').val(id_prc_rekap_import);
    $('#u_status').val(status);
    
    // $(this).find('#e_id_prc_po_import').trigger("chosen:updated");
    $(this).find('#u_status').trigger("chosen:updated");

  });
  
  $(this).find('#e_tgl_invoice, #e_tgl_etd, #e_tgl_eta').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });


}); 
</script> 