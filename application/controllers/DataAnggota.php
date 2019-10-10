<?php
defined('BASEPATH') or exit('No direct script access allowed');

class DataAnggota extends CI_Controller
{
    public function index()
    {
        $this->load->model('admin_model');
        $data['listUser'] = $this->admin_model->getUser();
        $this->load->view('navbar/dataAnggota_page', $data);
    }
}
