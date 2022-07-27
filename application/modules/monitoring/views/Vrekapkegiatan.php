<div class="main-content">
  <section class="section">
    <div class="section-header">
      <div class="col-12">
        <h1><?= $title ?></h1><br>
      </div>
    </div>

    <div class="section-body">
      <h2 class="section-title"><?= $title ?></h2>
      <!-- <p class="section-lead">This page is just an example for you to create your own page.</p> -->
      <div class="card">
        <div class="card-body">


          <div class="row">
            <div class="col-12">
              <div class="card">
                <div class="card-header">
                  <h4>Daftar Kegiatan</h4>
                  <div class="category-filter">
                    <select id="categoryFilter" class="form-control" style="display: inline; width: 150px; margin-left: 10px;">
                      <option value="">Show All</option>
                      <option value="2020">2020</option>
                      <option value="2021">2021</option>
                      <option value="2022">2022</option>
                    </select>
                  </div>
                  <div class="card-header-form">
                  </div>
                </div>
                <div class="card-body p-0">
                  <div class="table-responsive">
                    <table class="table table-striped table-bordered display nowrap" id="filterTable" style="width:100%">
                      <thead>
                        <tr>
                          <th>No</th>
                          <th>Nama Kegiatan</th>
                          <th>Tanggal Kegiatan</th>
                          <th>Tahun</th>
                          <th>Countdown</th>
                          <th>Status</th>
                        </tr>
                      </thead>
                      <tbody>
                        <?php
                        $no = 1;
                        foreach ($user as $users) : ?>
                          <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $users['nama_kegiatan'] ?></td>
                            <td><?= $users['tgl'] ?></td>
                            <td><?= $users['tahun'] ?></td>
                            <td><?php
                                date_default_timezone_set('Asia/Jakarta');
                                $tglSekarang = date('Y-m-d');
                                if ($users['status'] == 1) {
                                  echo 'Warning';
                                } elseif ($users['tgl'] <= $tglSekarang && $users['status'] == 2) {
                                  echo "Terlewat ";

                                  $rem = strtotime($users['tgl']) - time();
                                  $day = floor($rem / 86400);
                                  $hr = floor(($rem % 86400) / 3600);
                                  $min = floor(($rem % 3600) / 60);
                                  $sec = floor($rem % 60);
                                  if ($day) echo "$day Hari ";
                                  if ($hr) echo "$hr Jam ";
                                  if ($min) echo "$min Menit ";
                                  if ($sec) echo "$sec Detik ";
                                  echo "!!!";
                                } elseif ($users['tgl'] >= $tglSekarang && $users['status'] == 2) {
                                  $rem = strtotime($users['tgl']) - time();
                                  $day = floor($rem / 86400);
                                  $hr = floor(($rem % 86400) / 3600);
                                  $min = floor(($rem % 3600) / 60);
                                  $sec = floor($rem % 60);
                                  if ($day) echo "$day Hari ";
                                  if ($hr) echo "$hr Jam ";
                                  if ($min) echo "$min Menit ";
                                  if ($sec) echo "$sec Detik ";
                                  echo "Tersisa...";
                                } elseif ($users['status'] == 3) {
                                  echo $users['tgl'];
                                } elseif ($users['status'] == 5) {
                                  $rem = strtotime($users['tgl']) - time();
                                  $day = floor($rem / 86400);
                                  $hr = floor(($rem % 86400) / 3600);
                                  $min = floor(($rem % 3600) / 60);
                                  $sec = floor($rem % 60);
                                  if ($day) echo "$day Hari ";
                                  if ($hr) echo "$hr Jam ";
                                  if ($min) echo "$min Menit ";
                                  if ($sec) echo "$sec Detik ";
                                  echo "Tersisa...";
                                }
                                ?>
                            </td>
                            <td>
                                <?php if ($users['status'] == 1) { ?>
                                <div class="badges">
                                <span class="badge badge-danger">Belum Terlaksana</span>
                                <?php } ?>
                                <?php if ($users['status'] == 2) { ?>
                                <div class="badges">
                                <span class="badge badge-warning">Terdekat</span>
                                <?php } ?>
                                <?php if ($users['status'] == 3) { ?>
                                <div class="badges">
                                <span class="badge badge-success">Terlaksana</span>
                                <?php } elseif ($users['status'] == 5) { ?>
                                <div class="badges">
                                <span class="badge badge-info">Diproses</span>
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

        <div class="card-footer bg-whitesmoke">
          Politeknik Negeri Subang 2022
        </div>
      </div>
    </div>
  </section>
</div>