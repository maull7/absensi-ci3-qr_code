<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->library('form_validation');
        $this->load->model('Model_registrasi');
    }

    public function index()
    {
        $data['title'] = 'login page';

        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password', 'Password', 'required|trim|min_length[3]', [
            'min_length' => 'Minimal panjang password 3 kata'
        ]);

        if ($this->form_validation->run() == false) {
            $this->load->view('auth_templates/header', $data);
            $this->load->view('auth/index');
            $this->load->view('auth_templates/footer');
        } else {
            $this->Model_registrasi->login();
            redirect('auth');
        }
    }
    public function registrasi()
    {
        $data['title'] = 'Registrasi';

        $this->form_validation->set_rules('nama', 'Nama', 'required|trim');
        $this->form_validation->set_rules('email', 'Email', 'required|trim|valid_email');
        $this->form_validation->set_rules('password1', 'Password', 'required|trim|matches[password2]|min_length[3]', [
            'matches' => 'Password anda tidak sama',
            'min_length' => 'Minimal panjang password 3 kata'
        ]);
        $this->form_validation->set_rules('password2', 'password', 'required|trim|matches[password1]');
        if ($this->form_validation->run() == false) {
            $this->load->view('auth_templates/header', $data);
            $this->load->view('auth/registrasi');
            $this->load->view('auth_templates/footer');
        } else {
            $this->Model_registrasi->registrasi();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Kamu berhasil melakukan registrasi, silahkan login !!
            </div>');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('email');
        $this->session->unset_userdata('role_id');
        $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            Kamu berhasil melakukan logout!
            </div>');

        redirect('auth');
    }
}
