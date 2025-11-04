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
                                    <!-- <h5 class="m-b-10">Data Supplier</h5> -->
                                </div>
                                <ul class="breadcrumb">
                                    <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                                    <li class="breadcrumb-item"><a href="javascript:">Marketing</a></li>
                                    <li class="breadcrumb-item"><a href="<?= base_url('purchasing/prc_ppb/po_supplier/prc_po_supplier') ?>">Supplier</a></li>
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
                                        <h5>Data supplier</h5>

                                        <!-- Button trigger modal -->
                                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                                            <i class="feather icon-user-plus"></i>Tambah supplier
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
                                                        <th>Kode PO Supplier</th>
                                                        <th>Nama Supplier</th>
                                                        <th>Alamat PO Supplier</th>
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
                                                            <td><?= $k['kode_prc_po_supplier'] ?></td>
                                                            <td><?= $k['nama_po_supplier'] ?></td>
                                                            <td><?= $k['alamat_po_supplier'] ?></td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#edit" 
                                                                        data-id_prc_ppb_supplier="<?= $k['id_prc_ppb_supplier'] ?>"  
                                                                        data-kode_prc_po_supplier="<?= $k['kode_prc_po_supplier'] ?>" 
                                                                        data-golongan="<?= $k['golongan'] ?>" 
                                                                        data-nama_po_supplier="<?= $k['nama_po_supplier'] ?>" 
                                                                        data-pic_po_supplier="<?= $k['pic_po_supplier'] ?>" 
                                                                        data-negara_po_supplier="<?= $k['negara_po_supplier']?>" 
                                                                        data-alamat_po_supplier="<?= $k['alamat_po_supplier']?>" 
                                                                        >
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/delete/<?= $k['id_prc_ppb_supplier'] ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Tambah supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/add">
                <div class="modal-body">
                    <div class="form-group">
                        <label for="golongan">Golongan</label>
                        <select class="form-control chosen-select" id="golongan" name="golongan" autocomplete="off" required>
                            <option value="" disabled selected hidden>- Golongan -</option>
                            <option value="GELATIN">GELATIN</option>
                            <option value="PEWARNA">PEWARNA</option>
                            <option value="KEMASAN KARTON">KEMASAN KARTON</option>
                            <option value="STEROFORM">STEROFORM</option>
                            <option value="METALIZE">METALIZE</option>
                            <option value="BAHAN GREASE">BAHAN GREASE</option>
                            <option value="PEREAKSI LAB">PEREAKSI LAB</option>
                            <option value="BENGKEL">BENGKEL</option>
                        </select>
                    </div>
                    
              <div class="form-group">
                <label for="kode_prc_po_supplier">Kode Supplier</label>
                <input type="text" class="form-control" id="kode_prc_po_supplier" name="kode_prc_po_supplier" maxlength="20" placeholder="Kode Supplier" aria-describedby="validationServer03Feedback" autocomplete="off" required>
                <div id="validationServer03Feedback" class="invalid-feedback">
                  Maaf Kode Supplier sudah ada.
                </div>
              </div>
            
                    <div class="form-group">
                        <label for="nama_po_supplier">Nama PO Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="nama_po_supplier" name="nama_po_supplier" autocomplete="off" placeholder="Nama PO Supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="pic_po_supplier">PIC PO Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="pic_po_supplier" name="pic_po_supplier" autocomplete="off" placeholder="PIC PO Supplier" required>
                    </div>
                    
                    <div class="form-group">
                        <label for="negara_po_supplier">Negara PO Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="negara_po_supplier" name="negara_po_supplier" autocomplete="off" placeholder="Negara PO Supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat_po_supplier">Alamat PO Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="alamat_po_supplier" name="alamat_po_supplier" autocomplete="off" placeholder="Alamat PO Supplier" required>
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

