<!-- Modal -->
<div class="modal fade" id="exampleModal" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h5 class="modal-title" id="exampleModalLabel">Tambah Kegiatan</h5>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <form method="POST" action="<?= base_url('unit/aksi_tambah_kegiatan') ?>" class="needs-validation">
          <div class="form-group row">
            <div class="col-sm-10">
              <!-- logic nomor otomatis -->
              <!-- <?php
              $id_unit = $query->idbesar;
              $urutan = (int) substr($id_unit, 3, 3);
              $urutan++;

              $huruf = "KG";
              $idunit_urut = $huruf . sprintf("%03s", $urutan);


              ?> -->
              <input type="hidden" class="form-control" id="kode" name="kode" value="<?= $kode_kom ?>" readonly>
            </div>
          </div>
          <!-- Awal -->
          <!-- <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Kode Sub Komponen</label>
            <div class="col-sm-10">
              <input type="hidden" class="form-control" id="komponen" name="kode_subkomponen" value="<?= $idunit_urut ?>" required>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Nama Kegiatan</label>
            <div class="col-sm-10">
              <input type="text" class="form-control" id="nama_kegiatan" name="nama_kegiatan" required>
            </div>
          </div> -->
          <!-- Baru -->
          <div class="form-group row">
            <label for="inputKode" class="col-sm-2 col-form-label">Kode</label>
            <div class="col-sm-10">
              <select class="form-control" name="kode_subkomponen" id="kode_komponen_baru">
                <option value="#">Pilih .. </option>
                <?php foreach ($kode_kom_keg as $d) { ?>
                  <option value="<?= $d['kode_komponen'] ?>"><?= $d['kode_komponen'] . " - " . $d['kegiatan'] ?></option>
                <?php } ?>
              </select>
            </div>
          </div>

          <div class="form-group row">
            <label for="inputName" class="col-sm-2 col-form-label">Komponen</label>
            <div class="col-sm-10">
              <select name="nama_kegiatan" id="nama_kom" class="form-control">
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
              <input type="text" class="form-control" id="hargasatuan" name="harga_satuan">
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
      <div class="card">
        <div class="card-body">

          <?= $this->session->flashdata('message'); ?>
          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Kegiatan</h4>
                  <div class="card-header-form">

                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <button type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                      Tambah Kegiatan
                    </button>
                    <table class="table table-striped">
                      <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Biaya</th>
                        <th>Aksi</th>
                      </tr>
                      <?php

                      $no = 1;
                      foreach ($user as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['jml_biaya'] ?></td>
                          <td>
                            <?php if ($users['submit'] == 0) { ?>
                              <a href="<?php echo base_url(); ?>unit/rab_datadukung/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-primary"><i class="fas fa-edit"></i> Edit</a>
                              <a href="<?php echo base_url(); ?>unit/submit_rab_datadukung/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-success"><i class="fas fa-paper-plane"></i> Validasi</a>
                              <!-- hapus_data -->
                              <a href="<?php echo base_url(); ?>unit/aksi_hapus_kegiatan/<?php echo $users['kode_subkomponen']; ?>" class="btn btn-danger"><i class="fas fa-trash"></i> Hapus</a>
                            <?php } else { ?>
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


        </div>
      </div>
  </section>
</div>