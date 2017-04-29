<?php
class M_medidas extends CI_Model{
    function pegaMedidas(){
        return $this->db->get('medida')->result_array();
    }
    function apagar($id){
        $this->db->where('idMedida',$id);
        $this->db->delete('medida');
    }
    function cadastra($data_post){
    	$this->db->insert('medida',$data_post);
    	if($this->db->affected_rows()>0){
    		return true;
    	}else{
    		return false;
    	}
    }
}
?>