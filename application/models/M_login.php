<?php
class M_login extends CI_Model{
    function login($email,$senha){
        $this->db->where('email',$email);
        $this->db->where('senha',$senha);
        return $this->db->get('usuario')->row_array();
    }
    function cadastrar($email,$senha,$nome_imagem){
        $data = array(
            'email'=>$email,
            'senha'=>$senha,
            'permissao'=>0,
            'foto_perfil'=>$nome_imagem
        );
        $this->db->insert('usuario',$data);
        if($this->db->affected_rows()>0){
            return true;
        }else{
            return false;
        }
    }
}
?>