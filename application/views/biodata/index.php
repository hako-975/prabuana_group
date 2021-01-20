<!-- navbar -->
<?php $this->load->view('templates/navbar'); ?>
<div class="container-fluid">
  <div class="row">

    <!-- sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Karyawan</h2>
        <?php if (isset($error_insert)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Menambahkan Karyawan"></div>
        <?php endif ?>
        <?php if (isset($error_update)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Mengubah Karyawan"></div>
        <?php endif ?>
        <?php if ($dataUser['id_role'] == '1'): ?>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertBiodataModal"><i class="fas fa-fw fa-plus"></i> Tambah Karyawan</button>
        <?php endif ?>
      </div>

      <?php if ($dataUser['id_role'] == '1'): ?>
        <!-- Insert Biodata Modal -->
        <div class="modal fade" id="insertBiodataModal" tabindex="-1" aria-labelledby="insertBiodataModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form enctype="multipart/form-data" action="<?= base_url('biodata/insert'); ?>" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="insertBiodataModalLabel"><i class="fas fa-fw fa-plus"></i> Tambah Karyawan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label" for="full_name"><i class="fas fa-fw fa-user"></i> Nama Lengkap</label>
                    <input type="text" id="full_name" name="full_name" required class="form-control <?= (form_error('full_name')) ? 'is-invalid' : ''; ?>" value="<?= set_value('full_name'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('full_name'); ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="male"><i class="fas fa-fw fa-venus-mars"></i> Jenis Kelamin</label>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="male" value="male" checked>
                      <label class="form-check-label" for="male">
                        Laki-laki
                      </label>
                    </div>
                    <div class="form-check">
                      <input class="form-check-input" type="radio" name="gender" id="female" value="female">
                      <label class="form-check-label" for="female">
                        Perempuan
                      </label>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="phone_number"><i class="fas fa-fw fa-phone"></i> No. Telepon</label>
                    <input type="number" id="phone_number" name="phone_number" required class="form-control <?= (form_error('phone_number')) ? 'is-invalid' : ''; ?>" value="<?= set_value('phone_number'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('phone_number'); ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="email"><i class="fas fa-fw fa-envelope"></i> Email</label>
                    <input type="email" id="email" name="email" required class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" value="<?= set_value('email'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('email'); ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="address"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
                    <textarea id="address" class="form-control <?= (form_error('address')) ? 'is-invalid' : ''; ?>" name="address" required><?= set_value('address'); ?></textarea>
                    <div class="invalid-feedback">
                      <?= form_error('address'); ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <div class="row">
                      <div class="col-lg-4 text-center">
                        <a href="<?= base_url('assets/img/img_profiles/default.png'); ?>" class="enlarge check_enlarge_photo">
                          <img class="check_photo img-75 img-fluid rounded" src="<?= base_url('assets/img/img_profiles/default.png'); ?>" alt="photo">
                        </a>
                        <small class="d-block">Klik foto untuk perbesar</small>
                      </div>
                      <div class="col-lg">
                        <label for="photo" class="form-label"><i class="fas fa-fw fa-image"></i> Foto (opsional)</label>
                        <input class="form-control form-control-sm photo" name="photo" type="file" id="photo">
                      </div>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label for="file_cv" class="form-label"><i class="fas fa-fw fa-file-pdf"></i> File CV (opsional)</label>
                    <input class="form-control form-control-sm" name="file_cv" type="file" id="file_cv">
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
      <?php endif ?>

      <div class="table-responsive">
        <table class="table table-striped table-sm align-middle" id="table_id">
          <thead class="text-center">
            <tr>
              <th>No.</th>
              <th>Nama Lengkap</th>
              <th>Email</th>
              <th>No. Telepon</th>
              <th>Pengguna</th>
              <th>Aksi</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($biodata as $db): ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $db['full_name']; ?></td>
                <td><?= $db['email']; ?></td>
                <td><?= $db['phone_number']; ?></td>
                <td class="text-center my-auto">
                  <?php if ($db['id_user']): ?>
                    <a href="<?= base_url('user'); ?>" class="btn" data-bs-toggle="tooltip" data-bs-placement="top" title="<?= $db['username']; ?>">
                      &check;
                    </a>
                  <?php else: ?>
                    <i class="text-danger fas fa-fw fa-times"></i>
                  <?php endif ?>
                </td>
                <td>
                  <a class="m-1 btn btn-sm btn-info text-white" href="<?= base_url('biodata/detail/') . $db['id_biodata']; ?>"><i class="fas fa-fw fa-info"></i> Detail</a>
                  <!-- jika data pengguna itu sendiri -->
                  <!-- <?php if ($db['id_biodata'] == $dataUser['id_biodata']): ?>
                    <a class="m-1 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateBiodataModal<?= $db['id_biodata']; ?>" href="#"><i class="fas fa-fw fa-edit"></i> Ubah</a> 
                  <?php endif ?> -->
                  <!-- jika login sebagai admin -->
                  <?php if ($dataUser['id_role'] == '1'): ?>
                    <!-- jika bukan admin, dapat diubah dan dihapus -->
                    <?php if ($db['id_role'] != '1'): ?>
                      <a class="m-1 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateBiodataModal<?= $db['id_biodata']; ?>" href="#"><i class="fas fa-fw fa-edit"></i> Ubah</a> 
                      <a class="m-1 btn btn-sm btn-danger btn-delete" data-name="<?= $db['full_name']; ?>" href="<?= base_url('biodata/delete/') . $db['id_biodata']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                    <?php endif ?>
                  <?php endif ?>
                  
                  <!-- Modal Update -->
                  <div class="modal fade" id="updateBiodataModal<?= $db['id_biodata']; ?>" tabindex="-1" aria-labelledby="updateBiodataModalLabel<?= $db['id_biodata']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('biodata/update/') . $db['id_biodata']; ?>" method="post" enctype="multipart/form-data">
                        <input type="hidden" name="current_url" value="/">
                        <div class="modal-content ">
                          <div class="modal-header">
                            <h5 class="modal-title" id="updateBiodataModalLabel"><i class="fas fa-fw fa-edit"></i> Ubah Karyawan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label" for="full_name<?= $db['id_biodata']; ?>"><i class="fas fa-fw fa-user"></i> Nama Lengkap</label>
                              <input type="text" id="full_name<?= $db['id_biodata']; ?>" name="full_name" required class="form-control <?= (form_error('full_name')) ? 'is-invalid' : ''; ?>" value="<?= ($db['full_name']) ? $db['full_name'] : set_value('full_name'); ?>">
                              <div class="invalid-feedback">
                                <?= form_error('full_name'); ?>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="male<?= $db['id_biodata']; ?>"><i class="fas fa-fw fa-venus-mars"></i> Jenis Kelamin</label>
                              <div class="form-check">
                                <?php if ($db['gender'] == 'male'): ?>
                                  <input class="form-check-input" type="radio" name="gender" id="male<?= $db['id_biodata']; ?>" value="male" checked>
                                  <?php else: ?>
                                  <input class="form-check-input" type="radio" name="gender" id="male<?= $db['id_biodata']; ?>" value="male">
                                <?php endif ?>
                                <label class="form-check-label" for="male<?= $db['id_biodata']; ?>">
                                  Laki-laki
                                </label>
                              </div>
                              <div class="form-check">
                                <?php if ($db['gender'] == 'female'): ?>
                                  <input class="form-check-input" type="radio" name="gender" id="female<?= $db['id_biodata']; ?>" value="female" checked>
                                  <?php else: ?>
                                  <input class="form-check-input" type="radio" name="gender" id="female<?= $db['id_biodata']; ?>" value="female">
                                <?php endif ?>
                                <label class="form-check-label" for="female<?= $db['id_biodata']; ?>">
                                  Perempuan
                                </label>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="phone_number<?= $db['id_biodata']; ?>"><i class="fas fa-fw fa-phone"></i> No. Telepon</label>
                              <input type="number" id="phone_number<?= $db['id_biodata']; ?>" name="phone_number" required class="form-control <?= (form_error('phone_number')) ? 'is-invalid' : ''; ?>" value="<?= ($db['phone_number']) ? $db['phone_number'] : set_value('phone_number'); ?>">
                              <div class="invalid-feedback">
                                <?= form_error('phone_number'); ?>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="email<?= $db['id_biodata']; ?>"><i class="fas fa-fw fa-envelope"></i> Email</label>
                              <input type="email" id="email<?= $db['id_biodata']; ?>" name="email" required class="form-control <?= (form_error('email')) ? 'is-invalid' : ''; ?>" value="<?= ($db['email']) ? $db['email'] : set_value('email'); ?>">
                              <div class="invalid-feedback">
                                <?= form_error('email'); ?>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label class="form-label" for="address<?= $db['id_biodata']; ?>"><i class="fas fa-fw fa-map-marker-alt"></i> Alamat</label>
                              <textarea id="address<?= $db['id_biodata']; ?>" class="form-control <?= (form_error('address')) ? 'is-invalid' : ''; ?>" name="address" required><?= ($db['address']) ? $db['address'] : set_value('address'); ?></textarea>
                              <div class="invalid-feedback">
                                <?= form_error('email'); ?>
                              </div>
                            </div>
                            <div class="mb-3">
                              <div class="row">
                                <div class="col-lg-4 text-center">
                                  <a href="<?= base_url('assets/img/img_profiles/') . $db['photo']; ?>" class="enlarge check_enlarge_photo">
                                    <img class="check_photo img-75 img-fluid rounded" src="<?= base_url('assets/img/img_profiles/') . $db['photo']; ?>" alt="photo">
                                  </a>
                                  <small class="d-block">Klik foto untuk perbesar</small>
                                </div>
                                <div class="col-lg">
                                  <label for="photo<?= $db['id_biodata']; ?>" class="form-label"><i class="fas fa-fw fa-image"></i> Foto (opsional)</label>
                                  <input class="form-control form-control-sm check_photo photo" name="photo" id="photo<?= $db['id_biodata']; ?>" type="file">
                                  <small>Kosongkan jika tidak ingin mengubah</small>
                                </div>
                              </div>
                            </div>
                            <div class="mb-3">
                              <label for="file_cv<?= $db['id_biodata']; ?>" class="form-label"><i class="fas fa-fw fa-file-pdf"></i> File CV (opsional)</label>
                              <input class="form-control form-control-sm" name="file_cv" type="file" id="file_cv<?= $db['id_biodata']; ?>">
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
                </td>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
