<!DOCTYPE html>
<html lang="en">

<head>
	<!-- Meta -->
	<meta charset="utf-8">
	<meta http-equiv="X-UA-Compatible" content="IE=edge">
	<meta name="viewport" content="width=device-width, initial-scale=1">
	<link rel="shortcut icon" type="image/png" href="../peserta/assets/images/banner/logo.png" />
	<!-- The above 3 meta tags *must* come first in the head; any other head content must come *after* these tags -->
	<meta name="description" content="Purdue - Education HTML Template">
	<meta name="keywords"
		content="theme_ocean, college, course, e-learning, education, high school, kids, learning, online, online courses, school, student, teacher, tutor, university">
	<meta name="author" content="theme_ocean">
	<!-- SITE TITLE -->
	<title>SIMK-K</title>
	<!-- Latest Bootstrap min CSS -->
	<link rel="stylesheet" href="../peserta/assets/bootstrap/css/bootstrap.min.css">
	<!-- Google Font -->
	<link href="https://fonts.googleapis.com/css2?family=Lexend:wght@300;400;500;600;700&display=swap" rel="stylesheet">
	<!-- Font Awesome CSS -->
	<link rel="stylesheet" href="../peserta/assets/webfonts/themify-icons.css">
	<!-- All Min Css -->
	<link rel="stylesheet" href="../peserta/assets/css/all.min.css">
	<link rel="stylesheet" href="../peserta/assets/css/fontawesome.min.css">
	<!--- owl carousel Css-->
	<link rel="stylesheet" href="../peserta/assets/owlcarousel/css/owl.carousel.css">
	<link rel="stylesheet" href="../peserta/assets/owlcarousel/css/owl.theme.css">
	<link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css" rel="stylesheet">
	<!-- MAGNIFIC CSS -->
	<link rel="stylesheet" href="../peserta/assets/css/magnific-popup.css">
	<!--jquery-simple-mobilemenu Css-->
	<link rel="stylesheet" href="../peserta/assets/css/jquery-simple-mobilemenu.css">
	<!-- animate CSS -->
	<link rel="stylesheet" href="../peserta/assets/css/animate.css">
	<!-- Style CSS -->
	<link rel="stylesheet" href="../peserta/assets/css/style.css">
	<link rel="stylesheet" href="path/to/font-awesome/css/font-awesome.min.css">
	<!-- HTML5 shim and Respond.js IE8 support of HTML5 elements and media queries -->
	<!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
	<!--[if lt IE 9]>
		  <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
		  <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
		<![endif]-->
</head>

