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
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url() ?>"><i class="feather icon-home"></i></a>
                                    </li>
                                    <li class="breadcrumb-item"><a href="javascript:">Purchasing</a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">PO Reg</a></li>
                                    <li class="breadcrumb-item">
                                        <a href="<?= base_url('Purchasing/PO_Reg/Prc_po_reg') ?>">PO Reg</a>
                                    </li>
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
                                        <h5>Data PO Reg <b>(Approval)</b></h5>

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
                                                        <th class="text-center">No PO Reg</th>
                                                        <th class="text-center">Details</th>
                                                        <th class="text-center">Aksi</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $level = $this->session->userdata('level');
                                                    $no = 1;
                                                    foreach ($result as $k) {
                                                        // Split and format the date as dd/mm/yyyy
                                                        $tgl_po_reg = implode('/', array_reverse(explode('-', $k['tgl_po_reg'])));
                                                    ?>
                                                        <tr>
                                                            <th scope="row"><?= $no++ ?></th>
                                                            <td class="text-center"><?= $tgl_po_reg ?></td>
                                                            <td class="text-center"><?= $k['no_po_reg'] ?></td>
                                                            <td class="text-center">
                                                                <div class="btn-group" role="group" aria-label="Basic example">
                                                                    <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail"
                                                                        data-id_prc_po_reg="<?= $k['id_prc_po_reg'] ?>"
                                                                        data-no_po_reg="<?= $k['no_po_reg'] ?>"
                                                                        data-tgl_po_reg="<?= $tgl_po_reg ?>"
                                                                        data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"
                                                                        data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                        data-jumlah="<?= $k['jumlah'] ?>"
                                                                        data-harga_perunit="<?= $k['harga_perunit'] ?>"
                                                                        data-total_value="<?= $k['total_value'] ?>"
                                                                        data-metode="<?= $k['metode'] ?>"
                                                                        data-shipment="<?= $k['shipment'] ?>"
                                                                        data-pic1="<?= $k['pic1'] ?>"
                                                                        data-pic2="<?= $k['pic2'] ?>"
                                                                        data-no_ppb="<?= $k['no_ppb'] ?>"
                                                                        data-harga_netto="<?= $k['harga_netto'] ?>"
                                                                        data-pajak="<?= $k['pajak'] ?>"
                                                                        data-total_harga="<?= $k['total_harga'] ?>"
                                                                        data-prc_admin="<?= $k['prc_admin'] ?>"
                                                                        data-spek="<?= $k['spek'] ?>"
                                                                        data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                        data-golongan="<?= $k['golongan'] ?>"
                                                                        data-nama_supplier="<?= $k['nama_supplier'] ?>"
                                                                    >
                                                                        <i class="feather icon-eye"></i>Details
                                                                    </button>
                                                                </div>
                                                            </td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-primary btn-square btn-sm" data-toggle="modal" data-target="#edit"
                                                                            data-id_prc_po_reg="<?= $k['id_prc_po_reg'] ?>"
                                                                            data-no_po_reg="<?= $k['no_po_reg'] ?>"
                                                                            data-tgl_po_reg="<?= $tgl_po_reg ?>"
                                                                            data-id_prc_master_barang="<?= $k['id_prc_master_barang'] ?>"
                                                                            data-id_supplier="<?= $k['id_supplier'] ?>"
                                                                            data-jumlah="<?= $k['jumlah'] ?>"
                                                                            data-harga_perunit="<?= $k['harga_perunit'] ?>"
                                                                            data-total_harga="<?= $k['total_harga'] ?>"
                                                                            data-total_value="<?= $k['total_value'] ?>"
                                                                            data-metode="<?= $k['metode'] ?>"
                                                                            data-shipment="<?= $k['shipment'] ?>"
                                                                            data-pic1="<?= $k['pic1'] ?>"
                                                                            data-pic2="<?= $k['pic2'] ?>"
                                                                            data-no_ppb="<?= $k['no_ppb'] ?>"
                                                                            data-harga_netto="<?= $k['harga_netto'] ?>"
                                                                            data-pajak="<?= $k['pajak'] ?>"
                                                                            data-prc_admin="<?= $k['prc_admin'] ?>"
                                                                            data-spek="<?= $k['spek'] ?>"
                                                                            data-nama_barang="<?= $k['nama_barang'] ?>"
                                                                            data-golongan="<?= $k['golongan'] ?>"
                                                                        >
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group">
                                                                        <a href="<?= base_url() ?>Purchasing/PO_Reg/Prc_po_reg/delete/<?= $k['id_prc_po_reg'] ?>" class="btn btn-danger btn-square text-light btn-sm" onclick="if (!confirm('Apakah Anda Yakin?')) { return false; }">
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
                <h5 class="modal-title" id="exampleModalLabel">Tambah PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_add" action="<?= base_url() ?>Purchasing/PO_Reg/Prc_po_reg/add/">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_supplier">Nama Supplier</label>
                                <select class="form-control chosen-select" id="id_supplier" name="id_supplier" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                                    <?php foreach ($res_supplier as $s): ?>
                                    <option value="<?= $s['id_supplier'] ?>" data-nama_supplier="<?= $s['nama_supplier'] ?>" data-golongan="<?= $s['golongan'] ?>"><?= $s['nama_supplier'] ?> (<?= $s['golongan'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="golongan">Golongan</label>
                                <input type="text" class="form-control" id="golongan" name="golongan" placeholder="golongan" readonly>
                            </div>
                        </div>
                                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="id_prc_master_barang">Nama Barang</label>
                                <select class="form-control chosen-select" id="id_prc_master_barang" name="id_prc_master_barang" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                                    <?php foreach ($res_barang as $b): ?>
                                    <option value="<?= $b['id_prc_master_barang'] ?>" 
                                    data-spek="<?= $b['spek'] ?>"><?= $b['nama_barang'] ?> (<?= $b['spek'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="spek">Spesifikasi</label>
                                <input type="text" class="form-control" id="spek" name="spek" placeholder="spek" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_perunit" name="harga_perunit" placeholder="Harga Perunit" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_value">Total Value</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="total_value" name="total_value" placeholder="Total Value" readonly>
                                </div>
                            </div>
                        </div>


                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="metode">Metode</label>
                                <input type="text" class="form-control" id="metode" name="metode" placeholder="Metode">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="shipment">Shipment</label>
                                <input type="text" class="form-control" id="shipment" name="shipment" placeholder="Shipment">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="pic1" name="pic1" placeholder="Pic1">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="pic2" name="pic2" placeholder="Pic2">
                            </div>  
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_ppb">No PPB</label>
                                <input type="text" class="form-control" id="no_ppb" name="no_ppb" placeholder="NO PPB">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="harga_netto">Harga Netto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="harga_netto" name="harga_netto" placeholder="Harga Netto" readonly>
                                </div>                           
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="pajak" name="pajak" placeholder="Pajak" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
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
    var jumlah = parseFloat($('#jumlah').val()) || 0; 
    var hargaPerUnit = parseFloat($('#harga_perunit').val()) || 0;
    var totalValue = jumlah * hargaPerUnit; 

    $('#total_value').val(totalValue);
    $('#harga_netto').val(totalValue);  
  }

  function calculateTotalHarga() {
    var hargaNetto = parseFloat($('#harga_netto').val()) || 0;
    var pajak = parseFloat($('#pajak').val()) || 0;
    var totalHarga = hargaNetto + pajak;  

    $('#total_harga').val(totalHarga); 
  }

  $('#jumlah').on('input', calculateTotal);
  $('#harga_perunit').on('input', calculateTotal);
  $('#pajak').on('input', calculateTotalHarga);

  $('#id_prc_master_barang').change(function() {
    var selectedOption = $(this).find('option:selected');
    var spek = selectedOption.data('spek');
    $('#spek').val(spek);  
  });

  $('#id_supplier').change(function() {
    var selectedOption = $(this).find('option:selected');
    var golongan = selectedOption.data('golongan');
    $('#golongan').val(golongan);  
  });

});
</script>


<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Detail PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_add">
                <div class="modal-body">
                    <div class="row">

                        <!-- Tanggal PO Reg -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="v-tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" readonly>
                            </div>
                        </div>

                        <!-- No PO Reg -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="v-no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" readonly>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <!-- Nama Supplier -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-id_supplier">Nama Supplier</label>
                                <input type="text" class="form-control" id="v-id_supplier" name="id_supplier" readonly>
                            </div>
                        </div>

                        <!-- Golongan -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-golongan">Golongan</label>
                                <input type="text" class="form-control" id="v-golongan" name="golongan" readonly>
                            </div>
                        </div>

                        <!-- Nama Barang -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-id_prc_master_barang">Nama Barang</label>
                                <input type="text" class="form-control" id="v-nama_barang" name="id_prc_master_barang" readonly>
                            </div>
                        </div>

                        <!-- Spesifikasi -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-spek">Spesifikasi</label>
                                <input type="text" class="form-control" id="v-spek" name="spek" placeholder="spek" readonly>
                            </div>
                        </div>

                        <!-- Jumlah -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="v-jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()" readonly>
                            </div>
                        </div>

                        <!-- Harga Perunit -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-harga_perunit" name="harga_perunit" placeholder="Harga Perunit" readonly>
                                </div>             
                            </div>
                        </div>

                        <!-- Total Harga -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-total_value">Total Value</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-total_value" name="total_value" placeholder="Total Value" readonly>
                                </div>                            
                            </div>
                        </div>

                        <!-- Metode -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-metode">Metode</label>
                                <input type="text" class="form-control" id="v-metode" name="metode" placeholder="Metode" readonly>
                            </div>
                        </div>

                        <!-- Shipment -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-shipment">Shipment</label>
                                <input type="text" class="form-control" id="v-shipment" name="shipment" placeholder="Shipment" readonly>
                            </div>
                        </div>

                        <!-- PIC Kapsulindo 1 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="v-pic1" name="pic1" placeholder="Pic1" readonly>
                            </div>
                        </div>

                        <!-- PIC Kapsulindo 2 -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="v-pic2" name="pic2" placeholder="Pic2" readonly>
                            </div>
                        </div>

                        <!-- No PPB -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-no_ppb">No PPB</label>
                                <input type="text" class="form-control" id="v-no_ppb" name="no_ppb" placeholder="NO PPB" readonly>
                            </div>
                        </div>

                        <!-- Harga Netto -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-harga_netto">Harga Netto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-harga_netto" name="harga_netto" placeholder="Harga Netto" readonly>
                                </div>                            
                            </div>
                        </div>

                        <!-- Pajak -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-pajak" name="pajak" placeholder="Pajak" readonly>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="v-total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="v-total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <!-- Prc Admin -->
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
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
      var button = $(event.relatedTarget);
      var data = button.data();

      var harga_perunit = parseFloat(data.harga_perunit).toFixed(2).replace(/\.00$/, '');
      var total_harga = parseFloat(data.total_harga).toFixed(2).replace(/\.00$/, '');

      $('#v-id_prc_po_reg').val(data.id_prc_po_reg);
      $('#v-no_po_reg').val(data.no_po_reg);
      $('#v-tgl_po_reg').val(data.tgl_po_reg);
      $('#v-id_supplier').val(data.nama_supplier);
      $('#v-id_prc_master_barang').val(data.id_prc_master_barang);
      $('#v-jumlah').val(data.jumlah);
      $('#v-harga_perunit').val(harga_perunit);
      $('#v-total_value').val(data.total_value);
      $('#v-metode').val(data.metode);
      $('#v-shipment').val(data.shipment);
      $('#v-pic1').val(data.pic1);
      $('#v-pic2').val(data.pic2);
      $('#v-no_ppb').val(data.no_ppb);
      $('#v-harga_netto').val(data.harga_netto);
      $('#v-pajak').val(data.pajak);
      $('#v-prc_admin').val(data.prc_admin);
      $('#v-spek').val(data.spek);
      $('#v-golongan').val(data.golongan);
      $('#v-nama_supplier').val(data.nama_supplier);
      $('#v-nama_barang').val(data.nama_barang);
      $('#v-total_harga').val(total_harga);

      $('#v-id_supplier').trigger("chosen:updated");
      $('#v-id_prc_master_barang').trigger("chosen:updated");
    });

    $('#v-id_prc_master_barang').on('change', function() {
      var spek = $(this).find('option:selected').data('spek');
      $('#v-spek').val(spek);
    });

    $('#v-id_supplier').on('change', function() {
      var golongan = $(this).find('option:selected').data('golongan');
      $('#v-golongan').val(golongan);
    });
  });
