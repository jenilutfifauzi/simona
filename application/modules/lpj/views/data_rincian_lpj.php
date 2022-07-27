<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Validasi</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <?php foreach ($data_rincian_lpj as $u) { ?>
          <form method="POST" action="<?= base_url('pencairan/update_validasi_spp') ?>" class="needs-validation">
            <div class="form-group row">
              <label for="inputName" class="col-sm-2 col-form-label">Id</label>
              <div class="col-sm-10">
                <input type="text" class="form-control" id="status_spp" name="status_spp" placeholder="Status Spp" value="tervalidasi">
                <button type="submit" class="btn btn-primary"><?php echo $u->id ?></button>
              </div>
            </div>
          </form>
        <?php } ?>
      </div>
      <div class="modal-footer">
        <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>
<!-- akhir modal -->

<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="col-12">
        <h1><?= $title ?></h1><br>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= $title ?></h2>
      <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
      <div class="card">
        <div class="card-body">


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Kegiatan Ajuan</h4>


                  <div class="card-header-form">

                  </div>

                </div>
                <br>
                <div>
                  <button type="button" class="btn btn-primary btn-sm col-1" onclick="history.back(-1)">
                    Kembali
                  </button>

                  <?php foreach ($data_lpj_id as $d) { ?>


                    <a href="<?php echo base_url(); ?>lpj/aksi_validasi_lpj/<?php echo $d['kode']; ?>" class="btn btn-primary btn-sm col-1"><i class="fa fa-check-circle"></i> Validasi </a>

                    <a href="<?php echo base_url(); ?>lpj/aksi_tolak_validasi_lpj/<?php echo $d['kode']; ?>" class="btn btn-danger btn-sm col-1"><i class="fa fa-times-circle"></i> Tolak </a>
                    <br>
                </div>


                <br>
              <?php } ?>
              <!-- /////detail kegiatan///// -->
              <!-- //////data kegiatan///////// -->
              <div class="row">
                <div class="col-12">
                  <div class="card">
                    <div class="card-header">
                      <h4>Detail Kegiatan</h4>
                    </div>
                    <div class="card-body">
                      <form action="<?= base_url('unit/aksi_edit_penggunanaan/' . $detail_keg->nama_kegiatan) ?>" method="POST" enctype="multipart/form-data">
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Nama Kegiatan </label>
                          <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" value="<?= $detail_keg->nama_kegiatan ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Penanggungjawab Kegiatan </label>
                          <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" value="<?= $detail_keg->penanggungjawab ?>" readonly>
                          </div>
                        </div>
                        <div class="form-group row mb-4">
                          <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Tanggal Kegiatan </label>
                          <div class="col-sm-12 col-md-7">
                            <input type="text" class="form-control" value="<?= $detail_keg->tgl_kegiatan ?>" readonly>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                </div>
              </div>
              <!-- ////end detail kegiatan//// -->
              <!-- ///////////////////tabel data penggunaan ////////////// -->
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped" id="test">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Id RAB</th>
                        <th>Kode</th>
                        <th>Rincian</th>
                        <th>Volume</th>
                        <th>Satuan</th>
                        <th>Jumlah</th>
                        <th>Satuan </th>
                        <th>Total </th>
                        <th>Satuan Ukur </th>
                        <th>Biaya Satuan </th>
                        <th>Total Biaya</th>
                        <!-- penggunaan anggaran -->
                        <th>Biaya yang digunakan</th>
                        <th>Sisa</th>
                        <th>Bukti</th>
                        <th>Komentar</th>
                        <th>Aksi</th>
                      </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($tb_rab_penggunaan as $users) : ?>
                      <tbody>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['id_rab']; ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['rincianbiaya'] ?></td>
                          <td>Rp. <?= $users['volume'] ?></td>
                          <td><?= $users['satuan'] ?></td>
                          <td><?= $users['jumlah'] ?></td>
                          <td><?= $users['satuandua'] ?></td>
                          <td><?= $users['total'] ?></td>
                          <td><?= $users['satukur'] ?></td>
                          <td><?= $users['biaya_satuan'] ?></td>
                          <td><?= $users['total_biaya'] ?></td>
                          <!-- penggunaan anggaran -->
                          <td>
                            <?php
                            if ($users['biaya'] == 0) {
                              echo "Belum diisi biaya yang digunakan";
                            } else {
                              echo $users['biaya'];
                            } ?></td>

                          <td>
                            <?php
                            if ($users['sisa'] == null) {
                              echo "Belum diisi sisa yang digunakan";
                            } else {
                              echo $users['sisa'];
                            } ?></td>
                          <td>
                            <?php
                            if ($users['bukti'] == '') {
                              echo "Belum diisi bukti";
                            } else { ?>
                              <a href="<?= base_url('upload/bukti/' . $users['bukti']); ?>">Lihat
                              <?php } ?>
                          </td>
                          <td>
                            <?php
                            if ($users['komentar'] == null) {
                              echo "Belum ada komentar";
                            } else {
                              echo $users['komentar'];
                            }
                            ?>
                          </td>
                          <td>
                            <!-- ambil id data -->
                            <?php
                            $id_params = $this->session->userdata('id_params');
                            ?>
                            <a href="<?php echo base_url(); ?>lpj/lihat_data_rab_penggunaan/<?php echo $users['id_rab'] . '/' . $users['kode'] ?>" class="btn btn-primary"> <i class="fas fa-eye"></i> Lihat</a>
                          </td>

                        </tr>
                      </tbody>
                    <?php endforeach; ?>
                  </table>

                  <div class="card-footer bg-whitesmoke">
                    Politeknik Negeri Subang 2022
                  </div>
                </div>
              </div>
  </section>
</div>