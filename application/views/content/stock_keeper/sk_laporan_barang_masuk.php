<style>
  .scrollable-menu {
    height: auto;
    max-height: 200px;
    overflow-x: hidden;
  }
</style>
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
                  <li class="breadcrumb-item"><a href="javascript:">Stock Keeper</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Laporan</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('stock_keeper/sk_laporan_barang_masuk') ?>">Barang Masuk</a></li>
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
                    <h5>Laporan Barang Masuk</h5>
                    <div class="float-right">
                      <div class="input-group">
                        <select class="form-control chosen-select" id="filter_barang" name="filter_barang">
                          <option value="" disabled selected hidden>- Nama Barang -</option>
                          <?php
                          foreach ($res_barang as $nm) { ?>
                            <option <?= $name === $nm['nama_barang'] ? 'selected' : '' ?> value="<?= $nm['nama_barang'] ?>"><?= $nm['nama_barang'] ?></option>
                          <?php } ?>
                        </select>
                        <input type="text" id="filter_tgl" value="<?= $tgl == null ? '' : $tgl ?>" class="form-control datepicker" placeholder="Fiter Dari Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <input type="text" id="filter_tgl2" value="<?= $tgl2 == null ? '' : $tgl2 ?>" class="form-control datepicker" placeholder="Fiter Sampai Tanggal" autocomplete="off" aria-label="Recipient's username" aria-describedby="basic-addon2">
                        <div class="btn-group">
                          <button class="btn btn-secondary" id="lihat" type="button">Lihat</button>
                        </div>
                        <div class="btn-group">
                          <button class="btn btn-primary" id="export" type="button">Cetak</button>
                        </div>
                        <div class="btn-group">
                          <a href="<?= base_url() ?>stock_keeper/Sk_laporan_barang_masuk" style="width: 40px;" class="btn btn-warning" id="export" type="button"><i class="feather icon-refresh-ccw"></i></a>
                        </div>
                      </div>
                    </div> <br> <br>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-bordered table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Tanggal</th>
                            <th>Nama Barang</th>
                            <th>Qty</th>
                            <th class="text-center">Details</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl =  explode('-', $k['tgl_msk'])[2] . "/" . explode('-', $k['tgl_msk'])[1] . "/" . explode('-', $k['tgl_msk'])[0];
                           ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $tgl ?></td>
                              <td><?= $k['nama_barang'] ?></td>
                              <td><?= ($k['jumlah_masuk']) ?></td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button type="button" class="btn btn-info btn-square btn-sm" data-toggle="modal" data-target="#detail" 
                                    data-id_sk_barang="<?= $k['id_sk_barang']?>"
                                    data-id_sk_barang_masuk="<?= $k['id_sk_barang_masuk'] ?>"
                                    data-nama_barang="<?= $k['nama_barang']?>" 
                                    data-tgl_msk="<?= $tgl?>" 
                                    data-jumlah_masuk="<?= $k['jumlah_masuk']?>" 
                                    data-spek="<?= $k['spek']?>" 
                                    data-unit="<?= $k['unit']?>"  
                                    data-op_sk="<?= $k['op_sk']?>" >
                                    <i class="feather icon-eye"></i>Details
                                  </button>
                                </div>
                              </td>
                            </tr>
                          <?php
                          }
                          ?>
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

<!-- Modal Detail -->
<div class="modal fade" id="detail" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Barang Masuk</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" id="form_add">
        <div class="modal-body">
          <div class="row">
            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_msk">Tanggal Masuk</label>
                <!-- <input type="text" class="form-control" id="v-tgl_msk" name="tgl_msk" placeholder="Tanggal Masuk" readonly > -->
                <input type="text" class="form-control" id="v-tgl_msk" name="tgl_msk" placeholder="Tanggal masuk" readonly>
                <!-- data-id_barang=" -->
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="nama_barang">Nama Barang</label>
                <input type="text" class="form-control" id="v-nama_barang" name="nama_barang" placeholder="Nama Barang" readonly>
              </div>
            </div>
            <div class="col-md-4">
              <div class="form-group">
                <label for="jumlah_masuk">Jumlah</label>
                <input type="text" class="form-control" id="v-jumlah_masuk" name="jumlah_masuk" placeholder="jumlah_masuk" readonly  >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="spek">Spek</label>
                <input type="text" class="form-control" id="v-spek" name="spek" placeholder="Spek" readonly>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="unit">Unit</label>
                <input type="text" class="form-control" id="v-unit" name="unit" placeholder="Unit" readonly >
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="op_sk">OP Stock Keeper</label>
                <input type="text" class="form-control" id="v-op_sk" name="op_sk" placeholder="OP StockKeeper" readonly>
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

      var id_sk_barang = $(event.relatedTarget).data('id_sk_barang')
      var tgl_msk = $(event.relatedTarget).data('tgl_msk')
      var nama_barang = $(event.relatedTarget).data('nama_barang')
      
      var jumlah_masuk = $(event.relatedTarget).data('jumlah_masuk')
      var spek = $(event.relatedTarget).data('spek')
      var unit = $(event.relatedTarget).data('unit')
      var op_sk = $(event.relatedTarget).data('op_sk')

      $(this).find('#v-id_sk_barang').val(id_sk_barang)
      $(this).find('#v-tgl_msk').val(tgl_msk)
      $(this).find('#v-nama_barang').val(nama_barang)
      $(this).find('#v-jumlah_masuk').val(jumlah_masuk)
      $(this).find('#v-spek').val(spek)
      $(this).find('#v-unit').val(unit)
      $(this).find('#v-op_sk').val(op_sk)
    })
  })
</script>

<script type="text/javascript">
  $(document).ready(function() {
    $('#lihat').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>stock_keeper/sk_laporan_barang_masuk?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi");
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>stock_keeper/sk_laporan_barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
          name: filter_nama,
          date_from: filter_tgl,
          date_until: filter_tgl2
        });
        window.location = "<?= base_url() ?>stock_keeper/sk_laporan_barang_masuk/index?" + query.toString();
      }
    });

    $('#export').click(function() {
      var filter_nama = $('#filter_barang').find(':selected').val();
      var filter_tgl = $('#filter_tgl').val();
      var filter_tgl2 = $('#filter_tgl2').val();

      var newFilterTgl = filter_tgl.split("/")[2] + "-" + filter_tgl.split("/")[1] + "-" + filter_tgl.split("/")[0];
      var newFilterTgl2 = filter_tgl2.split("/")[2] + "-" + filter_tgl2.split("/")[1] + "-" + filter_tgl2.split("/")[0];

      if (filter_tgl == '' && filter_tgl2 != '') {
        window.location = "<?= base_url() ?>stock_keeper/Sk_laporan_barang_masuk?alert=warning&msg=dari tanggal belum diisi";
        alert("dari tanggal belum diisi");
      } else if (filter_tgl != '' && filter_tgl2 == '') {
        window.location = "<?= base_url() ?>stock_keeper/Sk_laporan_barang_masuk?alert=warning&msg=sampai tanggal belum diisi";
      } else {
        const query = new URLSearchParams({
          name: filter_nama,
          date_from: filter_tgl,
          date_until: filter_tgl2
        });
        var url = "<?= base_url() ?>stock_keeper/Sk_laporan_barang_masuk/pdf_sk_laporan_barang_masuk?" + query.toString();
        window.open(url, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes');
      }
    });
  });
</script>