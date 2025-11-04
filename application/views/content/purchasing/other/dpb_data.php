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
                  <li class="breadcrumb-item"><a href="<?= base_url('Purchasing/Other/Dpb') ?>">DPB</a></li>
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
                    <button type="button" class="btn btn-primary float-right btn-sm" data-toggle="modal" data-target="#add">
                      <i class="feather icon-user-plus"></i>Tambah PO
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
                            <th class="text-center">A</th>
                            <th class="text-center">B</th>
                            <th class="text-center">C</th>
                            <th class="text-center">D</th>
                            <th class="text-center">E</th>
                            <th class="text-center">F</th>
                            <th class="text-center">G</th>
                            <th class="text-center">H</th>
                          </tr>
                        </thead>
                        <tbody>
                          <tr>
                            <th scope="row" class="text-center">...</th>
                            <td class="text-center">...</td>
                            <td class="text-center">...</td>
                            <td class="text-center">...</td>
                            <td class="text-center">...</td>
                            <td class="text-center">...</td>
                            <td class="text-center">...</td>
                            <td class="text-center">...</td>
                            <td class="text-center">
                              <div class="btn-group" role="group" aria-label="Basic example">
                                <button style="margin-right: 5px;" type="button" class="btn btn-info btn-square btn-sm">
                                  <i class="feather icon-eye"></i>Detail
                                </button>
                                <a style="margin-left: 5px;" class="btn btn-danger btn-square text-light btn-sm" onclick="if (! confirm('Apakah Anda Yakin?')) { return false; }">
                                  <i class="feather icon-trash-2"></i>hapus
                                </a>
                              </div>
                            </td>
                          </tr>
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
  <div class="modal-dialog modal-xl">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah DPB</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <form method="post" action="<?= base_url() ?>Marketing/Other/DPB/add">
        <div class="modal-body">
          <div class="row">

            <div class="col-md-4">
              <div class="form-group">
                <label for="bagian">Bagian</label>
                <input type="text" class="form-control" id="bagian" name="bagian" placeholder="Bagian" required>
              </div>
            </div>


            <div class="col-md-4">
              <div class="form-group">
                <label for="no_dpb">No. DPB</label>
                <input type="text" class="form-control" id="no_dpb" name="no_dpb" value="" placeholder="No DPB" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-4">
              <div class="form-group">
                <label for="tgl_dpb">Tanggal DPB</label>
                <input type="text" class="form-control datepicker" id="tgl_dpb" name="tgl_dpb" placeholder="Tanggal DPB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-md-3">
              <div class="form-group">
                <label for="tgl_diterima_barang">Tanggal Diterima Barang</label>
                <input type="text" class="form-control datepicker" id="tgl_diterima_barang" name="tgl_diterima_barang" placeholder="Tanggal Diterima Barang" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="no_po">NO. PO</label>
                <input type="text" class="form-control" id="no_po" name="no_po" placeholder="NO. PO" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="no_sj">NO. SJ</label>
                <input type="text" class="form-control" id="no_sj" name="no_sj" placeholder="NO. SJ" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="no_rb">NO. RB</label>
                <input type="text" class="form-control" id="no_rb" name="no_rb" placeholder="NO. RB" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-3">
              <div class="form-group">
                <label for="ppb_no">PPB NO</label>
                <input type="text" class="form-control" id="ppb_no" name="ppb_no" placeholder="PPB NO" autocomplete="off" required>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="no_kode">NO. Kode</label>
                <input type="text" class="form-control" id="no_kode" name="no_kode" placeholder="NO. Kode" autocomplete="off" required>
              </div>
            </div>

            <div class="col-md-3">
              <div class="form-group">
                <label for="size">Nama Barang</label>
                <select class="form-control chosen-select" id="size" name="size" autocomplete="off" required>
                  <option value="" disabled selected hidden>- Nama Barang -</option>
                  <option> </option>
                </select>
              </div>
            </div>

            <div class="col-3">
              <div class="form-group">
                <label for="spesifikasi">Spesifikasi</label>
                <input type="text" class="form-control" id="spesifikasi" name="spesifikasi" placeholder="Spesifikasi" autocomplete="off" required>
              </div>
            </div>
          </div>

          <div class="row">

            <div class="col-4">
              <div class="form-group">
                <label for="jumlah_menurut_dokumen">Jumlah Menurut Dokumen</label>
                <input type="text" class="form-control" id="jumlah_menurut_dokumen" name="jumlah_menurut_dokumen" placeholder="Jumlah Menurut Dokumen" autocomplete="off" required>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="jumlah_yang_diterima">Jumlah yang diterima</label>
                <input type="text" class="form-control" id="jumlah_yang_diterima" name="jumlah_yang_diterima" placeholder="Jumlah yang diterima" autocomplete="off" required>
              </div>
            </div>
            <div class="col-4">
              <div class="form-group">
                <label for="keterangan">Keterangan</label>
                <input type="text" class="form-control" id="keterangan" name="keterangan" placeholder="Keterangan" autocomplete="off" required>
              </div>
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