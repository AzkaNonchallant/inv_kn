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
                  <!-- <h5 class="m-b-10">Data Barang Keluar</h5> -->
                </div>
                <ul class="breadcrumb">
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>"><i class="feather icon-home"></i></a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>">Purchasing</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url() ?>">Other</a></li>
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Other/Avl') ?>">Approved Vendor List</a></li>
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
                    <h5>Data Approved Vendor List</h5>
                    <!-- Button trigger modal -->
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah AVL
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
                            <th class="text-center">#</th>
                            <th class="text-center">Periode</th>
                            <th class="text-center">Mulai Berlaku</th>
                            <th class="text-center">Print</th>
                            <th class="text-center">Aksi</th>
                          </tr>
                        </thead>
                        <tbody>
                          <?php
                          $level = $this->session->userdata('level');
                          $no = 1;
                          foreach ($result as $k){
                            $periode =  explode('-', $k['periode'])[2] . "/" . explode('-', $k['periode'])[1] . "/" . explode('-', $k['periode'])[0];
                            $berlaku =  explode('-', $k['berlaku'])[2] . "/" . explode('-', $k['berlaku'])[1] . "/" . explode('-', $k['berlaku'])[0];
                          ?>
                            <tr>
                              <th scope="row" class="text-center"><?= $no++ ?></th>
                              <td class="text-center"><?= $periode ?></td>
                              <td class="text-center"><?= $berlaku?></td>
 
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <a style="margin-right: 5px;" type="button" class="btn btn-warning btn-square btn-sm text-light" onclick="window.open(`<?= base_url() ?>purchasing/other/avl/pdf_hasil/<?= str_replace('/', '--', $k['kode_supplier']) ?>`, 'location=yes,height=700,width=1300,scrollbars=yes,status=yes'); " data-id_supplier="<?= $k['id_supplier'] ?>" data-nama_supplier="<?= $k['nama_supplier'] ?>" data-kode_supplier="<?= $k['kode_supplier'] ?>">
                                    <i class="feather icon-file"></i>Print
                                  </a>
                                </div>
                              </td>
                              <td class="text-center">
                                <div class="btn-group" role="group" aria-label="Basic example">
                                  <button style="margin-right: 5px; margin-left:5px;" type="button" class="btn btn-info btn-square btn-sm">
                                    <i class="feather icon-eye"></i>Detail
                                  </button>
                                  <a style="margin-left: 5px;" class="btn btn-danger btn-square text-light btn-sm" href="<?= base_url() ?>purchasing/other/avl/delete/<?= $k['id_avl'] ?>" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                    <i class="feather icon-trash-2"></i>hapus
                                  </a>
                                </div>
                              </td>
                            </tr>
                          <?php } ?>
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
<div class="modal fade" id="add" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Approved Vendor List</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Purchasing/Other/Avl/add">
        <div class="modal-body">
          <div class="form-group">
            <label for="periode">Periode</label>
            <input type="text" class="form-control datepicker" id="periode" name="periode" placeholder="Tanggal Periode" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="berlaku">Mulai Berlaku</label>
            <input type="text" class="form-control datepicker" id="berlaku" name="berlaku" placeholder="Tanggal Berlaku" autocomplete="off" required>
          </div>
          <div class="form-group">
            <label for="id_supplier">Supplier</label>
            <select class="form-control chosen-select" id="customer_add" name="customer_add" autocomplete="off" required>
              <option value="" disabled selected hidden>- Customer -</option>
              <?php
              foreach ($res_supplier as $rs) {
              ?>
                <option value="<?= $rs['id_supplier'] ?>,<?= $rs['golongan'] ?>,<?= $rs['kode_supplier'] ?>,<?= $rs['nama_supplier'] ?>"> <?= $rs['golongan'] ?> | <?= $rs['kode_supplier'] ?> | <?= $rs['nama_supplier'] ?> </option>
              <?php
              }
              ?>
            </select>
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