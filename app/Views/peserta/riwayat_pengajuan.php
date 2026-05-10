<?= $this->extend('template/peserta') ?>
<?= $this->section('content') ?>

<div class=" py-5" id="riwayat_pengajuan">
	<div class="row justify-content-center align-items-center mb-5">
		<div class="col-12 col-md-10 col-lg-7 text-center py-3">

			<h3 class="mt-3 mb-2 text-center">Riwayat Pengajuan</h3>
		</div>
	</div>
    <!-- HEADER -->
    <div class="d-flex justify-content-between align-items-center mb-4 flex-wrap gap-3">

        <div>
          

        </div>

        <!-- SEARCH -->
        <form method="get" class="d-flex gap-2">

            <input type="text"
                name="keyword"
                class="form-control"
                placeholder="Cari pengajuan..."
                value="<?= $_GET['keyword'] ?? '' ?>">

            <button class="btn btn-success">
                <i class="bi bi-search"></i>
            </button>

        </form>

    </div>

    <!-- LIST -->
    <div class="d-flex flex-column gap-4">

        <?php foreach ($pengajuan as $p): ?>

            <?php
            $status = strtolower($p->status);

            $badgeClass = match ($status) {
                'pending' => 'bg-warning text-dark',
                'disetujui' => 'bg-success',
                'ditolak' => 'bg-danger',
                default => 'bg-secondary'
            };
            ?>

            <div class="card border-0 shadow-sm rounded-4">

                <div class="card-body p-4">

                    <!-- TOP -->
                    <div class="d-flex justify-content-between align-items-start flex-wrap gap-3">

                        <div>

                            <h5 class="fw-bold mb-1">
                                <?= $p->nama_terlapor ?>
                            </h5>

                            <div class="text-muted small">
                                NIK: <?= $p->nik_terlapor ?>
                            </div>

                        </div>

                        <span class="badge <?= $badgeClass ?> px-3 py-2">
                            <?= ucfirst($status) ?>
                        </span>

                    </div>

                    <hr>

                    <!-- CONTENT -->
                    <div class="row g-3">

                        <div class="col-md-4">
                            <small class="text-muted d-block">
                                Nama Pengaju
                            </small>

                            <span class="fw-semibold">
                                <?= $p->nama_pengaju ?>
                            </span>
                        </div>

                        <div class="col-md-4">
                            <small class="text-muted d-block">
                                Tanggal Kematian
                            </small>

                            <span class="fw-semibold">
                                <?= date('d F Y', strtotime($p->tanggal_kematian)) ?>
                            </span>
                        </div>

                        <div class="col-md-4">
                            <small class="text-muted d-block">
                                Nomor HP
                            </small>

                            <span class="fw-semibold">
                                <?= $p->no_hp ?>
                            </span>
                        </div>

                    </div>

             

                </div>

            </div>

        <?php endforeach; ?>

    </div>

</div>

<?= $this->endSection() ?>