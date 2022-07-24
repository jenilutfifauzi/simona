
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
                    <h4><?= $title ?></h4>
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
                   
                    <form action="<?php echo base_url();?>perencanaan/aksi_uploadrka" method="POST" enctype="multipart/form-data">
                    <div class="form-group">
                        <label>Upload Berkas RKA</label>
                        <input type="file" name="berkas" class="form-control col-3" accept=".pdf">
                    </div>
                    <div class="form-group">
                        <label>Tahun</label>
                        <input type="date" name="tahun" class="form-control col-3">
                    </div>
                    <div class="form-group">
                        <label>Keterangan</label>
                        <input type="text" name="keterangan" class="form-control col-3">
                    </div>
                    <br>
                    <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>                  
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
    <script>
	var minutesToAdd=<?php echo $durasi->durasi; ?>;
	var currentDate = new Date();
	var countDownDate = new Date(currentDate.getTime() + minutesToAdd*60000);

	var x = setInterval(function() {

	  var now = new Date().getTime();
	    
	  var distance = countDownDate - now;
	    
	  var days = Math.floor(distance / (1000 * 60 * 60 * 24));
	  var hours = Math.floor((distance % (1000 * 60 * 60 * 24)) / (1000 * 60 * 60));
	  var minutes = Math.floor((distance % (1000 * 60 * 60)) / (1000 * 60));
	  var seconds = Math.floor((distance % (1000 * 60)) / 1000);
	    
	  document.getElementById("waktu").innerHTML = minutes + ":" + seconds;
	    
	  if (distance < 0) {
	    clearInterval(x);
	    document.getElementById("waktu").innerHTML = "00:00";
	  }
	}, 1000);
  </script>