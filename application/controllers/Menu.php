<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Menu extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Model_registrasi');
        $this->load->library('form_validation');
    }

    public function index()
    {
        $data['title'] = 'Menu management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_registrasi->datamenu();

        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/index', $data);
        $this->load->view('templates/footer');
    }
    public function insert()
    {
        $data['title'] = 'Menu management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_registrasi->datamenu();
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/index', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_registrasi->insert_menu();
            redirect('menu');
        }
    }

    public function edit($id)
    {
        $data['title'] = 'Menu management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['menu'] = $this->Model_registrasi->menu_id($id);
        $this->form_validation->set_rules('menu', 'Menu', 'required|trim');
        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_menu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_registrasi->edit_menu();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil merubah data!!
            </div>');
            redirect('menu');
        }
    }
    public function hapus($id)
    {
        $this->Model_registrasi->hapus_menu($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil menghapus menu!!
        </div>');
        redirect('menu');
    }

    public function submenu()
    {
        $data['title'] = 'Submenu management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->Model_registrasi->datasubmenu();
        $data['menu'] = $this->Model_registrasi->datamenu();
        $this->load->view('templates/header', $data);
        $this->load->view('templates/sidebar', $data);
        $this->load->view('templates/topbar', $data);
        $this->load->view('menu/submenu', $data);
        $this->load->view('templates/footer');
    }

    public function tambahsubmenu()
    {
        $data['title'] = 'Submenu management';
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->Model_registrasi->datasubmenu();
        $data['menu'] = $this->Model_registrasi->datamenu();

        $this->form_validation->set_rules('menu_id', 'Menu_id', 'required|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/submenu', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_registrasi->tambahdatasubmenu();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil menambahkan submenu
        </div>');
            redirect('menu/submenu');
        }
    }


    public function edit_sub_menu($id)
    {
        $data['title'] = 'Submenu management';
        $data['menu'] = $this->Model_registrasi->datamenu();
        $data['user'] = $this->db->get_where('user', ['email' => $this->session->userdata('email')])->row_array();
        $data['submenu'] = $this->Model_registrasi->id_sub_menu($id);

        $this->form_validation->set_rules('menu_id', 'Menu_id', 'required|trim');
        $this->form_validation->set_rules('title', 'Title', 'required|trim');
        $this->form_validation->set_rules('url', 'Url', 'required|trim');
        $this->form_validation->set_rules('icon', 'Icon', 'required|trim');

        if ($this->form_validation->run() == false) {
            $this->load->view('templates/header', $data);
            $this->load->view('templates/sidebar', $data);
            $this->load->view('templates/topbar', $data);
            $this->load->view('menu/edit_sub', $data);
            $this->load->view('templates/footer');
        } else {
            $this->Model_registrasi->editdatasubmenu();
            $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil mengedit submenu
        </div>');
            redirect('menu/submenu');
        }
    }

    public function hapus_sub_menu($id)
    {

        $this->Model_registrasi->hapus_sub_menu($id);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
            Berhasil menghapus submenu!!
            </div>');
        redirect('menu/submenu');
    }
}
