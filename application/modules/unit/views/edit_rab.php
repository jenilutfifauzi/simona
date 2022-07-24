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
              <form action="<?= base_url('unit/aksi_edit_rab/'.$d['id']) ?>" method="POST">
                        <div class="row g-2">
                            <div class="col-md-6 col-sm-12">
                                
                                <div class="form-group">
                                    <label for="">Kode</label>
                                    <input type="text" name="kode" id="kode" class="form-control" value="<?= $d['kode']; ?>" readonly>
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Rincian Komponen Biaya</label>
                                    <input type="text" name="rincian" id="rincian" class="form-control" value="<?= $d['rincian']; ?>">
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Volume</label>
                                    <input type="text" name="volume" id="volume" class="form-control" value="<?= $d['volume']; ?>">
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <input type="text" name="satuan" id="satuan" class="form-control" value="<?= $d['satuan']; ?>">
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Jumlah</label>
                                    <input type="text" name="jumlah" id="jumlah" class="form-control" value="<?= $d['jumlah']; ?>">
                                    <div class="invalid-feedback" ></div>
                                </div>
                            </div>
                            <div class="col-md-6 col-sm-12">
                            
                                <div class="form-group">
                                    <label for="">Satuan</label>
                                    <input type="text" name="satuan_jml" id="satuan_jml" class="form-control" value="<?= $d['satuan_jml']; ?>">
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan ukur</label>
                                    <input type="text" name="satuan_ukur" id="satuan_ukur" class="form-control" value="<?= $d['satuan_ukur']; ?>">
                                    <div class="invalid-feedback" ></div>
                                </div>
                                <div class="form-group">
                                    <label for="">Satuan biaya(RP)</label>
                                    <input type="text" name="biaya_satuan" id="biaya_satuan" class="form-control" value="<?= $d['biaya_satuan']; ?>">
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