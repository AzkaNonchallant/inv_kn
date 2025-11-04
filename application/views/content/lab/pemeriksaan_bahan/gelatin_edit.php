<!-- Pengujian Uji Gel -->
<div class="modal fade" id="edit_ujigel" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">Pemeriksaan Uji Gelatin</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <form method="post" action="<?= base_url() ?>lab/hasil_pemeriksaan_lab/hasil_pemeriksaan_gel/update">
                <input type="hidden" id="e_id_ujigel" name="id_ujigel">
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
                <center><label for="pemeriksaan" class="font-weight-bold">Hasil Pemeriksaan</label></center>
                    <div class="row">
                        
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="nama_operator" class="mt-4">Penguji</label><br>
                                <input type="text" class="form-control" id="nama_operator" name="nama_operator" value="<?= $this->session->userdata('nama_operator') ?>" placeholder="Nama Operator" readonly>
                            </div>
                        </div>
                    
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="tgl" class="mt-4">Tanggal Pengujian</label><br>
                                <input type="text" class="form-control datepicker" id="e_tgl_uji" name="tgl_uji" placeholder="Tanggal Pengujian" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="no_analis" class="mt-4">No. Analisa</label><br>
                                <input type="text" class="form-control text-uppercase" id="e_no_analis" name="no_analis" placeholder="No. Analisa" autocomplete="off" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="pemerian" class="mt-4">Pemerian</label>
                                <select class="form-control chosen-select" id="e_pemerian" name="pemerian" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kelarutan" class="mt-4">Kelarutan</label>
                                <select class="form-control chosen-select" id="e_kelarutan" name="kelarutan" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="identifikasi" class="mt-4">Identifikasi</label>
                                <!-- <div class="mt-4"> -->
                                    <select class="form-control chosen-select" id="e_identifikasi" name="identifikasi" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bauzat_tl_air" class="mt-4">Bau dan Zat Tak Larut dalam Air</label>
                                <div class="mt-4">
                                    <select class="form-control chosen-select" id="e_bauzat_tl_air" name="bauzat_tl_air" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Sesuai">Sesuai</option>
                                        <option value="Tidak Sesuai">Tidak Sesuai</option>
                                    </select>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="trans_larutan" class="mt-4">Transmittance Larutan 1% pada 510nm</label>
                                <input type="number" class="form-control" id="e_trans_larutan" name="trans_larutan" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <div class="mt-4">
                                <label for="s_pengeringan" class="mt-4">Susut Pengeringan</label>
                                <input type="number" class="form-control" id="e_s_pengeringan" name="s_pengeringan" autocomplete="off" placeholder="%" required>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="bloom_st" class="mt-4">Bloom Strength</label>
                                <input type="number" class="form-control" id="e_bloom_st" name="bloom_st" autocomplete="off" placeholder="g" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="viscost" class="mt-4">Viscositas 30%</label>
                                <input type="number" class="form-control" id="e_viscost" name="viscost" autocomplete="off" placeholder="cPs" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="viscost_bd" class="mt-4">Viscositas Breakdown</label>
                                <input type="number" class="form-control" id="e_viscost_bd" name="viscost_bd" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="ph" class="mt-4">pH</label>
                                <input type="number" class="form-control" id="e_ph" name="ph" autocomplete="off" placeholder="pH" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="t_isl" class="mt-4">Titik Isoelektrik</label>
                                <input type="number" class="form-control" id="e_t_isl" name="t_isl" autocomplete="off" placeholder="pH" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sett_point" class="mt-4">Setting Point</label>
                                <input type="number" class="form-control" id="e_sett_point" name="sett_point" autocomplete="off" placeholder="°C" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="keasaman" class="mt-4">Keasaman</label><br>
                                <input type="number" class="form-control" id="e_keasaman" name="keasaman" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sulfur_do" class="mt-4">Sulfur Dioksida</label><br>
                                <input type="number" class="form-control" id="e_sulfur_do" name="sulfur_do" autocomplete="off" placeholder="ppm" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="sisa_pmj" class="mt-4">Sisa Pemijaran</label><br>
                                <input type="number" class="form-control" id="e_sisa_pmj" name="sisa_pmj" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="uk_part_mesh4" class="mt-4">Ukuran Partikel Mesh 4</label><br>
                                <input type="number" class="form-control" id="e_uk_part_mesh4" name="uk_part_mesh4" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="uk_part_mesh40" class="mt-4">Ukuran Partikel Mesh 40</label><br>
                                <input type="number" class="form-control" id="e_uk_part_mesh40" name="uk_part_mesh40" autocomplete="off" placeholder="%" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="kndtv" class="mt-4">Konduktivitas</label><br>
                                <input type="number" class="form-control" id="e_kndtv" name="kndtv" autocomplete="off" placeholder="mS.cm 1" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="arsen" class="mt-4">Arsen (As) *)</label><br>
                                <select class="form-control chosen-select" id="e_arsen" name="arsen" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="timbal" class="mt-4">Timbal (Pb) *)</label><br>
                                <select class="form-control chosen-select" id="e_timbal" name="timbal" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="peroksida" class="mt-4">Peroksida *)</label><br>
                                <select class="form-control chosen-select" id="e_peroksida" name="peroksida" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="besi" class="mt-4">Besi *)</label><br>
                                <select class="form-control chosen-select" id="e_besi" name="besi" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cromium" class="mt-4">Cromium *)</label><br>
                                <select class="form-control chosen-select" id="e_cromium" name="cromium" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="zinc" class="mt-4">Zinc *)</label><br>
                                <select class="form-control chosen-select" id="e_zinc" name="zinc" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Sesuai">Sesuai</option>
                                    <option value="Tidak Sesuai">Tidak Sesuai</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="cm_dna_babi" class="mt-4">Cemaran DNA Babi/Porcine *)</label><br>
                                <select class="form-control chosen-select" id="e_cm_dna_babi" name="cm_dna_babi" required>
                                    <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                    <option value="Negatif">Negatif</option>
                                    <option value="Positif">Positif</option>
                                </select>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_tb" class="mt-4">Mikrobiologi (Total Bakteri)</label><br>
                                <input type="number" class="form-control" id="e_m_tb" name="m_tb" autocomplete="off" placeholder="cfu/g" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_akk" class="mt-4">Mikrobiologi (Angka Kapang dan Khamir)</label><br>
                                <input type="number" class="form-control" id="e_m_akk" name="m_akk" autocomplete="off" placeholder="cfu/g" required>
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_ec" class="mt-4">Mikrobiologi (Escherrichia coli)</label><br>
                                <!-- <div class="mt-4"> -->
                                    <select class="form-control chosen-select" id="e_m_ec" name="m_ec" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Negatif">Negatif</option>
                                        <option value="Positif">Positif</option>
                                    </select>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="m_salmon" class="mt-4">Mikrobiologi (Salmonella)</label><br>
                                <!-- <div class="mt-4"> -->
                                    <select class="form-control chosen-select mt-4" id="e_m_salmon" name="m_salmon" required>
                                        <option value="" disabled selected hidden>- Pilih Jenis Hasil -</option>
                                        <option value="Negatif">Negatif</option>
                                        <option value="Positif">Positif</option>
                                    </select>
                                <!-- </div> -->
                            </div>
                        </div>
                        <div class="col-md-4">
                            <div class="form-group">
                                <label for="wd_py" class="mt-4">Wadah dan Penyimpanan</label><br>
                                <select class="form-control chosen-select" id="e_wd_py" name="wd_py" required>
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