<body>

	<div class="top_header_banner">

		<!-- START NAVBAR -->
		<div id="navigation" class="navbar-light bg-faded site-navigation">
			<div class="container">
				<div class="row">
					<div class="col-20 align-self-center">
						<div class="site-logo">
							<a><img src="assets/images/banner/logo.png" style="width: 50px;" alt="">SIM-K</a>
						</div>
					</div><!--- END Col -->

					<div class="col-10 d-flex align-items-center justify-content-between">

						<!-- KIRI: MENU -->
						<nav id="main-menu">
							<ul>
								<li><a href="<?= base_url('peserta/menu/tentang_pengajuan') ?>">Tentang Pengajuan</a>
								</li>
								<li><a href="<?= base_url('peserta/menu/cara_pengajuan') ?>">Cara Pengajuan</a></li>
								<li><a href="<?= base_url('peserta/pengajuan') ?>">Pengajuan</a></li>	
								<li><a href="<?= base_url('/peserta/riwayat') ?>">Riwayat Pengajuan</a></li>
							</ul>
						</nav>

						<!-- KANAN: LOGIN -->
						<div class="nav-login">
							<?php if (session()->get('logged_in')): ?>
								<a href="<?= base_url('/logout') ?>" class="fw-bold"> <i class="bi bi-box-arrow-right"></i> Logout</a>
							<?php else: ?>
								<a href="<?= base_url('/') ?>" class="fw-bold">
									<i class="fa fa-user"></i> Login
								</a>
							<?php endif; ?>
						</div>

					</div>



					<ul class="mobile_menu">

						<li><a href="<?= base_url('/peserta/menu/tentang_pengajuan') ?>">Tentang Pengajuan</a></li>
						<li><a href="<?= base_url('/peserta/menu/cara_pengajuan') ?>">Cara Pengajuan</a></li>
						<li><a href="/peserta/pengajuan">Pengajuan</a></li>
						<li><a href="contact.html">Riwayat Pengajuan</a></li>

						<?php if (session()->get('logged_in')): ?>
							<li><a href="<?= base_url('/logout') ?>">Logout</a></li>
						<?php else: ?>
							<li><a href="<?= base_url('/login') ?>">Login</a></li>
						<?php endif; ?>

					</ul>
				</div><!--- END ROW -->
			</div><!--- END CONTAINER -->
		</div>


		<section class="px-3">
			<!-- HERO SECTION -->
			<div class="hero-section">

				<div class="row align-items-center">

					<!-- TEXT -->
					<div class="col-lg-6 hero-text p-5">
						<h1>Sistem Pengajuan Surat Kematian BPJS Kesehatan Berbasis Online.</h1>
						<p>Memudahkan Anda mengurus administrasi tanpa harus datang langsung.</p>
						<a href="/peserta/pengajuan" class="cta">Ajukan <i class="fa-solid fa-arrow-right"></i></a>
					</div>

					<!-- IMAGE -->
					<div class="col-lg-6 text-center">
						<img src="<?= base_url('peserta/assets/images/banner/bpjs-fix.jpg') ?>"
							class="img-fluid hero-img" alt="">
					</div>

				</div>

			</div>
			<!-- END HERO SECTION -->

			<!-- TENTANG PENGAJUAN SURAT -->

			<section id="tentang_pengajuan" class="py-5">
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

			<!-- END TENTANG PENGAJUAN SURAT -->

			<!-- CARA PENGAJUAN SURAT? -->

			<div class="px-3 mb-3">
				<h3 class="text-center mb-3">Cara Pengajuan Surat Kematian</h3>
				<p class="text-center text-muted mb-5">
					Ikuti langkah berikut untuk melakukan pengajuan
				</p>
				<div class="row align-items-center" id="cara_pengajuan">
					<div class="col-lg-6">
						<img src="<?= base_url('peserta/assets/images/banner/cara.jpg') ?>" class="img-fluid hero-img"
							style="width: 70%;" alt="">
					</div>
					<div class="col-lg-6">
						<div class="steps">

							<div class="step-item">
								<div class="step-number">1</div>
								<div class="step-content">
									<h6>Isi Formulir</h6>
									<p>Lengkapi data pengajuan</p>
								</div>

							</div>

							<div class="step-item">
								<div class="step-number">2</div>
								<div class="step-content">
									<h6>Upload Dokumen</h6>
									<p>Unggah berkas pendukung</p>
								</div>

							</div>

							<div class="step-item">
								<div class="step-number">3</div>
								<div class="step-content">
									<h6>Verifikasi</h6>
									<p>Pemeriksaan oleh petugas</p>
								</div>

							</div>

							<div class="step-item">
								<div class="step-number">4</div>
								<div class="step-content">
									<h6>Proses</h6>
									<p>Diproses oleh sistem</p>
								</div>

							</div>

							<div class="step-item">
								<div class="step-number">5</div>
								<div class="step-content">
									<h6>Selesai</h6>
									<p>Surat siap diunduh</p>
								</div>

							</div>

						</div>
					</div>
				</div>

			</div>
			<!-- END CARA PENGAJUAN SURAT -->


			<!-- START FOOTER -->
			<footer class="footer section-padding"
				style="background-color: #1a202c; color: #ffffff; padding: 80px 0 30px;">
				<div class="container">
					<div class="row">
						<!-- Kolom 1: Tentang / Logo -->
						<div class="col-lg-4 col-sm-6 col-xs-12">
							<div class="single_footer">
								<div class="site-logo mb-4">
									<h2 style="color: #fff; font-weight: 700;">SIM-K</h2>
								</div>
								<p>Sistem Informasi Management Kematian (SIM-K) memberikan kemudahan bagi masyarakat
									dalam mengurus administrasi BPJS Kesehatan secara mandiri dan transparan.</p>
								<div class="social_profile mt-4">
									<ul class="list-inline">
										<li class="list-inline-item"><a href="#"
												style="color: #fff; margin-right: 15px;"><i
													class="fa-brands fa-facebook-f"></i></a></li>
										<li class="list-inline-item"><a href="#"
												style="color: #fff; margin-right: 15px;"><i
													class="fa-brands fa-twitter"></i></a></li>
										<li class="list-inline-item"><a href="#"
												style="color: #fff; margin-right: 15px;"><i
													class="fa-brands fa-instagram"></i></a></li>
									</ul>
								</div>
							</div>
						</div><!--- END COL -->

						<!-- Kolom 2: Tautan Cepat -->
						<div class="col-lg-2 col-sm-6 col-xs-12">
							<div class="single_footer">
								<h4 style="color: #fff; margin-bottom: 25px; font-weight: 600;">Tautan Cepat</h4>
								<ul class="list-unstyled">
									<li class="mb-2"><a href="#"
											style="color: #cbd5e0; text-decoration: none;">Beranda</a></li>
									<li class="mb-2"><a href="#tentang_pengajuan"
											style="color: #cbd5e0; text-decoration: none;">Tentang</a></li>
									<li class="mb-2"><a href="#cara_pengajuan"
											style="color: #cbd5e0; text-decoration: none;">Cara Ajukan</a></li>
									<li class="mb-2"><a href="#" style="color: #cbd5e0; text-decoration: none;">Kontak
											Kami</a></li>
								</ul>
							</div>
						</div><!--- END COL -->

						<!-- Kolom 3: Kontak -->
						<div class="col-lg-3 col-sm-6 col-xs-12">
							<div class="single_footer">
								<h4 style="color: #fff; margin-bottom: 25px; font-weight: 600;">Kontak Instansi</h4>
								<p style="color: #cbd5e0;"><i class="fa fa-map-marker-alt me-2"></i> Jl. Letjen S.
									Parman No.1, Jakarta</p>
								<p style="color: #cbd5e0;"><i class="fa fa-phone me-2"></i> Care Center: 165</p>
								<p style="color: #cbd5e0;"><i class="fa fa-envelope me-2"></i> info@bpjs-kesehatan.go.id
								</p>
							</div>
						</div><!--- END COL -->

						<!-- Kolom 4: Newsletter/Info -->
						<div class="col-lg-3 col-sm-6 col-xs-12">
							<div class="single_footer">
								<h4 style="color: #fff; margin-bottom: 25px; font-weight: 600;">Jam Layanan</h4>
								<p style="color: #cbd5e0;">Senin - Jumat: 08:00 - 15:00</p>
								<p style="color: #cbd5e0;">Sabtu: 08:00 - 12:00</p>
								<p class="mt-3"><small>*Layanan online tersedia 24 jam</small></p>
							</div>
						</div><!--- END COL -->
					</div><!--- END ROW -->

					<hr style="border-color: rgba(255,255,255,0.1); margin: 40px 0 20px;">

					<div class="row">
						<div class="col-lg-12 col-sm-12 col-xs-12 text-center">
							<p class="copyright" style="font-size: 14px; color: #a0aec0;">
								&copy; 2026 <strong>SIM-K</strong>. All Rights Reserved.
							</p>
						</div><!--- END COL -->
					</div><!--- END ROW -->
				</div><!--- END CONTAINER -->
			</footer>
			<!-- END FOOTER -->

		</section>




		<!-- END FOOTER -->

		<!-- Latest jQuery -->
		<script src="../peserta/assets/js/jquery-1.12.4.min.js"></script>
		<!-- Latest compiled and minified Bootstrap -->
		<script src="../peserta/assets/bootstrap/js/bootstrap.min.js"></script>
		<!-- owl-carousel min js  -->
		<script src="../peserta/assets/owlcarousel/js/owl.carousel.min.js"></script>
		<!-- jquery-simple-mobilemenu.min -->
		<script src="../peserta/assets/js/jquery-simple-mobilemenu.js"></script>
		<!-- magnific-popup js -->
		<script src="../peserta/assets/js/jquery.magnific-popup.min.js"></script>
		<!-- jquery mixitup min js -->
		<script src="../peserta/assets/js/jquery.mixitup.js"></script>
		<!-- GSAP AND LOCOMOTIV JS-->
		<script src="../peserta/assets/js/gsap.min.js"></script>
		<script src="../peserta/assets/js/ScrollTrigger.min.js"></script>
		<script src="../peserta/assets/js/lenis.js"></script>
		<!-- scrolltopcontrol js -->
		<script src="../peserta/assets/js/scrolltopcontrol.js"></script>
		<!-- jquery inview js -->
		<script src="../peserta/assets/js/jquery.inview.min.js"></script>
		<!-- WOW - Reveal Animations When You Scroll -->
		<script src="../peserta/assets/js/wow.min.js"></script>
		<!-- scripts js -->
		<script src="../peserta/assets/js/scripts.js"></script>
</body>

</html>