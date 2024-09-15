<?php
defined('BASEPATH') or exit('No direct script access allowed');

class History extends CI_Controller
{

    public function index()
    {
        // Ambil data dari tabel hdelete_pasien
        $query = $this->db->get('hdata_warga');
        $history = $query->result(); // Mengambil hasil query ke dalam array

        // Mengirimkan data history ke view
        $data['history'] = $history;

        // Memuat view history dan menyimpannya dalam variabel $data['konten']
        $data['konten'] = $this->load->view('history', $data, TRUE);

        // Load template (misalnya, menggunakan template/intro, template/navbar, template/sidebar)
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        
        // Load view history dengan data
        $this->load->view('history', $data);
    }
}
?>
