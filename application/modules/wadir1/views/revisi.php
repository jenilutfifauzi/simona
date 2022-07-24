
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
                      
                      <?php foreach($data_kegiatan as $d) { ?>
                        <form action="<?php echo base_url();?>wadir1/aksi_revisi/<?php echo $d['kode'];?>" method="POST" enctype="multipart/form-data">

                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" value="<?php echo $d['kode_subkomponen']; ?>" name="kode" readonly>
                            </div>
                            <div class="form-group">
                                <label>Id Uit</label>
                                <input type="text" class="form-control" value="<?php echo $d['id_unit']; ?>" name="id_unit" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input type="text" class="form-control" value="<?php echo $d['nama_kegiatan']; ?>" name="nama_kegiatan" readonly>
                            </div>
                            <label>Komentar</label>
                            <textarea type="text" class="form-control p-4 " name="komentar"></textarea>


                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                      <?php } ?>
                      <div class="col-12 col-md-6 col-lg-3">
                    <div class="card-header-form">
          </div>
        </section>
      </div>