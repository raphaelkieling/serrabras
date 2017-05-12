<?php
class M_locais extends CI_Model{
	function cadastro($data_post){
		$this->db->insert("local",$data_post);
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
	function altera($id,$data_post){
		$this->db->where('idLocal',$id);
		$this->db->update('local',$data_post);
		if($this->db->affected_rows()>0){
			return true;
		}else{
			return false;
		}
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