</script>


<!-- Modal Edit -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PO Reg</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" id="form_update" action="<?= base_url() ?>Purchasing/PO_Reg/Prc_po_reg/update/">
                 <input type="hidden" id="e-id_prc_po_reg" name="id_prc_po_reg">
                <div class="modal-body">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-tgl_po_reg">Tanggal PO Reg</label>
                                <input type="text" class="form-control datepicker" id="e-tgl_po_reg" name="tgl_po_reg" placeholder="Tanggal PO Reg" autocomplete="off" required>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-no_po_reg">No PO Reg</label>
                                <input type="text" class="form-control" id="e-no_po_reg" name="no_po_reg" maxlength="20" placeholder="No PO Reg" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                                <div id="validationServer03Feedback" class="invalid-feedback">
                                    Maaf Nomor PO Import sudah ada.
                                </div>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-id_supplier">Nama Supplier</label>
                                <select class="form-control chosen-select" id="e-id_supplier" name="id_supplier" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Supplier -</option>
                                    <?php foreach ($res_supplier as $s): ?>
                                    <option value="<?= $s['id_supplier'] ?>" data-nama_supplier="<?= $s['nama_supplier'] ?>" data-golongan="<?= $s['golongan'] ?>"><?= $s['nama_supplier'] ?> (<?= $s['golongan'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-golongan">Golongan</label>
                                <input type="text" class="form-control" id="e-golongan" name="golongan" placeholder="Golongan" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-id_prc_master_barang">Nama Barang</label>
                                <select class="form-control chosen-select" id="e-id_prc_master_barang" name="id_prc_master_barang" required>
                                    <option value="" disabled selected hidden>- Pilih Nama Barang -</option>
                                    <?php foreach ($res_barang as $b): ?>
                                    <option value="<?= $b['id_prc_master_barang'] ?>" data-spek="<?= $b['spek'] ?>"><?= $b['nama_barang'] ?> (<?= $b['spek'] ?>)</option>
                                    <?php endforeach; ?>
                                </select>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-spek">Spesifikasi</label>
                                <input type="text" class="form-control" id="e-spek" name="spek" placeholder="spek" readonly>
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-jumlah">Jumlah</label>
                                <input type="text" class="form-control" id="e-jumlah" name="jumlah" placeholder="Jumlah" oninput="calculateTotal()">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-harga_perunit">Harga Perunit</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-harga_perunit" name="harga_perunit" placeholder="Harga Perunit" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-total_value">Total Value</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-total_value" name="total_value" placeholder="Total Value" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-metode">Metode</label>
                                <input type="text" class="form-control" id="e-metode" name="metode" placeholder="Metode">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-shipment">Shipment</label>
                                <input type="text" class="form-control" id="e-shipment" name="shipment" placeholder="Shipment">
                            </div>
                        </div>    

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pic1">PIC Kapsulindo 1</label>
                                <input type="text" class="form-control" id="e-pic1" name="pic1" placeholder="Pic1">
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pic2">PIC Kapsulindo 2</label>
                                <input type="text" class="form-control" id="e-pic2" name="pic2" placeholder="Pic2">
                                </div>
                            </div>

                            <div class="col-md-4">
                                <div class="form-group">
                                    <label for="e-no_ppb">No PPB</label>
                                    <input type="text" class="form-control" id="e-no_ppb" name="no_ppb" placeholder="NO PPB">
                                </div>
                            </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-harga_netto">Harga Netto</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-harga_netto" name="harga_netto" placeholder="Harga Netto" readonly>
                                </div>                           
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-pajak">Pajak</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-pajak" name="pajak" placeholder="Pajak" required>
                                </div>             
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="e-total_harga">Total Harga</label>
                                <div class="input-group">
                                    <div class="input-group-prepend">
                                        <span class="input-group-text" id="basic-addon1" style="font-size: small;">Rp</span>
                                    </div>
                                    <input type="text" class="form-control" id="e-total_harga" name="total_harga" placeholder="Total Harga" readonly>
                                </div>                            
                            </div>
                        </div>

                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="prc_admin">Prc Admin</label>
                                <input type="text" class="form-control" id="prc_admin" name="prc_admin" value="<?= $this->session->userdata('nama_operator') ?>" maxlength="20" readonly>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                    <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menyimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                </div>
            </form>
        </div>
    </div>
</div>

<script type="text/javascript">
    $(document).ready(function() {

        function calculateTotal() {
            var jumlah = parseFloat($('#e-jumlah').val()) || 0;
            var hargaPerUnit = parseFloat($('#e-harga_perunit').val()) || 0;
            var totalValue = jumlah * hargaPerUnit;

            $('#e-total_value').val(totalValue);
            $('#e-harga_netto').val(totalValue);

            calculateTotalHarga();
        }

        function calculateTotalHarga() {
            var hargaNetto = parseFloat($('#e-harga_netto').val()) || 0;
            var pajak = parseFloat($('#e-pajak').val()) || 0;
            var totalHarga = hargaNetto + pajak;

            $('#e-total_harga').val(totalHarga);
        }

        $('#edit').on('show.bs.modal', function(event) {
            var button = $(event.relatedTarget);
            var data = button.data();

            $('#e-id_prc_po_reg').val(data.id_prc_po_reg);
            $('#e-no_po_reg').val(data.no_po_reg); 
            $('#e-tgl_po_reg').val(data.tgl_po_reg);
            $('#e-id_supplier').val(data.id_supplier);                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                                           
            $('#e-id_prc_master_barang').val(data.id_prc_master_barang);
            $('#e-jumlah').val(data.jumlah);
            $('#e-harga_perunit').val(data.harga_perunit);
            $('#e-total_value').val(data.total_value);
            $('#e-metode').val(data.metode);
            $('#e-shipment').val(data.shipment);
            $('#e-pic1').val(data.pic1);
            $('#e-pic2').val(data.pic2);          
            $('#e-no_ppb').val(data.no_ppb);
            $('#e-harga_netto').val(data.harga_netto);
            $('#e-pajak').val(data.pajak);
            $('#e-total_harga').val(data.total_harga);
            $('#e-prc_admin').val(data.prc_admin);
            $('#e-golongan').val(data.golongan);
            $('#e-spek').val(data.spek);
            $('#e-spek').val(data.spek);

            $('#e-id_supplier').trigger("chosen:updated");
            $('#e-id_prc_master_barang').trigger("chosen:updated"); 
        });

        $('#e-jumlah').on('input', calculateTotal);                                                                             
        $('#e-harga_perunit').on('input', calculateTotal);
        $('#e-pajak').on('input', calculateTotalHarga);

        $('#e-id_prc_master_barang').on('change', function() {
            var spek = $(this).find('option:selected').data('spek');
            $('#e-spek').val(spek);
        });

        $('#e-id_supplier').on('change', function() {
            var golongan = $(this).find('option:selected').data('golongan');  
            $('#e-golongan').val(golongan);
        });
    });
</script>