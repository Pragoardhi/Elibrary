<?php
defined('BASEPATH') or exit('No direct script access allowed');

class katalog_buku extends CI_Model
{
    public function getBook()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Book]");
        // echo $data->result_array();
        return $data->result_array();
    }
}