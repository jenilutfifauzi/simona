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
                      <table class="table table-striped" id="test">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Id Unit</th>
                          <th>Kode</th>
                          <th>Nama Kegiatan</th>
                          <th>Penanggung Jawab</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <?php 
                        $no=1;
	                    foreach ($user as $users) : ?>
                        <tbody>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['id_unit'] ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['penanggungjawab'] ?></td>
                          <td><?= $users['tgl_kegiatan'] ?></td>
                          <td><?php if
                           ($users['status'] == 'no' ) { ?>
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
                          <td>
                          <?php if (($users['status'] == '1' or $users['status'] == '2') and $users['terima_uang'] == '1' ) { ?>
                          <a href="<?php echo base_url(); ?>unit/aksi_terima_uang/<?php echo $users['kode']; ?>" class="btn btn-primary btn-sm" onclick="return confirm('Apakah uang sudah diterima?')"><i class="fas fa-check-circle"></i> Terima</a>
                          <?php } ?>

                          <?php if ($users['status'] == '3') { ?>
                          <a href="#" class="btn btn-success btn-sm"><i class="fas fa-check"></i> Diterima</a>
                          <?php } ?>
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