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
                                    <li class="breadcrumb-item"><a href="<?= base_url('purchasing/Supplier') ?>">supplier</a></li>
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
                                                        <th>Golongan</th>
                                                        <th>Kode supplier</th>
                                                        <th>Nama supplier</th>
                                                        <th>Alamat</th>
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
                                                            <td><?= $k['golongan'] ?></td>
                                                            <td><?= $k['kode_supplier'] ?></td>
                                                            <td><?= $k['nama_supplier'] ?></td>
                                                            <td><?= $k['alamat'] ?> | <?= $k['negara'] ?></td>
                                                            <td class="text-center">
                                                                <?php if ($level === "admin") { ?>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#edit" data-id_supplier="<?= $k['id_supplier'] ?>" data-golongan="<?= $k['golongan']?>" data-kode_supplier="<?= $k['kode_supplier'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-negara="<?= $k['negara'] ?>" data-contact_person="<?= $k['contact_person']?>" data-telepon="<?= $k['telepon']?>" data-fax="<?= $k['fax']?>" data-mutu_barang=<?= $k['mutu_barang']?> data-kesesuaian_sistem_mutu="<?= $k['kesesuaian_sistem_mutu']?>" data-waktu_pelaksanaan_pengiriman="<?= $k['waktu_pelaksanaan_pengiriman']?>" data-harga="<?= $k['harga']?>" data-tanggapan_atas_permintaan_keluhan="<?= $k['tanggapan_atas_permintaan_keluhan']?>" data-pelayanan_purna_jual="<?= $k['pelayanan_purna_jual']?>" data-peringkat="<?= $k['peringkat']?>" data-alamat="<?= $k['alamat'] ?>">
                                                                            <i class="feather icon-edit-2"></i>Edit
                                                                        </button>
                                                                    </div>
                                                                    <div class="btn-group" role="group" aria-label="Basic example">
                                                                        <a type="button" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>purchasing/supplier/delete/<?= $k['id_supplier'] ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
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
            <form method="post" action="<?= base_url() ?>purchasing/supplier/add">
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
                        <label for="kode">Kode supplier</label>
                        <input type="text" class="form-control text-uppercase" id="kode_supplier" name="kode_supplier" autocomplete="off" placeholder="Kode supplier" aria-describedby="validationServer03Feedback" required>
                        <div id="validationServer03Feedback" class="invalid-feedback">
                            Maaf Kode supplier sudah ada.
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="nama">Nama supplier</label>
                        <input type="text" class="form-control text-uppercase" id="nama_supplier" name="nama_supplier" autocomplete="off" placeholder="Nama supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="contact_person">Contact Person</label>
                        <input type="text" class="form-control text-uppercase" id="contact_person" name="contact_person" autocomplete="off" placeholder="Contact Person" required>
                    </div>
                    <div class="form-group">
                        <label for="telepon">Telepon</label>
                        <input type="text" class="form-control text-uppercase" id="telepon" name="telepon" autocomplete="off" placeholder="Telepon" required>
                    </div>
                    <div class="form-group">
                        <label for="fax">Fax</label>
                        <input type="text" class="form-control text-uppercase" id="fax" name="fax" autocomplete="off" placeholder="Fax" required>
                    </div>
                    <div class="form-group">
                        <label for="print">Rating</label>
                        <input style="width: 17%;" class="form-check-input" id="cek_print" type="checkbox" name="print">
                        <!-- <input class="form-control" id="cek_print1" type="text" name="cek_print1"> -->
                        <div id="form_print" class="input" style="display: none;">
                            <label for="mutu_barang">Mutu Barang</label>
                            <input type="text" class="form-control text-uppercase" id="mutu_barang" name="mutu_barang" placeholder="Mutu Barang" autocomplete="off">
                            <label for="kesesuaian_sistem_mutu">Kesesuaian sistem mutu</label>
                            <input type="text" class="form-control text-uppercase" id="kesesuaian_sistem_mutu" name="kesesuaian_sistem_mutu" placeholder="Kesesuaian sistem mutu" autocomplete="off">
                            <label for="waktu_pelaksanaan_pengiriman">Waktu Pemeriksaan / Pengiriman</label>
                            <input type="text" class="form-control text-uppercase" id="waktu_pelaksanaan_pengiriman" name="waktu_pelaksanaan_pengiriman" placeholder="Waktu Pemeriksaan / Pengiriman" autocomplete="off">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control text-uppercase" id="harga" name="harga" placeholder="Harga" autocomplete="off">
                            <label for="tanggapan_atas_permintaan_keluhan">Tanggapan atas permintaan / keluhan</label>
                            <input type="text" class="form-control text-uppercase" id="tanggapan_atas_permintaan_keluhan" name="tanggapan_atas_permintaan_keluhan" placeholder="Tanggapan atas permintaan / keluhan" autocomplete="off">
                            <label for="pelayanan_purna_jual">Pelayanan purna jual</label>
                            <input type="text" class="form-control text-uppercase" id="pelayanan_purna_jual" name="pelayanan_purna_jual" placeholder="Pelayanan purna jual" autocomplete="off">
                            <label for="peringkat">Peringkat</label>
                            <input type="text" class="form-control text-uppercase" id="peringkat" name="peringkat" placeholder="Peringkat" autocomplete="off">
                        </div>
                    </div>
                    <div class="form-group">
                        <label for="negara">Negara</label>
                        <input type="text" class="form-control text-uppercase" id="negara" name="negara" autocomplete="off" placeholder="Negara supplier" required>
                    </div>
                    <div class="form-group">
                        <label for="alamat">Alamat</label>
                        <textarea class="form-control text-uppercase" id="alamat" name="alamat" rows="3"></textarea>
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
        uppercase('#kode_supplier');
        uppercase('#nama_supplier');
        uppercase('#negara');
        uppercase('#alamat');
    })

    $("#kode_supplier").keyup(function() {
        var kode_supplier = $("#kode_supplier").val();
        jQuery.ajax({
            url: "<?= base_url() ?>supplier/cek_kode_supplier",
            dataType: 'text',
            type: "post",
            data: {
                kode_supplier: kode_supplier
            },
            success: function(response) {
                if (response == "true") {
                    $("#kode_supplier").addClass("is-invalid");
                    $("#simpan").attr("disabled", "disabled");
                } else {
                    $("#kode_supplier").removeClass("is-invalid");
                    $("#simpan").removeAttr("disabled");
                }
            }
        });
    })

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
                <h5 class="modal-title" id="exampleModalLabel">Edit supplier</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>purchasing/supplier/update">
                <div class="modal-body">
                    <div class="form-group">
                        <input type="hidden" id="e_id_supplier" name="id_supplier">
                        <label for="golongan">Golongan</label>
                        <select class="form-control chosen-select" id="e_golongan" name="golongan" autocomplete="off" required>
                            <option value="" disabled>- Golongan -</option>
                            <option value="GELATIN">GELATIN</option>
                            <option value="PEWARNA">PEWARNA</option>
                            <option value="KEMASAN KARTON">KEMASAN KARTON</option>
                            <option value="STEROFORM">STEROFORM</option>
                            <option value="METALIZE">METALIZE</option>
                            <option value="BAHAN GREASE">BAHAN GREASE</option>
                            <option value="PEREAKSI LAB">PEREAKSI LAB</option>
                            <option value="BENGKEL">BENGKEL</option>
                        </select>
                        <label for="kode">Kode supplier</label>
                        <input type="text" class="form-control text-uppercase" id="e_kode_supplier" name="kode_supplier" autocomplete="off" placeholder="Kode supplier" required>
                        <div class="form-group">
                            <label for="nama">Nama supplier</label>
                            <input type="text" class="form-control text-uppercase" id="e_nama_supplier" name="nama_supplier" autocomplete="off" placeholder="Nama supplier" required>
                        </div>
                        <div class="form-group">
                            <label for="contact_person">Contact Person</label>
                            <input type="text" class="form-control text-uppercase" id="e_contact_person" name="contact_person" autocomplete="off" placeholder="Contact Person" required>
                        </div>
                        <div class="form-group">
                            <label for="telepon">Telepon</label>
                            <input type="text" class="form-control text-uppercase" id="e_telepon" name="telepon" autocomplete="off" placeholder="Telepon" required>
                        </div>
                        <div class="form-group">
                            <label for="fax">Fax</label>
                            <input type="text" class="form-control text-uppercase" id="e_fax" name="fax" autocomplete="off" placeholder="Fax" required>
                        </div>
                        <div class="form-group">
                            <hr>
                            <label for="print">Rating</label></br>
                            <!-- <input class="form-control" id="cek_print1" type="text" name="cek_print1"> -->
                            <label for="mutu_barang">Mutu Barang</label>
                            <input type="text" class="form-control text-uppercase" id="e_mutu_barang" name="mutu_barang" placeholder="Mutu Barang" autocomplete="off">
                            <label for="kesesuaian_sistem_mutu">Kesesuaian sistem mutu</label>
                            <input type="text" class="form-control text-uppercase" id="e_kesesuaian_sistem_mutu" name="kesesuaian_sistem_mutu" placeholder="Kesesuaian sistem mutu" autocomplete="off">
                            <label for="waktu_pelaksanaan_pengiriman">Waktu Pemeriksaan / Pengiriman</label>
                            <input type="text" class="form-control text-uppercase" id="e_waktu_pelaksanaan_pengiriman" name="waktu_pelaksanaan_pengiriman" placeholder="Waktu Pemeriksaan / Pengiriman" autocomplete="off">
                            <label for="harga">Harga</label>
                            <input type="text" class="form-control text-uppercase" id="e_harga" name="harga" placeholder="Harga" autocomplete="off">
                            <label for="tanggapan_atas_permintaan_keluhan">Tanggapan atas permintaan / keluhan</label>
                            <input type="text" class="form-control text-uppercase" id="e_tanggapan_atas_permintaan_keluhan" name="tanggapan_atas_permintaan_keluhan" placeholder="Tanggapan atas permintaan / keluhan" autocomplete="off">
                            <label for="pelayanan_purna_jual">Pelayanan purna jual</label>
                            <input type="text" class="form-control text-uppercase" id="e_pelayanan_purna_jual" name="pelayanan_purna_jual" placeholder="Pelayanan purna jual" autocomplete="off">
                            <label for="peringkat">Peringkat</label>
                            <input type="text" class="form-control text-uppercase" id="e_peringkat" name="peringkat" placeholder="Peringkat" autocomplete="off">
                            <hr>    
                        </div>
                        <div class="form-group">
                            <label for="negara">Negara</label>
                            <input type="text" class="form-control text-uppercase" id="e_negara" name="negara" autocomplete="off" placeholder="Negara supplier" required>
                        </div>
                        <div class="form-group">
                            <label for="alamat">Alamat</label>
                            <textarea class="form-control text-uppercase" id="e_alamat" name="alamat" autocomplete="off" rows="3"></textarea>
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
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var golongan = $(event.relatedTarget).data('golongan')
            var kode_supplier = $(event.relatedTarget).data('kode_supplier')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var contact_person = $(event.relatedTarget).data('contact_person')
            var telepon = $(event.relatedTarget).data('telepon')
            var fax = $(event.relatedTarget).data('fax')
            var mutu_barang = $(event.relatedTarget).data('mutu_barang')
            var kesesuaian_sistem_mutu = $(event.relatedTarget).data('kesesuaian_sistem_mutu')
            var waktu_pelaksanaan_pengiriman = $(event.relatedTarget).data('waktu_pelaksanaan_pengiriman')
            var harga = $(event.relatedTarget).data('harga')
            var tanggapan_atas_permintaan_keluhan = $(event.relatedTarget).data('tanggapan_atas_permintaan_keluhan')
            var pelayanan_purna_jual = $(event.relatedTarget).data('pelayanan_purna_jual')
            var peringkat = $(event.relatedTarget).data('peringkat')
            var negara = $(event.relatedTarget).data('negara')
            var alamat = $(event.relatedTarget).data('alamat')

            $(this).find('#e_id_supplier').val(id_supplier)
            $(this).find('#e_golongan').val(golongan)
            $(this).find('#e_golongan').trigger("chosen:updated")
            $(this).find('#e_kode_supplier').val(kode_supplier)
            $(this).find('#e_nama_supplier').val(nama_supplier)
            $(this).find('#e_contact_person').val(contact_person)
            $(this).find('#e_telepon').val(telepon)
            $(this).find('#e_fax').val(fax)
            $(this).find('#e_mutu_barang').val(mutu_barang)
            $(this).find('#e_kesesuaian_sistem_mutu').val(kesesuaian_sistem_mutu)
            $(this).find('#e_waktu_pelaksanaan_pengiriman').val(waktu_pelaksanaan_pengiriman)
            $(this).find('#e_harga').val(harga)
            $(this).find('#e_tanggapan_atas_permintaan_keluhan').val(tanggapan_atas_permintaan_keluhan)
            $(this).find('#e_pelayanan_purna_jual').val(pelayanan_purna_jual)
            $(this).find('#e_peringkat').val(peringkat)
            $(this).find('#e_negara').val(negara)
            $(this).find('#e_alamat').val(alamat)

            uppercase('#e_kode_supplier');
            uppercase('#e_nama_supplier');
            uppercase('#e_contact_person');
            uppercase('#e_negara');
            uppercase('#e_alamat');
        })
    })
</script>