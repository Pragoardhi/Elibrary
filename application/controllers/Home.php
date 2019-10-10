<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Home extends CI_Controller
{
    public function index()
    {
        $this->load->model('katalog_buku');
        $data['listBook'] = $this->katalog_buku->getBook();
        $this->load->view('navbar/home_page', $data);
    }
}
