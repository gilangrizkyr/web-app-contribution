<?php
defined('BASEPATH') or exit('No direct script access allowed');

class auth extends CI_Controller
{

    public function index()
    {   
        
        // Mengambil jumlah warga dari database
        $this->load->database();
        $query = $this->db->query("SELECT COUNT(*) as total_warga FROM warga");
        $total_warga = $query->row()->total_warga;

        // Mengirimkan data total warga ke view
        $data['total_warga'] = $total_warga;

        // Mengambil jumlah pasien yang belum mengisi data diagnosa
        // $this->db->where('status_konsultasi', 'Belum di isi');
        // $query_pasien_menunggu = $this->db->get('konsultasi');
        // $jumlah_pasien_menunggu = $query_pasien_menunggu->num_rows();

        // Mengirimkan data total pasien dan jumlah pasien yang menunggu ke view
        $data['total_warga'] = $total_warga;

        $this->load->view('home', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        
        // $this->load->view('template/footer');
        // echo 'masuk';
    }
}
