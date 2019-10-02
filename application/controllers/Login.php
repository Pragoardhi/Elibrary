<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Login extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('login_model');
    }
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            $this->load->view('login/login_page');
        } else {
            $this->load->view('admin/admin');
        }
    }
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $check = $this->login_model->login($email, $password);
        if ($check == 1) {
            $data_session = array(
                'email' => $email,
                'status' => 'login'
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('Admin'));
        } else if ($check == -1) {
            echo "user";
        } else {
            echo "Username dan password salah !";
            die();
        }
    }
    public function logout()
    {
        $this->session->sess_destroy();
        redirect(base_url('Login'));
    }
}
