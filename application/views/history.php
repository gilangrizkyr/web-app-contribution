<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <br>
            <div class="card mb-4">
                <div class="card-header"> 
                    <h4>
                        <i class="fas fa-refresh me-2"></i>
                        History delete data Pasien
                    </h4>
                </div>
                <div class="card-body">
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama Pasien</th>
                                    <th>NIK</th>
                                    <th>Alamat</th>
                                    <th>Jenis Kelamin</th>
                                    <th>Tanggal Lahir</th>
                                    <th>Alasan Hapus</th>
                                    <th>Waktu</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($history as $h) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $h->nama ?></td>
                                        <td><?= $h->nik ?></td>
                                        <td><?= $h->alamat ?></td>
                                        <td><?= $h->gender ?></td>
                                        <td><?= $h->tgl_lahir ?></td>
                                        <td><?= $h->alasan ?></td>
                                        <td><?= $h->tgl_hapus ?></td>
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
