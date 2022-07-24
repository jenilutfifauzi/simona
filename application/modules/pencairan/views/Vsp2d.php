<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Validasi</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">
  <?php foreach($data_pengajuan as $u){ ?>
    <form method="POST" action="<?php echo base_url();?>pencairan/update_validasi_spp/<?php echo $u->id?>" class="needs-validation" >
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Id</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="status_spp" name="status_spp" placeholder="Status Spp" value="tervalidasi">
        <button type="submit" class="btn btn-primary"><?php echo $u->id ?></button>
        </div>
      </div>
    </form>
    <?php } ?>
  </div>
  <div class="modal-footer">
  <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button>
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
            <h2 class="section-title">&nbsp;</h2>
            <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
              <div class="card-body">
              
               
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <!-- <div class="card-header-form"> -->
                      <!-- <form>
                        <div class="input-group">
                          <input type="text" class="form-control" placeholder="Search">
                          <div class="input-group-btn">
                            <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                          </div>
                        </div>
                      </form> -->
                    </div>
                  </div>
                  <?php $id_data = $this->uri->segment(4); ?>
                    <?php foreach($data_pengajuan as $users) { ?>
                    <form action="<?php echo base_url();?>pencairan/tambah_sp2d/<?php echo $id_data?>" method="POST" enctype="multipart/form-data">

                    <div class="form-group">
                        <label>Kode</label>
                        <input type="text" name="kode" class="form-control" value="<?php echo $users->kode ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Nama Kegiatan</label>
                        <input type="text" name="nama_kegiatan" class="form-control" value="<?php echo $users->nama_kegiatan; ?>" readonly>
                    </div>

                    <div class="form-group">
                        <label>Upload Berkas SP2D</label>
                        <input type="file" name="berkas" class="form-control" accept=".pdf">
                    </div>

                    <div class="form-group">
                        <label>Keterangan kesiapan uang</label>
                        <select class="form-control" name="kesiapan_uang">
                          <option value="#">Pilih .. </option>
                          <option value="1">Uang siap diambil ke SATKER</option>
                          <option value="2">Uang sudah dikirim ke rekening usulan </option>
                        </select>
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