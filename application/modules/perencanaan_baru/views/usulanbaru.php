      <!-- isi -->
<div class="main-content">
        <section class="section">
          <div class="section-header">
          <div class="col-12">
            <h1>Usulan Kegiatan Baru</h1><br> 
          </div>
          </div>
         
      <div class="col-12">
                <div class="card" >
                  <div class="card-body">
                    <h2> Usulan Kegiatan Akademik</h2>

                    <?= form_open_multipart('perencanaan_baru/UsulanKegiatan/InsertUsulan'); ?>
                      <div class="row">
                          <div class="form-group col-lg-12 mb-2">
                            <div class="row">
                              <div class="form-group col-lg-2">
                                <label> kode</label>
                                <input class="form-control name-list" type="text" placeholder="" name="kode">
                              </div>
                      <div class="form-group col-lg-4">
                        <label> program Kegiatan</label>
                        <input class="form-control name-list" type="text" placeholder="" name="program_kegiatan">
                      </div>
                      <div class="form-group col-lg-3">
                        <label> Jenis Kegiatan</label>
                        <select class="form-control" name="jenis_kegiatan">
                          <option selected> pilih</option>
                          <option value="Akademik">Akademik</option>
                          <option value="Non-Akademik">Non-Akademik</option>
                        </select>
                      </div>
                      <div class="form-group col-lg-2">
                        <label> Tanggal Kegiatan</label>
                        <input class="form-control" type="text" name="tanggal" id="datepicker">
                      </div>
                      <div class="form-group col-lg-2">
                        <label>  Volume</label>
                        <input id="volume" class="form-control" type="text" name="volume" >
                      </div>
                      <div class="form-group col-lg-2">
                        <label>  Satuan</label>
                        <input class="form-control" type="text" name="satuan" >
                      </div>
                      <div class="form-group col-lg-2">
                        <label>  Harga Satuan</label>
                        <input id="harga_satuan" class="form-control" type="text" name="harga_satuan" >
                      </div>
                      <div class="form-group col-lg-4">
                        <label>  Total</label>
                        <input id="total_harga" class="form-control" type="text" name="total" >
                      </div>


                      <div class="form-group ">
                       <label>File Proposal</label>
                       <input type="file" name="fileusulan">
                       <?php if($this->session->flashdata('error')){ ?>
                         <small class=text-danger pl-3> <?php echo $this->session->flashdata('error');}?></small>

                     </div>

                      </div>
                      <div class="form-group col-lg-2">
                    <button type="submit" class="btn btn-success" name="submit"> Kirim</button>
                  </div>
                    </div>
                  </div>
                  </form>
                  </div>
                </div>
              </div>
