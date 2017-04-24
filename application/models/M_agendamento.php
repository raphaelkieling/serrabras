<?php
class M_agendamento extends CI_Model{
    function cadastrarAgendamento($data_post){
        $this->db->insert('agenda',$data_post);
        if($this->db->affected_rows()>0){
            return $this->db->insert_id();
        }else{
            return false;
        }
    }
    
    function cadastrarPedido($data_idAgendamento,$pacotes,$medida,$peca){
       $data = array(
        'codAgendamento'=>$data_idAgendamento,
        'nmr_pacotes'   =>$pacotes,
        'codMedida'        =>$medida,
        'peca'          =>$peca
       );

       $this->db->insert('pedido',$data);
       if($this->db->affected_rows()>0){
           return true;
       }else{
           return false;
       }
    }

    function buscahorario($data,$local){
        $this->db->where('data',$data);
        $this->db->where('codLocal',$local);
        return $this->db->get('agenda')->result_array();
    }
}
?>