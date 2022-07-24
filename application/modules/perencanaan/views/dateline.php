<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah RAB</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">

    <form method="POST" action="<?= base_url('perencanaan/aksi_tambah_perintah_dateline') ?>" class="needs-validation" >
      
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control"  name="kode">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Periode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" name="periode">
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
                    <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Tambah
                      </button> -->
                      <table class="table table-striped table-bordered" id="tabelp2">
                      <thead>  
                      <tr>
                          <th>No</th>
                          <th>Nama Kegiatan</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Countdown</th>
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
                          echo 'Warning';
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
                          <a href="<?php echo base_url(); ?>perencanaan/rab_datadukung_keg_baru/<?php echo $users['kode']; ?>" class="btn btn-primary "> <i class="fas fa-eye"></i> Lihat</a>
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