<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html"><i class="fa fa-pied-piper"></i>SIMONA.</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SM</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item ">
                <a href="<?php echo base_url('pencairan/') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              
              <li class="menu-header">Pencairan</li>
              <li class="nav-item dropdown">
                <a href="/pengajuan/VPengajuan.php" class="nav-link has-dropdown"><i class="fas  fa-file-invoice-dollar"></i> <span>Pencairan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('pencairan/pengajuan') ?>">Validasi pengajuan</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('pencairan/validasi_terima_uang') ?>">Validasi Terima Uang</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('pencairan/status_pencairan') ?>">Cek status pencairan</a></li>
                </ul>
              </li>

              <li class="menu-header">Monitoring</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-poll"></i> <span>Monitoring</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('monitoring/rekap_kegiatan') ?>">Rekap Kegiatan</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('monitoring/tahap_pengajuan') ?>">Tahap Pengajuan</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('monitoring/terserap') ?>">Sudah Cair</a></li>
                </ul>
              </li>

              <li class="menu-header">LPJ</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-invoice"></i> <span>LPJ</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('lpj/validasi_lpj') ?>">Validasi LPJ</a></li>
                </ul>
              </li>

            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?php echo base_url('dashboard/dashboard/logout') ?>" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
        </aside>
      </div>
</div>
 