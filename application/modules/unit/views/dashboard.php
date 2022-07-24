
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
              
              <?= $this->session->flashdata('message');?>
              <div class="row">
              <div class="col-12">
                <div class="card">
                      <div class="alert alert-primary alert-has-icon">
                      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                      <div class="alert-body">
                        <div class="alert-title">Spirit!!</div>
                        <?php echo 'Selamat Datang di '.$title.'!'; ?>
                      </div>
                </div>

                <!-- Notif peringatan -->
                <?php 
                $hasil= $this->db->where('status',true)->get('kegiatan');
                if ($hasil->num_rows() > 0){
                  
                  echo '<div class="card">
                  <div class="alert alert-warning alert-has-icon">
                  <div class="alert-icon"><i class="fas fa-exclamation-triangle"></i></div>
                  <div class="alert-body">';
                }else{
                  return [];
                }
                
                foreach($nama_kegiatan as $data_keg) {
                        echo '<div class="alert-title">Peringatan!!</div>';
                        echo "Kegiatan <b>".$data_keg['nama_kegiatan']."</b> telah melewati <b>batas waktu</b>. Segera buat <b>TOR dan RAB</b> dalam waktu 7 hari kedepan"; ?>

                          <?php if ($data_keg['peringatan_ppspm'] == 1 and $data_keg['peringatan_ppk'] == 1){
                          echo '<div class="badges">
                                <span class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> from PPK, PPSPM</span>';  
                          } ?>
                          <?php if ($data_keg['peringatan_ppspm'] == 1 and $data_keg['peringatan_ppk'] == 0) {
                          echo '<div class="badges">
                                <span class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> from PPSPM</span>'; 
                          } ?>

                          <?php if ($data_keg['peringatan_ppk'] == 1 and $data_keg['peringatan_ppspm'] == 0) {
                          echo '<div class="badges">
                                <span class="badge badge-danger"><i class="fas fa-exclamation-triangle"></i> from PPK</span>'; 
                          } ?>
               <?php } ?>
            </div>
        </div>
    </section>
</div>