<?php
class WP extends CI_Controller
{
    public function __construct()
    {
        parent::__construct();
        $this->load->model('Pohon_model');
        $this->load->model('Kriteria_model');
        $this->load->helper('url');
    }

    public function index()
    {
        $pohon = $this->Pohon_model->get_all_pohon();
        $kriteria = $this->Kriteria_model->get_all_kriteria();

        $bobot = [];
        foreach ($kriteria as $k) {
            $bobot[$k->id] = $k->bobot;
        }

        $nilai = [];
        foreach ($pohon as $p) {
            $nilai[$p->id] = $this->Pohon_model->get_nilai_kriteria($p->id);
        }

        $wp = $this->weighted_product($nilai, $bobot);
        $data['pohon'] = $pohon;
        $data['wp'] = $wp;

        // Menentukan pohon dengan nilai tertinggi
        $highest_pohon_id = array_key_first($wp);
        $data['highest_pohon'] = $highest_pohon_id;

        $this->load->view('ly/header');
        $this->load->view('wp/index', $data);
        $this->load->view('ly/footer');
    }

    private function weighted_product($nilai, $bobot)
    {
        // Normalisasi bobot
        // Periksa apakah normalisasi diperlukan
        $total_bobot = array_sum($bobot);
        $normalized_bobot = [];

        if (abs($total_bobot - 1) < 0.00001) {  // Toleransi untuk error pembulatan
            // Jika total bobot sudah 1, gunakan bobot asli
            $normalized_bobot = $bobot;
        } else {
            // Jika total bobot tidak 1, lakukan normalisasi
            foreach ($bobot as $kriteria_id => $b) {
                $normalized_bobot[$kriteria_id] = $b / $total_bobot;
            }
        }

        // Hitung vektor S
        $s_vector = [];
        foreach ($nilai as $pohon_id => $nk) {
            $s = 1;
            foreach ($nk as $k) {
                $kriteria_id = $k->kriteria_id;
                $nilai_kriteria = $k->nilai;
                if ($nilai_kriteria == 0) {
                    $nilai_kriteria = 0.0001;
                }
                $s *= pow($nilai_kriteria, $normalized_bobot[$kriteria_id]);
            }
            $s_vector[$pohon_id] = $s;
        }

        // Hitung vektor V
        $total_s = array_sum($s_vector);
        $v_vector = [];
        foreach ($s_vector as $pohon_id => $s) {
            $v_vector[$pohon_id] = $s / $total_s;
        }

        arsort($v_vector);
        return $v_vector;
    }
}
