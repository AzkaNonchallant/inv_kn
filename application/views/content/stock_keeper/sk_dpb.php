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
                  <li class="breadcrumb-item"><a href="javascript:">Stock Keeper DPB</a></li>
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
                    <h5>Data PPB</h5>
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
                            <th class="text-center">Tanggal Diterima</th>
                            <th class="text-center">No DPB</th>
                            <th class="text-center">No JJ DPB</th>
                            <th class="text-center">PRC Admin</th>
                            <th class="text-center">No RB</th>
                            <th class="text-center">Status</th>
                          
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          
                          $no = 1;
                          foreach ($result as $k) {
                            $tgl_diterima =  explode('-', $k['tgl_diterima'])[2] . "/" . explode('-', $k['tgl_diterima'])[1] . "/" . explode('-', $k['tgl_diterima'])[0];
                            // $tgl_pakai =  explode('-', $k['tgl_pakai'])[2] . "/" . explode('-', $k['tgl_pakai'])[1] . "/" . explode('-', $k['tgl_pakai'])[0];
                            // $formatted_tgl = $tgl[2] . "/" . $tgl[1] . "/" . $tgl[0];
                          ?>
                            <tr>
                                <th scope="row"><?= $no++ ?></th>
                                
                                <td><?= $tgl_diterima ?></td>
                                <td><?= $k['no_dpb'] ?></td>
                                <td><?= $k['no_jj_dpb'] ?></td>
                                <td><?= $k['prc_admin'] ?></td>
                                <td><?= $k['no_rb'] ?></td>
                                <td class="text-center">
                                  <?= $k['status'] === 'selesai' ? '<span class="badge badge-success">Selesai</span>' : '<span class="badge badge-warning">Proses</span>'; ?>
                              </td>
                                  
                                                                
                              <td class="text-center">
                                <?php if ($level === "admin")  { ?>
                                
                                  <div class="btn-group" role="group" aria-label="Basic example">
                                    <a type="button" class="btn btn-success btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>purchasing/prc_dpb/prc_dpb/pdf_cetak_dpb/<?= str_replace('/', '--', $k['no_dpb']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " >
                                        <i class="feather icon-file"></i>Cetak
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
      var filter_tgl = $('#filter_tgl').val       ();
      var filter_tgl2 = $('#filter_tgl2').val();
      if (filter_tgl == '' || filter_tgl2 == '') {
        alert('Pilih kedua tanggal untuk melihat data.');
      } else {    
        window.location.href = "<?= base_url() ?>Account/Account_ppbfilter_tg=" + filter_tgl + "&filter_tgl2=" + filter_tgl2;
      }
    });
  });
</script>

<!-- Modal -->
      




<!-- Modal Details -->
<div class="modal fade" id="details" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
    <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Detail Accounting PPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Stock_keeper/Sk_dpb">

        <div class="modal-body">
          <div class="row">
          
          <div class="col-md-3">
              <div class="form-group">
                <label for="v-tgl_diterima">Tanggal Diterima</label>
                <input type="text" class="form-control" id="v-tgl_diterima" name="tgl_diterima" placeholder="Tanggal Diterima" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_dpb">No DPB</label>
                <input type="text" class="form-control" id="v-no_dpb" name="v-no_dpb" placeholder="No DPB" maxlength="20" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_jj_dpb">No JJ DPB</label>
                <input type="text" class="form-control" id="v-no_jj_dpb" name="no_jj_dpb" placeholder="No JJ DPB" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-prc_admin">Tanggal PPB</label>
                <input type="text" class="form-control" id="v-prc_admin" name="prc_admin" placeholder="Tanggal PPB" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-no_rb">No RB</label>
                <input type="text" class="form-control" id="v-no_rb" name="no_rb" placeholder="No RB" readonly>
              </div>
            </div>
            <div class="col-md-3">
              <div class="form-group">
                <label for="v-status">Status</label>
                <input type="text" class="form-control" id="v-status" name="status" placeholder="Status" readonly>
              </div>
            </div>
          
            <div class="col-md-6">
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
    $('#details').on('show.bs.modal', function(event) {
      var tgl_diterima = $(event.relatedTarget).data('tgl_diterima')
      var no_dpb = $(event.relatedTarget).data('no_dpb')
      var no_jj_dpb = $(event.relatedTarget).data('no_jj_dpb')
      var prc_admin = $(event.relatedTarget).data('prc_admin')
      var no_rb = $(event.relatedTarget).data('no_rb')
      var status = $(event.relatedTarget).data('status')
      

      $(this).find('#v-jenis_ppb').val(jenis_ppb)
      $(this).find('#v-tgl_diterima').val(tgl_diterima)
      $(this).find('#v-no_dpb').val(no_dpb)
      $(this).find('#v-no_jj_dpb').val(no_jj_dpb)
      $(this).find('#v-prc_admin').val(prc_admin)
      $(this).find('#v-no_rb').val(no_rb)
      $(this).find('#v-status').val(status)
      
      
     }) } ); 
  
</script>
              
<!-- Modal Edit -->


