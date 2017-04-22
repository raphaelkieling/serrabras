<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    function index(){
        $this->load->view('page/login/index');
    }
    function login(){
        $user = array(
            'email'=> $this->input->post('email'),
            'password'=> md5($this->input->post('password'))
        );

        $this->load->model('M_login');
        $usuario_final = $this->M_login->login($user['email'],$user['password']);

        if($usuario_final){
            $this->session->set_userdata('user',$usuario_final);
            redirect('/dashboard');
        }else{
            $this->session->set_flashdata('message','Desculpe, email ou senha incorretos');
            $this->index();
        }
    }
    function sair(){
         $this->session->unset_userdata('user',$usuario_final);
         redirect('/');
    }
}
?>