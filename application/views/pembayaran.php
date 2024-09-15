<!-- Di dalam views/pembayaran/view_pembayaran.php -->
<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <h3>
                <i class="fas fa-receipt me-2"></i>
                Data Pembayaran Iuran
            </h3>
            <div class="card mb-4">
                <div class="card-header">
                    Daftar Pembayaran Iuran
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table class="table table-bordered" id="dataTable" width="100%" cellspacing="0">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Warga</th>
                                    <th>Periode Bulan</th>
                                    <th>Periode Tahun</th>
                                    <th>Tanggal Bayar</th>
                                    <th>Nominal Iuran</th>
                                    <th>Status</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php $no = 1; foreach ($pembayaran as $item): ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $item->nama ?></td> <!-- Menampilkan nama warga -->
                                        <td><?= $item->periode_bulan ?></td>
                                        <td><?= $item->periode_tahun ?></td>
                                        <td><?= $item->tgl_bayar ?></td>
                                        <td><?= $item->nominal_iuran ?></td>
                                        <td><?= $item->status ?></td>
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
