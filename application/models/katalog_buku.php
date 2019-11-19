<?php
defined('BASEPATH') or exit('No direct script access allowed');

class katalog_buku extends CI_Model
{
    public function getBook()
    {
        $data = $this->db->query("SELECT dbo.Book.ID,dbo.Book.Judul,dbo.Tipe_book.Tipe, dbo.Book.Penulis, dbo.Book.Penerbit, dbo.Book.ISBN, dbo.Book.Harga, dbo.Book.Keterangan, dbo.Book.Image, dbo.Book.Year FROM dbo.Book INNER JOIN dbo.Tipe_book ON dbo.Book.id_tipe = dbo.Tipe_book.id");
        // echo $data->result_array();
        return $data->result_array();
    }

    public function addPeminjaman($idUser, $idBook, $tglPeminjaman, $tglPengembalian, $notifikasi)
    {
        $this->db->query("INSERT INTO [dbo].[Peminjaman](id, ID_Buku, Tgl_Peminjaman, Tgl_Pengembalian,Notifikasi) VALUES ('$idUser', '$idBook', '$tglPeminjaman', '$tglPengembalian','$notifikasi')");
    }

    public function getPeminjaman($id)
    {
        $data = $this->db->query("SELECT TOP (1000) [eLibrary].[dbo].[Peminjaman].[ID_Peminjaman]
        ,[eLibrary].[dbo].[Peminjaman].[id]
        ,[eLibrary].[dbo].[Book].[Judul]
        ,[eLibrary].[dbo].[Book].[Image]
        ,[eLibrary].[dbo].[Peminjaman].[Tgl_Peminjaman]
        ,[eLibrary].[dbo].[Peminjaman].[Tgl_Pengembalian]
        ,[eLibrary].[dbo].[Peminjaman].[Notifikasi]
        ,[eLibrary].[dbo].[Peminjaman].[Approval]
    FROM [eLibrary].[dbo].[Peminjaman]
    INNER JOIN [eLibrary].[dbo].[Book]
    ON [eLibrary].[dbo].[Peminjaman].[ID_Buku] = [eLibrary].[dbo].[Book].[ID]
    WHERE [eLibrary].[dbo].[Peminjaman].[id] = '$id'");
        // echo $data->result_array();
        return $data->result_array();
    }


    public function getTipeBuku()
    {
        $data = $this->db->query("SELECT * FROM dbo.Tipe_book");
        return $data->result_array();
    }
    
    public function getPinjamBooks()
    {
        $data = $this->db->query("SELECT * FROM [dbo].[Peminjaman]");
        // echo $data->result_array();
        return $data->result_array();
    }

    public function getBahasaBuku()
    {
        $data = $this->db->query("SELECT * FROM dbo.Language_book");
        return $data->result_array();
    }

    public function getTransaksibuku()
    {
        $data = $this->db->query("SELECT [dbo].[Peminjaman].ID_Peminjaman, [dbo].[User].username, [dbo].[Book].Judul,[dbo].[Peminjaman].Tgl_Peminjaman,[dbo].[Peminjaman].Tgl_Pengembalian,[dbo].[Peminjaman].Notifikasi FROM dbo.Peminjaman INNER JOIN [dbo].[User] ON [dbo].[Peminjaman].id = [dbo].[User].id INNER JOIN [dbo].[Book] ON [dbo].[Peminjaman].ID_Buku = [dbo].[Book].ID");
        return $data->result_array();
    }

    public function getDetailBuku($judul)
    {
        $data = $this->db->query("SELECT dbo.Book.ID,dbo.Book.Judul,dbo.Tipe_book.Tipe, dbo.Book.Penulis, dbo.Book.Penerbit, dbo.Book.ISBN, dbo.Book.Harga, dbo.Book.Keterangan, dbo.Book.Image, dbo.Book.Year, dbo.Language_book.bahasa FROM dbo.Book INNER JOIN dbo.Tipe_book ON dbo.Book.id_tipe = dbo.Tipe_book.id INNER JOIN dbo.Language_book ON dbo.Book.id_bahasa = dbo.Language_book.id WHERE Judul='$judul'");
        return $data->result_array();
    }
}
