<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<?php
$total = count($pengajuan);

$pending = count(array_filter(
    $pengajuan,
    fn($p) => $p->status == 'pending'
));

$disetujui = count(array_filter(
    $pengajuan,
    fn($p) => $p->status == 'disetujui'
));

$ditolak = count(array_filter(
    $pengajuan,
    fn($p) => $p->status == 'ditolak'
));
?>

<style>
    .dashboard-card {
        border: none;
        border-radius: 20px;
        overflow: hidden;
        transition: .3s;
    }

    .dashboard-card:hover {
        transform: translateY(-4px);
    }

    .icon-box {
        width: 55px;
        height: 55px;
        border-radius: 16px;
        display: flex;
        align-items: center;
        justify-content: center;
        font-size: 24px;
    }

    .bg-soft-primary {
        background: rgba(93, 135, 255, 0.15);
        color: #5D87FF;
    }

    .bg-soft-warning {
        background: rgba(255, 193, 7, 0.15);
        color: #ffc107;
    }

    .bg-soft-success {
        background: rgba(40, 167, 69, 0.15);
        color: #28a745;
    }

    .bg-soft-danger {
        background: rgba(220, 53, 69, 0.15);
        color: #dc3545;
    }

    .stat-title {
        font-size: 14px;
        color: #6c757d;
        margin-bottom: 5px;
    }

    .stat-number {
        font-size: 30px;
        font-weight: 700;
        color: #111827;
    }

    .custom-card {
        border: none;
        border-radius: 20px;
    }

    .table thead th {
        border-bottom: none;
        background: #f8f9fa;
        color: #6b7280;
        font-size: 14px;
        padding: 15px;
    }

    .table tbody td {
        padding: 15px;
        vertical-align: middle;
    }

    .badge-status {
        padding: 8px 14px;
        border-radius: 30px;
        font-size: 12px;
        font-weight: 600;
    }

    .badge-pending {
        background: rgba(255, 193, 7, 0.15);
        color: #d39e00;
    }

    .badge-disetujui {
        background: rgba(40, 167, 69, 0.15);
        color: #28a745;
    }

    .badge-ditolak {
        background: rgba(220, 53, 69, 0.15);
        color: #dc3545;
    }

</style>

<div class="container-fluid">

<div class="mb-3" style="margin-top:-40px;">
        <h3 class="fw-bold mb-1">Dashboard Admin</h3>

        <p class="text-muted mb-0">
            Statistik data pengajuan surat kematian
        </p>
    </div>

    <!-- CARD -->
    <div class="row">

        <!-- TOTAL -->
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm dashboard-card">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <div class="stat-title">
                            Total Pengajuan
                        </div>

                        <div class="stat-number">
                            <?= $total ?>
                        </div>
                    </div>

                    <div class="icon-box bg-soft-primary">
                        <i class="ti ti-file-text"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- PENDING -->
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm dashboard-card">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <div class="stat-title">
                            Pending
                        </div>

                        <div class="stat-number">
                            <?= $pending ?>
                        </div>
                    </div>

                    <div class="icon-box bg-soft-warning">
                        <i class="ti ti-clock"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- DISETUJUI -->
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm dashboard-card">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <div class="stat-title">
                            Disetujui
                        </div>

                        <div class="stat-number">
                            <?= $disetujui ?>
                        </div>
                    </div>

                    <div class="icon-box bg-soft-success">
                        <i class="ti ti-check"></i>
                    </div>

                </div>
            </div>
        </div>

        <!-- DITOLAK -->
        <div class="col-md-6 col-xl-3 mb-4">
            <div class="card shadow-sm dashboard-card">
                <div class="card-body d-flex justify-content-between align-items-center">

                    <div>
                        <div class="stat-title">
                            Ditolak
                        </div>

                        <div class="stat-number">
                            <?= $ditolak ?>
                        </div>
                    </div>

                    <div class="icon-box bg-soft-danger">
                        <i class="ti ti-x"></i>
                    </div>

                </div>
            </div>
        </div>

    </div>

    <!-- CHART + TABLE -->
    <div class="row">

        <!-- CHART -->
        <div class="col-lg-5 mb-4">
            <div class="card shadow-sm custom-card">
                <div class="card-body">

                    <h5 class="fw-bold mb-4">
                        Statistik Pengajuan
                    </h5>

                    <canvas id="statusChart"></canvas>

                </div>
            </div>
        </div>

        <!-- TABLE -->
        <div class="col-lg-7 mb-4">
            <div class="card shadow-sm custom-card">
                <div class="card-body">

                    <div class="d-flex justify-content-between align-items-center mb-3">

                        <h5 class="fw-bold mb-0">
                            Pengajuan Terbaru
                        </h5>

                    </div>

                    <div class="table-responsive">

                        <table class="table align-middle">

                            <thead>
                                <tr>
                                    <th>Nama Pengaju</th>
                                    <th>Terlapor</th>
                                    <th>Status</th>
                                </tr>
                            </thead>

                            <tbody>

                                <?php foreach (array_slice($pengajuan, 0, 5) as $p): ?>

                                    <tr>

                                        <td>

                                            <div class="fw-semibold">
                                                <?= $p->nama_pengaju ?>
                                            </div>

                                            <small class="text-muted">
                                                <?= $p->email ?>
                                            </small>

                                        </td>

                                        <td>
                                            <?= $p->nama_terlapor ?>
                                        </td>

                                        <td>

                                            <?php if ($p->status == 'pending'): ?>
                                                <span class="badge-status badge-pending">
                                                    Pending
                                                </span>
                                            <?php endif; ?>

                                            <?php if ($p->status == 'disetujui'): ?>
                                                <span class="badge-status badge-disetujui">
                                                    Disetujui
                                                </span>
                                            <?php endif; ?>

                                            <?php if ($p->status == 'ditolak'): ?>
                                                <span class="badge-status badge-ditolak">
                                                    Ditolak
                                                </span>
                                            <?php endif; ?>

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

</div>

<!-- CHART -->
<script src="https://cdn.jsdelivr.net/npm/chart.js"></script>

<script>
    const ctx = document.getElementById('statusChart');

    new Chart(ctx, {
        type: 'doughnut',

        data: {
            labels: ['Pending', 'Disetujui', 'Ditolak'],

            datasets: [{
                data: [
                    <?= $pending ?>,
                    <?= $disetujui ?>,
                    <?= $ditolak ?>
                ],

                backgroundColor: [
                    '#ffc107',
                    '#28a745',
                    '#dc3545'
                ],

                borderWidth: 0
            }]
        },

        options: {
            responsive: true,

            plugins: {
                legend: {
                    position: 'bottom'
                }
            }
        }
    });
</script>

<?= $this->endSection() ?>