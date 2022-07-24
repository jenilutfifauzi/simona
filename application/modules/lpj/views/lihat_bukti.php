
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
                    <h4>Bukti</h4>
                  </div>
                  <br><td><button type="button" class="btn btn-primary col-1" onclick="history.back(-1)">
                          Kembali
                  </button></td><br> 
                  
                    <div class="card-header-form">
                    <div class="table-responsive">
                      <img src="<?= base_url('upload/bukti/').$gambar?>" class="img-fluid rounded">
                      </div>
                    </div>
                    <!-- komentar -->
                      
                      <form action="<?= base_url('lpj/aksi_revisi_datadukung/'.$gambar) ?>" method="POST" enctype="multipart/form-data">
                        <div class="row g-2">
                            <div class="col-md-6 col-sm-12">
                                
                                <div class="form-group"><br>
                                    <label for="">Komentar</label>
                                    <textarea type="text" name="komentar" id="kode" class="form-control"></textarea>
                                    <div class="invalid-feedback" ></div>
                                </div>
                                
                           
                                <button type="submit" id="btn-tambah" class="form-group btn btn-primary btn-block">Simpan</button>
                            </div>

                          </div>
                          </form>



                    <div class="card-body p-0">
                  
                </div>
              
              <div class="card-footer bg-whitesmoke">
                Politeknik Negeri Subang 2022
              </div>
            </div>
          </div>
        </section>
      </div>