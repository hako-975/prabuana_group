	<!-- SweetAlert2 -->
	<div class="flashdata" data-flashdata="<?= $this->session->flashdata('message'); ?>"></div>
	<div class="flashdata-success" data-flashdata="<?= $this->session->flashdata('message-success'); ?>"></div>
	<div class="flashdata-failed" data-flashdata="<?= $this->session->flashdata('message-failed'); ?>"></div>

	<!-- jQuery, Popper, Bootstrap, ChartJS, DataTables, Fontawesome, SweetAlert2 -->
	<script src="<?= base_url('assets/vendor/jquery/jquery-3.5.1.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/popper/popper.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/bootstrap/js/bootstrap.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/chartjs/dist/Chart.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/DataTables-1.10.23/js/jquery.dataTables.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/datatables/DataTables-1.10.23/js/dataTables.bootstrap4.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/fontawesome/js/all.min.js'); ?>"></script>
	<script src="<?= base_url('assets/vendor/sweetalert2/dist/sweetalert2.all.min.js'); ?>"></script>
	<script src="<?= base_url('assets/js/prabuana_group.js'); ?>"></script>

	<!-- Configuration Plugin -->
	<script src="<?= base_url('assets/js/popper-config.js'); ?>"></script>
	<script src="<?= base_url('assets/js/datatables-config.js'); ?>"></script>
	<script src="<?= base_url('assets/js/sweetalert2-config.js'); ?>"></script>
  </body>
</html>