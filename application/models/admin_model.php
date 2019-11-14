<?php
defined('BASEPATH') or exit('No direct script access allowed');

class admin_model extends CI_Model
{
    public function insertNotifikasiTransaksi($id)
    {
        $this->db->query("UPDATE [dbo].[Peminjaman] SET Notifikasi = 0 WHERE ID_Peminjaman = $id");
    }
    public function getTransaksibuku()
    {
        $data = $this->db->query("SELECT [dbo].[Peminjaman].ID_Peminjaman, [dbo].[User].username, [dbo].[Book].Judul,[dbo].[Peminjaman].Tgl_Peminjaman,[dbo].[Peminjaman].Tgl_Pengembalian FROM dbo.Peminjaman INNER JOIN [dbo].[User] ON [dbo].[Peminjaman].id = [dbo].[User].id INNER JOIN [dbo].[Book] ON [dbo].[Peminjaman].ID_Buku = [dbo].[Book].ID");
        return $data->result_array();
    }
    public function getDetailUser($username)
    {
        $data = $this->db->query("SELECT * FROM [dbo].[User] WHERE username='$username'");
        return $data->result_array();
    }
    public function getDetailBuku($judul)
    {
        $data = $this->db->query("SELECT dbo.Book.ID,dbo.Book.Judul,dbo.Tipe_book.Tipe, dbo.Book.Penulis, dbo.Book.Penerbit, dbo.Book.ISBN, dbo.Book.Harga, dbo.Book.Keterangan, dbo.Book.Image, dbo.Book.Year, dbo.Language_book.bahasa FROM dbo.Book INNER JOIN dbo.Tipe_book ON dbo.Book.id_tipe = dbo.Tipe_book.id INNER JOIN dbo.Language_book ON dbo.Book.id_bahasa = dbo.Language_book.id WHERE Judul='$judul'");
        return $data->result_array();
    }
    public function getUser()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[User]");
        // echo $data->result_array();
        return $data->result_array();
    }
    public function getBuku()
    {
        $data = $this->db->query("SELECT dbo.Book.ID,dbo.Book.Judul,dbo.Tipe_book.Tipe, dbo.Book.Penulis, dbo.Book.Penerbit, dbo.Book.ISBN, dbo.Book.Harga, dbo.Book.Keterangan, dbo.Book.Image, dbo.Book.Year, dbo.Language_book.bahasa FROM dbo.Book INNER JOIN dbo.Tipe_book ON dbo.Book.id_tipe = dbo.Tipe_book.id INNER JOIN dbo.Language_book ON dbo.Book.id_bahasa = dbo.Language_book.id");
        // echo $data->result_array();
        return $data->result_array();
    }
    public function getTipeBuku()
    {
        $data = $this->db->query("SELECT * FROM dbo.Tipe_book");
        return $data->result_array();
    }
    public function getBahasaBuku()
    {
        $data = $this->db->query("SELECT * FROM dbo.Language_book");
        return $data->result_array();
    }
    public function saveEditUser($id, $newusername, $newemail, $newprofile, $password)
    {
        $this->db->query("UPDATE [dbo].[User] SET email='$newemail', username='$newusername', image='$newprofile', pass='$password' WHERE id='$id'");
    }
    public function saveEditBuku($id, $newjudul, $newtipe, $newpenulis, $newpenerbit, $newisbn, $newharga, $newketerangan, $newimage, $newyear, $bahasa)
    {
        $this->db->query("UPDATE [dbo].[Book] SET Judul='$newjudul',id_tipe='$newtipe',Penulis='$newpenulis',Penerbit='$newpenerbit',ISBN='$newisbn',Harga='$newharga',Keterangan='$newketerangan',Image='$newimage',Year='$newyear',id_bahasa='$bahasa' WHERE ID='$id'");
    }
    public function saveEditTipe($id, $tipe)
    {
        $this->db->query("UPDATE [dbo].[Tipe_book] SET Tipe='$tipe' WHERE id='$id'");
    }
    public function deleteUser($id)
    {
        $this->deleteImageuser($id);
        $this->db->query("DELETE FROM [dbo].[User] WHERE id='$id'");
    }
    public function deleteBuku($id)
    {
        $this->deleteImage($id);
        $this->db->query("DELETE FROM [dbo].[Book] WHERE id='$id'");
    }
    public function deleteTipe($id)
    {
        $this->db->query("DELETE FROM [dbo].[Tipe_book] WHERE id='$id'");
    }
    public function addUser($addusername, $addemail, $addstatus, $addpassword, $profile)
    {
        $this->db->query("INSERT INTO [dbo].[User](email,pass,status,username,image) VALUES ('$addemail','$addpassword','$addstatus','$addusername','$profile')");
    }
    public function addBuku($judul, $tipe, $penulis, $penerbit, $isbn, $harga, $keterangan, $image, $year, $bahasa)
    {
        $this->db->query("INSERT INTO [dbo].[Book](Judul,id_tipe,Penulis,Penerbit,ISBN,Harga,Keterangan,Image,Year,id_bahasa) VALUES ('$judul','$tipe','$penulis','$penerbit','$isbn','$harga','$keterangan','$image','$year','$bahasa')");
    }
    public function addTipe($tipe)
    {
        $this->db->query("INSERT INTO [dbo].[Tipe_book](Tipe) VALUES('$tipe')");
    }
    public function deleteImage($id)
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Book] WHERE ID='$id'");
        $select = $data->result_array();

        if ($select[0]["Image"] != "default.jpg") {
            $filename = explode(".", $select[0]["Image"])[0];
            echo $filename;
            return array_map('unlink', glob(FCPATH . "upload/book/$filename.*"));
        }
    }
    public function deleteImageuser($id)
    {
        $data = $this->db->query("SELECT * FROM [dbo].[User] WHERE id='$id'");
        $select = $data->result_array();

        if ($select[0]["image"] != "default.jpg") {
            $filename = explode(".", $select[0]["image"])[0];
            echo $filename;
            return array_map('unlink', glob(FCPATH . "upload/user/$filename.*"));
        }
    }
}
