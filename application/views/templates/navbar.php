<header class="navbar navbar-dark sticky-top bg-dark flex-md-nowrap p-0 shadow">
  <a class="navbar-brand col-md-3 col-lg-2 me-0 px-3" href="#">Prabuana Group</a>
  <button class="navbar-toggler position-absolute d-md-none collapsed" type="button" data-bs-toggle="collapse" data-bs-target="#sidebarMenu" aria-controls="sidebarMenu" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <input class="form-control form-control-dark w-100" type="text" placeholder="Cari" aria-label="Cari">
  <div class="btn-group">
    <button type="button" class="m-1 btn btn-secondary dropdown-toggle" data-bs-toggle="dropdown" data-bs-display="static" aria-expanded="false">
      <i class="fas fa-fw fa-user"></i> <?= $dataUser['username']; ?>
    </button>
    <ul class="dropdown-menu dropdown-menu-lg-end">
      <li><a href="<?= base_url('biodata/profile'); ?>" class="dropdown-item"><i class="fas fa-fw fa-user"></i> Profil</a></li>
      <li><a href="<?= base_url('auth/logout'); ?>" class="dropdown-item btn-logout"><i class="fas fa-fw fa-sign-out-alt"></i> Keluar</a></li>
    </ul>
  </div>
</header>