<script type="text/javascript">
    $(document).ready(function() {
        uppercase('#kode_prc_po_supplier');
        uppercase('#nama_po_supplier');
        uppercase('#pic_po_supplier');
        uppercase('#negara_po_supplier');
        uppercase('#alamat_po_supplier');

        $("#kode_prc_po_supplier").keyup(function() {
        var kode_prc_po_supplier = $("#kode_prc_po_supplier").val();
        jQuery.ajax({
            url: "<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/cek_kode_supplier/",
            dataType: 'text',
            type: "post",
            data: {
                kode_prc_po_supplier: kode_prc_po_supplier
            },
            success: function(response) {
                if (response == "true") {
                    $("#kode_prc_po_supplier").addClass("is-invalid");
                    $("#simpan").attr("disabled", "disabled");
                } else {
                    $("#kode_prc_po_supplier").removeClass("is-invalid");
                    $("#simpan").removeAttr("disabled");
                }
            }
        });
    })
    });


    $('#cek_print').change(function() {
        if (this.checked) {
            $('#form_print').show()
            $('#print').prop('required', true);
        } else {
            $('#form_print').hide()
            $('#print').prop('required', false);
        }
    })
</script>

<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Edit PO Supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>Purchasing/prc_ppb/Po_supplier/Prc_po_supplier/update">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="e_id_prc_po_supplier" name="id_prc_ppb_supplier">
                        <div class="form-group">
                            <label for="golongan">Golongan</label>
                            <input type="text" class="form-control text-uppercase" id="e_golongan" name="golongan" autocomplete="off" placeholder="Golongan" required>
                        </div>
                        <label for="kode_prc_po_supplier">Kode PO Supplier</label>
                        <input type="text" class="form-control text-uppercase" id="e_kode_prc_po_supplier" name="kode_prc_po_supplier" autocomplete="off" placeholder="Kode PO Supplier" required>
                        <div class="form-group">
                            <label for="nama_po_supplier">Nama PO Supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_nama_po_supplier" name="nama_po_supplier" autocomplete="off" placeholder="Nama PO Supplier" required>
                        </div>
                        <div class="form-group">
                            <label for="pic_po_supplier">PIC PO Supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_pic_po_supplier" name="pic_po_supplier" autocomplete="off" placeholder="PIC PO Supplier" required>
                        </div>
                        
                        <div class="form-group">
                            <label for="negara_po_supplier">Negara PO Supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_negara_po_supplier" name="negara_po_supplier" autocomplete="off" placeholder="Negara PO Supplier" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat_po_supplier">Alamat PO Supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_alamat_po_supplier" name="alamat_po_supplier" autocomplete="off" placeholder="Alamat PO Supplier" required>
                        </div>
                        
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" class="btn btn-info">Update</button>
                    </div>
            </form>
        </div>
    </div>
</div>
<script type="text/javascript">
    $(document).ready(function() {
        $('#edit').on('show.bs.modal', function(event) {
            var id_prc_ppb_supplier = $(event.relatedTarget).data('id_prc_ppb_supplier')
            var golongan = $(event.relatedTarget).data('golongan')
            var kode_prc_po_supplier = $(event.relatedTarget).data('kode_prc_po_supplier')
            var nama_po_supplier = $(event.relatedTarget).data('nama_po_supplier')
            var pic_po_supplier = $(event.relatedTarget).data('pic_po_supplier')
            var negara_po_supplier = $(event.relatedTarget).data('negara_po_supplier')
            var alamat_po_supplier = $(event.relatedTarget).data('alamat_po_supplier')
            

            $(this).find('#e_id_prc_po_supplier').val(id_prc_ppb_supplier)
            $(this).find('#e_golongan').val(golongan)
            $(this).find('#e_kode_prc_po_supplier').val(kode_prc_po_supplier)
            $(this).find('#e_nama_po_supplier').val(nama_po_supplier)
            $(this).find('#e_pic_po_supplier').val(pic_po_supplier)
            $(this).find('#e_negara_po_supplier').val(negara_po_supplier)
            $(this).find('#e_alamat_po_supplier').val(alamat_po_supplier)
            
            

            uppercase('#e_kode_prc_po_supplier');
            uppercase('#e_nama_po_supplier');
            uppercase('#e_pic_po_supplier');
            uppercase('#e_alamat_po_supplier');
        })
    }) 
</script>