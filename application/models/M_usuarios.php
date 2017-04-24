<?php
class M_usuarios extends CI_Model{
    function pegaUsuarios(){
        return $this->db->get('usuario')->result_array();
    }
    function apagar($id){
        $this->db->where('idUsuario',$id);
        $this->db->delete('usuario');
    }
}
?>