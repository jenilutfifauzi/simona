<!-- akhir modal -->
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
                    <h4>Edit Timeline</h4>
                    <div class="card-header-form">
                      <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form>
                    </div>
                  </div>
                    <?php 
                    foreach($data_timeline as $users) { ?>
                    <form action="<?php echo base_url('unit/aksi_edit_timeline/'.$users['id']);?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control" value="<?php echo $users['kode'] ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $users['nama_kegiatan']; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Tanggal Kegiatan</label>
                        <input type="date" name="tgl" class="form-control" value="<?php echo $users['tgl']; ?>"">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>              
                    <?php } 
                    ?>
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
    
      <!--menghitung mundur waktu selama 10 menit, ganti value minutesToAdd utuk mengubah waktu-->
    