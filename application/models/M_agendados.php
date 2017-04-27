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
    function pegaTodosOsPedidos(){
        $this->db->join('pedido','pedido.codAgendamento = agenda.idAgenda');
        $this->db->join('local','local.idLocal = agenda.codLocal');
        $this->db->join('usuario','usuario.idUsuario = agenda.codUsuario');
        $this->db->select_sum('nmr_pacotes');
        
        $this->db->group_by("codAgendamento");   
        $this->db->select('codLocal,data,hora_entrega,local.nome as nome,status,idAgenda,usuario.nome as unome,codUsuario');    
        $this->db->order_by('data');
        return $this->db->get('agenda')->result_array();
    }
    function pegaPedidoPorAgendamento($idAgenda){
        $this->db->where('idAgenda',$idAgenda);

        $this->db->join('pedido','pedido.codAgendamento = agenda.idAgenda');
        $this->db->join('local','local.idLocal = agenda.codLocal');
        $this->db->join('usuario','usuario.idUsuario = agenda.codUsuario');
        $this->db->join('medida','medida.idMedida = pedido.codMedida');
        
        $this->db->select('codLocal,data,hora_entrega,local.nome as nome,status,codAgendamento as codAgenda,usuario.nome as unome,codUsuario,pedido.nmr_pacotes as nmr,qualidade,espessura,largura,comprimento,peca');    
        $this->db->order_by('data');
        return $this->db->get('agenda')->result_array();
    }
    function pegaLimit($limit,$idUsuario){
        $this->db->where('codUsuario',$idUsuario);
        $this->db->limit($limit);
        $this->db->join('pedido','pedido.codAgendamento = agenda.idAgenda');
        $this->db->join('local','local.idLocal = agenda.codLocal');
        $this->db->select_sum('nmr_pacotes');
        
        $this->db->group_by("codAgendamento");   
        $this->db->select('codLocal,data,hora_entrega,nome,status,idAgenda,codUsuario');    
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
    function cancela($id){
        $this->db->where('idAgenda',$id);
        $this->db->update('agenda',array('status'=>2));

        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
?>