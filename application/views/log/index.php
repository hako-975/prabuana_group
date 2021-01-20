<!-- navbar -->
<?php $this->load->view('templates/navbar'); ?>
<div class="container-fluid">
  <div class="row">

    <!-- sidebar -->
    <?php $this->load->view('templates/sidebar'); ?>

    <main class="col-md-9 ms-sm-auto col-lg-10 px-md-4">
      <div class="d-flex justify-content-between flex-wrap flex-md-nowrap align-items-center pt-3 pb-2 mb-3 border-bottom">
        <h2>Riwayat</h2>
      </div>

      <div class="table-responsive">
        <table class="table table-striped table-sm align-middle" id="table_id">
          <thead>
            <tr>
              <th>No. </th>
              <th style="width: 49.5rem">Isi Riwayat</th>
              <th>Tanggal</th>
              <th>Pelaku</th>
            </tr>
          </thead>
          <tbody>
            <?php $i = 1; ?>
            <?php foreach ($log as $dl): ?>

              <?php 
                $data = $this->db->get_where('users', ['id_user' => $dl['id_user']])->row_array();
              ?>

              <tr>
                <td><?= $i++; ?></td>
                <td><?= $dl['content_log']; ?></td>
                <td><?= date("d-m-Y, H:i:s", $dl['date_log']); ?></td>
                <?php if ($data != null): ?>
                  <td><?= $data['username']; ?></td>
                <?php else: ?>
                  <td>-</td>
                <?php endif ?>
                  
              </tr>
            <?php endforeach ?>
          </tbody>
        </table>
      </div>
    </main>
  </div>
</div>
