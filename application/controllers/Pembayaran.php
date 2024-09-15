<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Pembayaran extends CI_Controller {

    public function index()
    {
        // Ambil data pembayaran iuran dari tabel pembayaran_iuran dan join dengan tabel warga
        $this->db->select('pembayaran_iuran.*, warga.nama'); // Memilih semua kolom dari pembayaran_iuran dan nama dari tabel warga
        $this->db->from('pembayaran_iuran');
        $this->db->join('warga', 'pembayaran_iuran.warga_id = warga.id');
        $query = $this->db->get();
        $data['pembayaran'] = $query->result(); // Simpan hasil query ke dalam array $data

        // Load view dan lewatkan data pembayaran ke view
        $this->load->view('pembayaran', $data); // Sesuaikan dengan struktur folder dan nama view Anda
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

}
?>
