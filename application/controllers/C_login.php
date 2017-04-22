<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class C_login extends CI_Controller {
    function index(){
        $this->load->view('page/login/index');
    }
    function cadastrar(){
        $this->load->view('page/login/cadastrar');
    }
    function cadastrarInfo(){
        //Pegas as variaveis de cadastro
        $email = $this->input->post('email');
        $senha = $this->input->post('password');
        $senhaa = $this->input->post('passwordd');
        //trata as variaves de cadastro
        $this->load->library('form_validation');
        $this->form_validation->set_rules('email',"Email",'required|is_unique[usuario.email]');
        $this->form_validation->set_rules('password',"Senha",'required');
        $this->form_validation->set_rules('passwordd',"Repetir Senha",'required|matches[password]');

        if($this->form_validation->run() == FALSE){
            $this->cadastrar();
        }else{
            // Trata a imagem
            $config['upload_path']          = 'assets/img/user_photo';
            $config['allowed_types']        = 'gif|jpg|png';
            $config['max_size']             = 500;
            $config['max_width']            = 1250;
            $config['max_height']           = 720;
            $config['encrypt_name'] = TRUE;
            $this->load->library('upload', $config);
            
            if (!$this->upload->do_upload('image'))
            {
                    $error = array('error' => $this->upload->display_errors());
                    $this->session->set_flashdata('message',$error['error']);
                    redirect('/cadastrar');
            }
            else
            {
                    $data_img = array('upload_data' => $this->upload->data());

                    //cadastra email senha e imagem em um usuario
                    $this->load->model('M_login');
                    $resultado_cadastro = $this->M_login->cadastrar($email,md5($senha),$data_img['upload_data']['file_name']);
                    if($resultado_cadastro){
                        $this->session->set_flashdata('message-success','Deu tudo certo! Já pode logar.');
                    }else{
                        $this->session->set_flashdata('message','Algo deu errado na hora do cadastro...');
                    }
                   
                    $this->index();
            }
        }

        
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
         $this->session->unset_userdata('user');
         $this->index();
    }
}
?>