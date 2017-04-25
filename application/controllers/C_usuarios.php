<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_usuarios extends CI_Controller {
    function index(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->view('components/header');
        $this->load->view('page/usuarios/index');
    }
    function pegaUsuarios(){
        $this->load->model('M_usuarios');
        $data = $this->M_usuarios->pegaUsuarios();

        header('Content-type:application/json');
        echo json_encode($data);
    }
    function editar(){
        $info_post = array(
            'idUsuario' =>$this->input->post('idUsuario'),
            'email'     =>$this->input->post('email'),
            'senha'     =>$this->input->post('senha'),
            'permissao' =>$this->input->post('permissao')
        );
    }
    function deleta($id){
        $this->load->model('M_usuarios');
        $data = $this->M_usuarios->apagar($id);
    }
}
?>