<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth_model extends CI_Model
{

    public function __construct()
    {
        parent::__construct();
        $this->load->database();
    }

    public function login($email, $password)
    {
        $this->db->where('email', $email);
        $this->db->where('password', ($password));
        $query = $this->db->get('users'); // Asumsi tabel pengguna bernama 'users'

        if ($query->num_rows() == 1) {
            return $query->row();
        } else {
            return false;
        }
    }
}
