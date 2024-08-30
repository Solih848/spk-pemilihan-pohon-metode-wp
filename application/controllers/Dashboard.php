<?php
class Dashboard extends CI_Controller
{

    public function __construct()
    {
        parent::__construct();
        $this->load->library('session');
        if (!$this->session->userdata('user')) {
            redirect('auth'); // Redirect ke halaman login jika belum login
        }
    }

    public function index()
    {
        $data['email'] = $this->session->userdata('user')->email;
        $this->load->view('ly/header');
        $this->load->view('dashboard/index', $data);
        $this->load->view('ly/footer');
    }
}
