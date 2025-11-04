<!-- Modal Uji Pewarna -->
<div class="modal fade" id="edit_ujipw" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Uji Pewarna</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_pw/update">
                <input type="hidden" id="e_id_ujipewarna" name="id_ujipewarna">
                <div class="modal-body">
                <center><label for="pemeriksaan" class="font-weight-bold">Keterangan Bahan</label></center>
                <table class="mt-2">
                    <tr>
                        <td class="px-1 py-2">
                            No Batch
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="e_no_batch" name="no_batch" placeholder="No Batch" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Tanggal Masuk
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="e_tgl" name="tgl" placeholder="Tanggal Masuk" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            No. Po
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="e_no_surat_jalan" name="no_surat_jalan" placeholder="No. Po" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Dokumen Pendukung
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="e_dok_pendukung" name="dok_pendukung" placeholder="Dokumen Pendukung" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Barang
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="e_nama_barang" name="nama_barang" placeholder="Nama Barang" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Operator Penerima
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="e_op_gudang" name="op_gudang" placeholder="Nama Operator" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Nama Supllier
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="e_nama_supplier" name="nama_supplier" placeholder="Nama Supllier" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jenis Kemasan
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="e_jenis_kemasan" name="jenis_kemasan" placeholder="Jenis Kemasan" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="e_qty" name="qty" placeholder="Jumlah Bahan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Bahan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="e_ditolak_qty" name="ditolak_qty" placeholder="Jumlah Bahan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Terima)
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="e_jml_kemasan" name="jml_kemasan" placeholder="Jumlah Kemasan (Di Terima)" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Jumlah Kemasan <br> (Di Tolak)
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="e_ditolak_kemasan" name="ditolak_kemasan" placeholder="Jumlah Kemasan (Di Tolak)" maxlength="20" readonly>
                        </td>
                    </tr>
                    <tr>
                        <td class="px-1 py-2">
                            Mfg. date
                        </td>
                        <td class="px-3">
                            <input type="text" class="form-control form-control-sm" id="e_mfg" name="mfg" placeholder="Mfg. date" maxlength="20" readonly>
                        </td>
                        <td class="px-1 py-2">
                            Expired
                        </td>
                        <td class="px-4">
                            <input type="text" class="form-control form-control-sm" id="e_exp" name="exp" placeholder="Expire" maxlength="20" readonly>
                        </td>
                    </tr>
                </table>
                <div class="row">
                    <div class="col-md-12 mt-5">
                        <div class="form-group">
                            <center><label for="pemeriksaan" class="font-weight-bold">Hasil Pemeriksaan Fisik Kemasan</label></center>
                            <table class="mt-2">
                                <tr>
                                    <td class="px-1 py-2">
                                        Tutup
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="e_tutup" name="tutup" placeholder="Tutup" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Wadah
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="e_wadah" name="wadah" placeholder="Wadah" size="15" maxlength="20" readonly>
                                    </td>
                                    <td class="px-2 py-2">
                                        Label
                                    </td>
                                    <td class="px-3">
                                        <input type="text" class="form-control form-control-sm" id="e_label" name="label" placeholder="Label" size="15" maxlength="20" readonly>
                                    </td>
                                </tr>
                            </table>

                        </div>
                    </div>
                </div>
                <center><label for="pemeriksaan" class="font-weight-bold mt-1">Hasil Pengujian</label></center>
                <div class="modal-body">
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_operator" class="mt-2">Penguji</label><br>
                                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="Nama Operator" readonly>
                            </div>
                        </div>
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl" class="mt-2">Tanggal Pengujian</label><br>
                                <input type="text" class="form-control datepicker" id="e_tgl_uji" name="tgl_uji" autocomplete="off" placeholder="Tanggal Pengujian" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_analis" class="mt-2">No. Analisa</label><br>
                                <input type="text" class="form-control text-uppercase" id="e_no_analis" name="no_analis" placeholder="No. Analisa" autocomplete="off">
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pemerian" class="mt-2">Pemerian</label>
                                <select class="form-control chosen-select" id="e_pemerian" name="pemerian" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelarutan" class="mt-2">Kelarutan</label>
                                <select class="form-control chosen-select" id="e_kelarutan" name="kelarutan" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="pemeriksaan" class="mt-4"><b>Identifikasi</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_air" class="mt-2">50 mg + 100 ml air</label><br>
                                            <div class="mt-4">
                                                <select class="form-control chosen-select" id="e_ident_air" name="ident_air" required>
                                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                    <option value="Sesuai">Sesuai</option>
                                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_hcip" class="mt-2">5 ml larutan zat (1:1000) + 1ml HCI P</label><br>
                                            <select class="form-control chosen-select" id="e_ident_hcip" name="ident_hcip" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_naohp" class="mt-2">5 ml larutan zat (1:1000) + 1ml NAOH P</label><br>
                                            <select class="form-control chosen-select" id="e_ident_naohp" name="ident_naohp" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_h2so4p" class="mt-2">0,1 gr zat + 10 ml H2SO4 P (larutan a)</label><br>
                                            <select class="form-control chosen-select" id="e_ident_h2so4p" name="ident_h2so4p" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="ident_t_larutan" class="mt-2">5 ml air + 1 tetes larutan (a)</label><br>
                                            <div class="mt-4">
                                                <select class="form-control chosen-select" id="e_ident_t_larutan" name="ident_t_larutan" required>
                                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                    <option value="Sesuai">Sesuai</option>
                                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                                </select>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="s_pengeringan" class="mt-4">Susut Pengeringan</label>
                                <input type="text" class="form-control text-uppercase" id="e_s_pengeringan" name="s_pengeringan" placeholder="Susut Pengeringan" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="p_kadar" class="mt-4">Penetapan Kadar</label>
                                <input type="text" class="form-control text-uppercase" id="e_p_kadar" name="p_kadar" placeholder="Penetapan Kadar" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kesamaan_std" class="mt-4">Kesamaan terhadap Standar</label>
                                <select class="form-control chosen-select" id="e_kesamaan_std" name="kesamaan_std" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kondisi_py">Kondisi Penyimpanan</label>
                                <select class="form-control chosen-select" id="e_kondisi_py" name="kondisi_py" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
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

