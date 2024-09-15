<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h3>
                <i class="fas fa-user-plus me-2"></i>
                Tambah iuran warga
            </h3>
            <div class="card mb-4">

                <div class="card-body">
                    <form action="<?= base_url('bayar/tambah_iuran_warga') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $id ?>">

                        <!-- Periode Bulan -->
                        <div class="mb-3">
                            <label for="periode_bulan" class="form-label">Periode Bulan</label>
                            <input type="text" class="form-control" id="periode_bulan" name="periode_bulan" placeholder="Nama Bulan / Angka" required>
                            <!-- Contoh placeholder: MM -->
                        </div>

                        <!-- Periode Tahun -->
                        <div class="mb-3">
                            <label for="periode_tahun" class="form-label">Periode Tahun</label>
                            <input type="text" class="form-control" id="periode_tahun" name="periode_tahun" placeholder="contoh : 2024" required>
                            <!-- Contoh placeholder: YYYY -->
                        </div>

                        <!-- Jumlah Iuran -->
                        <div class="mb-3">
                            <label for="nominal_iuran" class="form-label">Jumlah Iuran</label>
                            <input type="number" class="form-control" id="nominal_iuran" name="nominal_iuran" required>
                        </div>

                        <!-- Informasi Warga (Jika diperlukan) -->
                        <!-- <div class="mb-3">
                            <label for="warga" class="form-label">Informasi Warga</label>
                            <textarea class="form-control" id="warga" name="warga" rows="3" required></textarea>
                        </div> -->

                        <!-- Tombol Simpan -->
                        <button type="submit" class="btn btn-primary">Simpan</button>
                    </form>
                </div>

            </div>
        </div>
    </div>
</div>
