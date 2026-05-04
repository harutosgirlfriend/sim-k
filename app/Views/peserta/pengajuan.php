<?= $this->extend('template/peserta') ?>
<?= $this->section('content') ?>

<div class="pengajuan_surat" id="pengajuan_surat">
	<div class="row justify-content-center align-items-center mb-5">
		<div class="col-12 col-md-10 col-lg-7 text-center py-3">

			<h3 class="mt-5 mb-2 text-center">Ajukan Surat Kematian</h3>
		</div>
	</div>
	<div class="row justify-content-center">

		<div class="col-12 col-md-10 col-lg-7">
			<div class="card border-0 shadow-sm">
				<div class="card-body p-4 p-md-5">

					<form id="formPengajuan" method="post" action="/pengajuan/simpan" enctype="multipart/form-data">
						<!-- Full Name -->
						<div class="mb-3">
							<label class="form-label small fw-semibold text-secondary">Nama Pengaju</label>
							<input type="text"
								class="form-control bg-light shadow-none <?= session('errors.nama_pengaju') ? 'is-invalid' : '' ?>"
								name="nama_pengaju" value="<?= old('nama_pengaju') ?>" required>
							<div class="invalid-feedback">
								<?= session('errors.nama_pengaju') ?>
							</div>
						</div>

						<!-- Email Address -->
						<div class="mb-3">
							<label class="form-label small fw-semibold text-secondary">NIK Pengaju</label>
							<input type="text"
								class="form-control bg-light shadow-none <?= session('errors.nik_pengaju') ? 'is-invalid' : '' ?>"
								name="nik_pengaju" value="<?= old('nik_pengaju') ?>" required>
							<div class="invalid-feedback">
								<?= session('errors.nik_pengaju') ?>
							</div>
						</div>

						<!-- Phone Number -->
						<div class="mb-3">
							<label class="form-label small fw-semibold text-secondary">No Hp Pengaju</label>


							<input type="text" name="no_hp" value="<?= old('no_hp') ?>"
								class="form-control bg-light shadow-none <?= session('errors.no_hp') ? 'is-invalid' : '' ?>"
								maxlength="13" pattern="[0-9]*" inputmode="numeric" required>
							<div class="invalid-feedback">
								<?= session('errors.no_hp') ?>
							</div>
						</div>

						<!-- Plan & Billing Interval -->
						<div class=" mb-3">

							<label class="form-label small fw-semibold text-secondary">Nama Terlapor
							</label>
							<input type="text" value="<?= old('nama_terlapor') ?>"
								class="form-control bg-light shadow-none <?= session('errors.nama_terlapor') ? 'is-invalid' : '' ?>"
								name="nama_terlapor" required>
							<div class="invalid-feedback">
								<?= session('errors.nama_terlapor') ?>
							</div>

						</div>
						<div class=" mb-3">

							<label class="form-label small fw-semibold text-secondary">NIK Terlapor
							</label>
							<input type="text" value="<?= old('nik_terlapor') ?>"
								class="form-control bg-light shadow-none <?= session('errors.nik_terlapor') ? 'is-invalid' : '' ?>"
								name="nik_terlapor" required>
							<div class="invalid-feedback">
								<?= session('errors.nik_terlapor') ?>
							</div>

						</div>



						<div class="row mb-3">
							<div class="col-md-6 mb-3 mb-md-0">
								<label class="form-label small fw-semibold text-secondary">Foto Surat Kematian</label>
								<input type="file" id="input-file"
									class="form-control bg-light shadow-none <?= session('errors.foto_surat') ? 'is-invalid' : '' ?>"
									accept="image/*" onchange="previewKTP(event)" name="foto_surat" required>
								<div id="preview-wrapper" style="position:relative; display:none; margin-top:10px;">

									<!-- TOMBOL X -->
									<button type="button" onclick="removePreview()" id="hapus-surat"
										style="position:absolute; top:5px; right:5px; color:black; border: none; background: none; width:50px;">
										<h4>×</h4>
									</button>

									<!-- GAMBAR -->
									<img id="preview-surat" style="max-width:30%; border-radius:10px;">

								</div>

								<div class="invalid-feedback">
									<?= session('errors.foto_surat') ?>
								</div>
							</div>
							<div class="col-md-6">
								<label class="form-label small fw-semibold text-secondary">File Surat Kematian</label>
								<input type="file"
									class="form-control bg-light shadow-none <?= session('errors.file_surat') ? 'is-invalid' : '' ?>"
									name="file_surat" required>
								<div class="invalid-feedback">
									<?= session('errors.file_surat') ?>
								</div>
							</div>
						</div>

						<div class="mb-3">

							<label class="form-label small fw-semibold text-secondary">Tanggal Kematian</label>
							<input type="date"
								class="form-control bg-light shadow-none <?= session('errors.tanggal_kematian') ? 'is-invalid' : '' ?>"
								name="tanggal_kematian" required  max="<?= date('Y-m-d') ?>">
							<div class="invalid-feedback">
								<?= session('errors.tanggal_kematian') ?>
							</div>
						</div>


						<!-- Action Buttons -->
						<div class="d-flex justify-content-end align-items-center mt-4">
							<button type="reset" onclick="resetForm()"
								class="btn btn-link text-decoration-none text-muted fw-bold small text-uppercase me-3 p-0">Batal</button>
							<button type="submit"
								class="btn btn-primary px-4 py-2 fw-bold text-uppercase border-0 shadow-sm">Kirim</button>
						</div>
					</form>
				</div>
			</div>
		</div>
	</div>
</div>
<script>
	function previewKTP(event) {
		const img = document.getElementById('preview-surat');
		const wrapper = document.getElementById('preview-wrapper');
		const file = event.target.files[0];

		if (file) {
			img.src = URL.createObjectURL(file);
			wrapper.style.display = 'block';
		}
	}

	function removePreview() {
		const img = document.getElementById('preview-surat');
		const wrapper = document.getElementById('preview-wrapper');
		const input = document.getElementById('input-file');

		img.src = "";
		wrapper.style.display = 'none';
		input.value = ""; // reset file input
	}

	function resetForm() {
		let form = document.getElementById("formPengajuan");
		form.reset();


		let preview = document.getElementById("preview-surat");
		let fileInput = document.getElementById("input-file"); // sesuaikan id input file kamu
		let icon = document.getElementById("hapus-surat"); // sesuaikan id icon silang


		if (preview) {

			if (preview.src) {
				URL.revokeObjectURL(preview.src); //“menghapus” object URL dari memori browser.
			}
			preview.src = "";
			preview.style.display = "none"; // biar hilang
		}


		if (fileInput) {
			fileInput.value = "";
		}

		if (icon) {
			icon.style.display = "none";
		}
	}
</script>
<?= $this->endSection() ?>