<?php
//session tahun
$getTahun = $this->session->userdata('tahun');
?>
<!-- Main Content -->
<div class="main-content">
  <section class="section">


    <div class="row">
      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-stats-title">
            </div>
            <div class="card-stats-items">
              <div class="card-wrap">
                <div class="card-body">
                  <h4>Total Anggaran</h4>
                </div>
                <div class="card-header">
                  <?php echo "Rp. " . $data_anggaran->anggaran; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4></h4>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>

      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-stats-title">
            </div>
            <div class="card-stats-items">
              <div class="card-wrap">
                <div class="card-body">
                  <h4>Anggaran Terserap</h4>
                </div>
                <div class="card-header">
                  <?php echo "Rp. " . $data_anggaran->terserap; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4></h4>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>


      <div class="col-lg-4 col-md-4 col-sm-12">
        <div class="card card-statistic-2">
          <div class="card-stats">
            <div class="card-icon shadow-primary bg-primary">
              <i class="fas fa-archive"></i>
            </div>
            <div class="card-stats-title">
            </div>
            <div class="card-stats-items">
              <div class="card-wrap">
                <div class="card-body">
                  <h4>Sisa Anggaran</h4>
                </div>
                <div class="card-header">
                  <?= 'Rp. ' . $data_anggaran->sisa; ?>
                </div>
              </div>
            </div>
          </div>
          <div class="card-wrap">
            <div class="card-header">
              <h4></h4>
            </div>
            <div class="card-body">
            </div>
          </div>
        </div>
      </div>
    </div>
    <!-- grafik -->
    <!-- <div>
              <canvas id="myChart"></canvas>
            </div> -->

    <div id="container"></div><br><br>

    <!-- target -->
    <div class="row">
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Serapan Tercapai Perbulan ini tahun  <?= $getTahun ?></h5>
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Spirit!</h4>
              <h1><?= round($getPersenYears, 2) . '%'; ?></h1>
              <hr>
              <p class="mb-0">Segera dilaksanakan agar mencapai target.</p>
            </div>
          </div>
        </div>
      </div>
      <div class="col-sm-6">
        <div class="card">
          <div class="card-body">
            <h5 class="card-title">Target Serapan Tahun <?= $getTahun; ?></h5>
            <div class="alert alert-success" role="alert">
              <h4 class="alert-heading">Spirit!</h4>
              <h1><?php echo $data_anggaran->target; ?>%</h1>
              <hr>
              <p class="mb-0">Target tahun ini yang harus dicapai.</p>
            </div>
          </div>
        </div>
      </div>
    </div>
    <br>
    <!-- //filter -->
    <form action="<?= base_url('Monitoring/terserap_filter') ?>" method="POST">
      <div class="form-row align-items-center">
        <div class="col-auto my-1">
          <div class="custom-control mr-sm-2">
            <label class="  control-label">Filter data</label>
          </div>
        </div>
        <div class="col-auto my-1">
          <label class="mr-sm-2 sr-only" for="inlineFormCustomSelect">Preference</label>
          <select class="custom-select mr-sm-2" id="inlineFormCustomSelect" name="tahun">
            <option selected>Pilih...</option>
            <?php foreach ($data_tahun as $tahun) { ?>
              <option value="<?= $tahun['tahun'] ?>"><?= $tahun['tahun'] ?></option>
            <?php } ?>
          </select>
        </div>

        <div class="col-auto my-1">
          <button type="submit" class="btn btn-primary">Filter</button>
        </div>
      </div>
    </form>
    <br>
    <div class="row">
      <div class="col-12">
        <div class="card">
          <div class="card-header">
            <h4>Daftar Kegiatan Terlaksana</h4>
            
            <div class="card-header-form">

            </div>
          </div>
          <div class="card-body p-0">
            <div class="table-responsive">
              <table class="table table-striped" id="test">
                <thead>
                  <tr>
                    <th>No</th>
                    <th>Nama Kegiatan</th>
                    <th>Tanggal Kegiatan</th>
                    <th>Status</th>
                  </tr>
                </thead>
                <?php
                $no = 1;
                foreach ($data_terlaksana as $users) : ?>
                  <tbody>
                    <tr>
                      <td><?= $no++ ?></td>
                      <td><?= $users['nama_kegiatan'] ?></td>
                      <td><?= $users['tgl_kegiatan'] ?></td>
                      <td>
                        <div class="badges">
                          <span class="badge badge-success">Terlaksana</span>

                      </td>
                    </tr>
                  </tbody>
                <?php endforeach; ?>
              </table>
            </div>
          </div>
        </div>

        <div class="row">
          <div class="col-12">
            <div class="card">
              <div class="card-header">
                <h4>Daftar Kegiatan Belum Terlaksana</h4>
                <div class="card-header-form">
                </div>
              </div>
              <div class="card-body p-0">
                <div class="table-responsive">
                  <table class="table table-striped" id="tabel2">
                    <thead>
                      <tr>
                        <th>No</th>
                        <th>Nama Kegiatan</th>
                        <th>Tanggal Kegiatan</th>
                        <th>Status</th>
                      </tr>
                    </thead>
                    <?php
                    $no = 1;
                    foreach ($data_belum_terlaksana as $users) : ?>
                      <tbody>
                        <tr>
                          <td><?= $no++ ?></td>
                          <td><?= $users['nama_kegiatan'] ?></td>
                          <td><?= $users['tgl'] ?></td>
                          <td>
                            <div class="badges">
                              <span class="badge badge-warning">Belum Terlaksana</span>
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


        <div>
          <div class="card-footer bg-whitesmoke">
            Politeknik Negeri Subang 2022
          </div>
        </div>
      </div>
  </section>
