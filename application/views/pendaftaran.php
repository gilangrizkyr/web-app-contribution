<br>
<div id="layoutSidenav">
    <div id="layoutSidenav_content">
        <div class="container-fluid px-4">
            <div class="card mb-4">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h3>
                        <i class="fas fa-users me-2"></i>
                        Iuran Warga
                    </h3>
                </div>
                <div class="card-body">
                    <div class="text-center">
                    <a href="" class="btn btn-warning btn-sm"><b>Iuran</a> (Diisi Oleh RT/Bendahara)</b>
                    <a href="" class="btn btn-success btn-sm"><b>Riwayat</a> (Melihat Riwayat Iuran warga)</b>
                    </div>
                    <div class="table-responsive">
                        <table id="datatablesSimple" class="table table-striped">
                            <thead>
                                <tr>
                                    <th>No</th>
                                    <th>Nama</th>
                                    <th>NIK</th>     
                                    <th>periode</th>
                                    <th>Riwayat</th>
                                    <th>Input</th>
                                    <th>Bayar Iuran</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php
                                $no = 1;
                                foreach ($tagihan as $k) : ?>
                                    <tr>
                                        <td><?= $no++ ?></td>
                                        <td><?= $k->nama ?></td>
                                        <td><?= $k->nik ?></td>
                                        <td><?= $k->riwayat ?> Kali</td>
                                        <td><?= $k->periode ?></td>
                                        <td>
                                            <a href="<?= base_url('riwayat_iuran/index/' . $k->id) ?>" class="btn btn-success btn-sm">Riwayat iuran</a>
                                        </td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <a href="<?= base_url('bayar/form_tagihan/') ?>" class="btn btn-warning btn-sm">Bayar Iuran</a>
                                                <!-- <div class="audio-player">
                                                    <audio id="audioPlayer">
                                                        <source id="audio" src="<?= base_url('assets/audio/manggil.mp3') ?>" type="audio/mpeg">
                                                        Your browser does not support the audio element.
                                                    </audio>
                                                    <button id="playButton" class="btn btn-primary btn-sm"><i class="fa-solid fa-volume-high"></i></button>
                                                </div> -->
                                            </div>
                                            <!-- Modal Hapus -->
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

    <script>
        // Fungsi untuk memainkan audio
        function playAudio() {
            var audioPlayer = document.getElementById('audioPlayer');
            var audioSource = document.getElementById('audioSource');

            // Memuat ulang audio (diperlukan jika ingin memutar ulang audio yang sama)
            audioPlayer.load();

            // Memainkan audio
            audioPlayer.play();
        }

        // Event listener untuk tombol Putar Suara
        document.getElementById('playButton').addEventListener('click', function() {
            playAudio();
        });
    </script>