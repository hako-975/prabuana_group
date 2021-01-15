<div class="container">
	<div class="row my-2">
		<div class="col-lg">
			<h2>Masuk</h2>
		</div>
	</div>
	<div class="row my-2">
		<div class="col-lg">
			<form action="<?= base_url('auth/login'); ?>" method="post">
				<div class="form-group my-2">
					<label for="username">Username</label>
					<input type="text" id="username" class="form-control" name="username" required>
				</div>
				<div class="form-group my-2">
					<label for="password">Password</label>
					<input type="password" id="password" class="form-control" name="password" required>
				</div>
				<div class="form-group my-2">
					<button type="submit" name="btnLogin" id="btnLogin" class="btn btn-primary">Login</button>
				</div>
			</form>
		</div>
	</div>
</div>