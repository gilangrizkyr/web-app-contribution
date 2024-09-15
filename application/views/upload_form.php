    <div class="container mt-5">
        <div class="row">
            <div class="col-md-6 offset-md-3">
                <h2 class="text-center mb-4">Upload Gambar Klinik</h2>
                <form action="<?= base_url('upload_controller/upload_process') ?>" method="post" enctype="multipart/form-data">
                    <div class="form-group">
                        <label for="namaKlinik">Nama Klinik</label>
                        <input type="text" class="form-control" id="namaKlinik" name="namaKlinik" required>
                    </div>
                    <div class="form-group">
                        <label for="gambarKlinik">Unggah Gambar</label>
                        <input type="file" class="form-control-file" id="gambarKlinik" name="gambarKlinik" accept="image/*" required>
                        <small id="fileHelp" class="form-text text-muted">Hanya file gambar yang diizinkan (jpg, jpeg, png, gif).</small>
                    </div>
                    <div class="form-group">
                        <button type="submit" class="btn btn-primary">Upload</button>
                    </div>
                </form>
            </div>
        </div>
    </div>

    <!-- Bootstrap JS and dependencies (if needed) -->
    <script src="https://stackpath.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.bundle.min.js"></script>


