<?php
class M_login extends CI_Model{
    function login($email,$senha){
        $this->db->where('email',$email);
        $this->db->where('senha',$senha);
        return $this->db->get('usuario')->row_array();
    }
}
?>