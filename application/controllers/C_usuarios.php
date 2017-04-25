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
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        $this->load->model('M_usuarios');
        $data = $this->M_usuarios->pegaUsuarios();

        header('Content-type:application/json');
        echo json_encode($data);
    }
    function editar(){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }

        //pegas as informações do post
        $info_post = array(
            'senha'     =>md5($this->input->post('senha')),
            'permissao' =>$this->input->post('permissao')
        );

        $idUsuario = $this->input->post('idUsuario');
        
        //valida
        $this->load->library('form_validation');
        $this->form_validation->set_rules('senha','Senha','trim|required');
        $this->form_validation->set_rules('senhan','Senha','trim|required|matches[senha]');
        $this->form_validation->set_rules('permissao','Permissão','required|integer');

        if(!$this->form_validation->run()==FALSE){
            $this->load->model('M_usuarios');
            $data = $this->M_usuarios->modificar($info_post,$idUsuario);

            if($data){
                $this->session->set_flashdata('message-success','Deu certo! O usuário <b>'.$idUsuario.'</b> foi atualizado');
                redirect('/usuarios');
            }else{
                $this->session->set_flashdata('message','Erro ao editar o usuário <b>'.$idUsuario.'</b>. Está colocando a mesma senha que já é?');
                redirect('/usuarios');
            }
        }else{
            $this->session->set_flashdata('message',validation_errors());
            redirect('/usuarios');
        }
       
    }
    function deleta($id){
        $user = $this->session->userdata('user');
        if(!$user || !$user['permissao']>=1){
            $this->session->set_flashdata('message','Você não tem permissão');
            redirect('/');
        }
        
        $this->load->model('M_usuarios');
        $data = $this->M_usuarios->apagar($id);
    }
}
?>