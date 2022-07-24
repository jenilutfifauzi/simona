<div class="main-content">
        <section class="section">
          <div class="section-header">
            <h1>Import Data Komponen</h1>
          </div>

          <div class="section-body">
            <form method="POST" action="<?= site_url('perencanaan/aksi_tambah_komponen') ?>" enctype="multipart/form-data">
                <div class="card-body">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="form-group row">
                                <div class="col-md-12">
                                <label class="col-form-label text-md-left">Upload File</label> 
                                    <input type="file" class="form-control" name="file" accept=".xls, .xlsx" required>
                                    <div class="mt-1">
                                        <span class="text-secondary">File yang harus diupload : .xls, xlsx</span>
                                    </div>
                                    <?= form_error('file','<div class="text-danger">','</div>') ?>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="card-footer text-right">
                    <div class="form-group mb-0">
                        <button type="submit" name="import" class="btn btn-primary"><i class="fas fa-upload mr-1"></i>Upload</button> 
                    </div>
                </div>
            </form>
          </div>
        </section>
    </div>
    
