<?php
class M_agendados extends CI_Model{
    function agendadosPor($id){
        $this->db->where('codUsuario',$id);

        $this->db->join('pedido','pedido.codAgendamento = agenda.idAgenda');
        $this->db->join('local','local.idLocal = agenda.codLocal');
        $this->db->select_sum('nmr_pacotes');
        
        $this->db->group_by("codAgendamento");   
        $this->db->select('codLocal,data,hora_entrega,nome,status,idAgenda');    
        return $this->db->get('agenda')->result_array();
    }
    function entregue($id){
        $this->db->where('idAgenda',$id);
        $this->db->update('agenda',array('status'=>1));

        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
?>