<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h3>
                <i class="fas fa-share me-2"></i>
                Sebar Iuran
            </h3>
            <div class="card mb-4">
                <div class="card-header">
                    Form sebar Iuran
                </div>
                <div class="card-body">
                    <form action="<?= base_url('iuran/simpan_iuran') ?>" method="post">
                        <!-- Input fields untuk data pembayaran -->
                        <div class="mb-3">
                            <label class="form-label">Periode Bulan</label>
                            <input type="text" class="form-control" id="periode_bulan" name="periode_bulan" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Periode Tahun</label>
                            <input type="number" class="form-control" id="periode_tahun" name="periode_tahun" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Tanggal Bayar</label>
                            <input type="date" class="form-control" id="tgl_bayar" name="tgl_bayar" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Nominal Iuran</label>
                            <input type="number" class="form-control" id="nominal_iuran" name="nominal_iuran" required>
                        </div>
                        <div class="mb-3">
                            <label class="form-label">Status</label>
                            <input type="text" class="form-control" id="status" name="status" required>
                        </div>
                        <!-- Input hidden untuk menyimpan warga_id -->
                        <input type="hidden" name="warga_id" value="<?= isset($warga_id) ? $warga_id : '' ?>">
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>


                </div>
            </div>
        </div>
    </div>
</div>