<!-- <script type="text/javascript">
    $(document).ready(function() {
        $('#edit_ujigel').on('show.bs.modal', function(event) {
            var id_pb = $(event.relatedTarget).data('id_pb')
            var no_surat_jalan = $(event.relatedTarget).data('no_surat_jalan')
            var no_batch = $(event.relatedTarget).data('no_batch')
            var tgl = $(event.relatedTarget).data('tgl')
            var tgl_uji = $(event.relatedTarget).data('tgl_uji')
            var no_analis = $(event.relatedTarget).data('no_analis')
            var dok_pendukung = $(event.relatedTarget).data('dok_pendukung')
            var jenis_kemasan = $(event.relatedTarget).data('jenis_kemasan')
            var jml_kemasan = $(event.relatedTarget).data('jml_kemasan')
            var ditolak_kemasan = $(event.relatedTarget).data('ditolak_kemasan')
            var qty = $(event.relatedTarget).data('qty')
            var ditolak_qty = $(event.relatedTarget).data('ditolak_qty')
            var exp = $(event.relatedTarget).data('exp')
            var mfg = $(event.relatedTarget).data('mfg')
            var nama_barang = $(event.relatedTarget).data('nama_barang')
            var nama_supplier = $(event.relatedTarget).data('nama_supplier')
            var op_gudang = $(event.relatedTarget).data('op_gudang')
            var pemerian = $(event.relatedTarget).data('pemerian')
            var kelarutan = $(event.relatedTarget).data('kelarutan')
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
            var penguji = $(event.relatedTarget).data('penguji')
            var tutup = $(event.relatedTarget).data('tutup')
            var wadah = $(event.relatedTarget).data('wadah')
            var label = $(event.relatedTarget).data('label')

            $(this).find('#e_id_pb').val(id_pb)
            $(this).find('#e_no_surat_jalan').val(no_surat_jalan)
            $(this).find('#e_no_batch').val(no_batch)
            $(this).find('#e_tgl').val(tgl)
            $(this).find('#e_tgl_uji').val(tgl_uji)
            $(this).find('#e_no_analis').val(no_analis)
            $(this).find('#e_dok_pendukung').val(dok_pendukung)
            $(this).find('#e_jenis_kemasan').val(jenis_kemasan)
            $(this).find('#e_jml_kemasan').val(jml_kemasan)
            $(this).find('#e_ditolak_kemasan').val(ditolak_kemasan)
            $(this).find('#e_qty').val(qty)
            $(this).find('#e_ditolak_qty').val(ditolak_qty)
            $(this).find('#e_exp').val(exp)
            $(this).find('#e_mfg').val(mfg)
            $(this).find('#e_nama_barang').val(nama_barang)
            $(this).find('#e_nama_supplier').val(nama_supplier)
            $(this).find('#e_op_gudang').val(op_gudang)
            $(this).find('#e_pemerian').val(pemerian)
            $(this).find('#e_kelarutan').val(kelarutan)
            $(this).find('#e_identifikasi').val(identifikasi)
            $(this).find('#e_bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#e_trans_larutan').val(trans_larutan)
            $(this).find('#e_s_pengeringan').val(s_pengeringan)
            $(this).find('#e_bloom_st').val(bloom_st)
            $(this).find('#e_viscost').val(viscost)
            $(this).find('#e_bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#e_trans_larutan').val(trans_larutan)
            $(this).find('#e_s_pengeringan').val(s_pengeringan)
            $(this).find('#e_bloom_st').val(bloom_st)
            $(this).find('#e_viscost').val(viscost)
            $(this).find('#e_viscost_bd').val(viscost_bd)
            $(this).find('#e_ph').val(ph)
            $(this).find('#e_t_isl').val(t_isl)
            $(this).find('#e_sett_point').val(sett_point)
            $(this).find('#e_keasaman').val(keasaman)
            $(this).find('#e_sulfur_do').val(sulfur_do)
            $(this).find('#e_sisa_pmj').val(sisa_pmj)
            $(this).find('#e_uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#e_uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#e_kndtv').val(kndtv)
            $(this).find('#e_arsen').val(arsen)
            $(this).find('#e_timbal').val(timbal)
            $(this).find('#e_peroksida').val(peroksida)
            $(this).find('#e_besi').val(besi)
            $(this).find('#e_cromium').val(cromium)
            $(this).find('#e_zinc').val(zinc)
            $(this).find('#e_cm_dna_babi').val(cm_dna_babi)
            $(this).find('#e_m_tb').val(m_tb)
            $(this).find('#e_m_akk').val(m_akk)
            $(this).find('#e_m_ec').val(m_ec)
            $(this).find('#e_m_salmon').val(m_salmon)
            $(this).find('#e_wd_py').val(wd_py)
            $(this).find('#e_penguji').val(penguji)
            $(this).find('#e_tutup').val(tutup)
            $(this).find('#e_wadah').val(wadah)
            $(this).find('#e_label').val(label)

        })

    })
