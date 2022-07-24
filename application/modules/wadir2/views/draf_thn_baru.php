

<div class="main-content">
        <section class="section">
          <div class="section-header">
          <div class="col-12">
            <h1><?= $title ?></h1><br> 
          </div>
          </div>
         
          <?= $this->session->flashdata('message');?>
          <div class="section-body">
            <h2 class="section-title">User</h2>
            <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
              <div class="card-body">
              
               
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar User</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="test">
                      <thead> 
                      <tr>
                          <th>No</th>
                          <th>Id</th>
                          <th>Komponen</th>
                          <th>Nama Kegiatan</th>
                          <th>Waktu Pelaksanaan</th>
                          <th>RAB</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                        <?php 
                        $no=1;
	                    foreach ($user as $users) : ?>
                      <tbody>
                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['id'] ?></td>
                          <td><?= $users['komponen'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td>
                            
                            <a href="<?php echo base_url(); ?>Wadir2/lihat_rab/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                          </td>
                          <td>

                          <?php if ($users['wadir2'] == 0) { ?>
                          <a href="<?php echo base_url(); ?>Wadir2/aksi_validasi_keg_baru/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i> Validasi</a>
                          

                          <a href="<?php echo base_url(); ?>Wadir2/revisi_keg_baru/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Revisi </a>
                          <?php }else { ?>
                          <a href="" class="btn btn-success btn-sm"><i class="fas fa-check"></i>Berhasil Divalidasi </a>
                          <?php } ?>
                          </td>
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