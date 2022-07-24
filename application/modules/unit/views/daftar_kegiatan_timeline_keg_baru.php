<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah user</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">
    <form method="POST" action="<?= base_url('perencanaan/tambah_komponen') ?>" class="needs-validation" >
      <div class="form-group row">
        <label for="inputKode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kode" name="kode">
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Komponen</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="komponen" name="komponen">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Volume</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="volume" name="volume">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Harga Satuan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="hargasatuan" name="hargasatuan">
        </div>
      </div>


      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">SD/CP</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="sd_cp" name="sd_cp">
        </div>
      </div>

      <button type="submit" class="btn btn-primary">Simpan</button>
    </form>
  </div>
  <div class="modal-footer">
  <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button> -->
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
              
              <?= $this->session->flashdata('message');?>
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar Kegiatan</h4>
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
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Kode</th>
                          <th>Nama Kegiatan</th>
                          <th>Biaya</th>
                          <th>Tanggal pelaksanaan</th>
                          <th>Aksi</th>
                        </tr>
                        <?php 
                       
                        $no=1;
	                    foreach ($user as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['jml_biaya'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          
                          <!-- <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Edit
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                            </button>
                          </td> -->

                          <td>
                          <?php if ($users['submit'] == 0){ ?>
                          <a href="<?php echo base_url(); ?>unit/edit_timeline_keg_baru/<?php echo $users['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                          <?php }else { ?>
                          <div class="badges">
                          <span class="badge badge-success"><i class="fa fa-check"></i> Sudah di submit</span>
                          <?php } ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                      <!-- Button trigger modal -->
                      <!-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Tambah
                      </button></td>                        
                    </div> -->
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