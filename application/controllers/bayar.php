<?php
defined('BASEPATH') or exit('No direct script access allowed');

class bayar extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        // Load database untuk mengakses database
        $this->load->database();
    }

    public function index()
    {
        // Contoh cara mendapatkan idn dari tabel pasien secara langsung
        $query = $this->db->query("SELECT id FROM warga WHERE nik"); // Sesuaikan query sesuai dengan kondisi yang Anda butuhkan

        // Misalnya ambil baris pertama dari hasil query
        $row = $query->row();
        $id = $row->id;

        // Memuat view untuk halaman bayar (anda bisa menyesuaikan dengan struktur aplikasi Anda)
        $data['id'] = $id;
        $this->load->view('bayar', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    public function bayar_iuran($id)
{
    // Pastikan $id warga
    if (!is_numeric($id)) {
        echo "Invalid ID Warga.";
        return;
    }

    // Ambil data warga dari tabel warga berdasarkan $id
    $data['tagihan'] = $this->db->get_where('warga', ['id' => $id])->row();

    // Load view form_tagihan.php dengan data tagihan yang telah diambil
    $this->load->view('bayar_iuran', $data);
}


    // Fungsi untuk menambahkan data ke tabel rekam_medis
    public function tambah_iuran_warga()
    {
        if ($this->input->server('REQUEST_METHOD') == 'POST') {
            $periode_bulan = $this->input->post('periode_bulan');
            $periode_tahun = $this->input->post('periode_tahun');
            $nominal_iuran = $this->input->post('nominal_iuran');
            $warga_id = $this->input->post('warga_id');
    
            // Validasi warga_id dan periode_bulan
            if (!is_numeric($warga_id) || !$this->db->get_where('warga', ['id' => $warga_id])->row()) {
                show_error('Invalid warga_id provided.');
                return;
            }
    
            if (!is_numeric($periode_bulan) || $periode_bulan < 1 || $periode_bulan > 12) {
                show_error('Invalid periode_bulan provided.');
                return;
            }
    
            // Tentukan tgl_bayar menggunakan tanggal saat ini
            $tgl_bayar = date('Y-m-d'); // Misalnya menggunakan tanggal saat ini
    
            // Masukkan ke dalam tabel pembayaran_iuran
            $data = array(
                'periode_bulan' => $periode_bulan,
                'periode_tahun' => $periode_tahun,
                'tgl_bayar' => $tgl_bayar,
                'nominal_iuran' => $nominal_iuran,
                'status' => 'Belum Bayar', // Misalnya status awal belum dibayar
                'warga_id' => $warga_id,
            );
    
            $this->db->insert('pembayaran_iuran', $data);
    
            // Redirect kembali ke halaman pendaftaran setelah memasukkan data
            redirect('pendaftaran');
        } else {
            show_404();
        }
    }
    
    

}
?>
