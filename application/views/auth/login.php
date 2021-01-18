<div class="container">
	<div class="row my-2">
		<div class="col-lg">
			<h2>Masuk</h2>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-lg-4">
			<form action="<?= base_url('auth/login'); ?>" method="post">
				<div class="mb-3">
					<label class="form-label" for="username"><i class="fas fa-fw fa-user"></i> Nama Pengguna atau Email</label>
					<input type="text" id="username" class="form-control" name="username" required>
				</div>
				<div class="mb-3">
					<label class="form-label" for="password"><i class="fas fa-fw fa-lock"></i> Kata Sandi</label>
					<input type="password" id="password" class="form-control" name="password" required>
				</div>
				<div class="mb-3">
					<button type="submit" name="btnLogin" id="btnLogin" class="btn btn-primary"><i class="fas fa-fw fa-sign-in-alt"></i> Masuk</button>
				</div>
			</form>
		</div>
	</div>
</div>