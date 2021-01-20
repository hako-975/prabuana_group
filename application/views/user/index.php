<!-- navbar -->
<?php $this->load->view('templates/navbar'); ?>
<div class="container-fluid">
  <div class="row">

    <!-- sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Pengguna</h2>
        <?php if (isset($error_insert)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Menambahkan Pengguna"></div>
        <?php endif ?>
        <?php if (isset($error_update)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Mengubah Pengguna"></div>
        <?php endif ?>
        <?php if ($dataUser['id_role'] == '1'): ?>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertUserModal"><i class="fas fa-fw fa-plus"></i> Tambah Pengguna</button>
        <?php endif ?>
      </div>

      <?php if ($dataUser['id_role'] == '1'): ?>
        <!-- Insert User Modal -->
        <div class="modal fade" id="insertUserModal" tabindex="-1" aria-labelledby="insertUserModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="<?= base_url('user/insert'); ?>" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="insertUserModalLabel"><i class="fas fa-fw fa-plus"></i> Tambah Pengguna</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label" for="id_biodata"><i class="fas fa-fw fa-id-badge"></i> Nama Karyawan</label>
                    <select id="id_biodata" class="form-select <?= (form_error('id_biodata')) ? 'is-invalid' : ''; ?>" name="id_biodata">
                      <option value="0">--- Pilih Karyawan ---</option>
                      <?php foreach ($biodata as $db): ?>
                        <?php if ($db['id_user']): ?>
                          <option disabled class="bg-secondary text-white" value="<?= $db['id_biodata']; ?>"><?= $db['full_name']; ?> | <?= $db['email']; ?> | <?= $db['username']; ?></option>
                        <?php else: ?>
                          <option value="<?= $db['id_biodata']; ?>"><?= $db['full_name']; ?> | <?= $db['email']; ?></option>
                        <?php endif ?>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('id_biodata'); ?>
                    </div>
                    <?php if ($dataUser['id_role'] == '1'): ?>
                      <small><a class="btn-confirm" data-name="Buat baru karyawan" href="<?= base_url('biodata'); ?>">Buat baru karyawan</a></small>
                    <?php endif ?>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="id_role"><i class="fas fa-fw fa-id-badge"></i> Nama Jabatan</label>
                    <select id="id_role" class="form-select <?= (form_error('id_role')) ? 'is-invalid' : ''; ?>" name="id_role">
                      <option value="0">--- Pilih Jabatan ---</option>
                      <?php foreach ($role as $dr): ?>
                        <option value="<?= $dr['id_role']; ?>"><?= $dr['role_name']; ?></option>
                      <?php endforeach ?>
                    </select>
                    <div class="invalid-feedback">
                      <?= form_error('id_role'); ?>
                    </div>
                    <?php if ($dataUser['id_role'] == '1'): ?>
                      <small><a class="btn-confirm" data-name="Buat baru jabatan" href="<?= base_url('role'); ?>">Buat baru jabatan</a></small>
                    <?php endif ?>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="username"><i class="fas fa-fw fa-user"></i> Nama Pengguna</label>
                    <input type="text" id="username" name="username" required class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" value="<?= set_value('username'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('username'); ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="password"><i class="fas fa-fw fa-user-lock"></i> Kata Sandi</label>
                    <input type="password" id="password" name="password" required class="form-control <?= (form_error('password')) ? 'is-invalid' : ''; ?>" value="<?= set_value('password'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('password'); ?>
                    </div>
                  </div>
                  <div class="mb-3">
                    <label class="form-label" for="password_verify"><i class="fas fa-fw fa-user-lock"></i> Verifikasi Kata Sandi</label>
                    <input type="password" id="password_verify" name="password_verify" required class="form-control <?= (form_error('password_verify')) ? 'is-invalid' : ''; ?>" value="<?= set_value('password_verify'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('password_verify'); ?>
                    </div>
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
          <thead>
            <tr>
              <th>No.</th>
              <th>Nama Pengguna</th>
              <th>Jabatan</th>
              <th>Nama Lengkap</th>
              <?php if ($dataUser['id_user'] == '1'): ?>
                <th>Aksi</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($user as $du): ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $du['username']; ?></td>
                <td><?= $du['role_name']; ?></td>
                <td><?= $du['full_name']; ?></td>
                <!-- jika pengguna sebagai admin -->
                <?php if ($dataUser['id_role'] == '1'): ?>
                  <td>
                    <!-- jika bukan pengguna jabatan admin, dapat diubah dan dihapus -->
                    <?php if ($du['id_role'] != '1'): ?>
                      <a class="m-1 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateUserModal<?= $du['id_user']; ?>" href="#"><i class="fas fa-fw fa-edit"></i> Ubah</a> 
                      <a class="m-1 btn btn-sm btn-danger btn-delete" data-name="<?= $du['username']; ?>" href="<?= base_url('user/delete/') . $du['id_user']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                    <?php endif ?>
                    <!-- modal update -->
                    <div class="modal fade" id="updateUserModal<?= $du['id_user']; ?>" tabindex="-1" aria-labelledby="updateUserModalLabel<?= $du['id_user']; ?>" aria-hidden="true">
                      <div class="modal-dialog">
                        <form action="<?= base_url('user/update'); ?>" method="post">
                          <div class="modal-content">
                            <div class="modal-header">
                              <h5 class="modal-title" id="updateUserModalLabel<?= $du['id_user']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah Pengguna</h5>
                              <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                            </div>
                            <div class="modal-body">
                              <div class="mb-3">
                                <label class="form-label" for="id_biodata"><i class="fas fa-fw fa-id-badge"></i> Nama Karyawan</label>
                                <input style="cursor: not-allowed;" class="form-control" type="text" disabled value="<?= $du['full_name']; ?>">
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="id_role"><i class="fas fa-fw fa-id-badge"></i> Nama Jabatan</label>
                                <select id="id_role" class="form-select <?= (form_error('id_role')) ? 'is-invalid' : ''; ?>" name="id_role">
                                  <option value="<?= $du['id_role']; ?>"><?= $du['role_name']; ?></option>
                                  <?php foreach ($role as $dr): ?>
                                    <?php if ($du['id_role'] != $dr['id_role']): ?>
                                      <option value="<?= $dr['id_role']; ?>"><?= $dr['role_name']; ?></option>
                                    <?php endif ?>
                                  <?php endforeach ?>
                                </select>
                                <div class="invalid-feedback">
                                  <?= form_error('id_role'); ?>
                                </div>
                              </div>
                              <div class="mb-3">
                                <label class="form-label" for="username"><i class="fas fa-fw fa-user"></i> Nama Pengguna</label>
                                <input type="text" id="username" name="username" required class="form-control <?= (form_error('username')) ? 'is-invalid' : ''; ?>" value="<?= ($du['username']) ? $du['username'] : set_value('username'); ?>">
                                <div class="invalid-feedback">
                                  <?= form_error('username'); ?>
                                </div>
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
                <?php endif ?>
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
