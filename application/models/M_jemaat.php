<?php

class M_jemaat extends CI_Model
{
    public function semuaJemaat(){
        return $this->db->get('tb_jemaat')->result_array();
    }
    
    public function listNama($kelompok){
        return $this->db->get_where('tb_jemaat', ['kelompok' => $kelompok])->result_array();
    }

    public function sudahMemilih()
    {
        return $this->db->get_where('tb_jemaat', ['status' => 'Sudah Memilih'])->result_array();
    }
    
    public function belumMemilih()
    {
        return $this->db->get_where('tb_jemaat', ['status' => 'Belum Memilih'])->result_array();
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

    public function updateKehadiran($id, $password){
        $this->db->set('status', 'HADIR')->set('password', $password)->set('waktuHadir', date('H:i:s'))->where('id', $id)->update('tb_jemaat');
    }

    public function cekPassword($nama, $kelompok){
        return $this->db->get_where('tb_jemaat', ['nama'=> $nama, 'kelompok' => $kelompok])->row_array();
    }

    public function removePassword($password){
        $this->db->set('password', '-')->set('status', 'MEMILIH')->where('password', $password)->update('tb_jemaat');
    }

    public function selesaiPilih($id){
        $this->db->set('status', 'Sudah Memilih')->where('id', $id)->update('tb_jemaat');
    }
}