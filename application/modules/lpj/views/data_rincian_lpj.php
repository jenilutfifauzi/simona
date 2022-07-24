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
  <?php foreach($data_rincian_lpj as $u){ ?>
    <form method="POST" action="<?= base_url('pencairan/update_validasi_spp') ?>" class="needs-validation" >
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
                    
                    <?php foreach($data_lpj_id as $d) { ?>
                  
                    
                    <a href="<?php echo base_url(); ?>lpj/aksi_validasi_lpj/<?php echo $d['kode']; ?>" class="btn btn-primary btn-sm col-1"><i class="fa fa-check-circle"></i> Validasi </a>

                    <a href="<?php echo base_url(); ?>lpj/aksi_tolak_validasi_lpj/<?php echo $d['kode']; ?>" class="btn btn-danger btn-sm col-1"><i class="fa fa-times-circle"></i> Tolak </a>
                    <br>
                  </div>
                    

                  <br> 
                  <?php } ?>

                  
                  <br><div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped display nowrap" id="test">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Id Unit</th>
                          <th>Kode</th>
                          <th>Penggunaan Anggaran</th>
                          <th>Biaya</th>
                          <th>Komentar</th>
                          <th>Bukti</th>
                        </tr>
                      </thead>
                      
                        <?php 
                        $no=1;
	                    foreach ($data_rincian_lpj as $users) : ?>
                      <tbody>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['id_unit'] ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['penggunaan_anggaran'] ?></td>
                          <td><?= $users['biaya'] ?></td>
                          <td><?= $users['komentar'] ?></td>
                          <td>
                            <a href="<?php echo base_url(); ?>lpj/lihat/<?php echo $users['bukti']; ?>" class="btn btn-primary btn-sm"><i class="fa fa-eye"></i> lihat </a>
                          </td>
                          <!-- <td>
                            <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Edit
                            </button> -->

                            
                          <!-- </td>  -->

                          <!-- <td><?php echo anchor('lpj/rincian_lpj/'.$users['kode'],'<div class="btn btn-primary btn-sm"<i class="fa fa-edit"> Validasi</i></div>') ?>
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