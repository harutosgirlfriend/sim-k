<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<style>
    .page-admin {
        min-height: calc(100vh - 70px);
        padding: 30px;
    }

    .card-admin {
        width: 100%;
        max-width: 1000px;
        border: none;
        border-radius: 20px;
        overflow: hidden;
        background: #fff;
        margin: auto;
    }

    .card-admin .card-body {
        padding: 45px;
    }

    .logo-admin {
        width: 95px;
    }

    .title-admin {
        font-size: 34px;
        font-weight: 700;
        color: #111827;
    }

    .subtitle-admin {
        color: #6b7280;
        font-size: 15px;
    }

    .form-label {
        font-weight: 600;
        color: #111827;
        margin-bottom: 8px;
    }

    .form-control {
        height: 52px;
        border-radius: 12px;
        border: 1px solid #dbe1ea;
        padding: 12px 16px;
        font-size: 15px;
    }

    .form-control:focus {
        border-color: #4f46e5;
        box-shadow: none;
    }

    .password-info {
        font-size: 13px;
        color: #6b7280;
        margin-top: 8px;
        line-height: 1.5;
    }

    .btn-admin {
        height: 52px;
        border-radius: 12px;
        font-size: 16px;
        font-weight: 600;
    }

    @media (max-width: 768px) {
        .page-admin {
            padding: 15px;
        }

        .card-admin .card-body {
            padding: 30px 20px;
        }

        .title-admin {
            font-size: 28px;
        }
    }
</style>

<div class="page-admin">

    <div class="card shadow-sm card-admin">
        <div class="card-body">

       

            <!-- TITLE -->
            <div class="text-center mb-4">
                <h3 class="title-admin mb-2">
                    Tambah Akun Admin
                </h3>

                <p class="subtitle-admin mb-0">
                    Silakan isi data admin baru
                </p>
            </div>

            <form method="post"
                action="<?= base_url('admin/simpanAdmin') ?>">

                <?= csrf_field() ?>

                <div class="row">

                    <!-- NAMA -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Nama Admin
                        </label>

                        <input type="text"
                            name="nama"
                            class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>"
                            value="<?= old('nama') ?>" required>

                        <div class="invalid-feedback">
                            <?= session('errors.nama') ?>
                        </div>
                    </div>

                    <!-- EMAIL -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Email
                        </label>

                        <input type="email"
                            name="email"
                            class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                            value="<?= old('email') ?>" required>

                        <div class="invalid-feedback">
                            <?= session('errors.email') ?>
                        </div>
                    </div>

                    <!-- PASSWORD -->
                    <div class="col-md-6 mb-3">
                        <label class="form-label">
                            Password
                        </label>

                        <input type="password"
                            name="password"
                            class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>" required>

                        <div class="invalid-feedback">
                            <?= session('errors.password') ?>
                        </div>

                        <div class="password-info">
                            <span class="text-danger">*</span>
                            Password minimal 8 karakter,
                            harus mengandung angka dan simbol
                        </div>
                    </div>

                    <!-- KONFIRMASI PASSWORD -->
                    <div class="col-md-6 mb-4">
                        <label class="form-label">
                            Konfirmasi Password
                        </label>

                        <input type="password"
                            name="confirm_password"
                            class="form-control <?= session('errors.confirm_password') ? 'is-invalid' : '' ?>" required>

                        <div class="invalid-feedback">
                            <?= session('errors.confirm_password') ?>
                        </div>
                    </div>

                </div>

             		<div class="d-flex justify-content-end align-items-center mt-4">
							
							<button type="submit"
								class="btn btn-primary px-4 py-2 fw-bold text-uppercase border-0 shadow-sm">Kirim</button>
						</div>

            </form>

        </div>
    </div>

</div>

<?= $this->endSection() ?>