</div>




<!-- <script src="https://cdn.jsdelivr.net/npm/chart.js"></script> -->
<!-- <script src="<?= base_url() ?>assets/chart.js/dist/chart.js"></script> -->
<script>
  const labels = [
    'January',
    'February',
    'March',
    'April',
    'May',
    'June',
  ];

  const data = {
    labels: labels,
    datasets: [{
      label: 'Grafik Serapan Anggaran',
      backgroundColor: 'rgb(255, 99, 132)',
      borderColor: 'rgb(255, 99, 132)',
      data: [0, 10, 5, 2, 20, 30, 45],
    }]
  };

  const config = {
    type: 'line',
    data: data,
    options: {}
  };
</script>
<script>
  const myChart = new Chart(
    document.getElementById('myChart'),
    config
  );
</script>

<!-- diagram -->


<script src="https://code.jquery.com/jquery-3.1.1.min.js"></script>
<script src="https://code.highcharts.com/highcharts.js"></script>
<script src="https://code.highcharts.com/modules/exporting.js"></script>
<script src="https://code.highcharts.com/modules/export-data.js"></script>
<script src="https://code.highcharts.com/modules/accessibility.js"></script>
<script>
  Highcharts.chart('container', {
    chart: {
      type: 'pie'
    },
    title: {
      text: 'Grafik Serapan Anggaran'
    },
    subtitle: {
      text: 'Click the slices to view versions. Source: <a href="http://statcounter.com" target="_blank">statcounter.com</a>'
    },

    accessibility: {
      announceNewData: {
        enabled: true
      },
      point: {
        valueSuffix: '%'
      }
    },

    plotOptions: {
      series: {
        dataLabels: {
          enabled: true,
          format: '{point.name}: {point.y:.1f}%'
        }
      }
    },

    tooltip: {
      headerFormat: '<span style="font-size:11px">{series.name}</span><br>',
      pointFormat: '<span style="color:{point.color}">{point.name}</span>: <b>{point.y:.2f}%</b> of total<br/>'
    },

    series: [{
      name: "Anggaran",
      colorByPoint: true,
      data: [{
          name: "Terserap",
          y: <?= $getPersenYears; ?>,
          drilldown: "Terserap"
        },
        {
          name: "Belum Terserap",
          y: <?= (100 - $getPersenYears); ?>,
          drilldown: "Belum Terserap"
        }
      ]
    }],
    drilldown: {
      series: [{
          name: "Chrome",
          id: "Chrome",
          data: [
            [
              "v65.0",
              0.1
            ],
            [
              "v64.0",
              1.3
            ],
            [
              "v63.0",
              53.02
            ],
            [
              "v62.0",
              1.4
            ],
            [
              "v61.0",
              0.88
            ],
            [
              "v60.0",
              0.56
            ],
            [
              "v59.0",
              0.45
            ],
            [
              "v58.0",
              0.49
            ],
            [
              "v57.0",
              0.32
            ],
            [
              "v56.0",
              0.29
            ],
            [
              "v55.0",
              0.79
            ],
            [
              "v54.0",
              0.18
            ],
            [
              "v51.0",
              0.13
            ],
            [
              "v49.0",
              2.16
            ],
            [
              "v48.0",
              0.13
            ],
            [
              "v47.0",
              0.11
            ],
            [
              "v43.0",
              0.17
            ],
            [
              "v29.0",
              0.26
            ]
          ]
        },
        {
          name: "Firefox",
          id: "Firefox",
          data: [
            [
              "v58.0",
              1.02
            ],
            [
              "v57.0",
              7.36
            ],
            [
              "v56.0",
              0.35
            ],
            [
              "v55.0",
              0.11
            ],
            [
              "v54.0",
              0.1
            ],
            [
              "v52.0",
              0.95
            ],
            [
              "v51.0",
              0.15
            ],
            [
              "v50.0",
              0.1
            ],
            [
              "v48.0",
              0.31
            ],
            [
              "v47.0",
              0.12
            ]
          ]
        },
        {
          name: "Internet Explorer",
          id: "Internet Explorer",
          data: [
            [
              "v11.0",
              6.2
            ],
            [
              "v10.0",
              0.29
            ],
            [
              "v9.0",
              0.27
            ],
            [
              "v8.0",
              0.47
            ]
          ]
        },
        {
          name: "Safari",
          id: "Safari",
          data: [
            [
              "v11.0",
              3.39
            ],
            [
              "v10.1",
              0.96
            ],
            [
              "v10.0",
              0.36
            ],
            [
              "v9.1",
              0.54
            ],
            [
              "v9.0",
              0.13
            ],
            [
              "v5.1",
              0.2
            ]
          ]
        },
        {
          name: "Edge",
          id: "Edge",
          data: [
            [
              "v16",
              2.6
            ],
            [
              "v15",
              0.92
            ],
            [
              "v14",
              0.4
            ],
            [
              "v13",
              0.1
            ]
          ]
        },
        {
          name: "Opera",
          id: "Opera",
          data: [
            [
              "v50.0",
              0.96
            ],
            [
              "v49.0",
              0.82
            ],
            [
              "v12.1",
              0.14
            ]
          ]
        }
      ]
    }
  });
</script>