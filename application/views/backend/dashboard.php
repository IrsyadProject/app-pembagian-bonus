<div class="container" style="min-height: 80vh;">
	<div class="row justify-content-center">
		<div class="col-md">
			<h1 class="text-white pt-3">Selamat datang, <?= $this->session->userdata('logged_in')->username ?>!</h1>
			<p class="text-white fst-italic">Kamu berperan sebagai seorang <?= $this->session->userdata('logged_in')->role ?></p>
			<div class="card mb-3
			" style="max-width: 18rem;">
				<div class="card-header text-bg-primary">Total Data Pembagian Bonus:</div>
				<div class="card-body">
					<h2 class="card-title"><?= $totaldatabonus ?></h2>
				</div>
			</div>
			<a href="<?= base_url('bonus') ?>" class="btn btn-primary"><i class="fa-solid fa-hand-holding-dollar fa-fw"></i> Pembagian Bonus</a>
			<button class="btn btn-danger" onclick="confirmLogout()"><i class="fa-solid fa-right-from-bracket fa-fw"></i> Logout</button>
		</div>
	</div>
</div>