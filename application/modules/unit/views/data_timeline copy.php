
<!-- Modal -->
<div class="modal fade" id="modal_tambah" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
<div class="modal-dialog">
  <div class="modal-content">
    <div class="modal-header">
      <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
      <button type="button" class="close" data-dismiss="modal" aria-label="Close">
      <span aria-hidden="true">&times;</span>
      </button>
    </div>
  <div class="modal-body">
    <form method="POST" action="<?= base_url('unit/aksi_tambah_timeline') ?>" class="needs-validation" >
      
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Nama Kegiatan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Tanggal Kegiatan</label>
        <div class="col-sm-10">
          <input type="date" class="form-control" id="tanggal" name="tanggal">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Biaya Kegiatan</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="biaya" name="biaya">
        </div>
      </div>

      <div class="input-group mb-3">
        <div class="input-group-prepend">
          <label class="input-group-text" for="inputGroupSelect01">Jenis Kegiatan</label>
        </div>
        <select class="custom-select" id="inputGroupSelect01" name="jenis_kegiatan">
          <option selected>Pilih...</option>
          <option value="1">Akademik</option>
          <option value="2">Non Akademik</option>
        </select>
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
                  <div class="card-header">
                    <div class="col-12">
                      <div class="card">
                        <div class="card-header-form">
                          <h4>Daftar Kegiatan</h4>
                          
                        </div>
                      </div>
                      <!-- <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#modal_tambah"><i class="fas fa-plus"></i>
                          Tambah
                      </button></td>   -->
                      
                      <div class="card-body p-0">
                        <div class="table-responsive">
                          <table class="table table-striped">
                            <tr>
                              <th>No</th>
                              <th>Kode</th>
                              <th>Nama Kegiatan</th>
                              <th>Tanggal Kegiatan</th>
                              <th>Jenis Kegiatan</th>
                              <th>Biaya Kegiatan</th>
                              <th>Aksi</th>
                        </tr>
                        <?php 
                        $no=1;
	                    foreach ($user as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['kode'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td><?= $users['jenis_kegiatan'] ?></td>
                          <td><?= $users['jml_biaya'] ?></td>
                          
                          <!-- <td>
                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Edit
                            </button>

                            <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                            Hapus
                            </button>
                          </td> -->

                          <td>
                          <!-- <a href="<?php echo base_url(); ?>perencanaan/tambah_data_dukung/<?php echo $users['kode']; ?>" class="btn btn-primary"><i class="fas fa-edit">yyy</i></a> -->
                          <!-- <a href="<?php echo base_url(); ?>admin/delete/<?php echo $users['id']; ?>" class="btn btn-danger "> <i class="fas fa-trash"></i></a> -->
                          </td>
                        </tr>
                        <?php endforeach; ?>
                      </table>
                      <!-- Button trigger modal
                      <td><button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                          Tambah
                      </button></td>                         -->
                    </div>
                  </div>
                </div>
              </div>
              </div>
              </div>
              
              <!-- <div class="card-footer bg-whitesmoke">
                Politeknik Negeri Subang 2022
              </div> -->
            </div>
          </div>
        </section>
      </div>