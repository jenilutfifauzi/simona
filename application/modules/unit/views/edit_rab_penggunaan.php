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
                  <?php foreach($data_rab as $d): ?>
              <form action="<?= base_url('unit/aksi_edit_rab_penggunanaan/'.$d['id']) ?>" method="POST" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-md-6 col-sm-12">
                                
                                <div class="form-group">
                                    <label for="">Kode</label>
                                    <input type="text" name="kode" id="kode" class="form-control" value="<?= $d['kode']; ?>" readonly>
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Penggunaan Anggaran</label>
                                    <input type="text" name="penggunaan_anggaran" id="penggunaan_anggaran" class="form-control" value="<?= $d['penggunaan_anggaran']; ?>" >
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Biaya</label>
                                    <input type="text" name="biaya" id="biaya" class="form-control" value="<?= $d['biaya']; ?>" >
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Bukti</label>
                                    <input type="file" name="berkas" id="berkas" class="form-control" >
                                    <div class="invalid-feedback" ></div>
                                </div>
                                
                                <button type="submit" id="btn-tambah" class="btn btn-primary btn-block">Simpan</button>
                            </div>

</div>
<?php endforeach; ?>
</form>

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