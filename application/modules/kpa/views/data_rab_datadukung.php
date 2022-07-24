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
        <label for="keterangan" class="col-sm-2 col-form-label">Keterangan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="keterangan" name="keterangan" >
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
        <label for="inputKode" class="col-sm-2 col-form-label">Kode
        </label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="kode" name="kode" value="<?php
           echo $data_rab_kode->kode;?>" 
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
        <label for="inputName" class="col-sm-2 col-form-label">Total</label>
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
            <h2 class="section-title"><button type="button" class="btn btn-primary btn-sm col-1" onclick="history.back(-1)">Kembali</button></h2>
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
                        </tr>
                        <?php endforeach; ?>
                        </tbody>
                      </table>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
          </div>
                      <!-- tabel data dukung -->
          <div class="card">
            <div class="card-body"> 
              <div class="row">
                <div class="col-12">
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
                              <img src="<?= site_url('upload/datadukung/'.$users['dokumen']) ?>" width="50%" height="100%" />
                              </button>
                          </td>
                        </tr>
                        </tbody>
                        <?php endforeach; ?>
                      </table>                  
                    </div>
                  </div>
                </div>
              </div>
          </div>
        </section>
      </div>

 
     

