<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Absensi extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_registrasi');
        is_logeged_in();
        $this->load->library('ciqrcode');
    }
    public function index()
    {
        $data['title'] = 'Absensi';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/index', $data);
        $this->load->view('templates/footer');
    }
    public function generate()
    {
        $absen = $this->input->post('absen');
        $nama = $this->input->post('nama');
        $kelas = $this->input->post('kelas');


        $kombinasi = $absen . ' | ' . $nama . ' | ' . $kelas;
        $params['data'] = $kombinasi;
        $params['level'] = 'H';
        $params['size'] = 10;
        $params['savename'] = FCPATH . 'uploads/' . $nama . '.png';
        $this->ciqrcode->generate($params);


        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Kamu berhasil membuat sebuah QR Code
        </div>');
        redirect('absensi');
    }
    public function scan()
    {
        $data['title'] = 'Scan QR code';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('absensi/scan', $data);
        $this->load->view('templates/footer');
    }
    public function proccess()
    {
        date_default_timezone_set('Asia/Jakarta');
        $hariIni = new DateTime();
        $data = $this->input->post('absen');
        $dataArray = explode(' | ', $data);
        $insert = [
            'absen' => $dataArray[0],
            'nama' => $dataArray[1],
            'kelas' => $dataArray[2],
            'waktu' => $hariIni->format('l F Y, H:i'),
            'keterangan' => 'Hadir'
        ];

        // Simpan data ke database
        $simpan = $this->db->insert('absen_masuk', $insert);

        if ($simpan) {
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Kamu berhasil absen melalui scan QR 
            </div>');
            redirect('absen');
        } else {
            redirect('Scan_qr/index');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                 Kamu gagal scan
          </div>');
        }
    }
}
