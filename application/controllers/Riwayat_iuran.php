<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Riwayat_iuran extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        // Load database untuk mengakses database
        $this->load->database();
    }

    public function index($id = null)
    {
        // Pastikan id_pasien tidak kosong
        if (!$id) {
            show_404(); // Atau tampilkan pesan error
        }

        // Query untuk mengambil data pasien berdasarkan id_pasien
        $query_warga = $this->db->get_where('warga', array('id' => $id));
        $data['warga'] = $query_warga->row_array();

        // Query untuk mengambil semua data rekam medis berdasarkan id_pasien
        $query_warga = $this->db->get_where('warga', array('id' => $id));

        // Pastikan query berjalan dengan benar
        if ($query_warga->num_rows() > 0) {
            // Ambil semua data rekam medis jika ditemukan
            $data['warga'] = $query_warga->result_array();
        } else {
            // Jika data rekam medis tidak ditemukan
            $data['warga'] = array(); // Set array kosong atau beri nilai default sesuai kebutuhan Anda
        }

        // Data yang akan dikirim ke view riwayat_konsul.php
        $this->load->view('riwayat_iuran', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    // Fungsi untuk menambahkan data ke tabel rekam_medis
    public function tambah_iuran()
    {
        // Pastikan ini hanya dapat diakses via POST
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            // Ambil data dari POST
            $id = $this->input->post('id');
            $nama = $this->input->post('nama');
            $nik = $this->input->post('nik');
            $jumlah = $this->input->post('jumlah');
            $periode = $this->input->post('periode');
            $riwayat = $this->input->post('riwayat');

            // Validasi data (sesuai kebutuhan)
            // Misalnya, cek apakah semua data diterima dengan benar

            // Masukkan ke dalam tabel rekam_medis
            $data = array(
                'id_pasien' => $id,
                'nama' => $nama,
                'nik' => $nik,
                'jumlah' => $jumlah,
                'periode' => $periode,
                'riwayat' => $riwayat,
            );

            // Masukkan ke dalam tabel rekam_medis
            $this->db->insert('tagihan', $data);

            // Redirect atau tampilkan pesan sukses
            redirect('riwayat_iuran/' . $id); // Redirect kembali ke halaman riwayat_konsul
        } else {
            // Handle jika tidak ada POST data
            show_404(); // Misalnya menampilkan error 404
        }
    }
}
