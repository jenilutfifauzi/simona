<!-- Modal -->
<div class="modal fade " id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Modal title</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-dialog modal-800" >
      <div class="modal-body" width="600" height="400">
          <?php foreach ($data_up_rka as $users) : ?>
          <embed type="application/pdf" src="<?= base_url('upload/rka/').$users['dokumen'] ?>" width="600" height="400"></embed>
          <?php endforeach; ?>
      </div>
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary">Save changes</button>
      </div>
    </div>
  </div>
</div>

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
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Data RKA</h4>
                    <div class="card-header-form">
                      </div>
                    </div>
                    <div class="card-body p-0">            
                      <?= $this->session->flashdata('message');?>
                      <div class="table-responsive">
                        <a href="<?php echo base_url(); ?>perencanaan/form_uploadrka" class="btn btn-success "> <i class="fas fa-upload"></i> Upload RKA</a>
                        <table class="table table-striped">
                          <tr>
                          <th>No</th>
                          <th>Keterangan</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        <?php 
                        $no=1;
	                    foreach ($data_up_rka as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['keterangan'] ?></td>
                          <td><?php if($users['status']==0) { echo "Tidak Aktif";}else {echo "Aktif";}  ?></td>
                          <td>
                            <a href="<?php echo base_url('perencanaan/detail_uploadrka/').$users['dokumen']; ?>" class="btn btn-primary"><i class="fas fa-eye"></i> Lihat</a>
                            <a href="<?php echo base_url('perencanaan/aksi_aktif_uploadrka/').$users['dokumen']; ?>" class="btn btn-warning"><i class="fas fa-eye"></i> Aktivasi</a>
                            <a href="<?php echo base_url('perencanaan/aksi_nonaktif_uploadrka/').$users['dokumen']; ?>" class="btn btn-danger"><i class="fas fa-eye"></i> Non Aktif</a>
                          </td>
                        </tr>
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