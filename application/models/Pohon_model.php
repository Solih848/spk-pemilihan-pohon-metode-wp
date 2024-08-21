<?php
class Pohon_model extends CI_Model
{
    public function get_all_pohon($id = null)
    {
        if ($id === null) {
            $query = $this->db->get('pohon');
            return $query->result();
        } else {
            $query = $this->db->get_where('pohon', ['id' => $id]);
            return $query->row(); // Mengembalikan satu objek pohon
        }
    }

    public function get_nilai_kriteria($pohon_id)
    {
        $this->db->select('*');
        $this->db->from('nilai_kriteria');
        $this->db->where('pohon_id', $pohon_id);
        return $this->db->get()->result();
    }

    public function insert_pohon($data)
    {
        return $this->db->insert('pohon', $data);
    }

    public function insert_nilai_kriteria($data)
    {
        return $this->db->insert_batch('nilai_kriteria', $data);
    }

    public function update_pohon($id, $data)
    {
        return $this->db->where('id', $id)->update('pohon', $data);
    }

    public function delete_pohon($id)
    {
        return $this->db->where('id', $id)->delete('pohon');
    }

    public function delete_nilai_kriteria($pohon_id)
    {
        return $this->db->where('pohon_id', $pohon_id)->delete('nilai_kriteria');
    }
}
