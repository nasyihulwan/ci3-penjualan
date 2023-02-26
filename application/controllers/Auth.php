<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('M_Auth');
    }
    public function index()
    {
        cekLogin();
        $data['title'] = 'Login | Aplikasi Penjualan';
        $this->load->view('auth/login', $data);
    }
    public function login()
    {
        cekLogin();
        $username = $this->input->post('username');
        $password = $this->input->post('password');

        $login = $this->M_Auth->getLogin($username, $password);

        $cekLogin = $login->num_rows();
        $dataLogin = $login->row_array();
        $data = array(
            'id_user' => $dataLogin['id_user'],
            'nama_lengkap' => $dataLogin['nama_lengkap'],
            'username' => $dataLogin['username'],
            'password' => $dataLogin['password'],
            'level' => $dataLogin['level'],
            'kode_cabang' => $dataLogin['kode_cabang']
        );
        $this->session->set_userdata($data);

        if ($cekLogin == 1) {
            redirect('dashboard');
        } else {
            $this->session->set_flashdata(
                'msg',
                '<div class="alert alert-warning" role="alert"> Data tidak ditemukan
                </div>
                '
            );
            redirect('auth');
        }
    }
    function logout()
    {
        session_destroy();
        redirect('auth');
    }
}
