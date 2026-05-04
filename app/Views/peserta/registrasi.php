<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Registrasi</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('peserta/assets/images/banner/logo.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('admin/assets/css/styles.min.css') ?>" />
</head>

<body>
    <div class="page-wrapper pt-5" id="main-wrapper">
        <div class="min-vh-100 d-flex align-items-center justify-content-center bg-light">

            <div class="w-100 d-flex justify-content-center px-3">

                <!-- CENTER CARD + FIX WIDTH -->
                <div class="card shadow-sm w-100" style="max-width: 420px;">
                    <div class="card-body p-4">

                        <!-- LOGO -->
                        <div class="text-center mb-3">
                            <img src="<?= base_url('peserta/assets/images/banner/logo.png') ?>" class="img-fluid"
                                style="max-width: 120px;">
                        </div>

                        <p class="text-center mb-4">SIM-K</p>

                        <form method="post" action="/registrasi/simpan">
                            <div class="mb-3">
                                <label class="form-label">Nama</label>
                                <input type="text" name="nama"
                                    class="form-control <?= session('errors.nama') ? 'is-invalid' : '' ?>"
                                    value="<?= old('nama') ?>">
                                <div class="invalid-feedback">
                                    <?= session('errors.nama') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Email</label>
                                <input type="email" name="email"
                                    class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                                    value="<?= old('email') ?>">

                                <div class="invalid-feedback">
                                    <?= session('errors.email') ?>
                                </div>
                                <p class="small mt-2"><span class="text-danger">*</span>harap masukkan email aktif</p>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Password</label>
                                <input type="password" name="password"
                                    class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>">

                                <div class="invalid-feedback">
                                    <?= session('errors.password') ?>
                                </div>
                            </div>

                            <div class="mb-3">
                                <label class="form-label">Konfirmasi Password</label>
                                <input type="password" name="confirm_password"
                                    class="form-control <?= session('errors.confirm_password') ? 'is-invalid' : '' ?>">

                                <div class="invalid-feedback">
                                    <?= session('errors.confirm_password') ?>
                                </div>
                            </div>

                            <!-- BUTTON -->
                            <button type="submit" class="btn btn-primary w-100 py-2 mb-3">
                                Registrasi
                            </button>

                            <!-- LINK LOGIN -->
                            <div class="text-center">
                                <span>Sudah Punya Akun?</span>
                                <a href="/" class="text-primary fw-bold">
                                    Login
                                </a>
                            </div>
                        </form>

                    </div>
                </div>

            </div>

        </div>
    </div>

    <script src="<?= base_url('admin/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>
</body>

</html>