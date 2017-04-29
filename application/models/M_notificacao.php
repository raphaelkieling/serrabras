<?php
class M_notificacao extends CI_Model{
	function pegaNotificacao(){
		return $this->db->get('notificacao')->result_array();
	}
	function cadastrar($data_post){
		$this->db->insert('notificacao',$data_post);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}