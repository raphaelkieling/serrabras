<?php
class M_medidas extends CI_Model{
    function pegaMedidas(){
        return $this->db->get('medida')->result_array();
    }
    function apagar($id){
        $this->db->where('idMedida',$id);
        $this->db->delete('medida');
    }
}
?>