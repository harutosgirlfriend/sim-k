<?= $this->extend('template/peserta') ?>
<?= $this->section('content') ?>

<div class="px-3 mb-3">
 
    <div class="row align-items-center" id="cara_pengajuan">
           <h3 class="text-center mb-2">Cara Pengajuan Surat Kematian</h3>
    <p class="text-center text-muted mb-5">
        Ikuti langkah berikut untuk melakukan pengajuan
    </p>
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

<?= $this->endSection() ?>