<?php
class Model_registrasi extends CI_Model
{
    public function __construct()
    {
        parent::__construct();
    }

    public function registrasi()
    {
        $data = [
            'nama' => $this->input->post('nama', true),
            'email' => $this->input->post('email', true),
            'password' => password_hash($this->input->post('password1', true), PASSWORD_DEFAULT),
            'role_id' => 2
        ];

        return $this->db->insert('user', $data);
    }

    public function login()
    {
        $email = $this->input->post('email', true);
        $password = $this->input->post('password', true);

        $user = $this->db->get_where('user', ['email' => $email])->row_array();

        if ($user) {
            if (password_verify($password, $user['password'])) {
                $data = [
                    'email' => $email,
                    'role_id' => $user['role_id']
                ];
                $this->session->set_userdata($data);
                if ($user['role_id'] > 1) {
                    redirect('siswa');
                } else {
                    redirect('admin');
                }
            } else {
                $data['title'] = 'login';
                $this->load->view('auth_templates/header', $data);
                $this->load->view('auth/index');
                $this->load->view('auth_templates/footer');
                $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
                password yang anda masukan salah
                </div>');
            }
        } else {
            $data['title'] = 'login';
            $this->load->view('auth_templates/header', $data);
            $this->load->view('auth/index');
            $this->load->view('auth_templates/footer');
            $this->session->set_flashdata('pesan', '<div class="alert alert-danger" role="alert">
            email salahh
            </div>');
        }
    }
    public function role()
    {
        return $this->db->get('role')->result_array();
    }
    public function datamenu()
    {
        return $this->db->get('user_menu')->result_array();
    }
    public function insert_menu()
    {
        $data = [
            'menu' => $this->input->post('menu', true)
        ];

        $this->db->insert('user_menu', $data);
        $this->session->set_flashdata('pesan', '<div class="alert alert-success" role="alert">
        Berhasil !!
        </div>');
    }
    public function menu_id($id)
    {
        return $this->db->get_where('user_menu', ['id' => $id])->row_array();
    }
    public function edit_menu()
    {
        $data = [
            'menu' => $this->input->post('menu', true)
        ];
        $this->db->where('id', $this->input->post('id'));
        return $this->db->update('user_menu', $data);
    }
    public function hapus_menu($id)
    {
        $this->db->where('id', $id);
        return $this->db->delete('user_menu');
    }

    public function datasubmenu()
    {
        $query = "SELECT *
        FROM `user_sub_menu` JOIN `user_menu` ON 
        `user_sub_menu`.`menu_id` =  `user_menu`.`id`";
        return $this->db->query($query)->result_array();
    }
    public function tambahdatasubmenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu_id', true),
            'title' => $this->input->post('title', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true)
        ];

        return $this->db->insert('user_sub_menu', $data);
    }
    public function id_sub_menu($id)
    {
        return $this->db->get_where('user_sub_menu', ['sub_id' => $id])->row_array();
    }
    public function editdatasubmenu()
    {
        $data = [
            'menu_id' => $this->input->post('menu_id', true),
            'title' => $this->input->post('title', true),
            'url' => $this->input->post('url', true),
            'icon' => $this->input->post('icon', true)
        ];
        $this->db->where('sub_id', $this->input->post('sub_id'));

        return $this->db->update('user_sub_menu', $data);
    }
    public function hapus_sub_menu($id)
    {
        $this->db->where('sub_id', $id);
        return $this->db->delete('user_sub_menu');
    }
    public function caridatasiswa()
    {
        return $this->db->get('absen_masuk')->result_array();
    }
}
