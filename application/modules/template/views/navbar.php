<div id="app">
    <div class="main-wrapper">
      <div class="navbar-bg"></div>
      <nav class="navbar navbar-expand-lg main-navbar">
        <form class="form-inline mr-auto">
        
        </form>
        <ul class="navbar-nav navbar-right">
          
          <li class="dropdown"><a href="#" data-toggle="dropdown" class="nav-link dropdown-toggle nav-link-lg nav-link-user">
            <img alt="image" src="<?= base_url('assets/stisla-master/assets/img/avatar/avatar-1.png')?>" class="rounded-circle mr-1">
            <div class="d-sm-none d-lg-inline-block">Hi, <?= $name; ?></div></a>
            <div class="dropdown-menu dropdown-menu-right">
              <a href="<?= base_url('dashboard/logout')?>" class="dropdown-item has-icon">
                <i class="fas fa-sign-out"></i>Logout
              </a>
              
            </div>
          </li>
        </ul>
      </nav>
</div>