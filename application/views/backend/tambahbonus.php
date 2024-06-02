<div class="container mt-3">
	<div class="row justify-content-center">
		<div class="col-md">
			<h3 class="text-white p-3"><?= $judul ?></h3>
			<div class="card">
				<div class="card-body">
					<form id="bonusForm" method="post" action="<?= base_url('simpan-bonus') ?>">
						<div class="mb-3">
							<label for="totalBonus" class="form-label">Total Pembayaran Bonus (Rupiah)</label>
							<input type="number" class="form-control" id="totalBonus" name="totalBonus" required>
						</div>
						<div id="workers" class="mb-3"></div>
						<a href="<?= base_url('bonus') ?>" class="btn btn-secondary mb-3"><i class="fa-solid fa-xmark"></i> Batal</a>
						<button type="button" class="btn btn-success mb-3" onclick="addWorker()"><i class="fa-solid fa-plus"></i> Tambah Buruh</button>
						<button type="button" class="btn btn-danger mb-3" onclick="removeWorker()"><i class="fa-solid fa-minus"></i> Kurangi Buruh</button>
						<button type="submit" class="btn btn-primary mb-3"><i class="fa-solid fa-floppy-disk"></i> Simpan</button>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>