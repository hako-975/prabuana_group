<!-- navbar -->
<?php $this->load->view('templates/navbar'); ?>
<div class="container-fluid">
  <div class="row">

    <!-- sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Profil - <?= $dataUser['full_name']; ?></h2>
        <?php if (isset($error_insert)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Menambahkan Profil"></div>
        <?php endif ?>
        <?php if (isset($error_update)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Mengubah Profil"></div>
        <?php endif ?>
      </div>
      <div class="row">
        <div class="col-lg-12">
          <div class="card mb-3 p-3">
            <div class="row g-0">
              <div class="col-md-3 my-auto text-center">
                <a href="<?= base_url('assets/img/img_profiles/') . $dataUser['photo']; ?>" class="enlarge">
                  <img class="img-300 img-fluid rounded" src="<?= base_url('assets/img/img_profiles/') . $dataUser['photo']; ?>" alt="<?= $dataUser['photo']; ?>">
                </a>
              </div>
              <div class="col-md">
                <div class="card-body">
                  <div class="row my-2">
                    <div class="col-8">
                      <h5><?= $dataUser['full_name']; ?></h5>
                    </div>
                    <div class="col-4 text-end">
                      <a class="mx-1 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateBiodataModal<?= $dataUser['id_biodata']; ?>" href="#"><i class="fas fa-fw fa-edit"></i></a> 
                      <a class="mx-1 btn btn-sm btn-danger desktop" data-bs-toggle="modal" data-bs-target="#changePasswordModal<?= $dataUser['id_biodata']; ?>" href="#"><i class="fas fa-fw fa-user-lock"></i> Ganti Kata Sandi</a> 
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg">
                      <?php if ($dataUser['username'] != null): ?>
                        <div class="row">
                          <div class="col">
                            <h6 class="fw-normal"><i class="fas fa-fw fa-user-tie"></i> <?= $dataUser['role_name']; ?></h6>
                          </div>
                          <div class="col">
                            <h6 class="fw-normal"><i class="fas fa-fw fa-user"></i> <?= $dataUser['username']; ?></h6>
                          </div>
                          <div class="col">
                            <?php if ($dataUser['gender'] == 'male'): ?>
                              <h6 class="fw-normal"><i class="fas fa-fw fa-mars"></i> Laki-laki</h6>
                            <?php else: ?>
                              <h6 class="fw-normal"><i class="fas fa-fw fa-venus"></i> Perempuan</h6>
                            <?php endif ?>
                          </div>
                        </div>
                      <?php else: ?>
                        <div class="row">
                          <div class="col">
                            <h6 class="fw-normal"><i class="fas fa-fw fa-user-tie"></i> -</h6>
                          </div>
                          <div class="col">
                            <h6 class="fw-normal"><i class="fas fa-fw fa-user"></i> -</h6>
                          </div>
                          <div class="col">
                            <?php if ($dataUser['gender'] == 'male'): ?>
                              <h6 class="fw-normal"><i class="fas fa-fw fa-mars"></i> Laki-laki</h6>
                            <?php else: ?>
                              <h6 class="fw-normal"><i class="fas fa-fw fa-venus"></i> Perempuan</h6>
                            <?php endif ?>
                          </div>
                        </div>
                      <?php endif ?>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg my-2">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-phone"></i> No. Telepon</h6>
                      <a class="text-dark text-decoration-none" target="_blank" href="https://api.whatsapp.com/send/?phone=<?= $dataUser['phone_number']; ?>"><b><?= $dataUser['phone_number']; ?></b></a>
                    </div>
                    <div class="col-lg my-2">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-envelope"></i> E-Mail</h6>
                      <a class="text-dark text-decoration-none" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $dataUser['email']; ?>"><b><?= $dataUser['email']; ?></b></a>
                    </div>
                    <div class="col-lg my-2">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</h6>
                      <a class="text-dark text-decoration-none" target="_blank" href="https://maps.google.com/?q=<?= $dataUser['address']; ?>"><b><?= $dataUser['address']; ?></b></a>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-file-pdf"></i> File CV</h6>
                      <?php if ($dataUser['file_cv'] == null): ?>
                        -
                      <?php else: ?>
                        <a target="_blank" class="text-dark text-decoration-none" href="<?= base_url('assets/file/file_cv/') . $dataUser['file_cv']; ?>"><b><?= $dataUser['file_cv']; ?></b></a>
                      <?php endif ?>
                    </div>
                  </div>
                  <div class="row my-2 android">
                    <div class="col-lg">
                      <a class="btn btn-sm btn-danger" data-bs-toggle="modal" data-bs-target="#changePasswordModal<?= $dataUser['id_biodata']; ?>" href="#"><i class="fas fa-fw fa-user-lock"></i> Ganti Password</a> 
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

<!-- Modal Update -->
<div class="modal fade" id="updateBiodataModal<?= $dataUser['id_biodata']; ?>" tabindex="-1" aria-labelledby="updateBiodataModalLabel<?= $dataUser['id_biodata']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('biodata/update/') . $dataUser['id_biodata']; ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="current_url" value="/profile/<?= $dataUser['id_biodata']; ?>">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="updateBiodataModalLabel"><i class="fas fa-fw fa-edit"></i> Ubah Profil</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="full_name<?= $dataUser['id_biodata']; ?>"><i class="fas fa-fw fa-user"></i> Nama Lengkap</label>
            <input type="text" id="full_name<?= $dataUser['id_biodata']; ?>" name="full_name" required class="form-control <?= (form_error('full_name')) ? 'is-invalid' : ''; ?>" value="<?= ($dataUser['full_name']) ? $dataUser['full_name'] : set_value('full_name'); ?>">
            <div class="invalid-feedback">
              <?= form_error('full_name'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="male<?= $dataUser['id_biodata']; ?>"><i class="fas fa-fw fa-venus-mars"></i> Jenis Kelamin</label>
            <div class="form-check">
              <?php if ($dataUser['gender'] == 'male'): ?>
                <input class="form-check-input" type="radio" name="gender" id="male<?= $dataUser['id_biodata']; ?>" value="male" checked>
                <?php else: ?>
                <input class="form-check-input" type="radio" name="gender" id="male<?= $dataUser['id_biodata']; ?>" value="male">
              <?php endif ?>
              <label class="form-check-label" for="male<?= $dataUser['id_biodata']; ?>">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <?php if ($dataUser['gender'] == 'female'): ?>
                <input class="form-check-input" type="radio" name="gender" id="female<?= $dataUser['id_biodata']; ?>" value="female" checked>
                <?php else: ?>
                <input class="form-check-input" type="radio" name="gender" id="female<?= $dataUser['id_biodata']; ?>" value="female">
              <?php endif ?>
              <label class="form-check-label" for="female<?= $dataUser['id_biodata']; ?>">
                Perempuan
              </label>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="phone_number<?= $dataUser['id_biodata']; ?>"><i class="fas fa-fw fa-phone"></i> No. Telepon</label>
            <input type="number" id="phone_number<?= $dataUser['id_biodata']; ?>" name="phone_number" required class="form-control <?= (form_error('phone_number')) ? 'is-invalid' : ''; ?>" value="<?= ($dataUser['phone_number']) ? $dataUser['phone_number'] : set_value('phone_number'); ?>">
            <div class="invalid-feedback">
              <?= form_error('phone_number'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="email<?= $dataUser['id_biodata']; ?>"><i class="fas fa-fw fa-envelope"></i> Email</label>
            <input type="email" id="email<?= $dataUser['id_biodata']; ?>" name="email" required class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" value="<?= ($dataUser['email']) ? $dataUser['email'] : set_value('email'); ?>">
            <div class="invalid-feedback">
              <?= form_error('email'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="address<?= $dataUser['id_biodata']; ?>"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
            <textarea id="address<?= $dataUser['id_biodata']; ?>" class="form-control <?= (form_error('address')) ? 'is-invalid' : ''; ?>" name="address" required><?= ($dataUser['address']) ? $dataUser['address'] : set_value('address'); ?></textarea>
            <div class="invalid-feedback">
              <?= form_error('email'); ?>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-lg-4 text-center">
                <a href="<?= base_url('assets/img/img_profiles/') . $dataUser['photo']; ?>" class="enlarge check_enlarge_photo">
                  <img class="check_photo img-75 img-fluid rounded" src="<?= base_url('assets/img/img_profiles/') . $dataUser['photo']; ?>" alt="photo">
                </a>
                <small class="d-block">Klik foto untuk perbesar</small>
              </div>
              <div class="col-lg">
                <label for="photo<?= $dataUser['id_biodata']; ?>" class="form-label"><i class="fas fa-fw fa-image"></i> Foto (opsional)</label>
                <input class="form-control form-control-sm check_photo photo" name="photo" id="photo<?= $dataUser['id_biodata']; ?>" type="file">
                <small>Kosongkan jika tidak ingin mengubah</small>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="file_cv<?= $dataUser['id_biodata']; ?>" class="form-label"><i class="fas fa-fw fa-file-pdf"></i> File CV (opsional)</label>
            <input class="form-control form-control-sm" name="file_cv" type="file" id="file_cv<?= $dataUser['id_biodata']; ?>">
            <small>Kosongkan jika tidak ingin mengubah</small>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>

<!-- Modal Change Password -->
<div class="modal fade" id="changePasswordModal<?= $dataUser['id_biodata']; ?>" tabindex="-1" aria-labelledby="changePasswordModalLabel<?= $dataUser['id_biodata']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('user/changePassword'); ?>" method="post" enctype="multipart/form-data">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="changePasswordModalLabel"><i class="fas fa-fw fa-lock"></i> Ganti Kata Sandi</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="old_password"><i class="fas fa-fw fa-lock"></i> Kata Sandi Lama</label>
            <input type="password" id="old_password" class="form-control" name="old_password" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="new_password"><i class="fas fa-fw fa-lock"></i> Kata Sandi Baru</label>
            <input type="password" id="new_password" class="form-control" name="new_password" required>
          </div>
          <div class="mb-3">
            <label class="form-label" for="verify_new_password"><i class="fas fa-fw fa-lock"></i> Verifikasi Kata Sandi Baru</label>
            <input type="password" id="verify_new_password" class="form-control" name="verify_new_password" required>
          </div>
        </div>
        <div class="modal-footer">
          <button type="button" class="btn btn-danger" data-bs-dismiss="modal"><i class="fas fa-fw fa-times"></i> Tutup</button>
          <button type="submit" class="btn btn-primary"><i class="fas fa-fw fa-save"></i> Simpan</button>
        </div>
      </div>
    </form>
  </div>
</div>