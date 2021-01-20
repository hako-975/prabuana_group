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
        <div class="col-lg-12">
          <div class="card mb-3 p-3">
            <div class="row g-0">
              <div class="col-md-3 my-auto text-center">
                <a href="<?= base_url('assets/img/img_profiles/') . $biodata['photo']; ?>" class="enlarge">
                  <img class="img-300 img-fluid rounded" src="<?= base_url('assets/img/img_profiles/') . $biodata['photo']; ?>" alt="<?= $biodata['photo']; ?>">
                </a>
              </div>
              <div class="col-md">
                <div class="card-body">
                  <div class="row my-2">
                    <div class="col-8">
                      <h5><?= $biodata['full_name']; ?></h5>
                    </div>
                    <div class="col-4 text-end">
                      <!-- Jika login sebagai admin -->
                      <?php if ($dataUser['id_role'] == '1'): ?>
                        <!-- jika bukan admin, dapat diubah dan dihapus -->
                        <?php if ($biodata['id_role'] != '1'): ?>
                          <a class="mx-1 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateBiodataModal<?= $biodata['id_biodata']; ?>" href="#"><i class="fas fa-fw fa-edit"></i></a> 
                          <a class="mx-1 btn btn-sm btn-danger btn-delete" data-name="<?= $biodata['full_name']; ?>" href="<?= base_url('biodata/delete/') . $biodata['id_biodata']; ?>"><i class="fas fa-fw fa-trash"></i></a>
                        <?php endif ?>
                      <?php endif ?>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg">
                      <?php if ($biodata['username'] != null): ?>
                        <div class="row">
                          <div class="col">
                            <h6 class="fw-normal"><i class="fas fa-fw fa-user-tie"></i> <?= $biodata['role_name']; ?></h6>
                          </div>
                          <div class="col">
                            <h6 class="fw-normal"><i class="fas fa-fw fa-user"></i> <?= $biodata['username']; ?></h6>
                          </div>
                          <div class="col">
                            <?php if ($biodata['gender'] == 'male'): ?>
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
                            <?php if ($biodata['gender'] == 'male'): ?>
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
                      <a class="text-dark text-decoration-none" target="_blank" href="https://api.whatsapp.com/send/?phone=<?= $biodata['phone_number']; ?>"><b><?= $biodata['phone_number']; ?></b></a>
                    </div>
                    <div class="col-lg my-2">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-envelope"></i> E-Mail</h6>
                      <a class="text-dark text-decoration-none" target="_blank" href="https://mail.google.com/mail/?view=cm&fs=1&to=<?= $biodata['email']; ?>"><b><?= $biodata['email']; ?></b></a>
                    </div>
                    <div class="col-lg my-2">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</h6>
                      <a class="text-dark text-decoration-none" target="_blank" href="https://maps.google.com/?q=<?= $biodata['address']; ?>"><b><?= $biodata['address']; ?></b></a>
                    </div>
                  </div>
                  <div class="row my-2">
                    <div class="col-lg">
                      <h6 class="fw-normal"><i class="fas fa-fw fa-file-pdf"></i> File CV</h6>
                      <?php if ($biodata['file_cv'] == null): ?>
                        -
                      <?php else: ?>
                        <a target="_blank" class="text-dark text-decoration-none" href="<?= base_url('assets/file/file_cv/') . $biodata['file_cv']; ?>"><b><?= $biodata['file_cv']; ?></b></a>
                      <?php endif ?>
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
<div class="modal fade" id="updateBiodataModal<?= $biodata['id_biodata']; ?>" tabindex="-1" aria-labelledby="updateBiodataModalLabel<?= $biodata['id_biodata']; ?>" aria-hidden="true">
  <div class="modal-dialog">
    <form action="<?= base_url('biodata/update/') . $biodata['id_biodata']; ?>" method="post" enctype="multipart/form-data">
      <input type="hidden" name="current_url" value="/detail/<?= $biodata['id_biodata']; ?>">
      <div class="modal-content ">
        <div class="modal-header">
          <h5 class="modal-title" id="updateBiodataModalLabel"><i class="fas fa-fw fa-edit"></i> Ubah Karyawan</h5>
          <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
        </div>
        <div class="modal-body">
          <div class="mb-3">
            <label class="form-label" for="full_name<?= $biodata['id_biodata']; ?>"><i class="fas fa-fw fa-user"></i> Nama Lengkap</label>
            <input type="text" id="full_name<?= $biodata['id_biodata']; ?>" name="full_name" required class="form-control <?= (form_error('full_name')) ? 'is-invalid' : ''; ?>" value="<?= ($biodata['full_name']) ? $biodata['full_name'] : set_value('full_name'); ?>">
            <div class="invalid-feedback">
              <?= form_error('full_name'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="male<?= $biodata['id_biodata']; ?>"><i class="fas fa-fw fa-venus-mars"></i> Jenis Kelamin</label>
            <div class="form-check">
              <?php if ($biodata['gender'] == 'male'): ?>
                <input class="form-check-input" type="radio" name="gender" id="male<?= $biodata['id_biodata']; ?>" value="male" checked>
                <?php else: ?>
                <input class="form-check-input" type="radio" name="gender" id="male<?= $biodata['id_biodata']; ?>" value="male">
              <?php endif ?>
              <label class="form-check-label" for="male<?= $biodata['id_biodata']; ?>">
                Laki-laki
              </label>
            </div>
            <div class="form-check">
              <?php if ($biodata['gender'] == 'female'): ?>
                <input class="form-check-input" type="radio" name="gender" id="female<?= $biodata['id_biodata']; ?>" value="female" checked>
                <?php else: ?>
                <input class="form-check-input" type="radio" name="gender" id="female<?= $biodata['id_biodata']; ?>" value="female">
              <?php endif ?>
              <label class="form-check-label" for="female<?= $biodata['id_biodata']; ?>">
                Perempuan
              </label>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="phone_number<?= $biodata['id_biodata']; ?>"><i class="fas fa-fw fa-phone"></i> No. Telepon</label>
            <input type="number" id="phone_number<?= $biodata['id_biodata']; ?>" name="phone_number" required class="form-control <?= (form_error('phone_number')) ? 'is-invalid' : ''; ?>" value="<?= ($biodata['phone_number']) ? $biodata['phone_number'] : set_value('phone_number'); ?>">
            <div class="invalid-feedback">
              <?= form_error('phone_number'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="email<?= $biodata['id_biodata']; ?>"><i class="fas fa-fw fa-envelope"></i> Email</label>
            <input type="email" id="email<?= $biodata['id_biodata']; ?>" name="email" required class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" value="<?= ($biodata['email']) ? $biodata['email'] : set_value('email'); ?>">
            <div class="invalid-feedback">
              <?= form_error('email'); ?>
            </div>
          </div>
          <div class="mb-3">
            <label class="form-label" for="address<?= $biodata['id_biodata']; ?>"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
            <textarea id="address<?= $biodata['id_biodata']; ?>" class="form-control <?= (form_error('address')) ? 'is-invalid' : ''; ?>" name="address" required><?= ($biodata['address']) ? $biodata['address'] : set_value('address'); ?></textarea>
            <div class="invalid-feedback">
              <?= form_error('email'); ?>
            </div>
          </div>
          <div class="mb-3">
            <div class="row">
              <div class="col-lg-4 text-center">
                <a href="<?= base_url('assets/img/img_profiles/') . $biodata['photo']; ?>" class="enlarge check_enlarge_photo">
                  <img class="check_photo img-75 img-fluid rounded" src="<?= base_url('assets/img/img_profiles/') . $biodata['photo']; ?>" alt="photo">
                </a>
                <small class="d-block">Klik foto untuk perbesar</small>
              </div>
              <div class="col-lg">
                <label for="photo<?= $biodata['id_biodata']; ?>" class="form-label"><i class="fas fa-fw fa-image"></i> Foto (opsional)</label>
                <input class="form-control form-control-sm check_photo photo" name="photo" id="photo<?= $biodata['id_biodata']; ?>" type="file">
                <small>Kosongkan jika tidak ingin mengubah</small>
              </div>
            </div>
          </div>
          <div class="mb-3">
            <label for="file_cv<?= $biodata['id_biodata']; ?>" class="form-label"><i class="fas fa-fw fa-file-pdf"></i> File CV (opsional)</label>
            <input class="form-control form-control-sm" name="file_cv" type="file" id="file_cv<?= $biodata['id_biodata']; ?>">
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