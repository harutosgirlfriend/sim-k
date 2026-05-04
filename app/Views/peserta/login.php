<!doctype html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Login</title>
    <link rel="shortcut icon" type="image/png" href="<?= base_url('peserta/assets/images/banner/logo.png') ?>" />
    <link rel="stylesheet" href="<?= base_url('admin/assets/css/styles.min.css') ?>" />
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>

    <div class="position-relative overflow-hidden text-bg-light min-vh-100 d-flex align-items-center">
        <script>
            <?php if (session()->getFlashdata('error_login')): ?>
                Swal.fire({
                    icon: 'error',
                    title: 'Login Gagal',
                    text: "<?= esc(session()->getFlashdata('error_login')) ?>"
                });
            <?php endif; ?>
        </script>
        <div class="container">
            <div class="row justify-content-center">

                <div class="col-11 col-sm-8 col-md-6 col-lg-5 col-xl-4">
                    <div class="card shadow-sm">
                        <div class="card-body p-4 p-md-5">

                            <!-- LOGO -->
                            <div class="text-center mb-3">
                                <img src="<?= base_url('peserta/assets/images/banner/logo.png') ?>" class="img-fluid"
                                    style="max-width:150px;">
                            </div>

                            <p class="text-center mb-4">SIM-K</p>

                            <!-- FORM -->
                            <form method="post" action="/login">

                                <div class="mb-3">
                                    <label class="form-label">Email</label>
                                    <input type="email" name="email"
                                        class="form-control <?= session('errors.email') ? 'is-invalid' : '' ?>"
                                        value="<?= old('email') ?>">

                                    <div class="invalid-feedback">
                                        <?= session('errors.email') ?>
                                    </div>

                                </div>

                                <div class="mb-3">
                                    <label class="form-label">Password</label>
                                    <input type="password" name="password"
                                        class="form-control <?= session('errors.password') ? 'is-invalid' : '' ?>">

                                    <div class="invalid-feedback">
                                        <?= session('errors.password') ?>
                                    </div>
                                </div>

                                <!-- <div class="text-start mb-3">
                                <a href="#" class="text-primary small">Lupa Password?</a>
                            </div> -->


                                <button type="submit" class="btn btn-primary w-100 py-2">
                                    Login
                                </button>

                                <div class="text-center mt-3">
                                    Belum punya akun?
                                    <a href="/registrasi" class="fw-bold text-primary">Buat Akun</a>
                                </div>

                            </form>

                        </div>
                    </div>
                </div>

            </div>
        </div>

    </div>

    <script src="<?= base_url('admin/assets/libs/jquery/dist/jquery.min.js') ?>"></script>
    <script src="<?= base_url('admin/assets/libs/bootstrap/dist/js/bootstrap.bundle.min.js') ?>"></script>

</body>

</html>