<?= $this->extend('template/admin') ?>
<?= $this->section('content') ?>

<div class="row justify-content-center">
    <div class="col-12 col-md-10 col-lg-8">

        <div class="card border-0 shadow-sm">
            <div class="card-body p-4 p-md-5">

                <h5 class="mb-4 text-center ">Detail Pengajuan</h5>
                    <?php
                    $file = $p->file_surat;
                    $ext = strtolower(pathinfo($file, PATHINFO_EXTENSION));
                    ?>
                <form>

                    <!-- ROW 1 -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">NIK</label>
                            <input type="text" class="form-control bg-light shadow-none"
                                value="<?= $p->nik_pengaju ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Nama</label>
                            <input type="text" class="form-control bg-light shadow-none"
                                value="<?= $p->nama_pengaju ?>" readonly>
                        </div>
                    </div>

                    <!-- ROW 2 -->
                    <div class="row mb-3">
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">Tanggal Kematian</label>
                            <input type="text" class="form-control bg-light shadow-none"
                                value="<?= $p->tanggal_kematian ?>" readonly>
                        </div>

                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">No HP</label>
                            <input type="text" class="form-control bg-light shadow-none"
                                value="<?= $p->no_hp ?>" readonly>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label small fw-semibold">No HP</label>
                            <input type="text" class="form-control bg-light shadow-none"
                                value="<?= $p->email ?>" readonly>
                        </div>
                    </div>

                    <!-- STATUS -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Status</label>
                        <input type="text" class="form-control bg-light shadow-none"
                            value="<?= $p->status ?>" readonly>
                    </div>

                    <hr>

                    <h6 class="mb-3">Dokumen</h6>

                    <!-- FOTO -->
                    <div class="mb-3">
                        <label class="form-label small fw-semibold">Foto Surat</label><br>
                <img src="<?= base_url('uploads/gambar/' . $p->foto_surat) ?>"
     class="img-thumbnail mt-2"
     style="max-width: 200px; border-radius:10px; cursor:pointer;"
     onclick="openImage(this.src)">
                    </div>

         <div class="mb-4">
    <label class="form-label small fw-semibold">File Surat</label>

    <div class="mt-2">

        <?php if ($ext == 'pdf'): ?>
            <iframe 
                src="<?= base_url('uploads/surat/' . $file) ?>" 
                width="100%" 
                height="500px"
                style="border-radius:10px;">
            </iframe>

        <?php elseif (in_array($ext, ['jpg','jpeg','png'])): ?>
            <img src="<?= base_url('uploads/surat/' . $file) ?>"
                 class="img-fluid rounded"
                 style="max-height:400px; cursor:pointer;"
                 onclick="openImage(this.src)">

        <?php else: ?>
            <p class="text-muted">Preview tidak tersedia</p>
        <?php endif; ?>

    </div>

    <div class="mt-3">
        <a href="<?= base_url('uploads/surat/' . $file) ?>"
            target="_blank"
            class="btn btn-primary btn-sm">
            Lihat File
        </a>

    <a href="<?= base_url('admin/download/' . $p->file_surat) ?>"
   class="btn btn-success btn-sm">
   Download File
</a>
    </div>
</div>
                    <!-- BUTTON -->
                    <div class="d-flex justify-content-end">
                        <a href="<?= base_url('') ?>"
                            class="btn btn-secondary px-4 py-2 fw-bold text-uppercase shadow-sm">
                            Kembali
                        </a>
                    </div>

                </form>

            </div>
        </div>

    </div>
</div>

<div id="imageModal"
     style="display:none; position:fixed; z-index:9999; top:0; left:0; width:100%; height:100%; background:rgba(0,0,0,0.9); justify-content:center; align-items:center;">

    <!-- TOMBOL CLOSE -->
    <span onclick="closeImage()"
          style="position:absolute; top:20px; right:30px; font-size:35px; color:white; cursor:pointer; font-weight:bold;">
        &times;
    </span>


  <img id="modalImage"
     onclick="event.stopPropagation()"
     style="max-width:90%; max-height:90%; border-radius:10px; transition: transform 0.2s; cursor: grab;">
</div>
<script>
let scale = 1;
const img = document.getElementById('modalImage');

// buka gambar
function openImage(src) {
    img.src = src;
    document.getElementById('imageModal').style.display = 'flex';
}

// zoom pakai scroll (CUMA SEKALI DIPASANG)
img.addEventListener('wheel', function(e) {
    e.preventDefault();

    if (e.deltaY < 0) {
        scale += 0.1;
    } else {
        scale -= 0.1;
    }

    // batas zoom
    if (scale < 0.5) scale = 0.5;
    if (scale > 5) scale = 5;

    img.style.transform = `scale(${scale})`;
});

// tutup + reset
function closeImage() {
    document.getElementById('imageModal').style.display = 'none';
    scale = 1;
    img.style.transform = "scale(1)";
}

// ESC buat nutup
document.addEventListener('keydown', function(e) {
    if (e.key === "Escape") {
        closeImage();
    }
});
</script>
<?= $this->endSection() ?>