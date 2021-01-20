
<nav id="sidebarMenu" class="col-md-3 col-lg-2 d-md-block bg-light sidebar collapse">
  <div class="position-sticky pt-3">
    <ul class="nav flex-column">
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('main'); ?>">
          <i class="fas fa-fw fa-tachometer-alt"></i>
          Dasbor
        </a>
      </li>
      <?php if ($dataUser['id_role'] == '1'): ?>
        <li class="nav-item">
          <a class="nav-link" href="<?= base_url('role'); ?>">
            <i class="fas fa-fw fa-user-tie"></i>
            Jabatan
          </a>
        </li>
      <?php endif ?>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('user'); ?>">
          <i class="fas fa-fw fa-user"></i>
          Pengguna
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('biodata'); ?>">
          <i class="fas fa-fw fa-users"></i>
          Karyawan
        </a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="<?= base_url('log'); ?>">
          <i class="fas fa-fw fa-history"></i>
          Riwayat
        </a>
      </li>
    </ul>
  </div>
</nav>