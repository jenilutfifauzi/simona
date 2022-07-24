<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">SIMONA.</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">SS</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item ">
                <a href="<?php echo base_url('pencairan/') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>

              <li class="menu-header">Perencanaan</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas  fa-file-invoice-dollar"></i> <span>Perencanaan Tahunan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('unit/kelola_komponen') ?>">RAB dan Data dukung</a></li>
                </ul>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('unit/kelola_komponen_timeline') ?>">Timeline</a></li>
                </ul>
              </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas  fa-file-invoice-dollar"></i> <span>Usulan Kegiatan Baru</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('unit/kelola_komponen_keg_baru/') ?>">RAB dan data Dukung</a></li>
                </ul>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('unit/kelola_komponen_timeline_keg_baru') ?>">Timeline</a></li>
                </ul>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('unit/ajukan_keg_baru') ?>">Ajukan Kegiatan Baru</a></li>
                </ul>
             
              <li>
                <a href="<?php echo base_url('unit/riwayat_pengajuan_rencana_tahunan') ?>" class="nav-item"><i class="fas  fa-file-invoice"></i> <span>Riwayat Pengajuan</span></a>
              </li>
              <li>
                <a href="<?php echo base_url('unit/acuanrka') ?>" class="nav-item"><i class="fas  fa-file-invoice"></i> <span>Acuan RKA</span></a>
              </li>

                
              </li>

              <li class="menu-header">Pencairan</li>
              <li class="nav-item dropdown">
                <a href="/pengajuan/VPengajuan.php" class="nav-link has-dropdown"><i class="fas  fa-file-invoice-dollar"></i> <span>Pencairan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('lpj/status_pencairan') ?>">Cek status pencairan</a></li>
                </ul>
              </li>

              <li class="menu-header">Kegiatan </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas  fa-file-invoice-dollar"></i> <span> Kegiatan </span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('unit/kegiatan_terlewat') ?>">Kegiatan terlewat</a></li>
                </ul>
              </li>

              <li class="menu-header">LPJ</li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-file-invoice"></i> <span>LPJ</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('unit/data_kegiatan') ?>">Upload Berkas LPJ</a></li>
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