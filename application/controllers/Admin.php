<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Admin extends CI_Controller
{
    function __construct()
    {
        parent::__construct();
        $this->load->model('admin_model');
        $this->load->helper('url');
    }
    public function index()
    {
        if ($this->session->userdata('statusadmin') != "login") {
            redirect(base_url('Login'));
        } else {
            $data['username'] = $this->session->userdata('username');
            $data['totaluser'] = $this->admin_model->getUser();
            $data['totalbuku'] = $this->admin_model->getBuku();
            $this->load->view('admin/dashboard', $data);
        }
    }
    public function Daftarpengguna()
    {
        if ($this->session->userdata('statusadmin') != "login") {
            redirect(base_url('Login'));
        } else {
            $data['username'] = $this->session->userdata('username');
            $data['listuser'] = $this->admin_model->getUser();

            $this->load->view('admin/daftarpengguna', $data);
        }
    }
    public function Daftarbuku()
    {
        if ($this->session->userdata('statusadmin') != "login") {
            redirect(base_url('Login'));
        } else {
            $data['username'] = $this->session->userdata('username');
            $data['listbuku'] = $this->admin_model->getBuku();

            $this->load->view('admin/daftarbuku', $data);
        }
    }
    public function Saveedit()
    {
        $editid = $this->input->post('editid');
        $editusername = $this->input->post('editusername');
        $editemail = $this->input->post('editemail');

        $this->admin_model->saveEditUser($editid, $editusername, $editemail);
        redirect(base_url('Admin/Daftarpengguna'));
    }
    public function SaveeditBuku()
    {

        redirect(base_url('Admin/Daftarpengguna'));
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
            if ($this->input->post('tambahstatus') == "User") {
                $tambahstatus = -1;
            }
            $this->session->set_flashdata('databerhasil', "data berhasil ditambahkan");
            $this->admin_model->addUser($tambahusername, $tambahemail, $tambahstatus, $tambahpassword);
            redirect(base_url('Admin/Daftarpengguna'));
        }
    }
    public function Addbuku()
    {
        $tambahisbn = $this->input->post('tambahisbn');
        $bukucheck = $this->admin_model->getBuku();
        $countbuku = count($bukucheck);
        for ($i = 0; $i < $countbuku; $i++) {
            if ($bukucheck[$i]["ISBN"] == $tambahisbn) {
                $databukusama = true;
            }
        }

        if ($databukusama) {
            $this->session->set_flashdata('databukuada', "buku telah terdaftar");
            redirect(base_url('Admin/Daftarbuku'));
        } else {
            $this->session->set_flashdata('databukuberhasil', "data berhasil ditambahkan");

            $tambahjudul = $this->input->post('tambahjudul');
            $tambahtipe = $this->input->post('tambahtipe');
            $tambahpenulis = $this->input->post('tambahpenulis');
            $tambahpenerbit = $this->input->post('tambahpenerbit');
            $tambahharga = $this->input->post('tambahharga');
            $tambahketerangan = $this->input->post('tambahketerangan');

            //dapetin last increment di table dbo.book
            $databuku = $this->db->query("SELECT IDENT_CURRENT('[dbo].[Book]')")->result_array();

            // echo $_FILES['tambahgambar']['name'];
            $config['upload_path']          = './upload/book/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $databuku[0][""] + 1;;
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB


            $this->load->library('upload', $config);

            if ($this->upload->do_upload('tambahgambar')) {
                $tambahgambar = $this->upload->data("file_name");
            } else {
                $tambahgambar = "default.jpg";
            }
            $tambahtahun = $this->input->post('tambahtahun');
            $this->admin_model->addBuku($tambahjudul, $tambahtipe, $tambahpenulis, $tambahpenerbit, $tambahisbn, $tambahharga, $tambahketerangan, $tambahgambar, $tambahtahun);
            redirect(base_url('Admin/Daftarbuku'));
        }
    }
    public function Deleteuser()
    {
        $id = $this->uri->segment(3);
        $this->admin_model->Deleteuser($id);
        redirect(base_url('Admin/Daftarpengguna'));
    }
    public function Deletebuku()
    {
        $id = $this->uri->segment(3);
        $this->admin_model->Deletebuku($id);
        redirect(base_url('Admin/Daftarbuku'));
    }
}
