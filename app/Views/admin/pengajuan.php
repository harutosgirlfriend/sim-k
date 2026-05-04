<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="card custom-card">
    <div class="card-body">

        <h5 class="title">Daftar Pengajuan</h5>

        <div class="table-wrapper table-responsive">
            <table class="custom-table">
                <thead>
                    <tr>
                        <th>No</th>
                        <th>NIK</th>
                        <th>Nama</th>
                        <th>Tanggal</th>
                        <th>No HP</th>
                        <th>Status</th>
                        <th>Email</th>
                        <th>Aksi</th>
                    </tr>
                </thead>

                <tbody>
                    <?php $no = 1; ?>
                    <?php foreach ($pengajuan as $p): ?>
                        <tr>
                            <td><?= $no++ ?></td>
                            <td><?= $p->nik_pengaju ?></td>
                            <td><?= $p->nama_pengaju ?></td>
                            <td><?= $p->tanggal_kematian ?></td>
                            <td><?= $p->no_hp ?></td>
                            <td><?= $p->email ?></td>
                            <?php
                            $status = strtolower($p->status ?? 'pending'); // ambil dari DB
                            ?>

                            <td>
                                <span class="status <?= $status ?>">
                                    <?= ucfirst($status) ?>
                                </span>
                            </td>

                            <td>
                                <?php if ($status == 'pending'): ?>
                                    <a href="<?= base_url('admin/setujui/' . $p->nik_terlapor) ?>"
                                        class="btn btn-success btn-sm">Setujui</a>

                                    <a href="<?= base_url('admin/tolak/' . $p->nik_terlapor) ?>"
                                        class="btn btn-danger btn-sm">Tolak</a>
                                    <a href="<?= base_url('admin/detail/' . $p->nik_terlapor) ?>"
                                        class="btn btn-info btn-sm">Detail</a>

                                <?php elseif ($status == 'disetujui'): ?>
                     
                                    <a href="<?= base_url('admin/detail/' . $p->nik_terlapor) ?>"
                                        class="btn btn-info btn-sm">Detail</a>

                                <?php elseif ($status == 'ditolak'): ?>
                                    <span class="text-danger fw-bold">✖ Ditolak</span>
                                <?php endif; ?>
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>

        <!-- Pagination dummy -->
        <div class="pagination">
            <span>1</span>
            <span class="active">2</span>
            <span>3</span>
            <span>...</span>
            <span>8</span>
            <button class="next">→</button>
        </div>

    </div>
</div>

<?= $this->endSection() ?>