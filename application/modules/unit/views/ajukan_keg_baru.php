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
                  <h4><?= $title; ?></h4>
                  <div class="card-header-form">
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped" id="tabel2">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Periode</th>
                          <th>Aksi</th>
                        </tr>
                      </thead>
                      <?php
                      $no = 1;
                      foreach ($user as $users) : ?>
                        <tbody>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $users['periode'] ?></td>
                            <td>
                              <a href="<?php echo base_url(); ?>unit/unggah_ajukan_keg_baru/<?= $users['kode'] ?>" class="btn btn-primary"><i class="fas fa-upload"></i> Unggah </a>
                              <!-- <a href="<?php echo base_url(); ?>admin/delete/<?php echo $users['id']; ?>" class="btn btn-danger "> <i class="fas fa-trash"></i></a>
                          </td> -->
                          </tr>
                        </tbody>
                      <?php endforeach; ?>
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