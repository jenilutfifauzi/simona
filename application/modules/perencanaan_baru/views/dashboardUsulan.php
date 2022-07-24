
<!-- isi -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
          <div class="col-12">
            <h1>Usulan Kegiatan Baru</h1><br> 
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
                    <h4>Riwayat Pengajuan</h4>
                  </div>
                  <div class="card-header-form">    
                  </div>
                  <div class="card-body p-0">
                    <div class="table-responsive">
                      <!-- isi -->
                      <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <div class="section-title mt-0">Daftar Pengajuan</div>
                    <!--<a class="btn btn-primary " href="<?= base_url('Perencanaan/UsulanKegiatan/usulanNonAkademik');?>"> Usulan Kegiatan Non-Akademik</a>
-->
                    <table class="table">
                    <a class="btn btn-success" href="<?= base_url('perencanaan_baru/UsulanKegiatan/usulanbaru');?>"> Usulan Kegiatan baru</a>
                      <thead>
                        <tr>
                          <th scope="col">No</th>
                          <th scope="col">kode</th>
                          <th scope="col">Program Kegiatan</th>
                          <th scope="col">Volume</th>
                          <th scope="col">Satuan</th>
                          <th scope="col">Harga Satuan</th>
                          <th scope="col">total</th>
                          <th scope="col">Jenis Kegiatan</th>
                          <th scope="col">Status Usulan</th>
                          <th> Aksi </th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php
                      $no = 1;
                      foreach($usulan as $row){
                      ?>
                      <tr>
                        <td><?= $no++; ?></td>
                        <td><?= $row['kode'];?></td>
                        <td><?= $row['program_kegiatan'];?></td>
                        <td><?= $row['volume'];?></td>
                        <td><?= $row['satuan'];?></td>
                        <td><?= $row['harga_satuan'];?></td>
                        <td><?= $row['total'];?></td>
                        <td><?= $row['jenis_kegiatan'];?></td>
                        <td><?= $row['status_usulan'];?></td>
                      </tr>
                    <?php } ?>
                      </tbody>
                    </table>

                </div>
              </div>
</div>




                      <!-- akhir isi -->
                    </div>
                  </div>
                </div>
                      <!-- Button trigger modal -->
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

