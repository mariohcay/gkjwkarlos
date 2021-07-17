<?php

class M_majelis extends CI_Model
{
    public function jumlahSuara($kelompok){
        return $this->db->query("SELECT * FROM tb_majelis WHERE kelompok = 
        '" . $kelompok . "' ORDER BY suara DESC")->result_array();
    }
    
    public function daftarMajelis($kelompok){
        return $this->db->get_where('tb_majelis', ['kelompok' => $kelompok])->result_array();
    }

    public function daftarMajelisbyJK($kelompok, $kelamin){
        return $this->db->get_where('tb_majelis', ['kelompok' => $kelompok, 'jenisKelamin' => $kelamin])->result_array();
    }

    public function daftarMajelisByNoUrut($noUrut){
        return $this->db->get_where('tb_majelis', ['noUrut' => $noUrut])->row_array();
    }

    public function updateSuara($noUrut){
        $this->db->set('suara', 'suara+1', FALSE)->where('noUrut', $noUrut)->update('tb_majelis');
    }
}