<!-- Script Modal Detail -->
<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#edit_ujipw').on('show.bs.modal', function(event) {
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var tgl = $(event.relatedTarget).data('tgl')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var mfg = $(event.relatedTarget).data('mfg')
            var exp = $(event.relatedTarget).data('exp')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var penguji = $(event.relatedTarget).data('penguji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var ident_air = $(event.relatedTarget).data('ident_air')
            var ident_hcip = $(event.relatedTarget).data('ident_hcip')
            var ident_naohp = $(event.relatedTarget).data('ident_naohp')
            var ident_h2so4p = $(event.relatedTarget).data('ident_h2so4p')
            var ident_t_larutan = $(event.relatedTarget).data('ident_t_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kesamaan_std = $(event.relatedTarget).data('kesamaan_std')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')

            $(this).find('#e_id_barang').val(id_barang)
            $(this).find('#e_id_pb').val(id_pb)
            $(this).find('#e_no_batch').val(no_batch)
            $(this).find('#e_nama_barang').val(nama_barang)
            $(this).find('#e_nama_supplier').val(nama_supplier)
            $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
            $(this).find('#e_op_gudang').val(op_gudang)
            $(this).find('#e_dok_pendukung').val(dok_pendukung)
            $(this).find('#e_tgl').val(tgl)
            $(this).find('#e_jml_kemasan').val(jml_kemasan)
            $(this).find('#e_ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#e_jenis_kemasan').val(jenis_kemasan)
            $(this).find('#e_qty').val(qty)
            $(this).find('#e_ditolak_qty').val(ditolak_qty)
            $(this).find('#e_mfg').val(mfg)
            $(this).find('#e_exp').val(exp)
            $(this).find('#e_tutup').val(tutup)
            $(this).find('#e_wadah').val(wadah)
            $(this).find('#e_label').val(label)
            $(this).find('#e_tgl_uji').val(tgl_uji)
            $(this).find('#e_penguji').val(penguji)
            $(this).find('#e_no_analis').val(no_analis)
            $(this).find('#e_pemerian').val(pemerian)
            $(this).find('#e_kelarutan').val(kelarutan)
            $(this).find('#e_ident_air').val(ident_air)
            $(this).find('#e_ident_hcip').val(ident_hcip)
            $(this).find('#e_ident_naohp').val(ident_naohp)
            $(this).find('#e_ident_h2so4p').val(ident_h2so4p)
            $(this).find('#e_ident_t_larutan').val(ident_t_larutan)
            $(this).find('#e_s_pengeringan').val(s_pengeringan)
            $(this).find('#e_p_kadar').val(p_kadar)
            $(this).find('#e_kesamaan_std').val(kesamaan_std)
            $(this).find('#e_kondisi_py').val(kondisi_py)

        })

    })
</script> -->

