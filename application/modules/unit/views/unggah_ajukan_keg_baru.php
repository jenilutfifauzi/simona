<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Komponen</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">
    <form method="POST" action="<?= base_url('unit/tambah_komponen_keg_baru') ?>" class="needs-validation" >
      <div class="form-group row">
        <label for="inputKode" class="col-sm-2 col-form-label">Kode</label>
        <div class="col-sm-10">
          <select class="form-control" name="kode" id="kode_komponen">
             <option value="#">Pilih .. </option>
             <?php foreach($kegiatan_baru_akademik_validasi as $d) {?>
             <option value="<?= $d['kode_subkomponen'] ?>"><?= $d['nama_kegiatan']." - ".$d['kegiatan'] ?></option>
             <?php } ?>
          </select>
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Nama Kegiatan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="tgl" name="tgl">
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
                    <h4><?= 'Kegiatan Akademik'; ?></h4>
                    <div class="card-header-form">
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Kode Subkomponen</th>
                          <th>Nama Kegiatan</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Aksi</th>
                        </tr>
                        <?php 
                        $no=1;
	                    foreach ($akademik as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['kode_subkomponen'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td>
                            <?php if ($users['status_pengajuan'] == 0) { ?>
                            <a href="<?php echo base_url('unit/aksi_unggah_ajukan_keg_baru/').$users['id']; ?>" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit </a>
                            <?php }elseif ($users['status_pengajuan'] == 1) { ?>
                            <div class="badges">
                            <span class="badge badge-success"><i class="fa fa-check"></i> Sudah di submit</span>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                    </div>
                  </div>
                </div>
                <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4><?= 'Kegiatan Non Akademik' ?></h4>
                    <div class="card-header-form">
                    </div>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped">
                        <tr>
                          <th>No</th>
                          <th>Kode Subkomponen</th>
                          <th>Nama Kegiatan</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Status</th>
                        </tr>
                        <?php 
                        $no=1;
	                    foreach ($non_akademik as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['kode_subkomponen'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td>
                            <?php if ($users['status_pengajuan'] == 0) { ?>
                            <a href="<?php echo base_url('unit/aksi_unggah_ajukan_keg_baru/').$users['id']; ?>" class="btn btn-primary"><i class="fas fa-check-circle"></i> Submit </a>
                            <?php }elseif ($users['status_pengajuan'] == 1) { ?>
                            <div class="badges">
                            <span class="badge badge-success"><i class="fa fa-check"></i> Sudah di submit</span>
                            <?php } ?>
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
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
    