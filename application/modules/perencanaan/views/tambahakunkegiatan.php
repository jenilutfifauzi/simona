<?php
//logic kode otomatis 
$query = $this->db->query('Select max(kode) as idbesar FROM dateline')->row();
$id = $query->idbesar;
$urutan = (int) substr($id, 3, 3);
$urutan++;

$huruf = "PRD";
$kode_urut = $huruf . sprintf("%03s", $urutan);



?>
<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Akun Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('perencanaan/aksi_tambah_kode_akun_kegiatan') ?>" class="needs-validation">


          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Kode Akun Kegiatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="kode" name="kode" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Kegiatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" name="kegiatan" required>
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
          <?= $this->session->flashdata('message'); ?>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4><?= $title; ?></h4>
                  <div class="card-header-form">
                  </div>
                </div>
                <div class="card-body p-0">
                  <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                    Tambah Akun Kegiatan
                  </button>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kode Akun Kegiatan</th>
                        <th>Kegiatan</th>
                      </tr>
                      <?php
                      $no = 1;
                      foreach ($user as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['kode_komponen'] ?></td>
                          <td><?= $users['kegiatan'] ?></td>

                        </tr>
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