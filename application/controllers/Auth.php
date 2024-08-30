<?php
defined('BASEPATH') or exit('No direct script access allowed');

class Auth extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->model('Auth_model'); // Load model untuk autentikasi
        $this->load->library('session');
    }

    public function index()
    {
        $this->load->view('login'); // Tampilkan form login
    }

    public function login()
    {
        $email = $this->input->post('email');
        $password = $this->input->post('password');

        $user = $this->Auth_model->login($email, $password);

        if ($user) {
            $this->session->set_userdata('user', $user);
            redirect('dashboard'); // Arahkan ke halaman dashboard
        } else {
            $this->session->set_flashdata('error', 'Email dan Password tidak cocok!');
            redirect('auth');
        }
    }

    public function logout()
    {
        $this->session->unset_userdata('user');
        redirect('auth'); // Arahkan kembali ke halaman login
    }
}
