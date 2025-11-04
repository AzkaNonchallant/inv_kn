<!-- Modal Uji Tinta Print -->
<div class="modal fade" id="edit_ujitp" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Uji Tinta Print</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>lab/Hasil_pemeriksaan_lab/Hasil_pemeriksaan_tp/update">
                <input type="hidden" id="e_id_ujitp" name="id_ujitp">
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
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="pemerian"><b>Pemerian</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <select class="form-control chosen-select" id="e_pemerian1" name="pemerian1" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <select class="form-control chosen-select" id="e_pemerian2" name="pemerian2" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <select class="form-control chosen-select" id="e_pemerian3" name="pemerian3" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="pemerian4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <select class="form-control chosen-select" id="e_pemerian4" name="pemerian4" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="b_bruto"><b>Berat Bruto (gram)</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="e_b_bruto1" name="b_bruto1" autocomplete="off" placeholder="Berat Bruto 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="e_b_bruto2" name="b_bruto2" autocomplete="off" placeholder="Berat Bruto 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="e_b_bruto3" name="b_bruto3" autocomplete="off" placeholder="Berat Bruto 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="b_bruto4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="e_b_bruto4" name="b_bruto4" autocomplete="off" placeholder="Berat Bruto 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="kekentalan"><b>Kekentalan (cPs)</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="e_kekentalan1" name="kekentalan1" autocomplete="off" placeholder="Kekentalan 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="e_kekentalan2" name="kekentalan2" autocomplete="off" placeholder="Kekentalan 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="e_kekentalan3" name="kekentalan3" autocomplete="off" placeholder="Kekentalan 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kekentalan4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="e_kekentalan4" name="kekentalan4" autocomplete="off" placeholder="Kekentalan 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="waktu_p"><b>Waktu Pengeringan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="e_waktu_p1" name="waktu_p1" autocomplete="off" placeholder="Waktu Pengeringan 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="e_waktu_p2" name="waktu_p2" autocomplete="off" placeholder="Waktu Pengeringan 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="e_waktu_p3" name="waktu_p3" autocomplete="off" placeholder="Waktu Pengeringan 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="waktu_p4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="e_waktu_p4" name="waktu_p4" autocomplete="off" placeholder="Waktu Pengeringan 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="kondisi_sp"><b>Kondisi Suhu Pemeriksaan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <input type="text" class="form-control" id="e_kondisi_sp1" name="kondisi_sp1" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 1">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <input type="text" class="form-control" id="e_kondisi_sp2" name="kondisi_sp2" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 2">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <input type="text" class="form-control" id="e_kondisi_sp3" name="kondisi_sp3" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 3">
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_sp4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <input type="text" class="form-control" id="e_kondisi_sp4" name="kondisi_sp4" autocomplete="off" placeholder="Kondisi Suhu Pemeriksaan 4">
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-12">
                            <div class="form-group">
                                <center><label for="kondisi_py"><b>Kondisi Penyimpanan</b></label></center>
                                <div class="row">
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py1" class="mt-2">Hasil Pemeriksaan Botol Ke 1 </label><br>
                                            <select class="form-control chosen-select" id="e_kondisi_py1" name="kondisi_py1" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py2" class="mt-2">Hasil Pemeriksaan Botol Ke 2 </label><br>
                                            <select class="form-control chosen-select" id="e_kondisi_py2" name="kondisi_py2" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py3" class="mt-2">Hasil Pemeriksaan Botol Ke 3 </label><br>
                                            <select class="form-control chosen-select" id="e_kondisi_py3" name="kondisi_py3" required>
                                                <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                                <option value="Sesuai">Sesuai</option>
                                                <option value="Tidak Sesuai">Tidak Sesuai</option>
                                            </select>
                                        </div>
                                    </div>
                                    <div class="col-md-4">
                                        <div class="form-group">
                                            <label for="kondisi_py4" class="mt-2">Hasil Pemeriksaan Botol Ke 4 </label><br>
                                            <select class="form-control chosen-select" id="e_kondisi_py4" name="kondisi_py4" required>
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
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                        <button type="submit" id="simpan" class="btn btn-primary" onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginputkan Barangnya')) { return false; }">Simpan</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#edit_ujitp').on('show.bs.modal', function(event) {
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
            var pemerian1 = $(event.relatedTarget).data('pemerian1')
            var pemerian2 = $(event.relatedTarget).data('pemerian2')
            var pemerian3 = $(event.relatedTarget).data('pemerian3')
            var pemerian4 = $(event.relatedTarget).data('pemerian4')
            var b_bruto1 = $(event.relatedTarget).data('b_bruto1')
            var b_bruto2 = $(event.relatedTarget).data('b_bruto2')
            var b_bruto3 = $(event.relatedTarget).data('b_bruto3')
            var b_bruto4 = $(event.relatedTarget).data('b_bruto4')
            var kekentalan1 = $(event.relatedTarget).data('kekentalan1')
            var kekentalan2 = $(event.relatedTarget).data('kekentalan2')
            var kekentalan3 = $(event.relatedTarget).data('kekentalan3')
            var kekentalan4 = $(event.relatedTarget).data('kekentalan4')
            var waktu_p1 = $(event.relatedTarget).data('waktu_p1')
            var waktu_p2 = $(event.relatedTarget).data('waktu_p2')
            var waktu_p3 = $(event.relatedTarget).data('waktu_p3')
            var waktu_p4 = $(event.relatedTarget).data('waktu_p4')
            var kondisi_sp1 = $(event.relatedTarget).data('kondisi_sp1')
            var kondisi_sp2 = $(event.relatedTarget).data('kondisi_sp2')
            var kondisi_sp3 = $(event.relatedTarget).data('kondisi_sp3')
            var kondisi_sp4 = $(event.relatedTarget).data('kondisi_sp4')
            var kondisi_py1 = $(event.relatedTarget).data('kondisi_py1')
            var kondisi_py2 = $(event.relatedTarget).data('kondisi_py2')
            var kondisi_py3 = $(event.relatedTarget).data('kondisi_py3')
            var kondisi_py4 = $(event.relatedTarget).data('kondisi_py4')

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
            $(this).find('#e_pemerian1').val(pemerian1)
            $(this).find('#e_pemerian2').val(pemerian2)
            $(this).find('#e_pemerian3').val(pemerian3)
            $(this).find('#e_pemerian4').val(pemerian4)
            $(this).find('#e_b_bruto1').val(b_bruto1)
            $(this).find('#e_b_bruto2').val(b_bruto2)
            $(this).find('#e_b_bruto3').val(b_bruto3)
            $(this).find('#e_b_bruto4').val(b_bruto4)
            $(this).find('#e_kekentalan1').val(kekentalan1)
            $(this).find('#e_kekentalan2').val(kekentalan2)
            $(this).find('#e_kekentalan3').val(kekentalan3)
            $(this).find('#e_kekentalan4').val(kekentalan4)
            $(this).find('#e_waktu_p1').val(waktu_p1)
            $(this).find('#e_waktu_p2').val(waktu_p2)
            $(this).find('#e_waktu_p3').val(waktu_p3)
            $(this).find('#e_waktu_p4').val(waktu_p4)
            $(this).find('#e_kondisi_sp1').val(kondisi_sp1)
            $(this).find('#e_kondisi_sp2').val(kondisi_sp2)
            $(this).find('#e_kondisi_sp3').val(kondisi_sp3)
            $(this).find('#e_kondisi_sp4').val(kondisi_sp4)
            $(this).find('#e_kondisi_py1').val(kondisi_py1)
            $(this).find('#e_kondisi_py2').val(kondisi_py2)
            $(this).find('#e_kondisi_py3').val(kondisi_py3)
            $(this).find('#e_kondisi_py4').val(kondisi_py4)

        })

    })
