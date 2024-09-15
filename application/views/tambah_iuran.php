<!-- application/views/tambah_pasien.php -->
<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h3>
                <i class="fas fa-user-plus me-2"></i>
                Pembayaran Iuran
            </h3>
            <div class="card mb-4">
                <div class="card-header">
                    Form Tambah Warga
                </div>
                <div class="card-body">
                    <form action="<?= base_url('pendaftaran/simpan_iuran') ?>" method="post">
                        <div class="mb-3">
                            <label for="periode_bulan" class="form-label">Periode Bulan</label>
                            <input type="text" class="form-control" id="periode-bulan" name="periode-bulan" required>
                        </div>
                        <div class="mb-3">
                            <label for="periode_tahun" class="form-label">Periode Tahun</label>
                            <input type="number" class="form-control" id="periode_tahun" name="periode_tahun" required>
                        </div>
                        <div class="mb-3">
                            <label for="nominal_iuran" class="form-label">Jumlah Iuran</label>
                            <input type="number" class="form-control" id="nominal_iuran" name="nominal_iuran" required>
                        </div>
                        <div class="mb-3">
                            <label for="status" class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <div class="mb-3">
                            <label for="warga_id" class="form-label">Warga</label>
                            <input type="text" class="form-control" id="warga_id" name="warga_id" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>