</script> -->

<!-- Script Uji Gel -->
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
        $('#edit_ujigel').on('show.bs.modal', function(event) {
            var id_ujigel = $(event.relatedTarget).data('id_ujigel')
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
            var identifikasi = $(event.relatedTarget).data('identifikasi')
            var bauzat_tl_air = $(event.relatedTarget).data('bauzat_tl_air')
            var trans_larutan = $(event.relatedTarget).data('trans_larutan')
            var s_pengeringan = $(event.relatedTarget).data('s_pengeringan')
            var bloom_st = $(event.relatedTarget).data('bloom_st')
            var viscost = $(event.relatedTarget).data('viscost')
            var viscost_bd = $(event.relatedTarget).data('viscost_bd')
            var ph = $(event.relatedTarget).data('ph')
            var t_isl = $(event.relatedTarget).data('t_isl')
            var sett_point = $(event.relatedTarget).data('sett_point')
            var keasaman = $(event.relatedTarget).data('keasaman')
            var sulfur_do = $(event.relatedTarget).data('sulfur_do')
            var sisa_pmj = $(event.relatedTarget).data('sisa_pmj')
            var uk_part_mesh4 = $(event.relatedTarget).data('uk_part_mesh4')
            var uk_part_mesh40 = $(event.relatedTarget).data('uk_part_mesh40')
            var kndtv = $(event.relatedTarget).data('kndtv')
            var arsen = $(event.relatedTarget).data('arsen')
            var timbal = $(event.relatedTarget).data('timbal')
            var peroksida = $(event.relatedTarget).data('peroksida')
            var besi = $(event.relatedTarget).data('besi')
            var cromium = $(event.relatedTarget).data('cromium')
            var zinc = $(event.relatedTarget).data('zinc')
            var cm_dna_babi = $(event.relatedTarget).data('cm_dna_babi')
            var m_tb = $(event.relatedTarget).data('m_tb')
            var m_akk = $(event.relatedTarget).data('m_akk')
            var m_ec = $(event.relatedTarget).data('m_ec')
            var m_salmon = $(event.relatedTarget).data('m_salmon')
            var wd_py = $(event.relatedTarget).data('wd_py')
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

            $(this).find('#e_id_ujigel').val(id_ujigel)
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
            $(this).find('#e_identifikasi').val(identifikasi)
            $(this).find('#e_identifikasi').trigger("chosen:updated")
            $(this).find('#e_bauzat_tl_air').val(bauzat_tl_air)
            $(this).find('#e_bauzat_tl_air').trigger("chosen:updated")
            $(this).find('#e_trans_larutan').val(trans_larutan)
            $(this).find('#e_s_pengeringan').val(s_pengeringan)
            $(this).find('#e_bloom_st').val(bloom_st)
            $(this).find('#e_viscost').val(viscost)
            $(this).find('#e_viscost_bd').val(viscost_bd)
            $(this).find('#e_ph').val(ph)
            $(this).find('#e_t_isl').val(t_isl)
            $(this).find('#e_sett_point').val(sett_point)
            $(this).find('#e_keasaman').val(keasaman)
            $(this).find('#e_sulfur_do').val(sulfur_do)
            $(this).find('#e_sisa_pmj').val(sisa_pmj)
            $(this).find('#e_uk_part_mesh4').val(uk_part_mesh4)
            $(this).find('#e_uk_part_mesh40').val(uk_part_mesh40)
            $(this).find('#e_kndtv').val(kndtv)
            $(this).find('#e_arsen').val(arsen)
            $(this).find('#e_arsen').trigger("chosen:updated")
            $(this).find('#e_timbal').val(timbal)
            $(this).find('#e_timbal').trigger("chosen:updated")
            $(this).find('#e_peroksida').val(peroksida)
            $(this).find('#e_peroksida').trigger("chosen:updated")
            $(this).find('#e_besi').val(besi)
            $(this).find('#e_besi').trigger("chosen:updated")
            $(this).find('#e_cromium').val(cromium)
            $(this).find('#e_cromium').trigger("chosen:updated")
            $(this).find('#e_zinc').val(zinc)
            $(this).find('#e_zinc').trigger("chosen:updated")
            $(this).find('#e_cm_dna_babi').val(cm_dna_babi)
            $(this).find('#e_cm_dna_babi').trigger("chosen:updated")
            $(this).find('#e_m_tb').val(m_tb)
            $(this).find('#e_m_akk').val(m_akk)
            $(this).find('#e_m_ec').val(m_ec)
            $(this).find('#e_m_ec').trigger("chosen:updated")
            $(this).find('#e_m_salmon').val(m_salmon)
            $(this).find('#e_m_salmon').trigger("chosen:updated")
            $(this).find('#e_wd_py').val(wd_py)
            $(this).find('#e_wd_py').trigger("chosen:updated")

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

            uppercase('#no_analis_gel');
            checkKoma('#trans_larutan');
            checkKoma('#s_pengeringan_gel');
            checkKoma('#viscost_bd');
            checkKoma('#ph_gel');
            checkKoma('#t_isl');
            checkKoma('#keasaman');
            checkKoma('#sulfur_do');
            checkKoma('#sisa_pmj');
            checkKoma('#uk_part_mesh40');
            checkKoma('#kndtv');
        })
    })
</script>