<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{

    public function login($email, $password)
    {
        $check = $this->db->query("SELECT * FROM [dbo].[User] WHERE [email]='$email' AND [pass]='$password'")->row_array();
        $id = $check['id'];
        if ($check) {
            if ($check['status'] == 1) {
                $this->db->query("UPDATE [dbo].[User] SET active='1' WHERE id='$id'");
                return 1;
            } else {
                $this->db->query("UPDATE [dbo].[User] SET active='1' WHERE id='$id'");
                return -1;
            }
        } else {
            return 0;
        }
    }

    public function getUsername($email, $password)
    {
        $check = $this->db->query("SELECT * FROM [dbo].[User] WHERE [email]='$email' AND [pass]='$password'")->row_array();
        return $check['username'];
    }

    public function getId($email, $password)
    {
        $check1 = $this->db->query("SELECT * FROM [dbo].[User] WHERE [email]='$email' AND [pass]='$password'")->row_array();
        return $check1['id'];
    }
    public function logOut($id)
    {
        $this->db->query("UPDATE [dbo].[User] SET active='2' WHERE id='$id'");
    }
}
