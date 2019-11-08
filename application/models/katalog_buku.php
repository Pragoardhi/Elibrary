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

    public function addPeminjaman($idUser, $idBook, $tglPeminjaman, $tglPengembalian)
    {
        $this->db->query("INSERT INTO [dbo].[Peminjaman](id, ID_Buku, Tgl_Peminjaman, Tgl_Pengembalian) VALUES ('$idUser', '$idBook', '$tglPeminjaman', '$tglPengembalian')");
    }

    public function getPeminjaman()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Peminjaman]");
        // echo $data->result_array();
        return $data->result_array();
    }

}