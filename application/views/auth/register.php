<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $judul; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-dark">
	<div class="container mt-5 pt-5">
		<div class="row justify-content-center">
			<div class="col-md-4">
				<div class="card">
					<div class="card-header text-center bg-primary text-white">
						<h3><i class="fa-solid fa-cash-register fa-fw"></i> Aplikasi Pembagian Bonus</h3>
					</div>
					<div class="card-body">
						<?php if ($this->session->flashdata('message')) : ?>
							<script>
								const Toast = Swal.mixin({
									toast: true,
									position: "top-end",
									showConfirmButton: false,
									timer: 3000,
									timerProgressBar: true,
									didOpen: (toast) => {
										toast.onmouseenter = Swal.stopTimer;
										toast.onmouseleave = Swal.resumeTimer;
									}
								});
								Toast.fire({
									icon: "<?= $this->session->flashdata('message')['type'] ?>",
									title: "<?= $this->session->flashdata('message')['text'] ?>"
								});
							</script>
						<?php endif; ?>
						<form action="<?= base_url('register') ?>" method="post">
							<div class="mb-3">
								<label for="username" class="form-label">Username</label>
								<input type="text" class="form-control" id="username" name="username">
								<?= form_error('username', '<small class="text-danger ps-2">', '</small>'); ?>
							</div>
							<div class="mb-3">
								<label for="password" class="form-label">Password</label>
								<input type="password" class="form-control" id="password" name="password">
								<?= form_error('password', '<small class="text-danger ps-2">', '</small>'); ?>
							</div>
							<div class="mb-3">
								<label for="role" class="form-label">Role</label>
								<select class="form-select" id="role" name="role">
									<option value="">== Pilih Role ==</option>
									<option value="admin">Admin</option>
									<option value="user">User</option>
								</select>
								<?= form_error('role', '<small class="text-danger ps-2">', '</small>'); ?>
							</div>
							<div class="d-grid gap-2">
								<button type="submit" class="btn btn-primary"><i class="fa-solid fa-floppy-disk fa-fw"></i> Registrasi</button>
							</div>
							<small>Sudah punya akun? <a href="<?= base_url() ?>" class=" text-decoration-none">Login</a></small>
						</form>
					</div>
					<div class="card-footer bg-primary text-white">
						<span>dibuat oleh <a href="https://www.instagram.com/99ir.ib/" target="_blank" class=" text-decoration-none fw-bold text-warning"><i class="fa-brands fa-instagram fa-fw"></i> 99ir.ib</a></span>
					</div>
				</div>
			</div>
		</div>
	</div>

	<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
	<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
</body>

</html>