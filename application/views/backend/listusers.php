<div class="container mt-3">
	<div class="row">
		<div class="col-md">
			<h4 class="p-3 text-white"><?= $judul ?></h4>
			<div class="card">
				<div class="card-header bg-primary">
					<a href="<?= base_url('register') ?>" target="_blank" class="btn btn-warning"><i class="fa-solid fa-plus fa-fw"></i> Tambah User</a>
				</div>
				<div class="card-body">
					<table class="table" id="dataTable">
						<thead>
							<tr>
								<th>No</th>
								<th>Username</th>
								<th>Role</th>
								<th>Dibuat</th>
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php
							$no = 1;
							foreach ($datausers as $dus) : ?>
								<tr>
									<td><?= $no++ ?></td>
									<td><?= $dus->username ?></td>
									<td><?= $dus->role ?></td>
									<td>
										<?= $dus->dibuat ?>
									</td>
									<td>
										<a href="<?= base_url('edit-users/' . $dus->id) ?>" class="btn btn-warning btn-sm"><i class="fa-solid fa-edit fa-fw"></i> Edit</a>
										<a href="<?= base_url('hapususers/' . $dus->id) ?>" class="btn btn-danger btn-sm delete-btn"><i class="fa-solid fa-trash fa-fw"></i> Delete</a>
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
				window.location.href = "<?= base_url('listusers') ?>";
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