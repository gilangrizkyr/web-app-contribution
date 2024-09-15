<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Iuran extends CI_Controller
{

    public function index()
    {
        // Ambil semua data warga dari tabel warga
        $query = $this->db->get('warga');
        $data['warga'] = $query->result(); // Simpan hasil query ke dalam array $data

        // Load view form_tagihan dan lewatkan data warga
        $this->load->view('sebar_iuran', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    public function simpan_iuran()
    {
        // Tangkap data dari form
        $periode_bulan = $this->input->post('periode_bulan');
        $periode_tahun = $this->input->post('periode_tahun');
        $tgl_bayar = $this->input->post('tgl_bayar');
        $nominal_iuran = $this->input->post('nominal_iuran');
        $status = $this->input->post('status');

        // Ambil semua data warga dari tabel warga
        $query = $this->db->get('warga');
        $warga = $query->result(); // Simpan hasil query ke dalam array $warga

        // Loop untuk setiap warga dan membuat entri pembayaran_iuran
        foreach ($warga as $warga_item) {
            $data = array(
                'periode_bulan' => $periode_bulan,
                'periode_tahun' => $periode_tahun,
                'tgl_bayar' => $tgl_bayar,
                'nominal_iuran' => $nominal_iuran,
                'status' => $status,
                'warga_id' => $warga_item->id // Gunakan id warga saat ini
            );

            // Masukkan data ke dalam database (contoh, sesuaikan dengan struktur tabel Anda)
            $this->db->insert('pembayaran_iuran', $data);
        }

        // Set flashdata untuk notifikasi
        $this->session->set_flashdata('success', 'Data iuran berhasil disimpan.');

        // Redirect kembali ke halaman view warga
        redirect('warga');
    }
}
