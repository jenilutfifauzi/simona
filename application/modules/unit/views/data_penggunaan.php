<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="col-12">
        <h1><?= $title ?></h1><br>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title">&nbsp;</h2>
      <div class="card">
        <div class="card-body">

          <?= $this->session->flashdata('message'); ?>
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
          <!-- end -->
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Data Anggaran</h4>
                  <div class="card-header-form">

                  </div>
                </div>
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


                                <a href="<?php echo base_url(); ?>unit/tambah_data_penggunaan/<?php echo $users['id_rab'].'/'.$id_params; ?>" class="btn btn-warning"> <i class="fas fa-edit"></i> Edit</a>
                            </td>

                          </tr>
                        </tbody>
                      <?php endforeach; ?>
                    </table>
                    <a href="<?php echo base_url(); ?>unit/data_kegiatan" class="btn btn-primary"> <i class="fas fa-undo"></i> Kembali ke daftar kegiatan</a>

                    <!-- ////////////////////////////////////////penggunaan anggaran /////////// -->

                    <!-- <div class="card-header">
                      <h4>Pengunaan Anggaran</h4>
                      <div class="card-header-form">

                      </div>
                    </div>
                    <button type="button" class="btn btn-primary col-1" data-toggle="modal" data-target="#exampleModal">
                      Tambah
                    </button><br>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped" id="tabel2">
                          <thead>
                            <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Penggunaan Anggaran</th>
                              <th>Biaya yang digunakan</th>
                              <th>Bukti</th>
                              <th>Komentar</th>
                              <th>Aksi</th>
                            </tr>
                          </thead>
                          <?php

                          $no = 1;
                          foreach ($d_lpj as $users) : ?>
                            <tbody>
                              <tr>
                                <td><?= $no++ ?></td>
                                <td><?= $users['kode'] ?></td>
                                <td><?= $users['penggunaan_anggaran'] ?></td>
                                <td>Rp. <?php
                                        echo $users['biaya'];

                                        ?></td>
                                <td>
                                  <img src="<?= base_url('upload/bukti/' . $users['bukti']); ?>" height="100px" width="200px;">
                                </td>
                                <td><?= $users['komentar'] ?></td>
                                <td>
                                  <a href="<?php echo base_url(); ?>unit/edit_rab_penggunaan/<?php echo $users['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                                  <a href="<?php echo base_url(); ?>unit/delete_data_penggunaan/<?php echo $users['id']; ?>" class="btn btn-danger "> <i class="fas fa-trash"></i></a>
                                </td>

                              </tr>
                            </tbody>
                          <?php endforeach; ?>
                        </table>
                        <!-- Button trigger modal -->
                        <!-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Tambah
                      </button></td>                        
                    </div> -->
                      </div>
                    </div>
                  </div>
                </div>
              </div>

              <div class="card-footer bg-whitesmoke">
                Politeknik Negeri Subang 2022
              </div>
            </div>
          </div>
  </section>