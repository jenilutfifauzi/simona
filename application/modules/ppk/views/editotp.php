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
                  
                <?php foreach($otp as $dataotp) { ?>
                    <form action="<?php echo base_url().'ppk/update_otp'; ?>" method="post">

                    <div class="form-group">
                        <label>Kode PIN</label>
                        <input type="text" name="otp" class="form-control" value="<?php echo $dataotp->otp; ?>" readonly>
                    </div>
                    

                    <button type="submit" class="btn btn-info fas fa-undo">Refresh</button>
                    
                    <a class="btn btn-primary " href="<?php echo base_url('ppk/ppk/simpanpin') ?>">Simpan</a>
                    
                    </form> 
                                  
                    <?php } ?>

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