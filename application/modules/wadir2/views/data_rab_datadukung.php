
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

 
     

