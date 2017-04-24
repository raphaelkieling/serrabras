<?php
class M_agendamento extends CI_Model{
    function cadastrarAgendamento($data_post){
        $this->db->insert('agenda',$data_post);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
    
    function buscahorario($data){
        $this->db->where('data',$data);
        return $this->db->get('agenda')->result_array();
    }
}
?>