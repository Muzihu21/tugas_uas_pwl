<?php

class M_baba extends CI_Model{

    public function tampil_data()
    {
        return $this->db->get('tb_gempabumi');
    }

    public function input_data($data)
    {
        $this->db->insert('tb_gempabumi', $data);
    }

    public function hapus_data($where,$table){

            $this->db->where($where);
            $this->db->delete($table);
    }

    public function edit_data($where,$table){
 
        return $this->db->get_where($table,$where);
    }

    public function update_data($where,$data,$table){

        $this->db->where($where);
        $this->db->update($table,$data);
    }

    public function detail_data($id = null){
        $query = $this->db->get_where('tb_gempabumi', array('id' => $id))->row();
        return $query;
    }
    
}
