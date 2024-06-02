<div class="container mt-3">
	<div class="row justify-content-center">
		<div class="col-md">
			<h3 class="text-white p-3"><?= $judul ?></h3>
			<div class="card">
				<div class="card-body">
					<!-- Form edit bonus -->
					<form id="editBonusForm" action="<?= base_url('bonus/update/' . $bonus->idbonus) ?>" method="post">
						<div class="mb-3">
							<label for="totalBonus" class="form-label">Total Pembayaran Bonus (Rupiah)</label>
							<input type="number" class="form-control" id="totalBonus" name="totalBonus" value="<?= $bonus->total ?>" required>
						</div>
						<div id="workers" class="mb-3">
							<!-- Area untuk input presentase bonus dinamis -->
							<?php $presentase_per_buruh = explode(',', $bonus->presentase);
							foreach ($presentase_per_buruh as $index => $presentase) : ?>
								<div class="mb-3">
									<label for="percentage<?= $index + 1 ?>" class="form-label">Presentase Bonus Buruh <?= $index + 1 ?></label>
									<input type="number" class="form-control" id="percentage<?= $index + 1 ?>" name="presentase[]" value="<?= $presentase ?>" required>
								</div>
							<?php endforeach; ?>
						</div>
						<a href="<?= base_url('bonus') ?>" class="btn btn-secondary mb-3"><i class="fa-solid fa-xmark fa-fw"></i> Batal</a>
						<button type="submit" class="btn btn-primary mb-3"><i class="fa-solid fa-floppy-disk fa-fw"></i> Simpan</button>
					</form>

				</div>
			</div>
		</div>
	</div>
</div>