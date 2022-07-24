<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Validasi</h1>
        </div>

        <div class="section-body">
        `   <div class="row">
                <div class="col-12 col-md-6 col-lg-6">
                    <div class="card">
                        <div class="card-header">
                            <h4>Validasi Ambil Uang</h4>
                        </div>
                        <div class="card-body">

                            <div class="alert alert-info">
                            <b>Note!</b>
                            </div>
                            
                            <?php $id_data = $this->uri->segment(3); ?>
                            <?php foreach($data_pengajuan as $users) { ?>
                            <form action="<?php echo base_url();?>pencairan/aksi_terima_uang/<?php echo $id_data?>" method="POST" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Kode</label>
                                <input type="text" class="form-control" value="<?php echo $this->uri->segment(3); ?>" readonly>
                            </div>
                            <div class="form-group">
                                <label>Kegiatan</label>
                                <input type="text" class="form-control" value="<?php echo $users['nama_kegiatan']; ?>" readonly>
                            </div>
                            <label>Bukti Ambil Uang</label>
                            <div class="form-group">
                                <input type="file" class="form-control" id="berkas" name="berkas" accept=".PNG,.jpg,.jpeg,.JPEG">
                                <label class="custom-file-label" for="customFile">Choose file</label>
                            </div><br>
                            <button type="submit" class="btn btn-primary">Simpan</button>
                            </form>
                            <?php } ?>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>