<?php

class M_jemaat extends CI_Model
{
    public function semuaJemaat(){
        return $this->db->get('tb_jemaat')->result_array();
    }
    
    public function listNama($kelompok){
        return $this->db->get_where('tb_jemaat', ['kelompok' => $kelompok])->result_array();
    }

    public function setBelumMemilih($id){
        $this->db->set('status', 'Belum Memilih')->where('id', $id)->update('tb_jemaat');
    }

    public function setSedangMemilih($id){
        $this->db->set('status', 'Sedang Memilih')->where('id', $id)->update('tb_jemaat');
    }

    public function sudahMemilih()
    {
        return $this->db->get_where('tb_jemaat', ['status' => 'Sudah Memilih'])->result_array();
    }
    
    public function belumMemilih()
    {
        return $this->db->get_where('tb_jemaat', ['status' => 'Belum Memilih'])->result_array();
    }

    public function sedangMemilih()
    {
        return $this->db->get_where('tb_jemaat', ['status' => 'Sedang Memilih'])->result_array();
    }

    public function resetStatus($id){
        $this->db->set('status', 'Belum Memilih')->where('id', $id)->update('tb_jemaat');
    }

    public function tambahJemaat($data){
        return $this->db->insert('tb_jemaat', $data);
    }

    public function jumlahPemilih($kelompok){
        return $this->db->get_where('tb_jemaat', ['status' => 'Sudah Memilih', 'kelompok' => $kelompok])->num_rows();
    }

    public function ambilJemaat($id){
        return $this->db->get_where('tb_jemaat', ['id' => $id])->row_array();
    }

    public function cekPassword($nama, $kelompok){
        return $this->db->get_where('tb_jemaat', ['nama'=> $nama, 'kelompok' => $kelompok])->row_array();
    }

    public function selesaiPilih($id){
        $this->db->set('status', 'Sudah Memilih')->where('id', $id)->update('tb_jemaat');
    }
}