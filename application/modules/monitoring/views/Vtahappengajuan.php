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
                  <h4>Status Pencairan</h4>
                  <div class="card-header-form">
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped" id="tabel2">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Unit</th>
                          <th>Nama Kegiatan</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $users) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $users['name'] ?></td>
                            <td><?= $users['nama_kegiatan'] ?></td>
                            <td><?= $users['tgl_kegiatan'] ?></td>
                            <td><?php if ($users['status'] == 'no') { ?>
                                <div class="badges">
                                  <span class="badge badge-warning">WAITING</span>
                                <?php } ?>
                                <?php if ($users['status'] == 'spp') { ?>
                                  <div class="badges">
                                    <span class="badge badge-primary">SPP</span>
                                  <?php } ?>
                                  <?php if ($users['status'] == 'spm') { ?>
                                    <div class="badges">
                                      <span class="badge badge-info">SPM</span>
                                    <?php } ?>
                                    <?php if ($users['status'] == 'sp2d') { ?>
                                      <div class="badges">
                                        <span class="badge badge-success">SP2D</span>
                                      <?php } ?>

                                      <?php if ($users['status'] == '1') { ?>
                                        <div class="badges">
                                          <span class="badge badge-success">Uang siap diambil ke SATKER</span>
                                        <?php } ?>
                                        <?php if ($users['status'] == '2') { ?>
                                          <div class="badges">
                                            <span class="badge badge-success">Uang sudah dikirim ke rekening usulan</span>
                                          <?php } ?>
                                          <?php if ($users['status'] == '3') { ?>
                                            <div class="badges">
                                              <span class="badge badge-success">Uang sudah diterima</span>
                                            <?php } ?>
                                            <?php if ($users['status'] == '4') { ?>
                                              <div class="badges">
                                                <span class="badge badge-success">Selesai</span>
                                              <?php } ?>


                            </td>
                          <?php endforeach; ?>
                          </tr>
                      </tbody>
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