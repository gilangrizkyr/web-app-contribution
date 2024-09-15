<!-- application/views/edit.php -->
<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h3>
                <i class="fas fa-user-edit me-2"></i>
                Edit Data Warga
            </h3>
            <div class="card mb-4">
                <div class="card-header">
                    Form Edit Warga
                </div>
                <div class="card-body">
                    <form action="<?= base_url('warga/update_warga') ?>" method="post">
                        <input type="hidden" name="id" value="<?= $warga->id ?>">
                        <div class="mb-3">
                            <label for="nama" class="form-label">Nama Warga</label>
                            <input type="text" class="form-control" id="nama" name="nama" value="<?= $warga->nama ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="nik" class="form-label">NIK</label>
                            <input type="number" class="form-control" id="nik" name="nik" value="<?= $warga->nik ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="tanggal_lahir" class="form-label">Tanggal Lahir</label>
                            <input type="date" class="form-control" id="tgl_lahir" name="tgl_lahir" value="<?= $warga->tgl_lahir ?>" required>
                        </div>
                        <div class="mb-3">
                            <label for="alamat" class="form-label">Alamat</label>
                            <textarea class="form-control" id="alamat" name="alamat" rows="3" required><?= $warga->alamat ?></textarea>
                        </div>
                        <div class="mb-3">
                            <label for="">Jenis Kelamin</label><br>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="laki-laki" value="Laki-Laki" <?php echo ($warga->gender == 'Laki-Laki') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="laki-laki">Laki-Laki</label>
                            </div>
                            <div class="form-check form-check-inline">
                                <input class="form-check-input" type="radio" name="gender" id="perempuan" value="Perempuan" <?php echo ($warga->gender == 'Perempuan') ? 'checked' : ''; ?> required>
                                <label class="form-check-label" for="perempuan">Perempuan</label>
                            </div>
                        </div>

                        <div class="mb-3">
                            <label for="no_telp" class="form-label">No Handphone</label>
                            <input type="number" class="form-control" id="no_hp" name="no_hp" value="<?= $warga->no_hp ?>" required>
                        </div>
                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>