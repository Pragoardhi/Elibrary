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
        if ($this->session->userdata('statusadmin') == "login" || $this->session->userdata('statususer') == "login") {

            redirect(base_url('Login'));
        }
        $this->load->view('login/login_page');
    }
    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');
        $check = $this->login_model->login($email, $password);
        $username = $this->login_model->getUsername($email, $password);
        $id = $this->login_model->getId($email, $password);
        if ($check == 1) {
            $data_session = array(
                'statusadmin' => 'login',
                'username' => $username,
                'id' => $id
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('Admin'));
        } else if ($check == -1) {
            $data_session = array(
                'statususer' => 'login',
                'username' => $username,
                'id' => $id
            );
            $this->session->set_userdata($data_session);
            redirect(base_url('Home'));
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
