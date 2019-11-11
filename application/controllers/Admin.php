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
            $data['listuser'] = $this->admin_model->getUser();
            $data['listbuku'] = $this->admin_model->getBuku();
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
            $data['listbuku'] = $this->admin_model->getBuku();
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
            $data['listuser'] = $this->admin_model->getUser();
            $data['listtipe'] = $this->admin_model->getTipeBuku();
            $this->load->view('admin/daftarbuku', $data);
        }
    }
    public function Saveedit()
    {
        $datasama = false;
        $editid = $this->input->post('editid');
        $editusername = $this->input->post('editusername');
        $editemail = $this->input->post('editemail');
        $oldpassword = $this->input->post('oldpassword');
        $editpassword = $this->input->post('editoldpassword');
        $passwordcheck = ($this->db->query("SELECT * FROM [dbo].[User] WHERE id='$editid'"))->result_array();
        if ($passwordcheck[0]["pass"] != $oldpassword) {
            $this->session->set_flashdata('dataada', "password tidak sesuai");
            redirect(base_url('Admin/Daftarpengguna'));
        } else {
            $datacheck = ($this->db->query("SELECT * FROM [dbo].[User] WHERE NOT id='$editid'"))->result_array();
            $count = count($datacheck);
            for ($i = 0; $i < $count; $i++) {
                if ($datacheck[$i]["username"] == $editusername || $datacheck[$i]["email"] == $editemail) {
                    $datasama = true;
                }
            }
            if ($datasama) {
                $this->session->set_flashdata('dataada', "username atau email sudah terdaftar");
                redirect(base_url('Admin/Daftarpengguna'));
            } else {
                $this->admin_model->deleteImageuser($editid);
                $config['upload_path']          = './upload/user/';
                $config['allowed_types']        = 'gif|jpg|png';
                $config['file_name']            = $editid;
                $config['overwrite']            = true;
                $config['max_size']             = 1024; // 1MB

                $this->load->library('upload', $config);

                if ($this->upload->do_upload('editprofile')) {
                    $editprofile = $this->upload->data("file_name");
                } else {
                    $editprofile = "default.jpg";
                }
                $this->session->set_flashdata('databerhasil', "data telah berhasil diubah");
                $this->admin_model->saveEditUser($editid, $editusername, $editemail, $editprofile, $editpassword);
                redirect(base_url('Admin/Daftarpengguna'));
            }
        }
    }
    public function SaveeditBuku()
    {
        $datasama = false;
        $editid = $this->input->post('editid');
        $editjudul = $this->input->post('editjudul');
        $edittipe = $this->input->post('edittipe');
        $editpenulis = $this->input->post('editpenulis');
        $editpenerbit = $this->input->post('editpenerbit');
        $editisbn = $this->input->post('editisbn');
        $editharga = $this->input->post('editharga');
        $editketerangan = $this->input->post('editketerangan');
        $edittahun = $this->input->post('edittahun');
        $datasama = false;
        $datacheck = ($this->db->query("SELECT * FROM [dbo].[Book] WHERE NOT ID='$editid'"))->result_array();
        $count = count($datacheck);
        for ($i = 0; $i < $count; $i++) {
            if ($datacheck[$i]["ISBN"] == $editisbn) {
                $datasama = true;
            }
        }
        if ($datasama) {
            $this->session->set_flashdata('databukuada', "buku telah terdaftar");
            redirect(base_url('Admin/Daftarbuku'));
        } else {
            $this->admin_model->deleteImage($editid);
            $config['upload_path']          = './upload/book/';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['file_name']            = $editid;
            $config['overwrite']            = true;
            $config['max_size']             = 1024; // 1MB

            $this->load->library('upload', $config);

            if ($this->upload->do_upload('editgambar')) {
                $editimage = $this->upload->data("file_name");
            } else {
                $editimage = "default.jpg";
            }
            $this->session->set_flashdata('databerhasil', "data telah berhasil diubah");
            $this->admin_model->saveEditBuku($editid, $editjudul, $edittipe, $editpenulis, $editpenerbit, $editisbn, $editharga, $editketerangan, $editimage, $edittahun);
            redirect(base_url('Admin/Daftarbuku'));
        }
    }
    public function Adduser()
    {
        $datasama = false;
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
            $this->session->set_flashdata('notifuser', 'true');
            redirect(base_url('Admin/Daftarpengguna'));
        }
    }
    public function Addbuku()
    {
        $databukusama = false;
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
            $config['file_name']            = $databuku[0][""] + 1;
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
            $this->session->set_flashdata('notifbuku', 'true');
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
