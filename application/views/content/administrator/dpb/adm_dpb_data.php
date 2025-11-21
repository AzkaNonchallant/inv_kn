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
                  <li class="breadcrumb-item"><a href="javascript:">Purchasing DPB</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('purchasing/prc_dpb/prc_dpb') ?>">DPB</a></li>
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
                    <h5>Data DPB</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Filter Dari Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Filter Sampai Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="btn-group">
                          <button class="btn btn-secondary btn-sm" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>Purchasing/Prc_dpb/Prc_dpb" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                        <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                          <i class="feather icon-plus"></i>Tambah DPB
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
                            <th class="text-center">Tanggal Dpb</th>
                            <th class="text-center">No DPB</th>
                            <th class="text-center">Jenis Bayar</th>
                            <th class="text-center">No Surat Jalan</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('departement');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_dpb =  explode('-', $k['tgl_dpb'])[2] . "/" . explode('-', $k['tgl_dpb'])[1] . "/" . explode('-', $k['tgl_dpb'])[0];
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl_dpb ?></td>
                              <td><?= $k['no_dpb'] ?></td>
                              <td><?= $k['jenis_bayar'] ?></td>
                              <td><?= $k['no_sjl'] ?></td>
                              <td class="text-center">
                                <?php if ($level === "admin") { ?>
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-danger btn-square btn-sm text-light" href="<?= base_url() ?>purchasing/prc_dpb/prc_dpb/delete/<?= str_replace('/', '--', $k['no_dpb']) ?>"
                                    onclick="return confirm('apakah kamu ingin menghapusnya?')">
                                      <i class="feather icon-trash"></i>Hapus
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
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {
        window.location.href = "<?= base_url() ?>Account/Account_ppbfilter_tg=" + filter_tgl + "&filter_tgl2=" + filter_tgl2;
      }
    });
  });
</script>

<!-- Modal ADD -->
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah data DPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>purchasing/prc_dpb/prc_dpb/add">
        <div class="modal-body">
          <div class="row">
            <!-- No DPB (Dropdown) -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_dpb">No DPB</label>
                <select class="form-control chosen-select" id="no_dpb" name="no_dpb" required>
                  <option value="" disabled selected hidden> - Pilih No DPB -</option>
                  <?php foreach ($res_kode as $rk) : ?>
                    <option value="<?= $rk['no_dpb'] ?>"><?= $rk['no_dpb'] ?></option>
                  <?php endforeach; ?>
                </select>
              </div>
            </div>

            <!-- Tanggal (Readonly) -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_dpb">Tanggal DPB</label>
                <input type="text" class="form-control" id="tgl_dpb" name="tgl_dpb" readonly>
              </div>
            </div>

            <!-- Jenis Bayar (Readonly) -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="jenis_bayar">Jenis Bayar</label>
                <input type="text" class="form-control" id="jenis_bayar" name="jenis_bayar" readonly>
              </div>
            </div>

            <!-- No Surat Jalan (Readonly) -->
            <div class="col-md-3">
              <div class="form-group">
                <label for="no_sjl">No Surat Jalan</label>
                <input type="text" class="form-control" id="no_sjl" name="no_sjl" readonly>
              </div>
            </div>
          </div>

          <div class="row">
            <div class="col-md-12">
              <div class="table-responsive">
                <table class="table table-bordered table-sm">
                  <thead>
                    <tr>
                      <th>Kode Material</th>
                      <th>Nama Material</th>
                      <th>Satuan</th>
                      <th>Supplier</th>
                      <th class="text-center">Jumlah</th>
                      <th class="text-center">No Batch</th>
                    </tr>
                  </thead>
                  <tbody id="detail-barang">
                    <tr>
                      <td colspan="6" class="text-center">Pilih No DPB untuk melihat detail barang</td>
                    </tr>
                  </tbody>
                </table>
              </div>
            </div>
          </div>

          <!-- Input No Batch -->
          <div class="row mt-3">
            <div class="col-md-12">
              <div class="form-group">
                <label for="no_batch">No Batch</label>
                <input type="text" class="form-control" id="no_batch" name="no_batch" placeholder="Masukkan No Batch" required autocomplete="off">
              </div>
            </div>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
          <button type="submit" id="simpan" class="btn btn-primary"
            onclick="if (! confirm('Apakah Anda Yakin Untuk Menimpan Data Ini? Tolong Untuk Di Check Kembali. Dan Jangan Lupa Untuk Menginput No Batch')) { return false; }">Simpan</button>
        </div>
      </form>
    </div>
  </div>
</div>

