<?php
defined('BASEPATH') or exit('No direct script access allowed');

class login_model extends CI_Model
{

    public function login($email, $password)
    {
        $check = $this->db->query("SELECT * FROM [dbo].[User] WHERE [username]='$email' AND [pass]='$password'")->row_array();
        if ($check) {
            if ($check['status'] == 1) {
                return 1;
            } else {
                return -1;
            }
        } else {
            return 0;
        }
    }
}
