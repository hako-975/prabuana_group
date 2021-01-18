<!-- navbar -->
<?php $this->load->view('templates/navbar'); ?>
<div class="container-fluid">
  <div class="row">

    <!-- sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Detail Karyawan - <?= $biodata['full_name']; ?></h2>
        <?php if (isset($error_insert)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Menambahkan Karyawan"></div>
        <?php endif ?>
        <?php if (isset($error_update)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Mengubah Karyawan"></div>
        <?php endif ?>
      </div>
      <div class="row">
        <div class="col-lg-8">
          <div class="card mb-3 p-3">
            <div class="row g-0">
              <div class="col-md-3 my-auto">
                <a href="<?= base_url('assets/img/img_profiles/') . $biodata['photo']; ?>" class="enlarge">
                  <img class="img-fluid rounded" src="<?= base_url('assets/img/img_profiles/') . $biodata['photo']; ?>" alt="<?= $biodata['photo']; ?>">
                </a>
              </div>
              <div class="col-md">
                <div class="card-body">
                  <div class="row my-2">
                    <div class="col-10">
                      <h5><?= $biodata['full_name']; ?></h5>
                    </div>
                    <div class="col-2">
                      <a href="" class="btn float-end btn-sm btn-success"><i class="fas fa-fw fa-edit"></i></a>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg">
                      <?php if ($biodata['username'] != null): ?>
                        <h6 class="fw-normal"><i class="fas fa-fw fa-user"></i> <?= $biodata['username']; ?></h6>
                      <?php else: ?>
                        <h6 class="fw-normal"><i class="fas fa-fw fa-user"></i> -</h6>
                      <?php endif ?>
                      <?php if ($biodata['gender'] == 'male'): ?>
                        <i class="fas fa-fw fa-mars text-danger"></i> Laki-laki
                      <?php else: ?>
                        <i class="fas fa-fw fa-venus text-primary"></i> Perempuan
                      <?php endif ?>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-envelope"></i> E-Mail</h6>
                      <a target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $biodata['email']; ?>"><b><?= $biodata['email']; ?></b></a>
                    </div>
                    <div class="col-lg">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-phone"></i> No. Telepon</h6>
                      <a target="_blank" href="https://api.whatsapp.com/send/?phone=<?= $biodata['phone_number']; ?>"><b><?= $biodata['phone_number']; ?></b></a>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-map-marker-alt"></i> Address</h6>
                      <a target="_blank" href="https://maps.google.com/?q=<?= $biodata['address']; ?>"><b><?= $biodata['address']; ?></b></a>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </main>
  </div>
</div>
