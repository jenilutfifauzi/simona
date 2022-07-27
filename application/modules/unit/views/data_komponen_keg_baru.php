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
        <form method="POST" action="<?= base_url('unit/tambah_komponen_keg_baru') ?>" class="needs-validation">
          <div class="form-group row">
            <label for="inputKode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
              <select class="form-control" name="kode" id="kode_komponen" required>
                <option value="#">Pilih .. </option>
                <?php foreach ($kode_kom as $d) { ?>
                  <option value="<?= $d['kode_komponen'] ?>"><?= $d['kode_komponen'] . " - " . $d['kegiatan'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Komponen</label>
            <div class="col-sm-10">
              <!-- <input type="text" class="form-control" id="nama_kom" name="komponen"> -->
              <select name="komponen" id="nama_kom" class="form-control">
              </select>
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
          <?= $this->session->flashdata('message'); ?>

          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Rencana Kegiatan Anggaran</h4>
                  <div class="card-header-form">
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Tambah Komponen
                    </button>
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Kode</th>
                        <th>Komponen/Subkomponen</th>
                        <th>Volume</th>
                        <th>Harga satuan</th>
                        <th>Jumlah Biaya</th>
                        <th>Aksi</th>
                      </tr>
                      <?php
                      $no = 1;
                      foreach ($user as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['kode_kom'] ?></td>
                          <td><?= $users['komponen'] ?></td>
                          <td><?= $users['volume'] ?></td>
                          <td><?= $users['hargasatuan'] ?></td>
                          <td><?= $users['jumlahbiaya'] ?></td>


                          <td>
                            <a href="<?php echo base_url(); ?>unit/kelola_kegiatan_baru/<?php echo $users['kode_kom']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Pilih </a>
                            <!-- <a href="<?php echo base_url(); ?>admin/delete/<?php echo $users['id']; ?>" class="btn btn-danger "> <i class="fas fa-trash"></i></a>
                          </td> -->
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