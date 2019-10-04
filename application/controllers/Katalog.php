<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Katalog extends CI_Controller
{
    public function index()
    {
        $this->load->view('navbar/katalog_page');
    }
}
