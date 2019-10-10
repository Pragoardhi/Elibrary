<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
    public function index()
    {
        $this->load->model('katalog_buku');
        $data['listBook'] = $this->katalog_buku->getBook();
        $this->load->view('navbar/katalog_page', $data);
    }
}
