<?php
class M_usuarios extends CI_Model{
    function pegaUsuarios(){
        return $this->db->get('usuario')->result_array();
    }
    function apagar($id){
        $this->db->where('idUsuario',$id);
        $this->db->delete('usuario');
    }
    function cadastrar($data){
        $this->db->insert('usuario',$data);

        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
?>