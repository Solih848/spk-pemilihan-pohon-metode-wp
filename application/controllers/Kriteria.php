<?php
class Kriteria extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Kriteria_model');
    }

    public function index()
    {
        $data['kriteria'] = $this->Kriteria_model->get_all_kriteria();
        $this->load->view('ly/header');
        $this->load->view('kriteria/index', $data);
        $this->load->view('ly/footer');
    }

    public function create()
    {
        $this->load->view('ly/header');
        $this->load->view('kriteria/create');
        $this->load->view('ly/footer');
    }

    public function store()
    {
        $data = array(
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'bobot' => $this->input->post('bobot'),
            'kategori' => $this->input->post('kategori') // Pastikan ini ada
        );

        if ($this->Kriteria_model->insert_kriteria($data)) {
            redirect('kriteria');
        } else {
            // Tangani error jika ada
            echo 'Error menyimpan data';
        }
    }

    public function edit($id)
    {
        $this->load->model('Kriteria_model');
        $data['kriteria'] = $this->Kriteria_model->get_kriteria_by_id($id);

        if (empty($data['kriteria'])) {
            show_404(); // Jika data tidak ditemukan
        }
        $this->load->view('ly/header');
        $this->load->view('kriteria/edit', $data);
        $this->load->view('ly/footer');
    }

    public function update($id)
    {
        $data = array(
            'nama_kriteria' => $this->input->post('nama_kriteria'),
            'bobot' => $this->input->post('bobot'),
            'kategori' => $this->input->post('kategori')
        );

        if ($this->Kriteria_model->update_kriteria($id, $data)) {
            redirect('kriteria');
        } else {
            // Tangani error jika ada
            echo 'Error memperbarui data';
        }
    }

    public function destroy($id)
    {
        if ($this->Kriteria_model->destroy($id)) {
            $this->session->set_flashdata('success', 'Kriteria berhasil dihapus');
        } else {
            $this->session->set_flashdata('error', 'Gagal menghapus kriteria');
        }
        redirect('kriteria');
    }
}
