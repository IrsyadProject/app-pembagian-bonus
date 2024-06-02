<!DOCTYPE html>
<html lang="en">

<head>
	<meta charset="UTF-8">
	<meta name="viewport" content="width=device-width, initial-scale=1.0">
	<title><?= $judul; ?></title>
	<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css" integrity="sha512-SnH5WK+bZxgPHs44uWIX+LLJAJ9/2PkPKZ5QiAj6Ta86w+fsb2TkcmfRyVX3pBnMFcV7oQPJkl9QevSCWr3W6A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
	<link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-QWTKZyjpPEjISv5WaRU9OFeRpok6YctnYmDr5pNlyT2bRjXh0JMhjY6hW+ALEwIH" crossorigin="anonymous">
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.dataTables.css" />
	<link rel="stylesheet" href="https://cdn.datatables.net/2.0.8/css/dataTables.bootstrap5.css">
	<script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body class="bg-dark">
	<nav class="navbar navbar-expand-lg bg-primary" data-bs-theme="dark">
		<div class="container-fluid">
			<a class="navbar-brand" href="<?= base_url('dashboard') ?>"><i class="fa-solid fa-cash-register fa-lg fa-fw"></i></a>
			<button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
				<span class="navbar-toggler-icon"></span>
			</button>
			<div class="collapse navbar-collapse" id="navbarSupportedContent">
				<ul class="navbar-nav me-auto mb-2 mb-lg-0">
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('dashboard') ?>"><i class="fa-solid fa-gauge fa-fw"></i> Dashboard</a>
					</li>
					<li class="nav-item">
						<a class="nav-link" href="<?= base_url('bonus') ?>"><i class="fa-solid fa-hand-holding-dollar fa-fw"></i> Pembagian Bonus</a>
					</li>
					<?php if ($this->session->userdata('logged_in')->role == 'admin') : ?>
						<li class="nav-item">
							<a class="nav-link" href="<?= base_url('listusers') ?>"><i class="fa-solid fa-users fa-fw"></i> Daftar Pengguna</a>
						</li>
					<?php endif ?>
				</ul>
				<div class="d-flex">
					<button class="btn btn-danger" onclick="confirmLogout()"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Logout</button>
				</div>
			</div>
		</div>
	</nav>