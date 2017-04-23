<?php
class M_locais extends CI_Model{
	function cadastro($nome,$h_i,$h_f){
		$this->db->insert('local',array('nome'=>$nome,'horario_inicial'=>$h_i,'horario_final'=>$h_f));
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
	function pegaLocais(){
		$this->db->order_by('idLocal','desc');
		return $this->db->get('local')->result_array();
	}
	function deleta($id){
		$this->db->where('idLocal',$id);
		$this->db->delete('local');

		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
	}
}
?>