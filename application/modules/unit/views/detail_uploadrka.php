<div class="main-content">
  <section class="section">
    <div class="section-header">
      <h1>Detail RKA</h1>
    </div>

    <div class="section-body">
      <?php
      if (isset($data_rka->status)) { ?>
        <embed type="application/pdf" src="<?= base_url('upload/rka/') . $data_rka->dokumen; ?>" width="1400" height="720"></embed>

      <?php } else { ?>
        <div class="alert alert-danger" role="alert">
         Maaf Belum Ada Data Acuan RKA <button type="button" class="close" data-dismiss="alert" aria-label="close"><span aria-hidden="true">&times;</span></button>
        </div>'
      <?php }
      ?>
    </div>
  </section>
</div>