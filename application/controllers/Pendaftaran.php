<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Pendaftaran extends CI_Controller
{

    public function index()
    {
        // Mengambil data konsultasi dari database
        $this->db->select('*');
        $this->db->from('tagihan');
        $data['tagihan'] = $this->db->get()->result();

        // Memuat view pendaftaran.php dengan data konsultasi yang telah diambil
        $this->load->view('pendaftaran', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    public function simpan_iuran($id)
{
    // Pastikan $id warga
    if (!is_numeric($id)) {
        echo "Invalid ID Warga.";
        return;
    }

    // Ambil data warga dari tabel warga
    $this->db->where('id', $id);
    $warga = $this->db->get('warga')->row();

    // Jika data warga ditemukan
    if ($warga) {
        // Siapkan data untuk dimasukkan atau diperbarui di tabel tagihan
        $data = array(
            'nama' => $warga->nama,
            'nik' => $warga->nik,
            // 'jumlah' => $warga->jumlah,
            // 'periode' => $warga->periode,
            // 'riwayat' => $warga->riwayat,
            // 'hpembayaran' => 'Cek' 
        );

        // Cek apakah sudah ada entri tagihan untuk id ini
        $this->db->where('id', $id);
        $konsultasi_existing = $this->db->get('tagihan')->row();

        if ($konsultasi_existing) {
            // Jika sudah ada, lakukan UPDATE untuk menambahkan riwayat
            $this->db->where('id', $id);
            $this->db->set('riwayat', 'riwayat + 1', FALSE); // Penambahan riwayat
            $this->db->update('konsultasi');
        } else {
            // Jika belum ada, lakukan INSERT untuk membuat entri baru
            $data['id'] = $warga->id;
            $data['riwayat'] = 1; // Inisialisasi riwayat pertama kali
            $this->db->insert('tagihan', $data);
        }

        // Redirect ke halaman pendaftaran atau sukses
        redirect('warga');
    } else {
        // Jika data warga tidak ditemukan, beri pesan error
        echo "Data warga tidak ditemukan.";
    }
}

}
