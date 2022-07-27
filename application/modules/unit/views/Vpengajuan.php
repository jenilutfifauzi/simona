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
        <?php foreach ($data_pengajuan as $u) { ?>
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
                  <h4>Daftar Kegiatan</h4>
                  <div class="card-header-form">

                  </div>

                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped display nowrap" id="test">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id Unit</th>
                          <th>Kode</th>
                          <th>Nama Kegiatan</th>
                          <th>Penanggung Jawab</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>

                      <?php

                      $no = 1;
                      foreach ($user as $users) : ?>
                        <tbody>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $users['id_unit'] ?></td>
                            <td><?= $users['kode'] ?></td>
                            <td><?= $users['nama_kegiatan'] ?></td>
                            <td><?= $users['penanggungjawab'] ?></td>
                            <td><?= $users['tgl_kegiatan'] ?></td>
                            <td>
                              <?php if ($users['status_lpj'] == '0') { ?>
                                <!-- <?php echo anchor('unit/penggunaan_anggaran/' . $users['kode'], '<div class="btn btn-primary btn-sm"<i class="fa fa-edit"> Unggah</i></div>') ?> -->

                                <a href="<?php echo base_url(); ?>unit/penggunaan_anggaran/<?php echo $users['kode']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Unggah</a>


                                <a href="<?php echo base_url(); ?>unit/submit_penggunaan_anggaran/<?php echo $users['kode']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-paper-plane"></i> Submit</a>

                              <?php } elseif ($users['status_lpj'] == '1') { ?>
                                <div class="badges">
                                  <span class="badge badge-success"><i class="fa fa-check"></i> Sudah di submit</span>
                                <?php } elseif ($users['status_lpj'] == '10') { ?>
                                  <div class="badges">
                                    <span class="btn btn-danger btn-sm"><i class="fas fa-times-circle"></i> Ditolak</span>


                                    <a href="<?php echo base_url(); ?>unit/penggunaan_anggaran/<?php echo $users['kode']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-upload"></i> Perbaiki</a>


                                    <a href="<?php echo base_url(); ?>unit/submit_penggunaan_anggaran/<?php echo $users['kode']; ?>" class="btn btn-success btn-sm" onclick="return confirm('Apakah anda yakin?')"><i class="fa fa-paper-plane"></i> Submit</a>
                                  <?php } ?>
                            </td>
                          </tr>
                        </tbody>
                      <?php endforeach;

                      ?>

                    </table>

                  </div>
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