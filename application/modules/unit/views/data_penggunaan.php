<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Pengunaan anggaran</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('unit/aksi_data_penggunaan') ?>" class="needs-validation" enctype="multipart/form-data">



          <div class="form-group row">
            <label for="inputKode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode" name="kode" value="<?= $kode_kom ?>" readonly>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Penggunaan Anggaran</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="penggunaan_anggaran" name="penggunaan_anggaran">
            </div>
          </div>

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Biaya yang digunakan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="biaya" name="biaya">
            </div>
          </div>

          <div class="form-group row">
            <label class="col-sm-2 col-form-label">Upload Bukti</label>
            <div class="col-sm-10">
              <input type="file" name="berkas" class="form-control">
            </div>
          </div>



          <button type="submit" class="btn btn-primary">Simpan</button>
        </form>

      </div>
      <div class="modal-footer">
        <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button> -->
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
      <h2 class="section-title">&nbsp;</h2>
      <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
      <div class="card">
        <div class="card-body">

          <?= $this->session->flashdata('message'); ?>
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
                           
                            
                            <td><?= $users['biaya'] ?></td>
                            <td>
                              <img src="<?= base_url('upload/bukti/') . $users['bukti'] ?>" height="100px" width="200px;">
                            </td>
                            <td><?= $users['komentar'] ?></td>
                            <td>
                              <button type="button" class="btn btn-primary col-1" data-toggle="modal" data-target="#exampleModal" ><i class="fas fa-plus"></i>
                              </button>
                            </td>

                          </tr>
                        </tbody>
                      <?php endforeach; ?>
                    </table>



                    <div class="card-header">
                      <h4>Pengunaan Anggaran</h4>
                      <div class="card-header-form">

                      </div>
                    </div>
                    <button type="button" class="btn btn-primary col-1" data-toggle="modal" data-target="#exampleModal">
                      Tambah
                    </button><br>
                    <div class="card-body p-0">
                      <div class="table-responsive">
                        <table class="table table-striped" id="test">
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
                                <td>Rp. <?= $users['biaya'] ?></td>
                                <td>
                                  <img src="<?= base_url('upload/bukti/') . $users['bukti'] ?>" height="100px" width="200px;">

                                </td>
                                <td><?= $users['komentar'] ?></td>

                                <!-- <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Edit
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                            </button>
                          </td> -->

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
</div>