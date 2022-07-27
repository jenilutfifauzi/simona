<!-- Modal -->
<div class="modal fade" id="modaldatadukung" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Data Dukung</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">

    <form method="POST" action="<?= base_url('unit/aksi_tambah_data_dukung') ?>" class="needs-validation" enctype="multipart/form-data">
      <div class="form-group row">
        <!-- <label for="inputKode" class="col-sm-2 col-form-label">Kode
        </label> -->
        <div class="col-sm-10">
          <input type="hidden" class="form-control" id="kode" name="kode" value="<?php
           echo $kode_subkomponen;?>" 
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
        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="keterangan" name="keterangan" >
        </div>
      </div>

      <div class="form-group row">
          <label class="col-sm-2 col-form-label">Upload Berkas Data Dukung</label>
          <div class="col-sm-10">
            <input type="file" name="berkas" class="form-control" accept=".png,.jpg,.JPEG,.PNG">
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

    <form method="POST" action="<?= base_url('unit/aksi_tambah_rab') ?>" class="needs-validation" >
      <div class="form-group row">
        <!-- <label for="inputKode" class="col-sm-2 col-form-label">Kode -->
        </label>
        <div class="col-sm-10">
          <input type="hidden" class="form-control" id="kode" name="kode" value="<?php
           echo $kode_subkomponen;?>" 
          readonly>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Rincian Komponen Biaya</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="rincian" name="rincian">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Volume</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="volume" name="volume">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="satuan" name="satuan">
        </div>
      </div>


      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Jumlah</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="jumlah" name="jumlah">
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Satuan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="satuan_jml" name="satuan_jml">
        </div>
      </div>
      
      <div class="form-group row">
        <!-- <label for="inputName" class="col-sm-2 col-form-label">Total</label> -->
        <div class="col-sm-10">
          <input type="hidden" class="form-control" id="total" name="total">
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Satuan Ukur</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="satuan_ukur" name="satuan_ukur">
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Biaya Satuan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="biaya_satuan" name="biaya_satuan">
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
            <h1>Kelola RAB</h1><br> 
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
                    <h4>Rincian Anggaran Biaya</h4>
                  </div>
                  <br><td><button type="button" class="btn btn-primary col-1" data-toggle="modal" data-target="#exampleModal">
                          Tambah
                  </button></td><br> 
                    <div class="card-header-form">
                      
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="test" class="table table-striped table-bordered display nowrap"  style="width:100%">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Kode/MAK</th>
                          <th>Rincian Komponen Biaya</th>
                          <th>Volume</th>
                          <th>Satuan</th>
                          <th>Jumlah</th>
                          <th>Satuan</th>
                          <th>Total</th>
                          <th>Satuan Ukur</th>
                          <th>Satuan Biaya(RP)</th>
                          <th>Jumlah(RP)</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no=1;
	                    foreach ($data_rab as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['rincian'] ?></td>
                          <td><?= $users['volume'] ?></td>
                          <td><?= $users['satuan'] ?></td>
                          <td><?= $users['jumlah'] ?></td>
                          <td><?= $users['satuan_jml'] ?></td>
                          <td><?= $users['total'] ?></td>
                          <td><?= $users['satuan_ukur'] ?></td>
                          <td><?= $users['biaya_satuan'] ?></td>
                          <td><?= $users['jumlah_tot'] ?></td>
                          
                          <!-- <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Edit
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                            </button>
                          </td> -->

                          <td>
                          <center><a href="<?php echo base_url(); ?>unit/edit_rab/<?php echo $users['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>
                          <a href="<?php echo base_url(); ?>unit/delete_rab/<?php echo $users['id']; ?>" class="btn btn-danger "> <i class="fas fa-trash"></i></a></center>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
                      <!-- Button trigger modal -->
                      <!-- tabel data dukung -->
                    <br>
                    <div class="card-header">
                    <h4>Data Dukung </h4>
                    </div>
                    <div class="card-body p-0">
                    <div class="table-responsive">
                      <table id="tabel2" class="table table-striped table-bordered display nowrap" style="width:100%">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Id</th>
                          <th>Kode</th>
                          <th>Nama Kegiatan</th>
                          <th>Keterangan</th>
                          <th>Gambar</th>
                          <th>Aksi</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no=1;
	                    foreach ($data_dukung as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['id'] ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['keterangan'] ?></td>
                          <td>
                          <!-- <?php echo anchor('admin/admin/editotp/1'
                            ,'<div class="btn btn-danger btn-sm"<i class="fa fa-edit">Ubah Waktu OTP</i></div>') ?> --> 
                            
                          <!-- <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_lihat">
                          <i class="fas fa-eye"></i> -->

                          <img src="<?= site_url('upload/datadukung/'.$users['dokumen']) ?>" width="50%" height="100%" />
                      </button></td>
                          <td>
                          <a href="<?php echo base_url(); ?>unit/edit_datadukung/<?php echo $users['id']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i></a>

                          <a href="<?php echo base_url(); ?>unit/delete_datadukung/<?php echo $users['id']; ?>" class="btn btn-danger "> <i class="fas fa-trash"></i></a>
                          </td>
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
                        </tbody>
                        <?php endforeach; ?>
                      </table>
                      <!-- Button trigger modal -->
                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modaldatadukung">
                          Tambah
                      </button></td>                        
                    </div>
                  </div>


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

 
     

