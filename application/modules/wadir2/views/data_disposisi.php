      <div class="modal fade" tabindex="-1" role="dialog" id="modal-1">
          <div class="modal-dialog" role="document">
            <div class="modal-content">
              <div class="modal-header">
                <h5 class="modal-title">Tambah Disposisi</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                  <span aria-hidden="true">&times;</span>
                </button>
              </div>
              <div class="modal-body">

              <form method="POST" action="<?= base_url('Wadir2/aksi_tambah_disposisi') ?>" class="needs-validation" enctype="multipart/form-data">
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Tanggal
                </label>
                <div class="col-sm-10">
                  <input type="text" class="form-control" id="tgl" name="tgl" value="<?= date("Y-m-d"); ?>" 
                  readonly>
                </div>
              </div>
              
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Perihal</label>
                <div class="col-sm-10">
                  <select class="form-control" name="perihal">
                          <?php foreach ($data_kegiatan_tervalidasi as $data) { ?>
                          <option value="<?= $data['nama_kegiatan']; ?>"><?= $data['nama_kegiatan']; ?></option>
                          <?php } ?>
                  </select>   
                </div>   
              </div>

              <div class="form-group row">
                <label for="keterangan" class="col-sm-2 col-form-label">Kepada</label>
                <div class="col-sm-10">
                  <select class="form-control" name="kepada">
                          <option>Bagian Perencanaan</option>
                  </select>   
                </div>                  
              </div>
              
              <div class="form-group row">
                <label for="" class="col-sm-2 col-form-label">Intruksi</label>
                <div class="col-sm-10">
                  <textarea type="text" class="form-control" id="intruksi" name="intruksi"></textarea>
                </div>
              </div>



              </div>
              <div class="modal-footer bg-whitesmoke br">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="submit" class="btn btn-primary">Submit</button>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>


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
                    <button class="btn btn-primary " data-toggle="modal" data-target="#modal-1">Input disposisi</button><br>
                      <table id="test" class="table table-striped table-bordered display nowrap"  style="width:100%">
                        <thead>
                        <tr>
                          <th>No</th>
                          <th>Tanggal</th>
                          <th>Perihal</th>
                          <th>Kepada</th>
                          <th>Intruksi</th>
                          <th>Status</th>
                        </tr>
                        </thead>
                        <tbody>
                        <?php 
                        $no=1;
	                    foreach ($data_disposisi as $users) : ?>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td><?= $users['perihal'] ?></td>
                          <td><?= $users['kepada'] ?></td>
                          <td><?= $users['intruksi'] ?></td>
                          <td>
                            <?php if($users['status'] == 0){ ?>
                              <div class="badges">
                              <span class="badge badge-warning"><i class="fa fa-loading"></i> Menunggu</span>
                            <?php }else { ?>
                              <div class="badges">
                              <span class="badge badge-success"><i class="fa fa-loading"></i> Sudah diproses</span>
                            <?php } ?>
                          </td>
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
    </section>

</div>


 
     