</script> -->

<!-- Script Uji Tinta Print -->
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
        $('#edit_ujitp').on('show.bs.modal', function(event) {
            var id_ujitp = $(event.relatedTarget).data('id_ujitp')
            var id_pb = $(event.relatedTarget).data('id_pb')
            var id_barang = $(event.relatedTarget).data('id_barang')
            var id_supplier = $(event.relatedTarget).data('id_supplier')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var pemerian1 = $(event.relatedTarget).data('pemerian1')
            var pemerian2 = $(event.relatedTarget).data('pemerian2')
            var pemerian3 = $(event.relatedTarget).data('pemerian3')
            var pemerian4 = $(event.relatedTarget).data('pemerian4')
            var b_bruto1 = $(event.relatedTarget).data('b_bruto1')
            var b_bruto2 = $(event.relatedTarget).data('b_bruto2')
            var b_bruto3 = $(event.relatedTarget).data('b_bruto3')
            var b_bruto4 = $(event.relatedTarget).data('b_bruto4')
            var kekentalan1 = $(event.relatedTarget).data('kekentalan1')
            var kekentalan2 = $(event.relatedTarget).data('kekentalan2')
            var kekentalan3 = $(event.relatedTarget).data('kekentalan3')
            var kekentalan4 = $(event.relatedTarget).data('kekentalan4')
            var waktu_p1 = $(event.relatedTarget).data('waktu_p1')
            var waktu_p2 = $(event.relatedTarget).data('waktu_p2')
            var waktu_p3 = $(event.relatedTarget).data('waktu_p3')
            var waktu_p4 = $(event.relatedTarget).data('waktu_p4')
            var kondisi_sp1 = $(event.relatedTarget).data('kondisi_sp1')
            var kondisi_sp2 = $(event.relatedTarget).data('kondisi_sp2')
            var kondisi_sp3 = $(event.relatedTarget).data('kondisi_sp3')
            var kondisi_sp4 = $(event.relatedTarget).data('kondisi_sp4')
            var kondisi_py1 = $(event.relatedTarget).data('kondisi_py1')
            var kondisi_py2 = $(event.relatedTarget).data('kondisi_py2')
            var kondisi_py3 = $(event.relatedTarget).data('kondisi_py3')
            var kondisi_py4 = $(event.relatedTarget).data('kondisi_py4')
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

            $(this).find('#e_id_ujitp').val(id_ujitp)
            $(this).find('#e_id_pb').val(id_pb)
            $(this).find('#e_id_barang').val(id_barang)
            $(this).find('#e_id_supplier').val(id_supplier)
            $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
            $(this).find('#e_no_batch').val(no_batch)
            $(this).find('#e_ditolak_qty').val(ditolak_qty)
            $(this).find('#e_ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#e_tgl').val(tgl)
            $(this).find('#e_tgl_uji').val(tgl_uji)
            $(this).find('#e_no_analis').val(no_analis)
            $(this).find('#e_pemerian1').val(pemerian1)
            $(this).find('#e_pemerian1').trigger("chosen:updated")
            $(this).find('#e_pemerian2').val(pemerian2)
            $(this).find('#e_pemerian2').trigger("chosen:updated")
            $(this).find('#e_pemerian3').val(pemerian3)
            $(this).find('#e_pemerian3').trigger("chosen:updated")
            $(this).find('#e_pemerian4').val(pemerian4)
            $(this).find('#e_pemerian4').trigger("chosen:updated")
            $(this).find('#e_b_bruto1').val(b_bruto1)
            $(this).find('#e_b_bruto2').val(b_bruto2)
            $(this).find('#e_b_bruto3').val(b_bruto3)
            $(this).find('#e_b_bruto4').val(b_bruto4)
            $(this).find('#e_kekentalan1').val(kekentalan1)
            $(this).find('#e_kekentalan2').val(kekentalan2)
            $(this).find('#e_kekentalan3').val(kekentalan3)
            $(this).find('#e_kekentalan4').val(kekentalan4)
            $(this).find('#e_waktu_p1').val(waktu_p1)
            $(this).find('#e_waktu_p2').val(waktu_p2)
            $(this).find('#e_waktu_p3').val(waktu_p3)
            $(this).find('#e_waktu_p4').val(waktu_p4)
            $(this).find('#e_kondisi_sp1').val(kondisi_sp1)
            $(this).find('#e_kondisi_sp2').val(kondisi_sp2)
            $(this).find('#e_kondisi_sp3').val(kondisi_sp3)
            $(this).find('#e_kondisi_sp4').val(kondisi_sp4)
            $(this).find('#e_kondisi_py1').val(kondisi_py1)
            $(this).find('#e_kondisi_py1').trigger("chosen:updated")
            $(this).find('#e_kondisi_py2').val(kondisi_py2)
            $(this).find('#e_kondisi_py2').trigger("chosen:updated")
            $(this).find('#e_kondisi_py3').val(kondisi_py3)
            $(this).find('#e_kondisi_py3').trigger("chosen:updated")
            $(this).find('#e_kondisi_py4').val(kondisi_py4)
            $(this).find('#e_kondisi_py4').trigger("chosen:updated")
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

            uppercase('#no_analis_tp');
        })
    })
</script>