<!-- Script Uji Pewarna -->
<script type="text/javascript">
    $(document).ready(function() {
        $("#no_surat_jalan").keyup(function() {
            var no_surat_jalan = $("#no_surat_jalan").val();
            jQuery.ajax({
                url: "<?= base_url() ?>gudang_bahanbaku/barang_masuk/cek_surat_jalan",
                dataType: 'text',
                type: "post",
                data: {
                    no_surat_jalan: no_surat_jalan
                },
                success: function(response) {
                    if (response == "true") {
                        $("#no_surat_jalan").addClass("is-invalid");
                        $("#simpan").attr("disabled", "disabled");
                    } else {
                        $("#no_surat_jalan").removeClass("is-invalid");
                        $("#simpan").removeAttr("disabled");
                    }
                }
            });
        })
    })

    $(document).ready(function() {
        $('#edit_ujipw').on('show.bs.modal', function(event) {
            var id_ujipewarna = $(event.relatedTarget).data('id_ujipewarna')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var ident_air = $(event.relatedTarget).data('ident_air')
            var ident_hcip = $(event.relatedTarget).data('ident_hcip')
            var ident_naohp = $(event.relatedTarget).data('ident_naohp')
            var ident_h2so4p = $(event.relatedTarget).data('ident_h2so4p')
            var ident_t_larutan = $(event.relatedTarget).data('ident_t_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var p_kadar = $(event.relatedTarget).data('p_kadar')
            var kesamaan_std = $(event.relatedTarget).data('kesamaan_std')
            var kondisi_py = $(event.relatedTarget).data('kondisi_py')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')
            var qty = $(event.relatedTarget).data('qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')

            $(this).find('#e_id_ujipewarna').val(id_ujipewarna)
            $(this).find('#e_id_pb').val(id_pb)
            $(this).find('#e_id_barang').val(id_barang)
            $(this).find('#e_id_supplier').val(id_supplier)
            $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
            $(this).find('#e_no_batch').val(no_batch)
            $(this).find('#e_tgl').val(tgl)
            $(this).find('#e_tgl_uji').val(tgl_uji)
            $(this).find('#e_no_analis').val(no_analis)
            $(this).find('#e_ditolak_qty').val(ditolak_qty)
            $(this).find('#e_ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#e_pemerian').val(pemerian)
            $(this).find('#e_pemerian').trigger("chosen:updated")
            $(this).find('#e_kelarutan').val(kelarutan)
            $(this).find('#e_kelarutan').trigger("chosen:updated")
            $(this).find('#e_ident_air').val(ident_air)
            $(this).find('#e_ident_air').trigger("chosen:updated")
            $(this).find('#e_ident_hcip').val(ident_hcip)
            $(this).find('#e_ident_hcip').trigger("chosen:updated")
            $(this).find('#e_ident_naohp').val(ident_naohp)
            $(this).find('#e_ident_naohp').trigger("chosen:updated")
            $(this).find('#e_ident_h2so4p').val(ident_h2so4p)
            $(this).find('#e_ident_h2so4p').trigger("chosen:updated")
            $(this).find('#e_ident_t_larutan').val(ident_t_larutan)
            $(this).find('#e_ident_t_larutan').trigger("chosen:updated")
            $(this).find('#e_s_pengeringan').val(s_pengeringan)
            $(this).find('#e_p_kadar').val(p_kadar)
            $(this).find('#e_kesamaan_std').val(kesamaan_std)
            $(this).find('#e_kesamaan_std').trigger("chosen:updated")
            $(this).find('#e_kondisi_py').val(kondisi_py)
            $(this).find('#e_kondisi_py').trigger("chosen:updated")
            $(this).find('#e_nama_barang').val(nama_barang)
            $(this).find('#e_nama_supplier').val(nama_supplier)
            $(this).find('#e_op_gudang').val(op_gudang)
            $(this).find('#e_dok_pendukung').val(dok_pendukung)
            $(this).find('#e_jenis_kemasan').val(jenis_kemasan)
            $(this).find('#e_jml_kemasan').val(jml_kemasan)
            $(this).find('#e_tutup').val(tutup)
            $(this).find('#e_wadah').val(wadah)
            $(this).find('#e_label').val(label)
            $(this).find('#e_qty').val(qty)
            $(this).find('#e_exp').val(exp)
            $(this).find('#e_mfg').val(mfg)
            $(this).find('#e_tgl').datepicker().on('show.bs.modal', function(event) {
                event.stopImmediatePropagation();
            });
            $(this).find('#e_exp').datepicker().on('show.bs.modal', function(event) {
                event.stopImmediatePropagation();
            });
            $(this).find('#e_mfg').datepicker().on('show.bs.modal', function(event) {
                event.stopImmediatePropagation();
            });
            $(this).find('#e_tgl_uji').datepicker().on('show.bs.modal', function(event) {
                event.stopImmediatePropagation();
            });

            uppercase('#no_analis_pw');
            uppercase('#s_pengeringan_pw');
            uppercase('#p_kadar');
            checkKoma('#s_pengeringan_pw');
            checkKoma('#p_kadar');
        })
    })
</script>