
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
                      <div class="alert alert-primary alert-has-icon">
                      <div class="alert-icon"><i class="far fa-lightbulb"></i></div>
                      <div class="alert-body">
                        <div class="alert-title">Spirit!!</div>
                        <?php echo 'Waktu kadaluarsa Session : <h1>'.floor($durasi->time/60000).' Menit </h1> '; ?>
                      </div>
                      <div class="col-12 col-md-6 col-lg-3">
                    <div class="card-header-form">
                    </div>
                  </div>

                  <!-- button -->

                </div>
                      
                <?php echo anchor('admin/admin/edit_session/1'
                  ,'<div class="btn btn-danger btn-sm"<i class="fa fa-edit">Ubah Waktu</i></div>') ?>
                  
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