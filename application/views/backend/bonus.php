<div class="container mt-3">
	<div class="row">
		<div class="col-md">
			<h4 class="p-3 text-white">Data Pembagian Bonus</h4>
			<div class="card">
				<div class="card-header bg-primary">
					<a href="<?= base_url('tambah-bonus') ?>" class="btn btn-warning"><i class="fa-solid fa-plus fa-fw"></i> Tambah Bonus</a>
				</div>
				<div class="card-body">
					<table class="table" id="dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Total</th>
								<th>Jumlah Buruh</th>
								<th>Presentase</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($bonuses as $bonus) :
								// Konversi persentase dari string ke array
								$persentaseArray = explode(',', $bonus->presentase);
								$bonusUangArray = array_map(function ($percent) use ($bonus) {
									return ($percent / 100) * $bonus->total;
								}, $persentaseArray);
							?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= format_rupiah($bonus->total) ?></td>
									<td><?= $bonus->jumlah_buruh ?></td>
									<td>
										<?php
										foreach ($persentaseArray as $index => $persentase) {
											echo "Buruh " . ($index + 1) . ": $persentase% = " . format_rupiah($bonusUangArray[$index]) . "<br>";
										}
										?>
									</td>
									<td>
										<a href="<?= base_url('bonus/view/' . $bonus->idbonus) ?>" class="btn btn-primary btn-sm"><i class="fa-solid fa-eye fa-fw"></i> View</a>
										<?php if ($this->session->userdata('logged_in')->role == 'admin') : ?>
											<a href="<?= base_url('edit-bonus/' . $bonus->idbonus) ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit fa-fw"></i> Edit</a>
											<a href="<?= base_url('hapusbonus/' . $bonus->idbonus) ?>" class="btn btn-danger btn-sm delete-btn"><i class="fa-solid fa-trash fa-fw"></i> Delete</a>
										<?php endif ?>

									</td>
								</tr>
							<?php endforeach; ?>
						</tbody>
					</table>
				</div>
			</div>
		</div>
	</div>
</div>

<?php if ($this->session->flashdata('message')) : ?>
	<script>
		<?php if ($this->session->flashdata('message')['type'] == 'success') : ?>
			Swal.fire({
				icon: "success",
				title: "Success",
				text: "<?= $this->session->flashdata('message')['text'] ?>",
				showConfirmButton: false,
				timer: 2000
			}).then((result) => {
				window.location.href = "<?= base_url('bonus') ?>";
			});
		<?php else : ?>
			Swal.fire({
				icon: "error",
				title: "Error",
				text: "<?= $this->session->flashdata('message')['text'] ?>",
				showConfirmButton: false,
				timer: 2000
			});
		<?php endif; ?>
	</script>
<?php endif; ?>