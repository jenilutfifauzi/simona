<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">SIMONA.</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Sm</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item">
                <a href="<?php echo base_url('perencanaan/perencanaan') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>
              <li class="nav-item dropdown">
                <a href="<?php echo base_url('perencanaan/perencanaan') ?>" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Perencanaan</span></a>
                <ul class="dropdown-menu">
                  <!-- <li><a class="nav-link" href="<?php echo base_url('perencanaan/tambahrka') ?>">Tambah RKA</a></li> -->
                  <li><a class="nav-link" href="<?php echo base_url('perencanaan/uploadrka') ?>">Upload RKA</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('perencanaan/tambahkomponen') ?>">Tambah Komponen</a></li>
                  <li><a class="nav-link" href="<?php echo base_url('perencanaan/tambahakunkegiatan') ?>">Tambah Akun Kegiatan</a></li>
                </ul>
              </li>
              
              <li class="nav-item">
                <a href="<?php echo base_url('perencanaan/daftar_draf_anggaran') ?>" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>Daftar Draf Anggaran</span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('perencanaan/disposisi') ?>" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>Lihat Disposisi</span></a>
              </li>
              <li class="nav-item">
                <a href="<?php echo base_url('perencanaan/dateline') ?>" class="nav-link"><i class="fas fa-file-invoice-dollar"></i><span>Dateline</span></a>
              </li>

              <li class="nav-item dropdown">
                <a href="<?php echo base_url('perencanaan/perencanaan') ?>" class="nav-link has-dropdown"><i class="fas fa-th"></i> <span>Pencairan</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('perencanaan/status_pencairan') ?>">Status Pencairan</a>
                  </li>
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
 