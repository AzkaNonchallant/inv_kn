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
                  <!-- <h5 class="m-b-10">Stok Barang</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Stock Keeper</a></li>
                  <li class="breadcrumb-item"><a href="javascript:">Kelola Barang</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Stock_keeper/Sk_barang_stock') ?>">Stok Barang</a></li>
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
                    <h5>Stok Barang</h5>
                  </div>
                  <div class="card-block table-border-style">
                    <div class="table-responsive">
                      <table class="table datatable table-hover table-striped table-sm">
                        <thead>
                          <tr>
                            <th>#</th>
                            <th>Nama</th>
                            <th class="text-center">Masuk</th>
                            <th class="text-center">Keluar</th>
                            <th class="text-center">Stok</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $no = 1;
                          foreach ($result as $k) {
                          ?>
                            <tr>
                              <th scope="row"><?= $no++ ?></th>
                              <td><?= $k['nama_barang'] ?></td>   
                              <td class="text-center"><?= $k['jumlah_masuk'] ?></td>                            
                              <td class="text-center"><?= $k['jumlah_keluar'] ?></td>                            
                              <td class="text-center"><?= $k['stock'] ?></td>                            
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
              <!-- [ basic-table ] end -->
            </div>
            <!-- [ Main Content ] end -->
          </div>
        </div>
      </div>
    </div>
  </div>
</section>


<!-- Modal -->
<div class="modal fade" id="edit" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Edit Barang</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>barang/update">
        <div class="modal-body">
          <div class="form-group">
            <label for="exampleFormControlInput1">Nama</label>
            <input type="hidden" id="e_id_barang" name="id_barang">
            <input type="text" class="form-control" id="e_nama" name="nama" placeholder="Nama Barang" maxlength="100">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Jumlah</label>
            <input type="number" class="form-control" id="e_qty" name="qty" placeholder="Jumlah Barang">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Masuk</label>
            <input type="number" class="form-control" id="e_masuk" name="masuk" placeholder="Jumlah Masuk">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Keluar</label>
            <input type="number" class="form-control" id="e_keluar" name="keluar" placeholder="Jumlah Keluar">
          </div>
          <div class="form-group">
            <label for="exampleFormControlInput1">Stok</label>
            <input type="number" class="form-control" id="e_stok" name="stock" placeholder="Jumlah Stok">
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
      var id_barang = $(event.relatedTarget).data('id_barang')
      var nama = $(event.relatedTarget).data('nama')
      var qty = $(event.relatedTarget).data('qty')
      var masuk = $(event.relatedTarget).data('masuk')
      var keluar = $(event.relatedTarget).data('keluar')
      var stock = $(event.relatedTarget).data('stock')

      $(this).find('#e_id_barang').val(id_barang)
      $(this).find('#e_nama').val(nama)
      $(this).find('#e_qty').val(qty)
      $(this).find('#e_masuk').val(masuk)
      $(this).find('#e_keluar').val(keluar)
      $(this).find('#e_stok').val(stock)
    })
  })
</script>