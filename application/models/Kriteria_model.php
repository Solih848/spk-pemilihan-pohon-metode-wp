<?php
class Kriteria_model extends CI_Model
{
    public function get_all_kriteria()
    {
        $query = $this->db->get('kriteria');
        return $query->result();
    }

    public function get_kriteria_by_id($id)
    {
        $this->db->where('id', $id);
        $query = $this->db->get('kriteria');
        return $query->row(); // Mengembalikan objek
    }


    public function insert_kriteria($data)
    {
        return $this->db->insert('kriteria', $data);
    }

    public function update_kriteria($id, $data)
    {
        $this->db->where('id', $id);
        return $this->db->update('kriteria', $data);
    }

    public function destroy($id)
    {
        $this->db->trans_start();

        // Hapus data terkait di tabel nilai_kriteria
        $this->db->where('kriteria_id', $id);
        $this->db->delete('nilai_kriteria');

        // Hapus data di tabel kriteria
        $this->db->where('id', $id);
        $this->db->delete('kriteria');

        $this->db->trans_complete();

        if ($this->db->trans_status() === FALSE) {
            // Rollback transaksi jika gagal
            $this->db->trans_rollback();
            return false;
        } else {
            // Commit transaksi jika berhasil
            $this->db->trans_commit();
            return true;
        }
    }
}
