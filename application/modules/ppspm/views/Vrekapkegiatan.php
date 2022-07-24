
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
              <!-- notif -->
              
              <?= $this->session->flashdata('message');?>
               
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
                      <table class="table table-striped table-bordered" id="test">
                      <thead>  
                      <tr>
                          <th>No</th>
                          <th>Nama Kegiatan</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Countdown</th>
                          <th>Keterangan</th>
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
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td><?php 
                          date_default_timezone_set('Asia/Jakarta');
                          $tglSekarang = date('Y-m-d');
                          if($users['status'] == 1){
                          echo 'Warning ';
                          $rem = strtotime($users['tgl']) - time();
                          $day = floor($rem/86400);
                          $hr = floor(($rem % 86400)/3600);
                          $min = floor(($rem % 3600)/60);
                          $sec = floor($rem % 60);
                         if ($day) echo "$day Hari ";
                         if ($hr) echo "$hr Jam ";
                         if ($min) echo "$min Menit ";
                         if ($sec) echo "$sec Detik !!!";
                          }elseif ($users['tgl'] <= $tglSekarang && $users['status'] ==2 ){
                        echo "Terlewat ";
                          
                         $rem = strtotime($users['tgl']) - time();
                         $day = floor($rem/86400);
                         $hr = floor(($rem % 86400)/3600);
                         $min = floor(($rem % 3600)/60);
                         $sec = floor($rem % 60);
                        if ($day) echo "$day Hari ";
                        if ($hr) echo "$hr Jam ";
                        if ($min) echo "$min Menit ";
                        if ($sec) echo "$sec Detik ";
                        echo "!!!";
                          }elseif ($users['tgl'] >= $tglSekarang && $users['status'] ==2 ){
                             $rem = strtotime($users['tgl']) - time();
                             $day = floor($rem/86400);
                             $hr = floor(($rem % 86400)/3600);
                             $min = floor(($rem % 3600)/60);
                             $sec = floor($rem % 60);
                            if ($day) echo "$day Hari ";
                            if ($hr) echo "$hr Jam ";
                            if ($min) echo "$min Menit ";
                            if ($sec) echo "$sec Detik ";
                            echo "Tersisa...";
                          }elseif($users['status'] == 3){
                            echo $users['tgl'];
                          }
                          
                          ?></td>

                          <td>
                            <?php if($users['peringatan_ppk'] == 1 ) { ?>
                              <div class="badges">
                              <span class="badge badge-danger">SP1(PPK)</span>
                            <?php } ?>

                            <?php if($users['peringatan_ppspm'] == 1 ) { ?>
                              <div class="badges">
                              <span class="badge badge-danger">SP1(PPSPM)</span>
                            <?php } ?>

                          </td>


                          <td><?php if ($users['status'] == 1) { ?>
                                    <div class="badges">
                                    <span class="badge badge-danger"> Terlewat</span>
                              <?php } ?>

                              <?php if ($users['status'] == 2) { ?>
                                    <div class="badges">
                                    <span class="badge badge-warning">Terdekat</span>
                              <?php } ?>

                              <?php if ($users['status'] == 3) { ?>
                                    <div class="badges">
                                    <span class="badge badge-success">Terlaksana</span>
                              <?php } ?>
                          </td>
                          <td>
                            <?php 
                            if ($users['tgl'] <= $tglSekarang && $users['status'] ==2 ){?>
                            <a href="<?php echo base_url(); ?>ppspm/kirim_peringatan/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Kirim Peringatan </a>

                            <?php }elseif ($users['peringatan_ppk'] ==1 and $users['peringatan_ppspm'] ==0) {  ?>
                            <a href="<?php echo base_url(); ?>ppspm/kirim_peringatan/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-success btn-sm"><i class="fas fa-paper-plane"></i> Kirim Peringatan </a>
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