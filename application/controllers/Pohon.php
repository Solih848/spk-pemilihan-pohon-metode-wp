<?php
class Pohon extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pohon_model');
        $this->load->model('Kriteria_model');
        $this->load->helper('url'); // Tambahkan baris ini
        $this->load->library('session'); // Tambahkan baris ini

    }

    public function index()
    {
        $data['pohon'] = $this->Pohon_model->get_all_pohon();
        $this->load->view('ly/header');
        $this->load->view('pohon/index', $data);
        $this->load->view('ly/footer');
    }

    public function create()
    {
        $data['kriteria'] = $this->Kriteria_model->get_all_kriteria();
        if (is_array($data['kriteria']) || is_object($data['kriteria'])) {
            $this->load->view('ly/header');
            $this->load->view('pohon/create', $data);
            $this->load->view('ly/footer');
        } else {
            $data['kriteria'] = []; // Set default empty array if no data found
            $this->load->view('pohon/create', $data);
        }
    }

    public function store()
    {
        $pohon_data = ['nama_pohon' => $this->input->post('nama_pohon')];
        $this->Pohon_model->insert_pohon($pohon_data);
        $pohon_id = $this->db->insert_id();

        $kriteria_data = $this->input->post('kriteria');
        if (is_array($kriteria_data)) {
            $nilai_kriteria = [];
            foreach ($kriteria_data as $kriteria_id => $nilai) {
                $nilai_kriteria[] = [
                    'pohon_id' => $pohon_id,
                    'kriteria_id' => $kriteria_id,
                    'nilai' => $nilai
                ];
            }
            $this->Pohon_model->insert_nilai_kriteria($nilai_kriteria);
        }
        redirect('pohon');
    }

    public function edit($id)
    {
        $data['pohon'] = $this->Pohon_model->get_all_pohon($id); // Mengambil satu objek pohon berdasarkan ID
        $data['kriteria'] = $this->Kriteria_model->get_all_kriteria();
        $data['nilai_kriteria'] = $this->Pohon_model->get_nilai_kriteria($id);
        $this->load->view('ly/header');
        $this->load->view('pohon/edit', $data);
        $this->load->view('ly/footer');
    }

    public function update($id)
    {
        $pohon_data = ['nama_pohon' => $this->input->post('nama_pohon')];
        $this->Pohon_model->update_pohon($id, $pohon_data);

        $this->Pohon_model->delete_nilai_kriteria($id);
        $kriteria_data = $this->input->post('kriteria');
        $nilai_kriteria = [];
        foreach ($kriteria_data as $kriteria_id => $nilai) {
            $nilai_kriteria[] = [
                'pohon_id' => $id,
                'kriteria_id' => $kriteria_id,
                'nilai' => $nilai
            ];
        }
        $this->Pohon_model->insert_nilai_kriteria($nilai_kriteria);
        redirect('pohon');
    }

    public function destroy($id)
    {
        $this->Pohon_model->delete_nilai_kriteria($id);
        $this->Pohon_model->delete_pohon($id);
        redirect('pohon');
    }
}
