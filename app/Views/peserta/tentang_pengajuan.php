<?= $this->extend('template/peserta') ?>
<?= $this->section('content') ?>

	<section id="tentangPengajuan" class="py-5">
				<div class="container">
					<div class="row">
						<div class="col-12">
							<h3 class="mb-5 text-center">Tentang Pengajuan Surat Kematian</h3>
							<div class="accordion" id="accordionExample">

								<!-- Item 1 -->
								<div class="accordion-item mb-3 border shadow-sm">
									<h2 class="accordion-header" id="headingOne">
										<button class="accordion-button collapsed fw-bold" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapseOne"
											aria-expanded="false" aria-controls="collapseOne">
											Bagaimana Mendaftar Menjadi Peserta PBI JK?
										</button>
									</h2>
									<div id="collapseOne" class="accordion-collapse collapse"
										aria-labelledby="headingOne" data-bs-parent="#accordionExample">
										<div class="accordion-body text-muted">
											Pendaftaran Peserta PBI JK dilakukan melalui pendataan oleh Kementerian
											Sosial/Dinas Sosial setempat sesuai dengan kriteria yang ditetapkan
											Pemerintah Pusat.
										</div>
									</div>
								</div>

								<!-- Item 2 -->
								<div class="accordion-item mb-3 border shadow-sm">
									<h2 class="accordion-header" id="headingTwo">
										<button class="accordion-button collapsed fw-bold" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapseTwo"
											aria-expanded="false" aria-controls="collapseTwo">
											Bagaimana Mendaftar Menjadi Peserta Dari Penduduk Yang Didaftarkan Oleh
											Pemerintah Daerah?
										</button>
									</h2>
									<div id="collapseTwo" class="accordion-collapse collapse"
										aria-labelledby="headingTwo" data-bs-parent="#accordionExample">
										<div class="accordion-body text-muted">
											Pendaftaran dilakukan melalui Dinas Kesehatan atau Dinas Sosial
											Kabupaten/Kota setempat berdasarkan kebijakan Pemerintah Daerah
											masing-masing.
										</div>
									</div>
								</div>

								<!-- Item 3 -->
								<div class="accordion-item mb-3 border shadow-sm">
									<h2 class="accordion-header" id="headingThree">
										<button class="accordion-button collapsed fw-bold" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapseThree"
											aria-expanded="false" aria-controls="collapseThree">
											Bagaimana Mendaftar Menjadi Peserta PPU Penyelenggara Negara?
										</button>
									</h2>
									<div id="collapseThree" class="accordion-collapse collapse"
										aria-labelledby="headingThree" data-bs-parent="#accordionExample">
										<div class="accordion-body text-muted">
											Pendaftaran dilakukan oleh satuan kerja atau instansi pemerintah tempat
											peserta bekerja secara kolektif.
										</div>
									</div>
								</div>

								<!-- Item 4 -->
								<div class="accordion-item mb-3 border shadow-sm">
									<h2 class="accordion-header" id="headingFour">
										<button class="accordion-button collapsed fw-bold" type="button"
											data-bs-toggle="collapse" data-bs-target="#collapseFour"
											aria-expanded="false" aria-controls="collapseFour">
											Bagaimana Mendaftar Menjadi Peserta PBPU/BP Selain Penyelenggara Negara?
										</button>
									</h2>
									<div id="collapseFour" class="accordion-collapse collapse"
										aria-labelledby="headingFour" data-bs-parent="#accordionExample">
										<div class="accordion-body text-muted">
											Anda dapat mendaftar secara mandiri melalui Aplikasi Mobile JKN, Website
											BPJS Kesehatan, atau datang langsung ke Kantor Cabang terdekat.
										</div>
									</div>
								</div>

							</div>
						</div>
					</div>
				</div>
			</section>

<?= $this->endSection() ?>