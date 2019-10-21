<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        if ($this->session->userdata('statususer') != "login") {
            redirect(base_url('Login'));
        }
        else{
            $this->load->model('katalog_buku');
            $data['statususer'] = $this->session->userdata('statususer'); 
            $data['username'] = $this->session->userdata('username');
            $data['listBook'] = $this->katalog_buku->getBook();
            $this->load->view('navbar/home_page', $data);
        }
    }

    public function Katalog()
    {
        if ($this->session->userdata('statususer') != "login") {
            redirect(base_url('Login'));
        }
        else{
            $this->load->model('katalog_buku');
            $data['statususer'] = $this->session->userdata('statususer');
            $data['username'] = $this->session->userdata('username');
            $data['listBooks'] = $this->katalog_buku->getBook();
            $this->load->view('navbar/katalog_page', $data);
        }
    }

    public function DataAnggota()
    {
        if ($this->session->userdata('statususer') != "login") {
            redirect(base_url('Login'));
        }
        else{
            $this->load->model('admin_model');
            $data['statususer'] = $this->session->userdata('statususer');
            $data['username'] = $this->session->userdata('username');
            $data['listUser'] = $this->admin_model->getUser();
            $this->load->view('navbar/dataAnggota_page', $data);
        }
    }

    public function TransaksiUser()
    {
        if ($this->session->userdata('statususer') != "login") {
            redirect(base_url('Login'));
        }
        else{
            $this->load->model('admin_model');
            $data['statususer'] = $this->session->userdata('statususer');
            $data['username'] = $this->session->userdata('username');
            $this->load->view('navbar/transaksiUser_page', $data);
        }
    }
}
