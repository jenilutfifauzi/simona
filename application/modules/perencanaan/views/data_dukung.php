<!-- Modal -->
<div class="modal fade" id="modal_lihat" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Dokumen Dukung</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">
    <!-- isi modal -->
    <img src="<?php echo site_url('upload/datadukung/'.$data_gambar->dokumen) ?>" width="100%" height="100%" /></div>
  </div>
  <div class="modal-footer">
  <!-- <button type="submit" class="btn btn-secondary" data-dismiss="modal">Close</button>
  <button type="button" class="btn btn-primary">Save changes</button> -->
  </div>
  </div>
  </div>
</div>
<!-- akhir modal -->


<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah RAB</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">

    <form method="POST" action="<?= base_url('perencanaan/aksi_tambah_data_dukung') ?>" class="needs-validation" enctype="multipart/form-data">
      <div class="form-group row">
        <label for="inputKode" class="col-sm-2 col-form-label">Kode
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kode" name="kode" value="<?php
           echo $data_dukung_kode->kode;?>" 
          readonly>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="nama_kegiatan" class="col-sm-2 col-form-label">Nama Kegiatan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" value="<?php
           echo $data_dukung_kode->nama_kegiatan;?>" readonly>
        </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Upload Berkas Data Dukung</label>
          <div class="col-sm-10">
            <input type="file" name="berkas" class="form-control">
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
            <h1>Kelola Data Dukung</h1><br> 
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
                    <h4>Data Dukung </h4>
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
                          <th>Id</th>
                          <th>Kode</th>
                          <th>Nama Kegiatan</th>
                          <th>Gambar</th>
                        </tr>
                        <?php 
                        $no=1;
	                    foreach ($data_dukung as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['id'] ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td>
                          <!-- <?php echo anchor('admin/admin/editotp/1'
                            ,'<div class="btn btn-danger btn-sm"<i class="fa fa-edit">Ubah Waktu OTP</i></div>') ?> --> 
                            
                          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_lihat">
                          <i class="fas fa-eye"></i> -->

                          <img src="<?= site_url('upload/datadukung/'.$users['dokumen']) ?>" width="50%" height="100%" />
                      </button></td>
                          <!-- <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Edit
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                            </button>
                          </td> -->

                          <!-- <td>
                          <a href="<?php echo base_url(); ?>admin/edit/<?php echo $users['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          <a href="<?php echo base_url(); ?>admin/delete/<?php echo $users['id']; ?>" class="btn btn-danger "> <i class="fas fa-trash"></i></a>
                          </td> -->
                        </tr>
                        <?php endforeach; ?>
                      </table>
                      <!-- Button trigger modal -->
                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Tambah
                      </button></td>                        
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