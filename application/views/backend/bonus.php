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
										<?php
										// Konversi persentase dari string ke array
										$persentaseArray = explode(',', $bonus->presentase);
										$bonusUangArray = array_map(function ($percent) use ($bonus) {
											return ($percent / 100) * $bonus->total;
										}, $persentaseArray);

										// Membuat string presentase dengan format yang diinginkan
										$presentaseDetail = implode('<br>', array_map(function ($index, $persentase) use ($bonus) {
											return "Buruh " . ($index + 1) . ": $persentase% = " . format_rupiah(($persentase / 100) * $bonus->total);
										}, array_keys($persentaseArray), $persentaseArray));
										?>
										<a href="#" class="btn btn-primary btn-sm view-btn" data-bs-toggle="modal" data-bs-target="#viewBonusModal" data-total="<?= format_rupiah($bonus->total) ?>" data-jumlah="<?= $bonus->jumlah_buruh ?>" data-presentase="<?= $presentaseDetail ?>">
											<i class="fa-solid fa-eye fa-fw"></i> Detail
										</a>
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

	<!-- Modal -->
	<div class="modal fade" id="viewBonusModal" tabindex="-1" aria-labelledby="viewBonusModalLabel" aria-hidden="true">
		<div class="modal-dialog">
			<div class="modal-content">
				<div class="modal-header text-bg-primary">
					<h5 class="modal-title" id="viewBonusModalLabel"><i class="fa-solid fa-circle-info fa-fw"></i> Detail Bonus</h5>
					<button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
				</div>
				<div class="modal-body">
					<p><strong>Total Bonus:</strong> <span id="totalBonus"></span></p>
					<p><strong>Jumlah Buruh:</strong> <span id="jumlahBuruh"></span></p>
					<p><strong>Detail Presentase:</strong></p>
					<p id="detailPresentase"></p>
				</div>
				<div class="modal-footer">
					<button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
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