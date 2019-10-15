<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function getUser()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[User]");
        // echo $data->result_array();
        return $data->result_array();
    }
    public function getBuku()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Book]");
        // echo $data->result_array();
        return $data->result_array();
    }
    public function saveEditUser($id, $newusername, $newemail, $newprofile)
    {
        $this->db->query("UPDATE [dbo].[User] SET email='$newemail', username='$newusername',image='$newprofile' WHERE id='$id'");
    }
    public function deleteUser($id)
    {
        $this->db->query("DELETE FROM [dbo].[User] WHERE id='$id'");
    }
    public function deleteBuku($id)
    {
        $this->deleteImage($id);
        $this->db->query("DELETE FROM [dbo].[Book] WHERE id='$id'");
    }
    public function addUser($addusername, $addemail, $addstatus, $addpassword, $profile)
    {
        $this->db->query("INSERT INTO [dbo].[User](email,pass,status,username,image) VALUES ('$addemail','$addpassword','$addstatus','$addusername','$profile')");
    }
    public function addBuku($judul, $tipe, $penulis, $penerbit, $isbn, $harga, $keterangan, $image, $year)
    {
        $this->db->query("INSERT INTO [dbo].[Book](Judul,Tipe,Penulis,Penerbit,ISBN,Harga,Keterangan,Image,Year) VALUES ('$judul','$tipe','$penulis','$penerbit','$isbn','$harga','$keterangan','$image','$year')");
    }
    private function deleteImage($id)
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Book] WHERE ID='$id'");
        $select = $data->result_array();

        if ($select[0]["Image"] != "default.jpg") {
            $filename = explode(".", $select[0]["Image"])[0];
            echo $filename;
            return array_map('unlink', glob(FCPATH . "upload/book/$filename.*"));
        }
    }
}
