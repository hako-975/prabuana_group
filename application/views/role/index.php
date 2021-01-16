<!-- navbar -->
<?php $this->load->view('templates/navbar'); ?>
<div class="container-fluid">
  <div class="row">

    <!-- sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Jabatan</h2>
        <?php if (isset($error_insert)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Menambahkan Jabatan"></div>
        <?php endif ?>
        <?php if (isset($error_update)): ?>
          <div class="flashdata-failed" data-flashdata="Gagal Mengubah Jabatan"></div>
        <?php endif ?>
        <?php if ($dataUser['id_role'] == '1'): ?>
          <button class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#insertRoleModal"><i class="fas fa-fw fa-plus"></i> Tambah Jabatan</button>
        <?php endif ?>
      </div>

      <?php if ($dataUser['id_role'] == '1'): ?>
        <!-- Insert Role Modal -->
        <div class="modal fade" id="insertRoleModal" tabindex="-1" aria-labelledby="insertRoleModalLabel" aria-hidden="true">
          <div class="modal-dialog">
            <form action="<?= base_url('role/insert'); ?>" method="post">
              <div class="modal-content">
                <div class="modal-header">
                  <h5 class="modal-title" id="insertRoleModalLabel"><i class="fas fa-fw fa-plus"></i> Tambah Jabatan</h5>
                  <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                  <div class="mb-3">
                    <label class="form-label" for="role_name"><i class="fas fa-fw fa-user"></i> Nama Jabatan</label>
                    <input type="text" id="role_name" name="role_name" required class="form-control <?= (form_error('role_name')) ? 'is-invalid' : ''; ?>" value="<?= set_value('role_name'); ?>">
                    <div class="invalid-feedback">
                      <?= form_error('role_name'); ?>
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
              <th>Nama Jabatan</th>
              <?php if ($dataUser['id_role'] == '1'): ?>
                <th>Aksi</th>
              <?php endif ?>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($role as $dr): ?>
              <tr>
                <td><?= $i++; ?></td>
                <td><?= $dr['role_name']; ?></td>
                <?php if ($dataUser['id_role'] == '1'): ?>
                  <td>
                  <?php if ($dr['id_role'] != '1'): ?>
                    <a class="m-1 btn btn-sm btn-success" data-bs-toggle="modal" data-bs-target="#updateRoleModal<?= $dr['id_role']; ?>" href="#"><i class="fas fa-fw fa-edit"></i> Ubah</a> 
                    <a class="m-1 btn btn-sm btn-danger btn-delete" data-name="<?= $dr['role_name']; ?>" href="<?= base_url('role/delete/') . $dr['id_role']; ?>"><i class="fas fa-fw fa-trash"></i> Hapus</a>
                  <?php endif ?>

                  <!-- Modal Update -->
                  <div class="modal fade" id="updateRoleModal<?= $dr['id_role']; ?>" tabindex="-1" aria-labelledby="insertRoleModalLabel<?= $dr['id_role']; ?>" aria-hidden="true">
                    <div class="modal-dialog">
                      <form action="<?= base_url('role/update/') . $dr['id_role']; ?>" method="post">
                        <div class="modal-content">
                          <div class="modal-header">
                            <h5 class="modal-title" id="insertRoleModalLabel<?= $dr['id_role']; ?>"><i class="fas fa-fw fa-edit"></i> Ubah Jabatan</h5>
                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                          </div>
                          <div class="modal-body">
                            <div class="mb-3">
                              <label class="form-label" for="role_name<?= $dr['id_role']; ?>"><i class="fas fa-fw fa-user"></i> Nama Jabatan</label>
                              <input type="text" id="role_name<?= $dr['id_role']; ?>" name="role_name" required class="form-control <?= (form_error('role_name')) ? 'is-invalid' : ''; ?>" value="<?= ($dr['role_name']) ? $dr['role_name'] : set_value('role_name'); ?>">
                              <div class="invalid-feedback">
                                <?= form_error('role_name'); ?>
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
