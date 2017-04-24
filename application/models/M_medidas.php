<?php
class M_medidas extends CI_Model{
    function pegaMedidas(){
        return $this->db->get('medida')->result_array();
    }
}
?>