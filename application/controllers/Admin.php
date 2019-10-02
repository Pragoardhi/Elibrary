<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('status') != "login") {
            // $this->load->view('login//login_page');
            redirect(base_url("Login"));
        } else {
            $this->load->view('admin/admin');
        }
    }
}
