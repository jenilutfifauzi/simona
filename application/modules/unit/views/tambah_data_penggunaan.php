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
                                </div>
                                <div class="card-body">
                                    <form action="<?= base_url('unit/aksi_tambah_data_penggunaan/' . $tb_rab_penggunaan['id_rab']) ?>" method="POST" enctype="multipart/form-data">
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Kode </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" value="<?= $tb_rab_penggunaan['kode'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Rincian Biaya</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control" value="<?= $tb_rab_penggunaan['rincianbiaya'] ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Total Biaya </label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control inputtags" name="total_biaya" value="<?= $tb_rab_penggunaan['total_biaya'] ?>" readonly>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Biaya yang digunakan</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control inputtags" name="biaya" value="<?= $tb_rab_penggunaan['biaya'] ?>" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Bukti</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="file" class="form-control inputtags" name="berkas" required>
                                            </div>
                                        </div>
                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3">Komentar</label>
                                            <div class="col-sm-12 col-md-7">
                                                <input type="text" class="form-control inputtags" name="komentar" value="<?php if ($tb_rab_penggunaan['komentar'] == null) {
                                                                                                                                echo "Tidak ada komentar";
                                                                                                                            } else {
                                                                                                                                echo $tb_rab_penggunaan['komentar'];
                                                                                                                            } ?>" readonly>
                                            </div>
                                        </div>

                                        <div class="form-group row mb-4">
                                            <label class="col-form-label text-md-right col-12 col-md-3 col-lg-3"></label>
                                            <div class="col-sm-12 col-md-7">
                                                <button class="btn btn-primary"><i class="fas fa-edit"></i> Update </button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>