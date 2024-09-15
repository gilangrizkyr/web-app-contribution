<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h3>
                <i class="fas fa-users me-2 "></i>
                Data Warga
            </h3>
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <button class="btn btn-success btn-rounded btn-sm" onclick="window.location.href='<?= base_url('warga/tambah') ?>'">Tambah Data Warga</button>
                    <div>
                        <a href="" class="btn btn-primary btn-rounded btn-sm"><i class="fas fa-export"></i> Export</a>
                        <a href="<?= base_url('print_controller') ?>" class="btn btn-primary btn-rounded btn-sm"><i class="fas fa-print"></i> Print</a>
                    </div>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Informasi</th>
                                    <th>Nama</th>
                                    <th>NIK</th>
                                    <th>T.Lahir</th>
                                    <th>Alamat</th>
                                    <th>J.Kel</th>
                                    <th>No.Hp</th>
                                    <!-- <th>Lihat Tagihan</th> -->
                                    <!-- <th>Terdafar</th> -->
                                    <th>Aksi</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($warga as $u) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td>
                                            <a href="warga/sebar_iuran" class="btn btn-danger btn-rounded btn-sm me-1">bayar iuran</a>
                                        </td>
                                        <td><?= $u->nama ?></td>
                                        <td><?= $u->nik ?></td>
                                        <td><?= $u->tgl_lahir ?></td>
                                        <td><?= $u->alamat ?></td>
                                        <td><?= $u->gender ?></td>
                                        <td><?= $u->no_hp ?></td>
                                        <!-- <td><?= $u->liat?></td> -->
                                        <!-- <td><?= $u->waktu ?></td> -->
                                        <td>
                                            <div class="btn-group" role="group" aria-label="Aksi">
                                                <div style="display: flex; align-items: center;">
                                                    <!-- Icon Edit -->
                                                    <a href="<?= base_url('warga/edit/') . $u->id ?>" class="btn btn-warning btn-sm me-1">
                                                        <i class="fa-solid fa-file-pen fa-lg" data-toggle="tooltip" title="Edit"></i>
                                                    </a>
                                                    <!-- Icon Delete -->
                                                    <a href="#" class="btn btn-danger btn-rounded btn-sm me-1" data-toggle="modal" data-target="#hapusModal<?= $u->id ?>">
                                                        <i class="fa-solid fa-trash fa-lg" data-toggle="tooltip" title="Delete"></i>
                                                    </a>
                                                    <!-- Icon untuk bayar iuran -->
                                                    <!-- <a href="<?= base_url('pendaftaran/simpan_iuran/') . $u->id ?>" class="btn btn-success btn-sm" data-toggle="tooltip" title="Pembayaran Iuran">
                                                        <i class="fa-solid fa-money-bill fa-lg"></i>
                                                    </a> -->
                                                </div>
                                            </div>
                                            <!-- Modal Hapus -->
                                            <div class="modal fade" id="hapusModal<?= $u->id ?>" tabindex="-1" role="dialog" aria-labelledby="hapusModalLabel<?= $u->id ?>" aria-hidden="true">
                                                <div class="modal-dialog" role="document">
                                                    <div class="modal-content">
                                                        <form action="<?= base_url('warga/hapus') ?>" method="post">
                                                            <div class="modal-header">
                                                                <h5 class="modal-title" id="hapusModalLabel<?= $u->id ?>">Konfirmasi Hapus</h5>
                                                                <!-- <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                                                                    <span aria-hidden="true">&times;</span>
                                                                </button> -->
                                                            </div>
                                                            <div class="modal-body">
                                                                <input type="hidden" name="id" value="<?= $u->id ?>">
                                                                <p>Apakah Anda yakin ingin menghapus data dengan nama
                                                                    <b><?= $u->nama ?></b>?
                                                                    <b><?= $u->nik ?></b>?
                                                                </p>
                                                                <label for="alasan">Alasan Hapus Pasien??</label>
                                                                <textarea name="alasan" class="form-control" required></textarea>
                                                            </div>
                                                            <div class="modal-footer">
                                                                <button type="button" class="btn btn-secondary" data-dismiss="modal">Batal</button>
                                                                <button type="submit" class="btn btn-danger">Hapus</button>
                                                            </div>
                                                        </form>
                                                    </div>
                                                </div>
                                            </div>
                                        </td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>