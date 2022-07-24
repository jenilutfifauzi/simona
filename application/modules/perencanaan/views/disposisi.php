
<div class="main-content">
        <section class="section">
          <div class="section-header">
          <div class="col-12">
            <h1><?= $title; ?></h1><br> 
          </div>
          </div>
         
          <div class="section-body">
            <h2 class="section-title">&nbsp;</h2>
            <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
              <div class="card-body">
              <?= $this->session->flashdata('message');?>        
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Disposisi</h4>
                  </div>
                  <div class="card-header-form">    
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="test" class="table table-striped table-bordered display nowrap"  style="width:100%">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Perihal</th>
                          <th>Intruksi</th>
                          <th>Status</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no=1;
	                    foreach ($data_disposisi as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td><?= $users['perihal'] ?></td>
                          <td><?= $users['intruksi'] ?></td>
                          <td>
                          <?php if ($users['status'] == 0 ){ ?>
                          <div class="badges">
                          <span class="badge badge-warning"><i class="fa fa-loading"></i> Menunggu</span>
                          <?php }else {?>
                            <div class="badges">
                            <span class="badge badge-success"><i class="fa fa-loading"></i> Sudah diproses</span>
                          <?php } ?>
                          </td>
                          <td>
                          <a href="<?= base_url('perencanaan/aksi_proses_disposisi/').$users['id']  ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Proses</a>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- Button trigger modal -->
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

 
     

