<div class="main-sidebar">
        <aside id="sidebar-wrapper">
          <div class="sidebar-brand">
            <a href="index.html">Simanis</a>
          </div>
          <div class="sidebar-brand sidebar-brand-sm">
            <a href="index.html">St</a>
          </div>
          <ul class="sidebar-menu">
              <li class="menu-header">Dashboard</li>
              
              
              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-cog"></i> <span>User</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('admin/manage_user') ?>">Manage user</a></li>
                  <li><a class="nav-link" href="bootstrap-alert.html">Reset Password</a></li>
                </ul>
              </li>

              <li class="nav-item dropdown">
                <a href="#" class="nav-link has-dropdown"><i class="fas fa-user-cog"></i> <span>Kelola Otp</span></a>
                <ul class="dropdown-menu">
                  <li><a class="nav-link" href="<?php echo base_url('admin/durasiotp') ?>">Durasi Otp</a></li>
                </ul>
              </li>

              <li class="nav-item ">
                <a href="<?php echo base_url('admin/durasilogin') ?>" class="nav-link"><i class="fas fa-user-cog"></i> <span>Kelola Durasi Login</span></a>
              </li>


            <div class="mt-4 mb-4 p-3 hide-sidebar-mini">
              <a href="<?php echo base_url('dashboard/dashboard/logout') ?>" class="btn btn-danger btn-lg btn-block btn-icon-split">
                <i class="fas fa-sign-out-alt"></i> Logout
              </a>
            </div>
        </aside>
      </div>
</div>
 