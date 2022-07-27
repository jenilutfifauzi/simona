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
    <form method="POST" action="<?= base_url('admin/tambah_aksi_user') ?>" class="needs-validation" >
      <div class="form-group row">
        <label for="inputName" class="col-sm-2 col-form-label">Name</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="name" name="name" placeholder="Name">
        </div>
      </div>

      <div class="form-group row">
        <label for="inputEmail" class="col-sm-2 col-form-label">Email</label>
        <div class="col-sm-10">
          <input type="text" class="form-control" id="email" name="email" placeholder="Email">
        </div>
      </div>
      
      <div class="form-group row">
        <label for="inputPassword" class="col-sm-2 col-form-label">Password</label>
        <div class="col-sm-10">
          <input type="password" class="form-control" id="password" name="password" placeholder="Password">
        </div>
      </div>

      <div class="form-group row">
      <label class="col-sm-1" for="inlineFormCustomSelectPref">Role</label>
        <select class="custom-select my-1 mr-sm-3" id="role" name="role">
          <option selected>Pilih...</option>
          <option value="user">User</option>
          <option value="admin">Admin</option>
          <option value="direktur">Direktur</option>
          <option value="wadir1">Wadir 1</option>
          <option value="wadir2">Wadir 2</option>
          <option value="unit">Unit</option>
          <option value="ppspm">PPSPM</option>
          <option value="ppk">PPK</option>
          <option value="bagianperencanaan">Bagian Perencanaan</option>
          <option value="bagiankeuangan">Bagian Keuangan</option>
          <option value="kajur">Kajur</option>
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
         
          <?= $this->session->flashdata('message');?>
          <div class="section-body">
            <h2 class="section-title">User</h2>
            <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
            <div class="card">
              <div class="card-body">
              
               
              <div class="row">
              <div class="col-12">
                <div class="card">
                  <div class="card-header">
                    <h4>Daftar User</h4>
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <table class="table table-striped table-bordered" id="test">
                      <thead> 
                      <tr>
                          <th>No</th>
                          <th>Komponen</th>
                          <th>Nama Kegiatan</th>
                          <th>Waktu Pelaksanaan</th>
                          <th>RAB</th>
                          <th>Aksi</th>
                      </tr>
                      </thead>
                        <?php 
                        $no=1;
	                    foreach ($user as $users) : ?>
                      <tbody>
                      <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['komponen'] ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td>
                            
                            <a href="<?php echo base_url(); ?>direktur/lihat_rab/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-eye"></i> Lihat</a>
                          </td>
                          <td>

                          <?php if ($users['direktur'] == 0) { ?>
                          <a href="<?php echo base_url(); ?>direktur/aksi_validasi_keg_baru/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-primary btn-sm"><i class="fas fa-check-circle"></i> Validasi</a>
                          

                          <a href="<?php echo base_url(); ?>direktur/revisi_keg_baru/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-warning btn-sm"><i class="fas fa-edit"></i> Revisi </a>
                          <?php }else { ?>
                          <a href="" class="btn btn-success btn-sm"><i class="fas fa-check"></i>Berhasil Divalidasi </a>
                          <?php } ?>
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
              </div>
              
              <div class="card-footer bg-whitesmoke">
                Politeknik Negeri Subang 2022
              </div>
            </div>
          </div>
        </section>
      </div>