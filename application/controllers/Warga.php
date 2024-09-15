<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Warga extends CI_Controller
{
    
    public function index()
    {
        // $data['title'] = 'Dokementasi Warga';
        $data['warga'] = $this->db->query("SELECT * FROM warga ORDER BY id DESC")->result();
        
        $this->load->view('warga', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    public function tagihan()
    {
        $data['warga'] = $this->db->query("SELECT * FROM pembayaran_iuran ORDER BY id DESC")->result();

        $this->load->view('iuran', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    public function edit($id)
    {
        // Ambil data pasien dari tabel pasien berdasarkan id tabel warga
        $data['warga'] = $this->db->where('id', $id)->get('warga')->row();

        if (!$data['warga']) {
            // Jika data pasien tidak ditemukan, bisa ditangani dengan redirect atau pesan error
            $this->session->set_flashdata('error', 'Data pasien tidak ditemukan.');
            redirect('warga');
        }

        // Load view untuk halaman edit dengan data pasien yang sudah diambil
        $this->load->view('edit', $data); // Ganti 'edit_pasien' dengan nama view edit yang sesuai
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
        // var_dump($id_pasien);
    }

    public function update_warga()
    {
        // Ambil data dari form
        $id = $this->input->post('id');
        $nik = $this->input->post('nik');
        $nama = $this->input->post('nama');
        $no_hp = $this->input->post('no_hp');
        $alamat = $this->input->post('alamat');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $gender = $this->input->post('gender');

        // Lakukan validasi data jika diperlukan

        // Update data pasien di dalam database
        $data = array(
            'nama' => $nama,
            'nik' => $nik,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'gender' => $gender,
            'no_hp' => $no_hp
        );

        $this->db->where('id', $id);
        $this->db->update('warga', $data);

        // Pastikan juga untuk memperbarui data konsultasi jika perlu
        // Contoh: Memperbarui nama pasien di tabel konsultasi
        $data_konsultasi = array(
            'nama' => $nama,
            'nik' => $nik,
            // Tambahkan kolom lain yang perlu diperbarui di tabel konsultasi
        );

        $this->db->where('id', $id);
        // $this->db->update('pembayaran_iuran', $data);

        // Redirect atau beri pesan sukses
        $this->session->set_flashdata('success', 'Data pasien berhasil diupdate.');
        redirect('warga');
    }

    public function hapus()
    {
        $id = $this->input->post('id');
        $alasan = $this->input->post('alasan');

        // Validasi apakah alasan telah diisi
        if (empty($alasan)) {
            $this->session->set_flashdata('error', 'Alasan penghapusan harus diisi.');
            redirect('warga');
        }

        // Hapus data pasien dari tabel pasien
        $warga = $this->db->where('id', $id)->get('warga')->row();

        // Pastikan data pasien ada sebelum dilanjutkan
        if (!$warga) {
            $this->session->set_flashdata('error', 'Data pasien tidak ditemukan.');
            redirect('warga');
        }

        // Hapus data pasien dari tabel warga
        $this->db->where('id', $id);
        $this->db->delete('warga');

        // Hapus juga data konsultasi terkait
        $this->db->where('id', $id);
        // $this->db->delete('pembayaran_iuran');

        // Tambahkan log ke tabel history
        $history_data = [
            'id' => $id,
            'nama' => $warga->nama,
            'nik' => $warga->nik,
            'tgl_lahir' => $warga->tgl_lahir,
            'alamat' => $warga->alamat,
            'gender' => $warga->gender,
            'alasan' => $alasan
        ];
        $this->db->insert('hdata_warga', $history_data);

        // Set pesan sukses
        $this->session->set_flashdata('success', 'Data pasien berhasil dihapus.');

        // Redirect ke halaman pasien
        redirect('history');
    }


    public function tambah()
    {
        $this->load->view('tambah');
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    public function simpan_warga()
    {
        $nik = $this->input->post('nik');

        $cek_nik = $this->db->get_where('warga', array('nik' => $nik))->num_rows();

        if ($cek_nik > 0) {
            echo "<script>alert('NIK sudah terdaftar! Silahkan Cek di Data Pasien');window.location='" . base_url('warga') . "'</script>";
            exit();
        }
        // Ambil data dari form
        $nama = $this->input->post('nama');
        $nik = $this->input->post('nik');
        $tgl_lahir = $this->input->post('tgl_lahir');
        $alamat = $this->input->post('alamat');
        $gender = $this->input->post('gender');
        $no_hp = $this->input->post('no_hp');

        // Validasi input jika diperlukan

        // Masukkan data ke dalam database
        $data = array(
            'nama' => $nama,
            'nik' => $nik,
            'tgl_lahir' => $tgl_lahir,
            'alamat' => $alamat,
            'gender' => $gender,
            'no_hp' => $no_hp,
        );

        $this->db->insert('warga', $data);

        // Set pesan sukses atau error jika diperlukan
        $this->session->set_flashdata('success', 'Pasien berhasil ditambahkan.');

        // Redirect ke halaman data pasien atau halaman lain yang sesuai
        redirect('warga');
    }

    public function sebar_iuran()
    {
        $data['pembayaran_iuran'] = $this->db->query("SELECT * FROM pembarayan_iuran ORDER BY id DESC")->result();

        $this->load->view('iuran', $data);
        $this->load->view('template/intro');
        $this->load->view('template/navbar');
        $this->load->view('template/sidebar');
    }

    // Di dalam method yang menangani form submission
    public function simpan_iuran()
    {
        $periode_bulan = $this->input->post('periode_bulan');
        $periode_tahun = $this->input->post('periode_tahun');
        $tgl_bayar = $this->input->post('tgl_bayar');
        $nominal_iuran = $this->input->post('nominal_iuran');
        $status = $this->input->post('status');
        $warga_id = $this->input->post('warga_id'); // Ambil nilai warga_id dari hidden input

        // Validasi input jika diperlukan

        // Masukkan data ke dalam database
        $data = array(
            'periode_bulan' => $periode_bulan,
            'periode_tahun' => $periode_tahun,
            'tgl_bayar' => $tgl_bayar,
            'nominal_iuran' => $nominal_iuran,
            'status' => $status,
            'warga_id' => $warga_id // Pastikan nilai warga_id yang dimasukkan valid
        );

        // Masukkan data ke dalam tabel pembayaran_iuran
        $this->db->insert('pembayaran_iuran', $data);

        // Set flashdata untuk pesan sukses
        $this->session->set_flashdata('success', 'Iuran berhasil ditambahkan.');

        // Redirect ke halaman data warga atau halaman lain yang sesuai
        redirect('warga');
    }










    // public function simpan_iuran()
    // {

    //     $id = $this->input->post('id');
    //     $periode_bulan = $this->input->post('periode_bulan');
    //     $periode_tahun  = $this->input->post('periode_tahun');
    //     $tgl_bayar = $this->input->post('tgl_bayar');
    //     $nominal_iuran = $this->input->post('nominal_iuran');
    //     $status  = $this->input->post('status');
    //     //   = $this->input->post( ');

    //     // Validasi input jika diperlukan

    //     // Masukkan data ke dalam database
    //     $data = array(
    //         'id' => $id,
    //         'periode_bulan' => $periode_bulan,
    //         'periode_tahun ' => $periode_tahun,
    //         'tgl_bayar' => $tgl_bayar,
    //         'nominal_iuran' => $nominal_iuran,
    //         'status' => $status,
    //         // // ' => ,


    //     );

    //     $this->db->insert('pembayaran_iuran', $data);



    //     $this->session->set_flashdata('success', 'iuran berhasil ditambahkan.');

    //     // Redirect ke halaman data pasien atau halaman lain yang sesuai
    //     redirect('warga');
    // }

    // public function simpan_iuran()
    // {
    //     $nik = $this->input->post('nik');

    //     // $cek_nik = 
    //     $this->db->get_where('warga', array('nik' => $nik))->num_rows();

    //     // if ($cek_nik > 0) {
    //     //     echo "<script>alert('NIK sudah terdaftar! Silahkan Cek di Data Pasien');window.location='" . base_url('warga') . "'</script>";
    //     //     exit();
    //     // }
    //     // Ambil data dari form
    //     $nama = $this->input->post('nama');
    //     $nik = $this->input->post('nik');
    //     $tgl_lahir = $this->input->post('tgl_lahir');
    //     $alamat = $this->input->post('alamat');
    //     $gender = $this->input->post('gender');
    //     $no_hp = $this->input->post('no_hp');

    //     // Validasi input jika diperlukan

    //     // Masukkan data ke dalam database
    //     $data = array(
    //         'nama' => $nama,
    //         'nik' => $nik,
    //         'tgl_lahir' => $tgl_lahir,
    //         'alamat' => $alamat,
    //         'gender' => $gender,
    //         'no_hp' => $no_hp ,
    //     );

    //     $this->db->insert('tagihan', $data);

    //     // Set pesan sukses atau error jika diperlukan
    //     $this->session->set_flashdata('success', 'Pasien berhasil ditambahkan.');

    //     // Redirect ke halaman data pasien atau halaman lain yang sesuai
    //     redirect('tambah_iuran');
    // }
}
