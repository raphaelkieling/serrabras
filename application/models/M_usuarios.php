<?php
class M_usuarios extends CI_Model{
    function pegaUsuarios(){
        return $this->db->get('usuario')->result_array();
    }
    function pegaUsuarioId($id){
        $this->db->where('idUsuario',$id);
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
    function nmrUsuarios(){
        return $this->db->count_all_results('usuario');
    }
    function modificar($info_post,$idUsuario){
        $this->db->where('idUsuario',$idUsuario);
        $this->db->update('usuario',$info_post);

        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
?>