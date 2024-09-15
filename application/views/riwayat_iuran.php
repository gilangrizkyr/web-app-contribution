<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                <h3>
                    <i class="fas fa-users me-2"></i>
                    Riwayat Konsultasi - <?= $warga['nama'] ?> (NIK: <?= $warga['nik'] ?>)
                </h3>
                </div>
                    <?php if ($tagihan) : ?>
                        <div class="card-body">
                            <div class="table-responsive">
                                <table id="datatablesSimple" class="table table-striped">
                                    <thead>
                                        <tr>
                                            <th>No</th>
                                            <th>Nama</th>
                                            <th>NIK</th>
                                            <th>Jumlah</th>
                                            <th>Periode</th>
                                            <th>Riwayat</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($tagihan as $index => $rm) : ?>
                                            <tr>
                                                <td><?= $index + 1 ?></td>
                                                <td><?= $rm['nama'] ?></td>
                                                <td><?= $rm['nik'] ?></td>
                                                <td><?= $rm['jumlah'] ?></td>
                                                <td><?= $rm['periode'] ?></td>
                                                <td><?= $rm['riwayat'] ?></td>
                                            </tr>
                                        <?php endforeach; ?>
                                    </tbody>
                                </table>
                            </div>
                        <?php else : ?>
                            <p>Data rekam medis tidak ditemukan untuk pasien ini.</p>
                        <?php endif; ?>
                        </div>
                </div>
            </div>
        </div>
    </div>