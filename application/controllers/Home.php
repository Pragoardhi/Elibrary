<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
            $this->load->model('katalog_buku');
            $data['statususer'] = $this->session->userdata('statususer'); 
            $data['username'] = $this->session->userdata('username');
            $data['id'] = $this->session->userdata('id');
            $data['listBook'] = $this->katalog_buku->getBook();
            $this->load->view('navbar/home_page', $data);
    }

    public function Katalog()
    {
            $this->load->model('katalog_buku');
            $data['statususer'] = $this->session->userdata('statususer');
            $data['username'] = $this->session->userdata('username');
            $data['id'] = $this->session->userdata('id');
            $data['listBooks'] = $this->katalog_buku->getBook();
            $this->load->view('navbar/katalog_page', $data);
    }

    public function DataAnggota()
    {
            $this->load->model('admin_model');
            $data['statususer'] = $this->session->userdata('statususer');
            $data['username'] = $this->session->userdata('username');
            $data['id'] = $this->session->userdata('id');
            $data['listUser'] = $this->admin_model->getUser();
            $this->load->view('navbar/dataAnggota_page', $data);
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
            $data['id'] = $this->session->userdata('id');
            $this->load->view('navbar/transaksiUser_page', $data);
        }
    }

    public function Adduser()
    {
        $tambahusername = $this->input->post('tambahusername');
        $tambahemail = $this->input->post('tambahemail');
        $tambahpassword = $this->input->post('tambahpassword');
        $datacheck = $this->admin_model->getUser();
        $count = count($datacheck);
        for ($i = 0; $i < $count; $i++) {
            if ($datacheck[$i]["username"] == $tambahusername || $datacheck[$i]["email"] == $tambahemail) {
                $datasama = true;
            }
        }
        if ($datasama) {
            $this->session->set_flashdata('dataada', "username atau email sudah terdaftar");
            redirect(base_url('Admin/Daftarpengguna'));
        } else {
            $datauser = $this->db->query("SELECT IDENT_CURRENT('[dbo].[User]')")->result_array();
            // echo $_FILES['tambahgambar']['name'];
            $config['upload_path']          = './upload/user/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $datauser[0][""] + 1;
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('tambahprofile')) {
                $tambahprofile = $this->upload->data("file_name");
            } else {
                $tambahprofile = "default.jpg";
            }

            if ($this->input->post('tambahstatus') == "User") {
                $tambahstatus = -1;
            }
            $this->session->set_flashdata('databerhasil', "data telah berhasil ditambahkan");
            $this->admin_model->addUser($tambahusername, $tambahemail, $tambahstatus, $tambahpassword, $tambahprofile);
            redirect(base_url('Admin/Daftarpengguna'));
        }
    }
    public function AddPeminjaman()
    {
        $tambahIdUser = $this->input->post('tambahjudul');
        $tambahIdBook = $this->input->post('tambahtipe');
        $tambahTglPeminjaman = $this->input->post('tambahpenulis');
        $tambahTglPengembalian = $this->input->post('tambahpenerbit');
        $this->katalog_buku->addPeminajam($tambahIdUser, $tambahIdBook, $tambahTglPeminjaman, $tambahTglPengembalian);
        redirect(base_url('Admin/Daftarbuku'));   
    }
}
