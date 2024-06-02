<footer class="bg-primary text-center mt-5 p-3 text-white">Copyright&copy;2024 <a href="https://www.instagram.com/99ir.ib/" class=" text-decoration-none text-warning fw-bold"><i class="fa-brands fa-instagram fa-fw"></i> Irsyad Project</a></footer>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-YvpcrYf0tY3lHB60NNkmXc5s9fDVZLESaAA55NDzOxhy9GkcIdslK1eN7N6jIeHz" crossorigin="anonymous"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.7.1/jquery.min.js" integrity="sha512-v2CJ7UaYy4JwqLDIrZUI/4hqeoQieOmAZNXBeQyjo21dadnwR+8ZaIJVT8EE2iyI61OV8e6M8PP2/4hpQINQ/g==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.js"></script>
<script src="https://cdn.datatables.net/2.0.8/js/dataTables.bootstrap5.js"></script>

<script>
	$(document).ready(function() {
		$('#dataTable').DataTable();
	});

	document.addEventListener("DOMContentLoaded", function() {
		var currentUrl = window.location.href;

		// Loop melalui setiap item navbar
		var navLinks = document.querySelectorAll('.navbar-nav a');
		navLinks.forEach(function(navLink) {
			// Jika alamat URL saat ini cocok dengan href item navbar
			if (navLink.href === currentUrl) {
				// Tambahkan kelas active ke item navbar
				navLink.classList.add('active');
			}
		});
	});

	function confirmLogout() {
		Swal.fire({
			title: 'Konfirmasi Logout',
			text: "Apakah Anda yakin ingin logout?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Ya, Logout!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = '<?= base_url("logout") ?>';

			}
		});
	}

	let workerCount = 0;

	function addWorker() {
		workerCount++;
		const workerHtml = `
                <div class="mb-3" id="worker${workerCount}">
                    <label for="percentage${workerCount}" class="form-label">Persentase Bonus Buruh ${workerCount}</label>
                    <input type="number" class="form-control" id="percentage${workerCount}" name="presentase[]" required>
                </div>`;
		$('#workers').append(workerHtml);
	}

	function removeWorker() {
		if (workerCount > 0) {
			$(`#worker${workerCount}`).remove();
			workerCount--;
		}
	}

	$(document).ready(function() {
		$('#bonusForm').on('submit', function(e) {
			e.preventDefault();

			// Validasi total persentase
			let totalPercentage = 0;
			for (let i = 1; i <= workerCount; i++) {
				totalPercentage += parseFloat($(`#percentage${i}`).val());
			}

			if (totalPercentage !== 100) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Pembagian bonus masih salah. Total persentase harus sama dengan 100%.',
				});
				return; // Stop proses submit jika persentase tidak sesuai
			}

			this.submit();
		});
	});

	$(document).on('click', '.delete-btn', function(e) {
		e.preventDefault(); // Mencegah navigasi default
		const href = $(this).attr('href');
		Swal.fire({
			title: 'Konfirmasi Hapus',
			text: "Apakah Anda yakin ingin menghapus data bonus ini?",
			icon: 'warning',
			showCancelButton: true,
			confirmButtonColor: '#d33',
			cancelButtonColor: '#3085d6',
			confirmButtonText: 'Ya, Hapus!',
			cancelButtonText: 'Batal'
		}).then((result) => {
			if (result.isConfirmed) {
				window.location.href = href;
			}
		});
	});

	$(document).ready(function() {
		$('#editBonusForm').on('submit', function(e) {
			e.preventDefault();

			// Validasi total persentase
			let totalPercentage = 0;
			$('input[name="presentase[]"]').each(function() {
				totalPercentage += parseInt($(this).val()) || 0; // Jumlahkan nilai presentase
			});

			// Cek apakah total persentase sama dengan 100
			if (totalPercentage !== 100) {
				Swal.fire({
					icon: 'error',
					title: 'Oops...',
					text: 'Pembagian bonus masih salah. Total persentase harus sama dengan 100%.',
				});
				return; // Hentikan proses submit jika persentase tidak sesuai
			}

			// Jika validasi berhasil, kirim formulir
			this.submit();
		});
	});

	$(document).on('click', '.view-btn', function() {
		var total = $(this).data('total');
		var jumlah = $(this).data('jumlah');
		var presentase = $(this).data('presentase');

		$('#viewBonusModal .modal-body #totalBonus').text(total);
		$('#viewBonusModal .modal-body #jumlahBuruh').text(jumlah);
		$('#viewBonusModal .modal-body #detailPresentase').html(presentase);
	});
</script>

</body>

</html>