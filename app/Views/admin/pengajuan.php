<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="card custom-card">
    <div class="card-body">

        <h3 class="mb-4 fw-bold">Daftar Pengajuan</h3>

        <div class="table-wrapper table-responsive">

            <form method="get" class="d-flex flex-wrap align-items-end gap-3 mb-4">

                <!-- SEARCH -->
                <div style="min-width:250px; flex:1;">
                    <label class="form-label small fw-semibold">
                        Search
                    </label>

                    <input type="text" name="keyword" class="form-control" placeholder="Cari nama / NIK..."
                        value="<?= $_GET['keyword'] ?? '' ?>">
                </div>

                <!-- FILTER -->
                <div style="min-width:220px;">
                    <label class="form-label small fw-semibold">
                        Filter Tanggal
                    </label>

                    <select id="filterType" class="form-select" onchange="showFilter(this.value)">

                        <option value="">Pilih Filter</option>
                        <option value="hari">Per Hari</option>
                        <option value="bulan">Per Bulan</option>
                        <option value="rentang">Rentang Tanggal</option>

                    </select>
                </div>

                <!-- FILTER HARI -->
                <div id="filterHari" class="filter-box" style="display:none; min-width:200px;">

                    <label class="form-label small fw-semibold">
                        Tanggal
                    </label>

                    <input type="date" name="tanggal" class="form-control" value="<?= $_GET['tanggal'] ?? '' ?>">
                </div>

                <!-- FILTER BULAN -->
                <div id="filterBulan" class="filter-box" style="display:none; min-width:200px;">

                    <label class="form-label small fw-semibold">
                        Bulan
                    </label>

                    <input type="month" name="bulan" class="form-control" value="<?= $_GET['bulan'] ?? '' ?>">
                </div>

                <!-- FILTER RENTANG -->
                <div id="filterRentang" class="filter-box" style="display:none; min-width:260px;">

                    <label class="form-label small fw-semibold">
                        Rentang Tanggal
                    </label>

                    <div class="d-flex gap-2">
                        <input type="date" name="start_date" class="form-control"
                            value="<?= $_GET['start_date'] ?? '' ?>">

                        <input type="date" name="end_date" class="form-control" value="<?= $_GET['end_date'] ?? '' ?>">
                    </div>
                </div>

                <!-- BUTTON -->
                <div class="d-flex gap-2">

                    <button type="submit" class="btn btn-primary px-4">

                        <i class="bi bi-search"></i>
                    </button>

                    <a href="<?= base_url('/admin/pengajuan') ?>" class="btn btn-light border px-4">

                        <i class="bi bi-arrow-clockwise"></i>
                    </a>

                </div>

            </form>


            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK Terlapor</th>
                        <th>Nama Terlapor</th>
                        <th>Nama Pengaju</th>
                        <th>Tanggal Kematian</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pengajuan as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->nik_terlapor ?></td>
                            <td><?= $p->nama_terlapor ?></td>
                            <td><?= $p->nama_pengaju ?></td>
                            <td><?= date('d-M-Y', strtotime($p->tanggal_kematian)) ?></td>
                            <td><?= $p->no_hp ?></td>

                            <?php
                            $status = strtolower($p->status ?? 'pending'); // ambil dari DB
                            ?>
                       

                            <td>
                                <?php
                                $badgeClass = match ($status) {
                                    'pending' => 'bg-warning text-dark',
                                    'disetujui' => 'bg-success',
                                    'ditolak' => 'bg-danger',
                                    default => 'bg-secondary'
                                };
                                ?>

                                <span class="badge <?= $badgeClass ?>">
                                    <?= ucfirst($status) ?>
                                </span>

                            </td>
                            <td>
                                <?php if ($status == 'pending'): ?>

                                    <div class="d-flex gap-1">

                                        <a href="<?= base_url('admin/setujui/' . $p->nik_terlapor) ?>"
                                            class="btn btn-success btn-sm" title="Setujui">

                                            <i class="bi bi-check-lg"></i>
                                        </a>

                                        <a href="<?= base_url('admin/tolak/' . $p->nik_terlapor) ?>"
                                            class="btn btn-danger btn-sm" title="Tolak">

                                            <i class="bi bi-x-lg"></i>
                                        </a>

                                        <a href="<?= base_url('admin/detail/' . $p->nik_terlapor) ?>"
                                            class="btn btn-info btn-sm" title="Detail">

                                            <i class="bi bi-eye-fill"></i>
                                        </a>

                                    </div>

                                <?php elseif ($status == 'disetujui'): ?>

                                    <a href="<?= base_url('admin/detail/' . $p->nik_terlapor) ?>" class="btn btn-info btn-sm"
                                        title="Detail">

                                        <i class="bi bi-eye-fill"></i>
                                    </a>

                                <?php elseif ($status == 'ditolak'): ?>

                                    <span class="text-danger fw-bold">
                                        <i class="bi bi-x-circle-fill"></i>
                                    </span>

                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination dummy -->
        <!-- <div class="pagination">
            <span>1</span>
            <span class="active">2</span>
            <span>3</span>
            <span>...</span>
            <span>8</span>
            <button class="next">→</button>
        </div> -->

    </div>
</div>

<script>
    function showFilter(type) {

        document.querySelectorAll('.filter-box')
            .forEach(el => el.style.display = 'none');

        if (type === 'hari') {
            document.getElementById('filterHari').style.display = 'block';
        }

        if (type === 'bulan') {
            document.getElementById('filterBulan').style.display = 'block';
        }

        if (type === 'rentang') {
            document.getElementById('filterRentang').style.display = 'block';
        }
    }
</script>

<?= $this->endSection() ?>