<script type="text/javascript">
  $(document).ready(function() {
    // Saat modal dibuka
    $('#add').on('show.bs.modal', function(event) {
      // Reset form
      $('#no_dpb').val('').trigger('chosen:updated');
      $('#tgl_dpb').val('');
      $('#jenis_bayar').val('');
      $('#no_sjl').val('');
      $('#detail-barang').html('<tr><td colspan="6" class="text-center">Pilih No DPB untuk melihat detail barang</td></tr>');
      $('#no_batch').val('');

      // Event ketika No DPB dipilih
      $('#no_dpb').on('change', function() {
        const no_dpb = $(this).val();
        
        if (no_dpb) {
          // Tampilkan loading
          $('#detail-barang').html('<tr><td colspan="6" class="text-center">Loading...</td></tr>');
          
          // Ambil data DPB berdasarkan no_dpb
      //     $.ajax({
      //       url: "<?= base_url('purchasing/prc_dpb/prc_dpb/get_dpb_detail') ?>",
      //       type: "POST",
      //       data: {
      //         no_dpb: no_dpb
      //       },
      //       dataType: "json",
      //       success: function(data) {
      //         if (data && data.length > 0) {
      //           // Isi data header
      //           $('#tgl_dpb').val(data[0].tgl_dpb_formatted || '');
      //           $('#jenis_bayar').val(data[0].jenis_bayar || '');
      //           $('#no_sjl').val(data[0].no_sjl || '');
                
      //           // Isi detail barang
      //           let html = '';
      //           $.each(data, function(i, item) {
      //             html += `
      //               <tr>
      //                 <td>${item.kode_material || '-'}</td>
      //                 <td>${item.nama_material || '-'}</td>
      //                 <td>${item.satuan || '-'}</td>
      //                 <td>${item.supplier || '-'}</td>
      //                 <td class="text-center">${item.jumlah || '0'}</td>
      //                 <td class="text-center">-</td>
      //               </tr>
      //             `;
      //           });
      //           $('#detail-barang').html(html);
      //         } else {
      //           $('#detail-barang').html('<tr><td colspan="6" class="text-center">Tidak ada data barang</td></tr>');
      //           $('#tgl_dpb').val('');
      //           $('#jenis_bayar').val('');
      //           $('#no_sjl').val('');
      //         }
      //       },
      //       error: function() {
      //         $('#detail-barang').html('<tr><td colspan="6" class="text-center text-danger">Gagal memuat data</td></tr>');
      //       }
      //     });
      //   } else {
      //     // Reset jika no_dpb kosong
      //     $('#tgl_dpb').val('');
      //     $('#jenis_bayar').val('');
      //     $('#no_sjl').val('');
      //     $('#detail-barang').html('<tr><td colspan="6" class="text-center">Pilih No DPB untuk melihat detail barang</td></tr>');
      //   }
      // });

      $('#no_dpb').on('change', function () {
        var no_dpb = $(this).val();
        var selectedOption = $(this).find('option:selected');
       

        if (no_dpb) {
            // Tampilkan loading state
            // $('#id_customer').val('Loading...');
            // $('#id_master_kw_cap').val('Loading...');
            // $('#warna_cap').val('Loading...');
            // $('#id_master_kw_body').val('Loading...');
            // $('#warna_body').val('Loading...');
            $('#jenis_bayar').val('Loading...');

            $.ajax({
                url: "<?= base_url('Marketing/Tambah_schedule/get_kp_by_id') ?>",
                type: "POST",
                data: { id_mkt_kp: id_mkt_kp },
                dataType: "json",
                success: function (response) {
                    console.log("Response:", response);

                    if (response.success && response.data) {
                        var data = response.data;

                        // Isi field-field yang readonly
                        $('#tanggal_dpb').val(data.tgl_dpb || '-');
                        $('#jenis_bayar').val(data.jenis_bayar || '-');
                        $('#no_sjl').val(data.no_sjl || '-');
                        $('#id_master_kw_body').val(data.kode_warna_body || '-');
                        $('#warna_body').val(data.short_body || '-');
                        $('#size_machine').val(data.size_kp || '-');
                        $('#minyak').val(data.spek_kapsul || '-');
                        $('#jumlah_kp').val(formatNumber(data.jumlah_kp) || '');
                        $('#print').val(data.kode_print || '-');
                        $('#logo_print').val(data.logo_print || '-');
                        $('#outstanding').val(formatNumber(response.sisa_kp) || formatNumber(data.jumlah_kp));

                        // Set hidden values untuk ID
                        $('#hidden_id_customer').val(data.id_customer || '');
                        $('#hidden_id_master_kw_cap').val(data.id_master_kw_cap || '');
                        $('#hidden_id_master_kw_body').val(data.id_master_kw_body || '');

                        console.log("Data loaded successfully");

                    } else {
                        console.log("Data not found or error in response");
                        alert('Data tidak ditemukan');
                        clearAutoFillFields();
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX Error:", error);
                    alert('Terjadi kesalahan saat memuat data: ' + error);
                    clearAutoFillFields();
                }
            });
        } else {
            clearAutoFillFields();
        }
    });

      // Datepicker
      $(this).find('.datepicker').datepicker().on('show.bs.modal', function(event) {
        event.stopImmediatePropagation();
      });
    });

    // Reset modal ketika ditutup
    $('#add').on('hidden.bs.modal', function() {
      $('#no_dpb').val('').trigger('chosen:updated');
      $('#tgl_dpb').val('');
      $('#jenis_bayar').val('');
      $('#no_sjl').val('');
      $('#detail-barang').html('<tr><td colspan="6" class="text-center">Pilih No DPB untuk melihat detail barang</td></tr>');
      $('#no_batch').val('');
    });
  });
</script>