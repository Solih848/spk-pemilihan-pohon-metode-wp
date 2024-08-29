<?php
class Dashboard extends CI_Controller
{
    public function index()
    {
        $this->load->view('ly/header');
        $this->load->view('dashboard/index');
        $this->load->view('ly/footer');
    }
}
