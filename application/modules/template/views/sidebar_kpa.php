<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="">SIMONA.</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">Sm</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              <li class="nav-item ">
                <a href="<?php echo base_url('Wadir1/') ?>" class="nav-link"><i class="fas fa-fire"></i><span>Dashboard</span></a>
              </li>

              <li class="menu-header">Perencanaan </li>
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas  fa-file-invoice-dollar"></i><span>Validasi Draf</span></a>
            
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('Kpa/usulan_anggaran_thn_keg_baru') ?>">Usulan Kegiatan Baru</a></li>
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